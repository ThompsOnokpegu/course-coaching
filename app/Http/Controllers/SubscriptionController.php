<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Str;

use App\Services\PaystackService;

class SubscriptionController extends Controller
{
    protected $paystack;

    public function __construct(PaystackService $paystack)
    {
        $this->paystack = $paystack;
    }

    // 1. Initiate Payment
    public function initiatePayment(Request $request)
    {
        // Validate email input
        $request->validate(['email' => 'required|email']);
        //$request->validate(['plan' => 'required']);

        $email = $request->input('email');
        //$planCode = $request->input('plan');
        $planCode = env('PLAN_CODE_MONTLY');
        $amount = 500; // $5
        $reference = uniqid('sub_');
        $callbackUrl = route('home');

        $response = $this->paystack->initiatePayment($email, $amount, $reference, $planCode, $callbackUrl);

        if ($response['status']) {
            return redirect($response['data']['authorization_url']);
        }
        return redirect()->back()->with('error', 'Unable to initiate payment');
    }
    
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $event = $payload['event'] ?? null;
        $customerCode = $payload['data']['customer']['customer_code'];
        switch ($event) {
            case 'subscription.create':
                // Capture the authorization details
                $authorizationCode = $payload['data']['authorization']['authorization_code'];
                $email = $payload['data']['customer']['email'];
                $planCode = $payload['data']['plan']['plan_code'];

                //create a new user  
                $user = User::create([
                    'email' => $email,
                    'password' => bcrypt(Str::random(12)),
                    'is_subscribed' => true,
                    'subscription_end_date' => now()->addMonth(),
                    'paystack_customer_code' => $customerCode,
                    'paystack_auth_code' => $authorizationCode,
                    'plan_code' => $planCode,
                ]);

            case 'charge.success':
                $user = User::where('paystack_customer_code', $customerCode)->first();
                if($user){
                    $user->is_subscribed = true;
                    $user->subscription_end_date = now()->addMonth();
                    $user->save();
                }
                break;

            case 'subscription.disable':
                $user = User::where('paystack_customer_code', $customerCode)->first();
                if($user){
                    $user->is_subscribed = false;
                    $user->save();
                }
                break;

            case 'subscription.expiring':
                // Handle expiring subscriptions if necessary
                break;

            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => 'ignored'], 200);
    }


}

