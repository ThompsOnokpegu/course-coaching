@extends('emails.email-partial')

@section('email-body')
<main class="mt-8">
    <p class="text-xl text-gray-700 dark:text-gray-200">Hello {{ $user->name }},</p>
    
    <p class="mt-4 leading-loose text-gray-600 dark:text-gray-300">
        I'm excited to welcome you to AdCoachingfor9K - your LIVE AD COACHING and ON-DEMAND training.
    </p>
    <p class="mt-4 leading-loose text-gray-600 dark:text-gray-300">
        First, check for this email in your inbox <span class="font-bold">AdCoachingfor9K: Set Up Your Account</span>, then follow the link in it to set your account password and login - the link expires in 60mins. So ensure to set your password within the hour.
    </p>
    
    <hr class="my-6 border-gray-200 dark:border-gray-700">

    <div>
        <div>
            <a href="{{ route('members') }}" class="inline-flex items-center text-blue-600 underline dark:text-blue-400 gap-x-2 underline-offset-4">
                <span>Course Dashboard</span>
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>

            <p class="mt-2 text-gray-500 dark:text-gray-400">If you ever forget the link to access the training, come back to this email.</p>
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700">

        <div>
            <a href="#" class="inline-flex items-center text-blue-600 underline dark:text-blue-400 gap-x-2 underline-offset-4">
                <span>Join the Community</span>
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>

            <p class="mt-2 text-gray-500 dark:text-gray-400">Stay up-to-date with the latest announcements and updates from AJThompson.</p>
        </div>

        

        <hr class="my-6 border-gray-200 dark:border-gray-700">
    </div>

    <p class="mt-2 mb-6 text-gray-500 dark:text-gray-400">
        Thanks for signing up. If you have any questions, send me a message <br /> at
        <a href="#" class="font-medium text-blue-600 hover:text-blue-500">thompson@adcoachingfor9k.com</a>
        or on <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Instagram</a>. I’d love to hear from you.<br/>
        — AJ Thompson
    </p>
    
    <a href="{{ route('members') }}" class="px-6 py-2 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
        Get started
    </a>
</main>
@endsection