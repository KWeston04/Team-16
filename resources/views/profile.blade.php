@extends('layouts.master')
@section('title', 'Profile')

@section('page-specific-css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')

  @if (session('success'))
  <div class="alert alert-success text-center mb-4" role="alert">
      {{ session('success') }}
  </div>
  @endif

  @if (session('failure'))
  <div class="alert alert-danger text-center mb-4" role="alert">
      {{ session('failure') }}
  </div>
  @endif
  <div class="main-container">
    <div class="nav-container">
      <h2>Astonic Sports</h2>
      <a href="{{route('profile.personal.details') }}" class="nav-link">Personal Details</a>
      <a href="{{route('profile.order.history') }}" class="nav-link">Order History</a>
      <a href="{{route('profile.change.password') }}" class="nav-link">Change Password</a>
      <a href="{{route('profile.payment.method') }}" class="nav-link">Payment Method</a>
      <a href="{{route('profile.contact.preferences') }}" class="nav-link">Contact Preferences</a>
      <a href="{{route('profile.contact.us') }}" class="nav-link">Contact Us</a>
      <a href="{{route('profile.wishlist') }}" class="nav-link">Wishlist</a>
    </div>
  

    <div class="content-container">
      <h1>Welcome to Astonic Sports</h1>
      <p>Manage your profile and preferences by selecting an option from the left menu.</p>
      <p>Select a section from the menu to view or update your information.</p>
    </div>
  </div>

@endsection

