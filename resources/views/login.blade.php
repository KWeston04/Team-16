@extends('layouts.master')

@section('title', 'Astonic Sports Login')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="big-container">
        <div class="login-container">
            <h1>Login</h1>
            <form id="loginSection" action="/login" method="POST">
                @csrf <!-- CSRF protection -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <br> <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                
                <br> <button type="submit">Login</button>
            </form>

            <div class="rp">
                <a href="#">Forgot Password?</a><br>
                <h2> ----create an account---- </h2>
                <div>
                    <button> <a href="/register">Create an account</a> </button> 
                </div>
            </div>
        </div>

        <div class="Benefit-container">
            <form id="Benefits">
                <h3> Benefits of registering with Astonic Sports </h3>
                <p> 
                    <br>1. Receive special offers <br>
                    <br>2. Manage your orders and preferences<br>
                    <br>3. Access your saved items<br>
                    <br>4. Instant access to your account <br>
                    <br>5. Speed your way to the checkout<br>
                </p>
            </form>
        </div>
    </div>
@endsection
@section('page-specific-js')
<script src="{{asset('js/login.js')}}"></script>
@endsection
