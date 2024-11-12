<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\PaystackService;
use illuminate\Support\Str;


class ChoosePlan extends Component
{
    
    public $monthly_plan = 8900;
    public $quarterly_plan = 17800;
    public $plan=8900;
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
        $callbackUrl = route('subscription.callback');

        $response = $paystack->initiatePayment($this->billing_email, $amount, $reference, $planCode, $callbackUrl);
        
        
        if ($response['status']) {
            $user = User::where('email',$this->billing_email)->first();
            if(!$user){
                User::create([
                    'email' => $this->billing_email,
                    'name' => $this->billing_name,
                ]);
            }
            
            $this->reset();
            return redirect($response['data']['authorization_url']);
        }
        return redirect()->back()->with('error', 'Unable to initiate payment');
    }

}
