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

    public function home(){
        return view('welcome');
    }
    public function emailPreview(){
        $user = User::where('id',1)->first();
        if($user){
            return view('emails.course-instructions',compact('user'));
        }
    }
    public function thankYou(){
        return view('thank-you');
    }

    public function initiatePayment(){
        return view('choose-plan');
    }
    
    public function handleWebhook(Request $request)
    {
       $response =  $this->paystack->handleWebhook($request);
       return $response;
    }
    // Handles Paystack callback redirect after payment
    public function handleCallback(Request $request)
    {
        $response = $this->paystack->handleCallback($request);
        
        return view('thank-you',compact('response'));
    }


}

