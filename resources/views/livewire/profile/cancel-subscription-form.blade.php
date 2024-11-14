<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use App\Services\PaystackService;

new class extends Component
{
    public string $password = '';
    protected $secretKey;
    protected $baseUrl;

    /**
     * Delete the currently authenticated user.
     */
    public function cancelSubscription(): void
    {
        $this->secretKey = env('PAYSTACK_SECRET_KEY');
        $this->baseUrl = env('PAYSTACK_PAYMENT_URL');
        
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);
        
         $user = Auth::user();
        
         if ($user->subscribed == true) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/subscription/disable", 
                [
                    'code' => $user->subscription_code,
                    'token' => $user->email_token
                ]);
            
            $user->update(['subscribed' => false,'status'=>'cancelled']);
         }

        $this->redirect(route('profile'), navigate: true);
    }
    

}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Cancel Subscription') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('If you cancel your subscription, you will still have access to the course until your active subscription expires.') }}
        </p>
    </header>

    <x-cancel-subscription-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-cancel-subscription')"
    >{{ __('Cancel Subscription') }}</x-cancel-subscription-button>

    <x-modal name="confirm-cancel-subscription" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="cancelSubscription" class="p-6">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to cancel your subscription?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('If you cancel your subscription, you will still have access to the course until your active subscription expires. Please enter your password to confirm this action.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    wire:model="password"
                    id="cancel-password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-cancel-subscription-button class="ms-3">
                    {{ __('Cancel Subscription') }}
                </x-cancel-subscription-button>
            </div>
        </form>
    </x-modal>
</section>
