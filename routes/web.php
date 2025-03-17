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

// Home & General Pages
Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/shop', [HomeController::class, 'shop']);

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

// User Profile & Dashboard Routes (Requires Authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('/profile/personal-details', [UserController::class, 'personalDetails'])->name('profile.personal.details');
    Route::get('/profile/order-history', [UserController::class, 'orderHistory'])->name('profile.order.history');
    Route::get('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.change.password');
    Route::post('/profile/change-password', [UserController::class, 'updatePassword'])->name('profile.update.password');
    Route::get('/profile/payment-method', [UserController::class, 'paymentMethod'])->name('profile.payment.method');
    Route::get('/profile/add-card', [UserController::class, 'addCard'])->name('profile.add.card');
    Route::get('/profile/contact-preferences', [UserController::class, 'contactPreferences'])->name('profile.contact.preferences');
    Route::get('/profile/contact-us', [UserController::class, 'contactUs'])->name('profile.contact.us');
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

// Admin Dashboard Route
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->name('admin_dashboard');

// Resource Routes for Products, Categories, and Inventory
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('inventory', InventoryController::class);
Route::get('/shop-data', [ProductController::class, 'getShopData']);

// Cart (Basket) Routes
Route::get('/cart', [BasketController::class, 'showCart'])->name('cart.show');
Route::post('/cart/update', [BasketController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [BasketController::class, 'removeItem'])->name('cart.remove');
Route::post('/cart/add', [BasketController::class, 'addToCart'])->name('cart.add')->middleware('auth');

// Product Search Route
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

// Display a Single Product by its ID
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Special Case Routes for Specific Products
Route::get('/vortex_runner', [ProductController::class, 'showVortexRunner'])->name('vortex_runner');
Route::get('/away-football-shirt', [ProductController::class, 'showAwayFootballShirt'])->name('away_football_shirt');
Route::get('/away-football-shorts', [ProductController::class, 'showAwayFootballShorts'])->name('away_football_shorts');
Route::get('/sweat-hoodies-mens', [ProductController::class, 'showSweatHoodiesMens'])->name('sweat_hoodies_mens');


Route::get('/shop', [HomeController::class, 'shop'])->name('shop');




