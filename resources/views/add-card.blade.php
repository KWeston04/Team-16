@extends('layouts.master')

@section('title', 'Add New Card')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add-card.css') }}">  
@endsection

@section('content')
<div class="main-container">
    <div class="nav-container">
        <h2>Astonic Sports</h2>
        <a href="{{ route('profile.payment.method') }}" class="nav-link">Back to Payment Methods</a>
    </div>

    <div class="content-container">
        <h1>New Card</h1>

        <div class="NewCD-container">
        <div class="logo">
            <img src="{{ asset('images/visa.webp') }}" alt="Visa Logo">
            <img src="{{ asset('images/Mastercard.jpg') }}" alt="Mastercard Logo">
            <img src="{{ asset('images/American-Express-Logo.png') }}" alt="American Express Logo">
            <img src="{{ asset('images/visa electron.jpg') }}" alt="Visa Electron">
            <img src="{{ asset('images/maestro.jpg') }}" alt="Maestro">
        </div>

        <form id="NewCDSection">
      <div class="input-group">
        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" name="cardNumber" maxlength="16" placeholder="Enter 16-digit card number" required>
      </div>

     
      <div class="input-group">
        <label for="cardName">Name on Card</label>
        <input type="text" id="cardName" name="cardName" placeholder="Enter name as shown on card" required>
      </div>

     
      <div class="row">
        <div class="input-group">
          <label for="expiryMonth">Expiry Date</label>
          <select id="expiryMonth" name="expiryMonth" required>
            <option value="" disabled selected>MM</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
          <select id="expiryYear" name="expiryYear" required>
            <option value="" disabled selected>YY</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
          </select>
        </div>

        <div class="input-group">
          <label for="cvc">CVC/CVV</label>
          <input type="text" id="cvc" name="cvc" maxlength="3" placeholder="3-digit code" required>
        </div>
      </div>

     
      <div class="button-group">
        <button type="button" class="cancel-btn" onclick="goBack()">Cancel</button>
        <button type="submit" class="save-btn">Save Card</button>
      </div>
    </form>
  </div>
@endsection

@section('page-specific-js')
    <script src="{{ asset('js/add-card.js') }}"></script>  
@endsection
