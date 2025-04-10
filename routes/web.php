<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');
Route::get('/contact-us', function() {
    return view('contact-us');
})->name('contact-us');

Route::get('/blog', function() {
    return view('blog');
})->name('blog');


// // Admin Registration
// Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
// Route::post('/admin/register', [AdminController::class, 'register']);

// // Admin Login
// Route::get('/admin/login', [AuthenticatedSessionController::class, 'showAdminLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AuthenticatedSessionController::class, 'adminLogin']);

// // Admin Dashboard (Only accessible by admins)
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });

// // Admin Logout
// Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

// // Authentication Routes (For Users)
// Route::middleware('guest')->group(function () {
//     Route::view('register', 'auth.register')->name('register');
//     Route::view('forgot-password', 'auth.forgot-password')->name('password.request');
//     Route::view('reset-password/{token}', 'auth.reset-password')->name('password.reset');
//     Route::view('verify-email', 'auth.verify-email')->name('verification.notice');
//     Route::view('confirm-password', 'auth.confirm-password')->name('password.confirm');

//     // Route::view('register', 'pages.auth.register')->name('register');
//     // Route::view('login', 'pages.auth.login')->name('login');
//     // Route::view('forgot-password', 'pages.auth.forgot-password')->name('password.request');
//     // Route::view('reset-password/{token}', 'pages.auth.reset-password')->name('password.reset');
// });

// Route::middleware('auth')->group(function () {
//     Route::view('verify-email', 'pages.auth.verify-email')->name('verification.notice');
    
//     Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//         ->middleware(['signed', 'throttle:6,1'])
//         ->name('verification.verify');

//     Route::view('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
// });


// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::view('register', 'auth.register')->name('register');
    Route::view('login', 'auth.login')->name('login');
    Route::view('forgot-password', 'auth.forgot-password')->name('password.request');
    Route::view('reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')->middleware(['verified'])->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    Route::view('verify-email', 'auth.verify-email')->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::view('confirm-password', 'auth.confirm-password')->name('password.confirm');
});
// Include role-based routes
require __DIR__.'/admin.php';
require __DIR__.'/customer.php';

// Include additional authentication routes
require __DIR__.'/auth.php';
