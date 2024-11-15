<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('frontend/styless.min.css') }}">
        <link href="https://fonts.cdnfonts.com/css/ridley-grotesk" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Meddon&family=Montserrat:wght@300;400;600;700&family=Playfair+Display&display=swap">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
            <header>
                {{-- <a href="#">
                    <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/full-logo.svg" alt="">
                </a> --}}
                <span class="font-semibold bg-deepr_green-50 text-2xl text-black dark:bg-deepr_green-50 dark:text-black">AdCoaching<span class="font-bold">for9K</span></span>
            </header>
        
            
            @yield('email-body')

        
            <footer class="mt-8">
                <p class="text-gray-500 dark:text-gray-400">
                    This email was sent to <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">{{ $user->email }}</a>. 
                    Once you login, you can <a href="{{ route('profile') }}" class="text-blue-600 hover:underline dark:text-blue-400">manage your profile</a> and account preferences.
                </p>
        
                <p class="mt-3 text-gray-500 dark:text-gray-400">© {{ now()->year }} AdCoachingfor9K. All Rights Reserved.</p>
            </footer>
        </section>

        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>