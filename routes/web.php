<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/cart', [HomeController::class, 'cart']);



Route::get('/login',[UserController::class, 'showLoginForm']);
Route::get('/register',[UserController::class, 'showRegisterForm']);
Route::get('/password/reset',[UserController::class, 'resetPasswordForm']);

