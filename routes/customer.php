<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Customer\CartController;

Route::get('/', [HomeController::class, 'index'])->name('customer.home');
Route::get('/about', [HomeController::class, 'about'])->name('customer.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('customer.contact');
Route::get('/about', [HomeController::class, 'about'])->name('customer.about');
Route::get('/blog', [HomeController::class, 'blog'])->name('customer.blog');
Route::get('/blog-details/{id}', [HomeController::class, 'blogDetails'])->name('customer.blogDetails');
Route::get('/coaching-details', [HomeController::class, 'coachingDetails'])->name('customer.coachingDetails');
Route::get('/products', [HomeController::class, 'products'])->name('customer.products');
Route::get('/product-details', [HomeController::class, 'productDetails'])->name('customer.productDetails');
Route::get('/order', [HomeController::class, 'order'])->name('customer.order');
Route::get('/order-details', [HomeController::class, 'orderDetails'])->name('customer.orderDetails');
Route::get('/cart', [HomeController::class, 'cart'])->name('customer.cart');
Route::get('/cart-details', [HomeController::class, 'cartDetails'])->name('customer.cartDetails');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('customer.checkout');
Route::get('/checkout-details', [HomeController::class, 'checkoutDetails'])->name('customer.checkoutDetails');
Route::get('/faq', [HomeController::class, 'faq'])->name('customer.faq');
Route::post('/contact', [HomeController::class, 'contactStore'])->name('customer.contact.store');

Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('customer.privacypolicy');
Route::get('/coaching', [HomeController::class, 'coaching'])->name('customer.coaching');

//Store cart 
Route::get('/store', [CartController::class, 'store'])->name('customer.store');
Route::get('/store-details/{id}', [CartController::class, 'storeDetails'])->name('customer.storeDetails');
Route::post('/store-api', [CartController::class, 'storeApi'])->name('customer.store.api');
Route::get('/store-cart', [CartController::class, 'storeCart'])->name('customer.storecart');
Route::post('/store-savecart', [CartController::class, 'storesavecart'])->name('customer.savecart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('customer.updatecart');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('customer.removefromcart');
Route::get('/store-search', [CartController::class, 'search'])->name('customer.storesearch');
Route::get('/store-checkoutview', [CartController::class, 'storeCheckoutview'])->name('customer.storecheckoutview');
Route::post('/store-checkout', [CartController::class, 'storeCheckout'])->name('customer.storecheckout');
Route::get('/store-success', [CartController::class, 'storesuccess'])->name('customer.storesuccess');
Route::post('/store-clear', [CartController::class, 'clear'])->name('customer.clear');
Route::get('/store-invoice/{orderId}', [CartController::class, 'storeinvoice'])->name('customer.storeinvoice');
Route::post('/store-applycoupon', [CartController::class, 'applyCoupon'])->name('customer.storeapplycoupon');



// Customer Authentication Routes
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'adminLogin'])->name('login.submit');

    // Registration Routes
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.submit');

    // Password Reset Routes
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Protected Customer Routes
Route::middleware(['auth', 'check.usertype:customer'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/myorder', [DashboardController::class, 'myorder'])->name('customer.myorder');
    Route::get('/myprofile', [DashboardController::class, 'myprofile'])->name('customer.myprofile');
    // Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders');
    // Route::get('/profile', [ProfileController::class, 'show'])->name('customer.profile');
     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('customer.logout');
});
