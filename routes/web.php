<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubscriptionController;
use App\Livewire\Admin\CreateCourse;
use App\Livewire\Admin\UpdateLesson;
use App\Livewire\Admin\ViewCourse;
use App\Livewire\Admin\ViewTopic;
use Illuminate\Support\Facades\Route;





// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');
Route::controller(SubscriptionController::class)->group(function () {
    Route::get('/email','emailPreview')->name('email-preview');
    Route::get('/', 'home')->name('home');
    Route::get('/thank-you','thankYou')->name('thank-you');    
    Route::get('/subscription/initiate','initiatePayment')->name('subscription.initiate');
    Route::get('/subscription/callback','handleCallback')->name('subscription.callback');
    Route::post('/subscription/webhook','handleWebhook')->name('subscription.webhook');
    Route::post('/subscription/cancel','cancelSubscription')->name('subscription.cancel');
});

//studend dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/members', [StudentController::class, 'index'])->name('members')->middleware(['subscribed']);
    Route::view('/profile','profile')->name('profile');
    Route::get('/members/{lesson_id}', [StudentController::class, 'lesson'])->name('members.lesson')->middleware(['subscribed']);
});

//admin
Route::middleware(['auth','has_role'.':admin'])->group(function(){
    Route::get('/admin',CreateCourse::class)->name('admin.home');
    Route::get('/admin/course/{id}',ViewCourse::class)->name('course.view');
    Route::get('/admin/topics/{id}',ViewTopic::class)->name('topic.view');
    Route::get('/admin/lessons/{id}/update',UpdateLesson::class)->name('lesson.update');
});



    

require __DIR__.'/auth.php';
