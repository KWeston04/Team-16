@extends('layouts.master')

@section('title', 'Order History')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orderhistory.css') }}">
@endsection

@section('content')
<div class="main-container">  
    <div class="nav-container">
        <h2>Astonic Sports</h2>
        <a href="{{ route('profile.personal.details') }}" class="nav-link">Personal Details</a>
        <a href="{{ route('profile.order.history') }}" class="nav-link">Order History</a>
        <a href="{{ route('profile.change.password') }}" class="nav-link">Change Password</a>
        <a href="{{ route('profile.payment.method') }}" class="nav-link">Payment Method</a>
        <a href="{{ route('profile.contact.preferences') }}" class="nav-link">Contact Preferences</a>
        <a href="{{ route('profile.contact.us') }}" class="nav-link">Contact Us</a>
        <a href="{{ route('profile.wishlist') }}" class="nav-link">Wishlist</a>
    </div>

    <div class="content-container">
        <h1>Orders</h1>
        <div class="order1">
            <div class="clothing">
                <img src="{{ asset('images/wind_breaker.png') }}" alt="Wind Breaker">
            </div>

            <b><p>Order Date:</p></b>
            <p>19/11/2029</p>

            <b><p>Order Total:</p></b>
            <p>£100</p>

            <b><p>Dispatched Date:</p></b>
            <p>20/11/2029</p>

            <b><p>Delivered Date:</p></b>
            <p>21/11/2029</p>
        </div>
    </div>
</div>
@endsection
