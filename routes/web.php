<?php

use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Admin
    Route::get('/admin-admindash', [AdminDashController::class, 'index'])->name('admindash');

    // Calendar
    Route::get('/calendar-calendar', [CalendarController::class, 'index'])->name('calendar-calendar');
    Route::post('/calendar/store', [CalendarController::class, 'store']);
    Route::get('/calendar/get-course', [CalendarController::class, 'create']);
    Route::put('/calendar/course/update/{calendar}', [CalendarController::class, 'update']);
    Route::delete('/calendar/course/destroy/{calendar}', [CalendarController::class, 'destroy']);
    
    // Stripe
    Route::get('/payment-payment', [StripeController::class, 'index'])->name('payment-payment');
    Route::post('/payment/one-couse', [StripeController::class, 'checkout'])->name('one-couse');

});

require __DIR__.'/auth.php';
