@extends('layouts.master')

@section('title', 'Personal Details')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">  
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
        <h1>Personal Details</h1>
        <form id="PDSection">
            <br> <label for="FirstName">First Name</label>
            <input type="text" id="FirstName" name="FirstName" required><br>

            <br> <label for="LastName">Last Name</label>
            <input type="text" id="LastName" name="LastName" required><br>

            <br> <label for="Address">Address</label>
            <input type="text" id="Address" name="Address" required><br>

            <br> <label for="country">Country</label>
            <input type="text" id="country" name="country" required><br>

            <br> <button type="submit">Confirm</button>
        </form>
    </div>
</div>
@endsection

@section('page-specific-js')
    <script src="{{ asset('js/details.js') }}"></script> 
@endsection
