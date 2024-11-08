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
        <section class="bg-white dark:bg-deepr_black-50">
            <div class="py-4 px-4 mx-auto max-w-screen-xl text-center lg:py-5 lg:px-12">
                
                <p class="mb-8 text-lg font-bold italic text-black lg:text-xl sm:px-16 xl:px-48">Ads Too Expensive Or Not Profitable?</p>
                <h1 class="mb-4 -mt-3 font-anton text-2xl font-bold leading-8 sm:leading-loose text-deepr_black-50 md:text-3xl lg:text-5xl">Get 
                    <span class="bg-deepr_green-50">LIVE AD COACHING</span> and <span class="bg-deepr_green-50 leading-8 sm:leading-10">ON-DEMAND TRAINING</span> 
                    From A Top-Rated Ad Expert For Only <span class="bg-deepr_green-50 sm:leading-relaxed">$5/MONTH</span></h1>
                <p class="text-lg mb-4 leading-6 font-semibold text-deepr_red-50">Watch This Video To See What's Included With The Membership</p>
                <div class="relative" style="padding-top: 56.25%">
                    <iframe class="rounded-md absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/uTKyhVMSNFA?rel=0" frameborder="0" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation"></iframe>
                </div>
                <button class="justify-center items-center mt-5 py-3 px-5 text-base font-medium text-center bg-deepr_red-50 hover:bg-red-700 text-white" type="submit">Yes, I Want LIVE Coaching On My Ads For Just $5/Month</button>
                <p class="text-lg italic leading-none mb-4 font-normal text-gray-600">There is NO contract and NO Minimum months.  You can cancel ANYTIME</p>
            </div>
        </section>
        <section class="bg-white">
            <div class="py-4 px-4 mx-auto max-w-screen-xl text-center lg:py-5 lg:px-12">
                <h1 class="mb-9 mt-3 text-2xl font-sans font-extrabold tracking-tight leading-tight text-deepr_black-50 md:text-3xl lg:text-5xl">Here's What You Get For Only <span class="bg-deepr_green-50">$5/MONTH</h1>
                <span class="mb-4 text-xl font-sans font-semibold tracking-tight leading-tight bg-deepr_green-50 text-deepr_black-50 md:text-2xl lg:text-4xl">Ad Strategies Done For You Including:</span>
                
               
                

            </div>
            <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-5 lg:px-12">
                <ul class="max-w-xl pl-10 space-y-5 text-xl text-gray-500 list-disc list-outside">
                    <li>
                        At least 10 characters (and up to 100 characters)
                    </li>
                    <li>
                        At least one lowercase character
                    </li>
                    <li>
                        Inclusion of at least one special character, e.g., ! @ # ?
                    </li>
                </ul>
            </div>
        </section>
    </body>
</html>
