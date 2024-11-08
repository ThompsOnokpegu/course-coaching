<?php

namespace App\Livewire;

use App\Services\Paystack;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\PaystackService;
use GuzzleHttp\Psr7\Request;

class ChoosePlan extends Component
{
    
    public $monthly_plan = 5;
    public $quarterly_plan = 10;
    public $plan=5;
    #[Validate('required')]
    #[Validate('email')]
    public $billing_email;
    #[Validate('required')]
    #[Validate('min:3')]
    public $billing_name;
   

    public function render()
    {

        return view('livewire.choose-plan');
    }

    public function subscribe(){
        $paystack = new PaystackService;
        $this->validate();
           
        $planCode = $this->plan == 5 ? env('PLAN_CODE_MONTLY') : env('PLAN_CODE_QUARTERLY');
        $amount = 500; // $5
        $reference = uniqid('sub_');
        $callbackUrl = route('thank-you');

        $response = $paystack->initiatePayment($this->billing_email, $amount, $reference, $planCode, $callbackUrl);
        

        if ($response['status']) {
            return redirect($response['data']['authorization_url']);
        }
        return redirect()->back()->with('error', 'Unable to initiate payment');
    }


}
