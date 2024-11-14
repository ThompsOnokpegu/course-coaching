<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
   
    public function renewSubscription(Request $request){
        $secretKey = env('PAYSTACK_SECRET_KEY');
        $baseUrl = env('PAYSTACK_PAYMENT_URL');
        
        $user = Auth::user();
        if ($user && $user->subscribed == false) {
            if($user->status == 'attention'){
                $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $secretKey,
                'Content-Type' => 'application/json',
                ])->post("{$baseUrl}/subscription/enable", [
                    'code' => $user->subscription_code,
                    'token' => $user->email_token,
                ]);

                if ($response->successful()) {
                    $user->update(['subscribed' => true,'status'=>'active']);
                    
                } else {
                    return response()->json(['error' => 'Failed to reactivate subscription.'], 400);
                }
                return redirect(route('profile'));
            }elseif($user->status == 'cancelled'){
                return redirect(route('subscription.initiate'));
            }
            
        } else {
            return response()->json(['error' => 'No disabled subscription found.'], 404);
        }
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Renew Subscription') }}
        </h2>
        @if(Auth::user()->status == 'attention')
            <p class="mt-1 text-sm text-gray-600">
                {{ __('The subscription is active but temporarily disabled, likely due to missed payments') }}
            </p>
        @endif
        @if(Auth::user()->status == 'cancelled')
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Your subscription was terminated and cannot be re-enabled. A new subscription will be created for you') }}
            </p>
        @endif
        
    </header>

    <form wire:submit="renewSubscription">
        <x-renew-subscription-button class="">
            {{ __('Renew Subscription') }}
        </x-renew-subscription-button>
        @if(session()->has('message'))
            <p>{{ session('message') }}</p>
        @endif
        @if(session()->has('error'))
            <p>{{ session('error') }}</p>
        @endif
    </form>

</section>
