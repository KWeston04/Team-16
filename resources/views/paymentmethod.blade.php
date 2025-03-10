@extends('layouts.master')

@section('title', 'Payment Method')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
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
        <h1>Payment Method</h1>
        <form id="payment-method-form">
            <br> 
            <a href="{{ route('profile.add.card') }}" class="button-link">Add New Card</a>  
            <br><br>
            
            <b><p>Card Details:</p></b>
            <b><p>Card Number (only last 4 digits shown):</p></b>
            <p>**** **** **** 1234</p>

            <b><p>Name on Card:</p></b>
            <p>John Smith</p>

            <b><p>Expiry Date:</p></b>
            <p>12/25</p>
        </form>
    </div>
</div>
@endsection
