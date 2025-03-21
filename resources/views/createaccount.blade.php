@extends('layouts.master')
@section('title', 'Register')

@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('css/createaccount.css')}}"> 
@endsection

@section('content')

        <div class="header-section">
          <h1>Join Astonic Sports Today!</h1>
      </div>
      <div class="hero-section">
        <div class="register-container">
          <form id="registerSection" action="/register" method="POST">
            @csrf <!-- i have added a CSRF token for form security -->
            <br> <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required><br>
            
            <br> <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required><br>
        
            <br> <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required><br>
            
            <br> <label for="phone_number">Mobile Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required><br>
            
            <br> <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            
            <br> <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br>
            
            <br> <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>
            
            <br> <button type="submit">Register</button>
        </form>
        
    </div>
  </div>
 @endsection
@section('page-specific-js')
<script src="{{asset('js/register.js')}}"></script>
@endsection
   
