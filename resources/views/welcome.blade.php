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
        <section class="bg-white">
            <div class="py-4 px-4 mx-auto max-w-screen-xl text-center lg:py-5 lg:px-12">
                
                <p class="mb-8 text-lg italic text-black lg:text-xl sm:px-16 xl:px-48">Ads Too Expensive Or Not Profitable?</p>
                <h1 class="mb-4 -mt-3 font-anton text-2xl leading-8 tracking-wide sm:leading-loose text-black md:text-3xl lg:text-5xl">Get 
                    <span class="bg-deepr_green-50">LIVE AD COACHING</span> and <span class="bg-deepr_green-50 leading-8 sm:leading-10">ON-DEMAND TRAINING</span> 
                    From A Top-Rated Ad Expert For Only <span class="bg-deepr_green-50 sm:leading-relaxed">₦8900/MONTH</span></h1>
                <p class="text-lg mb-4 leading-6 font-semibold text-deepr_red-50">Watch This Video To See What's Included With The Membership</p>
                <div class="relative" style="padding-top: 56.25%">
                    <iframe class="rounded-md absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/uTKyhVMSNFA?rel=0" frameborder="0" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation"></iframe>
                </div>
                <form action="{{ route('subscription.initiate') }}">
                    <button type="submit" class="justify-center items-center mt-5 py-3 lg:py-5 px-5 lg:px-7 text-lg font-medium text-center bg-deepr_red-50 hover:bg-red-700 text-white" >Yes, I Want LIVE Coaching On My Ads For Just ₦8900/MONTH</button>
                </form>
                <p class="text-base italic leading-none mb-4 mt-2 font-normal text-gray-600">There is NO contract and NO Minimum months.  You can cancel ANYTIME</p>
            </div>
        </section>
        <section class="bg-white">
            <div class="py-4 px-4 mx-auto max-w-screen-xl text-center lg:px-12">
                <h1 class="mb-4 mt-3 text-2xl font-anton tracking-tight leading-tight text-deepr_black-50 md:text-3xl lg:text-5xl">Here's What You Get For Only <span class="bg-deepr_green-50">₦8900/MONTH</h1>
                <span class="text-xl font-sans font-semibold tracking-tight leading-tight bg-deepr_green-50 text-deepr_black-50 md:text-2xl lg:text-4xl">Ad Strategies Done For You Including:</span>
            </div>
            <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-12">

                <section class="bg-white">
                    <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                        <div class="mr-auto  lg:col-span-7">
                            <ul class="max-w-2xl mb-4 space-y-5 text-lg sm:text-xl text-gray-600 list-disc list-outside">
                                <li>
                                    Three $5 Ad Strategies EVERY Coach Should Be Using Every Month
                                </li>
                                <li>
                                    The $5/Day DM Funnel That Books 3-5 Calls Every Day
                                </li>
                                <li>
                                    How To Retarget Like A Pro For Just $2 A Day
                                </li>
                                <li>
                                    Discovery Call Accelerator:  How to book 30-40 discovery calls a month for $500 budget
                                </li>
                                <li>
                                    The Ad Copy Formula That Will 20X Your Engagement And Reach
                                </li>{{-- 
                                <li>
                                    Get Your Ads That Aren’t Working FIXED By An Expert
                                </li>
                                <li>
                                    I'll Help You Scale Your Ads Just Like I Do For My Clients
                                </li>
                                <li>
                                    Get Clarity On Organic and Paid Strategies That Work
                                </li>
                                <li>
                                    Stay Ahead Of Changes That Can Compromise Your Ad Account
                                </li> --}}
                                
                            </ul>
                            
                        </div>
                        <div class="relative lg:mt-0 lg:col-span-5 lg:flex" style="padding-top: 56.25%">       
                            <iframe class="rounded-md absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/uTKyhVMSNFA?rel=0" frameborder="0" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation"></iframe>
                        </div>               
                    </div>
                </section>
            </div>
        </section>
        
    </body>
</html>
