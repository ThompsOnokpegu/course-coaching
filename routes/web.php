<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubscriptionController;
use App\Livewire\Admin\CreateCourse;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware([])->group(function () {
    Route::post('/subscription', [SubscriptionController::class, 'initiatePayment'])->name('subscription.initiate');
    Route::get('/subscription/callback', [SubscriptionController::class, 'handleCallback'])->name('subscription.callback');
    Route::post('/webhook', [SubscriptionController::class, 'handleWebhook']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/program', [CourseController::class, 'index'])->name('courses.index');
    //Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
});
//Route::get('/create',[CourseController::class,'create']);
//Route::get('course/create',CreateCourse::class)->middleware('auth');
Route::get('/admin',CreateCourse::class);


    

require __DIR__.'/auth.php';
