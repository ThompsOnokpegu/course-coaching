<?php

use Illuminate\Support\Facades\Route;
use App\http\Middleware\EnsureUserIsSubscribed;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard')->middleware('subscribed');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
