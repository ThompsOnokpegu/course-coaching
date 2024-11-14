<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class PaystackService
{
    protected $secretKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->secretKey = env('PAYSTACK_SECRET_KEY');
        $this->baseUrl = env('PAYSTACK_PAYMENT_URL');
    }

    // 1. Initiate Payment
    public function initiatePayment($email, $amount, $reference, $planCode, $callbackUrl)
    {
        $data = [
            'email' => $email,
            'amount' => $amount * 100, // Convert to kobo
            'reference' => $reference,
            'plan' => $planCode,
            'callback_url' => $callbackUrl
        ];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->secretKey,
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/transaction/initialize", $data);

        return $response;
    }
    
    public function handleCallback(Request $request)
    {
        $reference = $request->query('reference');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->secretKey,
            'Content-Type' => 'application/json',
        ])->get("{$this->baseUrl}/transaction/verify/{$reference}");

        return $response;
    }

    public function handleWebhook(Request $request){
        // Check if it's a POST request with Paystack signature header
        if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) {
            exit();
        }

        // Retrieve the payload from the request
        $payload = $request->getContent();

        // Retrieve the Paystack signature from the request headers
        $paystackSignature = $request->header('X-Paystack-Signature');

        // Calculate your own HMAC signature
        $generatedSignature = hash_hmac('sha512', $payload, env('PAYSTACK_SECRET_KEY'));

        // Verify if the Paystack signature matches the generated one
        if ($paystackSignature === $generatedSignature) {
            $event = $payload['event'];
            Log::info($payload);
            switch ($event) {
                case 'subscription.create':
                    $this->handleSubscriptionCreate($payload);
                    return response('Webhook Processed', 200);
                case 'charge.success':
                    $this->handleChargeSuccess($payload);
                    return response('Webhook Processed', 200);
                case 'invoice.update':
                    $this->handleInvoiceUpdate($payload);
                    return response('Webhook Processed', 200);
                default:
                    # code...
                    break;
            }
        }
        
    }

    // Handles subscription creation event
    private function handleSubscriptionCreate($payload){
        Log::info('subscription.create fired');
        $status = $payload['data']['status'];
        if($status == 'active'){
            $subscriptionCode = $payload['data']['subscription_code'];

            $customerCode = $payload['data']['customer']['customer_code'];
            $email = $payload['data']['customer']['email'];
            $name = $payload['data']['customer']['first_name'];
            $planCode = $payload['data']['plan']['plan_code'];
            $authorizationCode = $payload['data']['authorization']['authorization_code'];

            $user = User::where('email',$email)->first();  
            $user->update([
                'name' => $name,
                'subscribed' => true,
                'status' => $status,
                'subscription_end_date' => now()->addMonth(),
                'plan_code' => $planCode,
                'subscription_code' => $subscriptionCode,
                'customer_code' => $customerCode,
                'authorization_code' => $authorizationCode,
            ]);
            
            //do not send reset link if user is reactivating a cancelled subscription
            if($user->password === null){
                // Send password reset link for new account setup
                Password::sendResetLink(['email' => $user->email]);    
            } 
        }
        
    }

    // Handles charge.success event for successful payments
    private function handleChargeSuccess($payload){
        $customerCode = $payload['data']['customer_code'];
        $user = User::where('customer_code', $customerCode)->first();
        $subscriptionCode = $user->subscription_code;

        if (($user->subscribed == true && $user->email_token == null) || $user->subscribed == true && $user->status == 'cancelled' ) {
            /*user is subscribed to a plan*/
            // Fetch email_token by calling the Fetch Subscription API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->get("{$this->baseUrl}/subscription/{$subscriptionCode}");

            if ($response->successful() && !empty($response->json('data'))) {
                $emailToken = $response['data']['email_token'];
                $user->update([
                    //'subscribed' => true,
                    'email_token' => $emailToken
                ]);
            }     
        }elseif($user->status == 'attention' && $user->email_token != null ){
            /*user is renewing expired subscription*/    
            $user->update([
                'authorization_code' => $payload['data']['authorization']['authorization_code']//necessary if the user pay with a different card
            ]);
        } 
    }
     // Handles final status after invoice update
    private function handleInvoiceUpdate($payload){

         $paid = $payload['data']['paid'];//boolean
         $customerCode = $payload['data']['customer']['customer_code'];
         $status = $payload['data']['subscription']['status'];//string
         $user = User::where('customer_code', $customerCode)->first();
 
         if ($user) {
             $user->update([
                'subscribed' => $paid,
                'status' => $status,
                'subscription_end_date' => $paid ? now()->addMonth(): now(),
            ]);
             
         }
         
    }   
}
