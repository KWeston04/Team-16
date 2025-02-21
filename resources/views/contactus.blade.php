@extends('layouts.master')

@section('title', 'Contact Us')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
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
            <h1>Contact Us</h1>
            <p>Here is a link that takes you to the Contact Us page which will help deal with any enquiries:</p>
            <a href="{{ url('/contact') }}" class="contact-link">Contact Us</a>

            <p>Please don't be afraid to reach out if you are having problems or enquiries.
                <br>Our team is always here to provide support to our customers.
            </p>
        </div>
    </div>
@endsection
