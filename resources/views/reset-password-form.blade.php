@extends('layouts.master')

@section('title', 'Set New Password')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="big-container">
    <div class="login-container">
        <h1>Set New Password</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <br><label for="password">New Password:</label>
            <input type="password" id="password" name="password" required><br>
            
            <br><label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br>
            
            <br><button type="submit">Reset Password</button>
        </form>
    </div>
</div>
@endsection 