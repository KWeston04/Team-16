<?php

use Illuminate\Support\Facades\Route;

// Default route (welcome page)
Route::get('/', function () {
    return view('welcome');
});

// About Us route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact Us route
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Shop route
Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Profile route (Account main page)
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Login route
Route::get('/login', function () {
    return view('login');
})->name('login');

// Admin Dashboard route
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->name('admin_dashboard');

// Cart route
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
