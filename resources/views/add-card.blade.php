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

        <div class="logo">
            <img src="{{ asset('images/visa.webp') }}" alt="Visa Logo">
            <img src="{{ asset('images/Mastercard.jpg') }}" alt="Mastercard Logo">
            <img src="{{ asset('images/American-Express-Logo.png') }}" alt="American Express Logo">
            <img src="{{ asset('images/visa electron.jpg') }}" alt="Visa Electron">
            <img src="{{ asset('images/maestro.jpg') }}" alt="Maestro">
        </div>

        <div class="NewCD-container">
            <form id="NewCDSection">
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" required><br>

                <br> <label for="cardName">Name on Card</label>
                <input type="text" id="cardName" name="cardName" required><br>

                <br> <label for="ExpiryDate">Expiry Date (MM/YY)</label>
                <input type="text" id="ExpiryDate" name="ExpiryDate" required><br>

                <br> <label for="cvc">CVC/CVV</label>
                <input type="text" id="cvc" name="cvc" required><br>

                <br> <button type="submit">Submit</button>
            </form>    
        </div>
    </div>
</div>
@endsection

@section('page-specific-js')
    <script src="{{ asset('js/add-card.js') }}"></script>  
@endsection
