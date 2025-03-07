@extends('layouts.master')
@section('title', 'Profile')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/changepassword.css') }}">
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
            <h1>Change Password</h1>
            <form id="change-password-form" action="{{ route('profile.update.password') }}" method="POST">
                @csrf

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center mb-4" role="alert">
                        {{ $error }}
                    </div>
                @endforeach

                <label for="OldPassword">Old Password</label>
                <input type="password" id="OldPassword" name="OldPassword" required>

                <label for="NewPassword">New Password</label>
                <input type="password" id="NewPassword" name="NewPassword" required>

                <label for="ConfirmPassword">Confirm Password</label>
                <input type="password" id="ConfirmPassword" name="ConfirmPassword" required>

                <button type="submit">Change Password</button>
            </form>
        </div>
    </div>
@endsection
@section('page-specific-js')
    <script src="{{ asset('js/changepassword.js') }}"></script>
@endsection
