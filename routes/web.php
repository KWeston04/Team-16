<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;




Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/vortex_runner', [HomeController::class, 'vortex_runner']);
Route::get('/cart', [HomeController::class, 'cart']);



Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegisterForm']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/password/reset', [UserController::class, 'resetPasswordForm']);


//used specifically for when we do a contact request.
Route::get('/contact', [ContactRequestController::class, 'contact']);
Route::post('/contact', [ContactRequestController::class, 'store'])->name('contact.store');


//used for when we do a checkout.
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder')->middleware('auth');

//routes for profile dashboard and its connected pages
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
Route::get('/api/sales-data', function () {
    return response()->json([
        ['month' => 'January', 'sales' => 180],
        ['month' => 'February', 'sales' => 220],
        ['month' => 'March', 'sales' => 250],
        ['month' => 'April', 'sales' => 320],
        ['month' => 'May', 'sales' => 400]
    ]);
});

// Admin Dashboard route
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->name('admin_dashboard');

// Routes for products, categories, and inventory
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('inventory', InventoryController::class);
Route::get('/shop-data', [ProductController::class, 'getShopData']);
