@extends('layouts.master')

@section('title', 'Contact Preferences')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preferences.css') }}">
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
            <h1>Contact Preferences</h1>
            <p>Let us know which information you'd like to be notified about, and how.</p>
            <br>
            <p>I'd like to receive exclusive discounts and news from Astonic Sports by:</p>

            <form id="preferences-form">
                <div class="preferences-container">
                    <div class="preference-option">
                        <input type="checkbox" id="email" name="contact-preference" value="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="preference-option">
                        <input type="checkbox" id="SMS" name="contact-preference" value="SMS">
                        <label for="SMS">SMS</label>
                    </div>
                    <div class="preference-option">
                        <input type="checkbox" id="Post" name="contact-preference" value="Post">
                        <label for="Post">Post</label>
                    </div>
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
