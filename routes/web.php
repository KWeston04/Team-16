<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\CheckoutController;


Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/vortex_runner', [HomeController::class, 'vortex_runner']);
Route::get('/cart', [HomeController::class, 'cart']);



Route::get('/login',[UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register',[UserController::class, 'showRegisterForm']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/password/reset',[UserController::class, 'resetPasswordForm']);


//used specifically for when we do a contact request.
Route::get('/contact', [ContactRequestController::class, 'contact']);
Route::post('/contact', [ContactRequestController::class, 'store'])->name('contact.store');


//used for when we do a checkout.
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder')->middleware('auth');