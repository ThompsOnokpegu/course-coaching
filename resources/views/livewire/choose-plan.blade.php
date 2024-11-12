<section class="bg-white py-6 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Payment</h2>
  
        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
          <form wire:submit="subscribe"  class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6 lg:max-w-xl lg:p-8">
            <div class="mb-6 grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input wire:model="billing_name" id="billing_name" name="billing_name" type="text" class="mt-1 block w-full" autofocus autocomplete="billing_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('billing_name')" />
                </div>
                <div>
                    <x-input-label for="billing_email" :value="__('Email')" />
                    <x-text-input wire:model="billing_email" id="billing_email" name="billing_email" type="text" class="mt-1 block w-full" autocomplete="billing_email" />
                    <x-input-error class="mt-2" :messages="$errors->get('billing_email')" />
                </div>
                
            </div>
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-900">Choose Plan</h3>
      
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                  <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4">
                    <div class="flex items-start">
                      <div class="flex h-5 items-center">
                        <input id="monthly" aria-describedby="dhl-text" type="radio" wire:model.change="plan" value="{{ $monthly_plan }}" class="h-4 w-4 border-gray-300 bg-white text-green-600 focus:ring-2 focus:ring-green-600"/>
                      </div>
      
                      <div class="ms-4 text-sm">
                        <label for="dhl" class="font-medium leading-none text-gray-900"> ₦{{ $monthly_plan }}/Month </label>
                        <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500">₦{{ $monthly_plan }} every month until you cancel</p>
                      </div>
                    </div>
                  </div>
      
                  <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4">
                    <div class="flex items-start">
                      <div class="flex h-5 items-center">
                        <input id="quarterly" aria-describedby="fedex-text" type="radio" wire:model.change="plan" value="{{ $quarterly_plan }}" class="h-4 w-4 border-gray-300 bg-white text-green-600 focus:ring-2 focus:ring-green-600" />
                      </div>
      
                      <div class="ms-4 text-sm">
                        <label for="fedex" class="font-medium leading-none text-gray-900"> ₦{{ $quarterly_plan }}/Quarter </label>
                        <p id="fedex-text" class="mt-1 text-xs font-normal text-gray-500">Save ₦{{ $quarterly_plan-$monthly_plan }} when you pay for 3 months ahead</p>
                      </div>
                    </div>
                  </div>
      
                  
                </div>
              </div>
            <button type="submit" class="flex w-full items-center justify-center rounded-sm bg-green-700 px-5 mt-8 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4  focus:ring-green-300">Subscribe for ₦{{ $plan }}/{{ $plan==$monthly_plan?"MONTHLY":"QUARTERLY" }}</button>
          </form>
  
          <div class="mt-6 grow sm:mt-8 lg:mt-0">
            <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6">
              <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">Usual Amount</dt>
                  <dd class="text-base font-medium text-gray-900">₦{{ $plan==$monthly_plan ? $monthly_plan : $quarterly_plan + $monthly_plan }}</dd>
                </dl>
  
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">Discount</dt>
                  <dd class="text-base font-medium text-green-600">-₦{{ $plan-$monthly_plan }}</dd>
                </dl>
  
               
              </div>
  
              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                <dt class="text-base font-bold text-gray-900">Total</dt>
                <dd class="text-base font-bold text-gray-900">₦{{ $plan }}</dd>
              </dl>
            </div>
  
            <div class="mt-6 flex items-center justify-center gap-8">
                <img class="w-2/3" src="{{ asset('img/paystack-ii.webp') }}" alt="" />
              {{--<img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg" alt="" />
              <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal-dark.svg" alt="" />
              <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="" />
              <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg" alt="" />
              <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg" alt="" />
              <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard-dark.svg" alt="" /> --}}
            </div>
          </div>
        </div>
  
        <p class="mt-6 text-sm text-center text-gray-500 sm:mt-8 lg:text-left">
          Payment processed by <a href="https://paystack.com" title="" class="font-medium text-green-600 underline hover:no-underline">Paystack</a> for <a href="https://deeprmarketing.com" title="" class="font-medium text-green-600 underline hover:no-underline">Deepr Marketing</a>
        </p>
      </div>
    </div>
</section>
