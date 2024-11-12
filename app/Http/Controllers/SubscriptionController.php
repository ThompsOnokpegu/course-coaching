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
        $this->paystack->handleCallback($request);
    }


}

