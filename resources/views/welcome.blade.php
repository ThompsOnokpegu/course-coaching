<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Ads Coaching for $5/Month</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">If you’re a coach who’s booking fewer than 5 calls a week and struggling to fill your calendar, my $5/month coaching will guide you step-by-step to create ads that bring in consistent, quality calls.</p>
                <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <form class="justify-center" action="{{ route('subscription.initiate') }}" method="POST">
                        @csrf
                        <input class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center rounded-sm mb-3 sm:mb-0" type="email" name="email" placeholder="Enter your email" required>
                        <button class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center bg-blue-700 hover:bg-blue-900 rounded-sm text-white" type="submit">Subscribe for $5/month</button>
                    </form>
                    
                </div>
            </div>
        </section>
    </body>
</html>
