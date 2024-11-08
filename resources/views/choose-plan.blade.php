<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
              <div class="mx-auto max-w-5xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Payment</h2>
          
                <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
                  <form action="#" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
                    <div class="mb-6 grid grid-cols-2 gap-4">
                      <div class="col-span-2 sm:col-span-1">
                        <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Full Name* </label>
                        <input type="text" id="full_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Bonnie Green" required />
                      </div>
          
                      <div class="col-span-2 sm:col-span-1">
                        <label for="card-number-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Email Address* </label>
                        <input type="email" id="card-number-inpu" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500  dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="alice@gmail.com" required />
                      </div>
          
                      
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Choose Plan</h3>
              
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                          <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-start">
                              <div class="flex h-5 items-center">
                                <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-green-600 focus:ring-2 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                              </div>
              
                              <div class="ms-4 text-sm">
                                <label for="dhl" class="font-medium leading-none text-gray-900 dark:text-white"> $5/Month </label>
                                <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">$5 every month until you cancel</p>
                              </div>
                            </div>
                          </div>
              
                          <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-start">
                              <div class="flex h-5 items-center">
                                <input id="fedex" aria-describedby="fedex-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-green-600 focus:ring-2 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                              </div>
              
                              <div class="ms-4 text-sm">
                                <label for="fedex" class="font-medium leading-none text-gray-900 dark:text-white"> $10/Quarter </label>
                                <p id="fedex-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Save $5 when you pay for 3 months ahead</p>
                              </div>
                            </div>
                          </div>
              
                          
                        </div>
                      </div>
                    <button type="submit" class="flex w-full items-center justify-center rounded-sm bg-green-700 px-5 mt-8 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4  focus:ring-green-300">Subscribe for $5/MONTH</button>
                  </form>
          
                  <div class="mt-6 grow sm:mt-8 lg:mt-0">
                    <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
                      <div class="space-y-2">
                        <dl class="flex items-center justify-between gap-4">
                          <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                          <dd class="text-base font-medium text-gray-900 dark:text-white">$6,592.00</dd>
                        </dl>
          
                        <dl class="flex items-center justify-between gap-4">
                          <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                          <dd class="text-base font-medium text-green-500">-$299.00</dd>
                        </dl>
          
                        <dl class="flex items-center justify-between gap-4">
                          <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                          <dd class="text-base font-medium text-gray-900 dark:text-white">$99</dd>
                        </dl>
          
                        <dl class="flex items-center justify-between gap-4">
                          <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                          <dd class="text-base font-medium text-gray-900 dark:text-white">$799</dd>
                        </dl>
                      </div>
          
                      <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                        <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                        <dd class="text-base font-bold text-gray-900 dark:text-white">$7,191.00</dd>
                      </dl>
                    </div>
          
                    <div class="mt-6 flex items-center justify-center gap-8">
                      <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg" alt="" />
                      <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal-dark.svg" alt="" />
                      <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="" />
                      <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg" alt="" />
                      <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg" alt="" />
                      <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard-dark.svg" alt="" />
                    </div>
                  </div>
                </div>
          
                <p class="mt-6 text-center text-gray-500 dark:text-gray-400 sm:mt-8 lg:text-left">
                  Payment processed by <a href="#" title="" class="font-medium text-green-500 underline hover:no-underline">Paystack</a> for <a href="#" title="" class="font-medium text-green-500 underline hover:no-underline dark:text-primary-500">Deepr Marketing</a>
                </p>
              </div>
            </div>
          </section>
          
          <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
  
  
</body>
</html>