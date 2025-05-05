<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;  
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ContactController;
// Admin Registration & Login
Route::prefix('admin')->group(function () {
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/login', [AuthenticatedSessionController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'adminLogin']);
});

// Protected Admin Routes
Route::middleware(['auth', 'check.usertype:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    // Resource routes
    Route::resource('blog', BlogController::class)->names([
        'index' => 'admin.blog.index',
        'create' => 'admin.blog.create',
        'store' => 'admin.blog.store',
        'edit' => 'admin.blog.edit',
        'update' => 'admin.blog.update',
        'destroy' => 'admin.blog.destroy',
        'show' => 'admin.blog.show',
    ]);
    Route::resource('testimonial', TestimonialController::class)->names([
        'index' => 'admin.testimonial.index',
        'create' => 'admin.testimonial.create',
        'store' => 'admin.testimonial.store',
        'edit' => 'admin.testimonial.edit',
        'update' => 'admin.testimonial.update',
        'destroy' => 'admin.testimonial.destroy',
        'show' => 'admin.testimonial.show',
    ]);
    Route::resource('contact', ContactController::class)->names([
        'index' => 'admin.contact.index',
        'create' => 'admin.contact.create',
        'store' => 'admin.contact.store',
        'edit' => 'admin.contact.edit',
        'update' => 'admin.contact.update',
        'destroy' => 'admin.contact.destroy',
    ]);
    Route::resource('user', UserController::class)->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
        'show' => 'admin.user.show',
    ]);
    Route::resource('courses', CourseController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
        'show' => 'admin.products.show',
    ]);
    
    Route::get('/products/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])
    ->name('admin.products.getSubcategories');

    Route::resource('category', CategoryController::class)->names([
        'index' => 'admin.category.index',
        'create' => 'admin.category.create',
        'store' => 'admin.category.store',
        'edit' => 'admin.category.edit',
        'update' => 'admin.category.update',
        'destroy' => 'admin.category.destroy',
        'show' => 'admin.category.showSubCategory',
    ]);
    Route::resource('subcategory', SubCategoryController::class)->names([
        'index' => 'admin.subcategory.indexSubCategory',
        'create' => 'admin.subcategory.createSubCategory',
        'store' => 'admin.subcategory.store',
        'show' => 'admin.subcategory.showSubCategory',
        'edit' => 'admin.subcategory.edit',
        'update' => 'admin.subcategory.updateSubCategory',
        'destroy' => 'admin.subcategory.destroy',
    ]);
    Route::resource('orders', OrdersController::class)->names([
        'index' => 'admin.orders.index',
        'create' => 'admin.orders.create',
        'store' => 'admin.orders.store',
        'edit' => 'admin.orders.edit',
        'update' => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
        'show' => 'admin.orders.show',
    ]);


    Route::prefix('admin')->name('admin.')->group(function () {
        // Existing routes...
        
        // Category routes
        Route::post('/categories', 'CategoryController@store');
        // Subcategory routes
    });
    Route::get('/contact-us', function () {
        return view('contact-us.index');
      })->name('contact-us');
});
