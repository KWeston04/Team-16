<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\PasswordResetController;

// Home & General Pages
Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);

// Authentication Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegisterForm']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/password/reset', [UserController::class, 'resetPasswordForm']);

// Contact Request
Route::get('/contact', [ContactRequestController::class, 'contact']);
Route::post('/contact', [ContactRequestController::class, 'store'])->name('contact.store');

// Checkout Process
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder')->middleware('auth');

// User Profile & Dashboard (Requires Authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('/profile/order-history', [UserController::class, 'orderHistory'])->name('profile.order.history');
    Route::get('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.change.password');
    Route::post('/profile/change-password', [UserController::class, 'updatePassword'])->name('profile.update.password');
    Route::get('/profile/wishlist', [UserController::class, 'wishlist'])->name('profile.wishlist');
});

// API Route for Sales Data
Route::get('/api/sales-data', function () {
    return response()->json([
        ['month' => 'January', 'sales' => 180],
        ['month' => 'February', 'sales' => 220],
        ['month' => 'March', 'sales' => 250],
        ['month' => 'April', 'sales' => 320],
        ['month' => 'May', 'sales' => 400]
    ]);
});

// Admin Dashboard
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->name('admin_dashboard');

// Resource Routes (CRUD Operations)
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('inventory', InventoryController::class);
Route::get('/shop-data', [ProductController::class, 'getShopData']);

// Cart Routes
Route::get('/cart', [BasketController::class, 'showCart'])->name('cart.show');
Route::post('/cart/update', [BasketController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [BasketController::class, 'removeItem'])->name('cart.remove');
Route::post('/cart/add', [BasketController::class, 'addToCart'])->name('cart.add')->middleware('auth');

// Reset Password Routes
Route::get('/forgot-password', [PasswordResetController::class, 'showResetForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

// Shop Page (Only Best Sellers)
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

// Display all products in a category
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

// Display a single product
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Search route
Route::get('/search', [ProductController::class, 'search'])->name('product.search');




