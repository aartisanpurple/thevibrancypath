<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;

// Protected Customer Routes
Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders');
    Route::get('/profile', [ProfileController::class, 'show'])->name('customer.profile');
});
