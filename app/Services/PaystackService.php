<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

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
        return Http::withToken($this->secretKey)->post("{$this->baseUrl}/transaction/initialize", [
            'email' => $email,
            'amount' => $amount * 100, // Convert to kobo
            'reference' => $reference,
            'plan' => $planCode,
            'callback_url' => $callbackUrl
        ])->json();
    }
}
