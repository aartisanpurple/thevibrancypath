<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthenticatedSessionController::class, 'showUserRegisterForm'])->name('register');
    Route::post('/register', [AuthenticatedSessionController::class, 'UserRegister']);
    
});

// Route::middleware('auth')->group(function () {
//     Volt::route('verify-email', 'pages.auth.verify-email')
//         ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//         ->middleware(['signed', 'throttle:6,1'])
//         ->name('verification.verify');

//     Volt::route('confirm-password', 'pages.auth.confirm-password')
//         ->name('password.confirm');
// });
