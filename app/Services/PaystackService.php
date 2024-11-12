<?php
namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
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
        $payload = $request->all();
        $event = $payload['event'];
        switch ($event) {
            case 'subscription.create':
                return $this->handleSubscriptionCreate($payload);
            case 'charge.success':
                return $this->handleChargeSuccess($payload);
            case 'invoice.update':
                return $this->handleInvoiceUpdate($payload);
            default:
                # code...
                break;
        }
        return response()->json(['status' => 'success'], 200);
    }

    // Handles subscription creation event
    private function handleSubscriptionCreate($payload){
        $status = $payload['data']['status'];
        if($status == 'active'){
            $subscriptionCode = $payload['data']['subscription_code'];

            $customerCode = $payload['data']['customer']['customer_code'];
            $email = $payload['data']['customer']['email'];
            $name = $payload['data']['customer']['first_name'];
            $planCode = $payload['data']['plan']['plan_code'];
            $authorizationCode = $payload['data']['authorization']['authorization_code'];
            $nextDate = $payload['data']['next_payment_date'];

            $user = User::where('email',$email)->first();  
            $user->update([
                'name' => $name,
                'subscribed' => true,
                'subscription_end_date' => Carbon::date($nextDate),
                'plan_code' => $planCode,
                'subscription_code' => $subscriptionCode,
                'customer_code' => $customerCode,
                'authorization_code' => $authorizationCode,
            ]);
            
            
            // Send password reset link for account setup
            //Password::sendResetLink(['email' => $user->email]);
            
        }
        return response()->json(['status' => 'success'], 200);
        
    }

    // Handles charge.success event for successful payments
    private function handleChargeSuccess($payload){
        $subscriptionCode = $payload['data']['subscription_code'];
        $user = User::where('subscription_code', $subscriptionCode)->first();

        if ($user) {
            // Fetch email_token by calling the List Subscriptions API
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

            return response()->json(['status' => 'success'], 200);
        }
        
    }

     // Handles final status after invoice update
    private function handleInvoiceUpdate($payload){
         $status = $payload['data']['paid'];
         $nextDate = $payload['data']['period_end'];
         $customerCode = $payload['data']['customer']['customer_code'];
         $user = User::where('customer_code', $customerCode)->first();
 
         if ($user) {
             $user->update([
                'subscribed' => $status,
                'subscription_end_date' => $nextDate,
            ]);
             
         }
         return response()->json(['status' => 'success'], 200);
    }
 
     // Cancel a subscription using Paystack's subscription disable endpoint
    public function cancelSubscription(Request $request){
         $user = $request->user();
         $user = User::where('id', $user->id)->first();
 
         if ($user) {
             Http::withToken(config($this->secretKey))
                 ->post('https://api.paystack.co/subscription/disable', [
                     'code' => $user->subscription_code,
                     'token' => $user->email_token
                 ]);
 
             $user->update(['subscribed' => false]);
         }
 
         return redirect('/profile')->with('status', 'Subscription canceled');
    }

    // Handles invoice.payment_failed event for failed payments
    private function handlePaymentFailed($payload)
    {
        $customerCode = $payload['data']['customer']['customer_code'];
        $user = User::where('customer_code', $customerCode)->first();

        if ($user) {
            $user->update(['subscribed' => false]);
        }
    }

   
}
