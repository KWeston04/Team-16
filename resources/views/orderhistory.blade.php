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
        <div class="buttons">
    <button class="button active" onclick="showSection('current-orders')">Current Orders</button>
    <button class="button" onclick="showSection('previous-orders')">Previous Orders</button>
    </div>

    <div id="current-orders" class=" active-order active">
      <div class="clothing-order">
        <img src="{{ asset('images/wind_breaker.png') }}" alt="Astonic Sports Logo">
      <div class="order-details">
        <p><strong>Order Date:</strong> 19/03/2025</p>
        <p><strong>Order Total:</strong> £59.99</p>
        <p><strong>Status:</strong>Processing</p>
      </div>
      </div>
      </div>

    <div id="previous-orders" class=" active-order">
    <div class="clothing-order">
      <img src="wind_breaker.png" alt="wind breaker">
    <div class="order-details">
      <p><strong>Order Date:</strong> 19/11/2024</p>
      <p><strong>Order Total:</strong> £59.99</p>
      <p><strong>Delivered Date:</strong> 21/11/2024</p>
    </div>
    </div>
    </div>
       
            @endforeach
        @endif
    </div>
</div>
@section('page-specific-js')
<script src="{{asset('js/Order_History.js')}}"></script>
@endsection