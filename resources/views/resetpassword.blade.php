@extends('layouts.master')

@section('title', 'Reset Password')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="big-container">
    <div class="login-container">
        <h1>Reset Password</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <p>To reset your password please enter your email address below.</p>
        
        <form id="resetpasswordsection" action="{{ route('password.email') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            
            <br> <button type="submit">Send Reset Link</button>
        </form>
    </div>
</div>
@endsection

@section('page-specific-js')
    <script src="{{ asset('js/forgotten password.js') }}"></script>
@endsection