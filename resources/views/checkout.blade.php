@extends('layouts.master')
@section('title', 'Checkout')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/cartandcheckout.css') }}">

@endsection

@section('content')

    <div class="discount">
        <div class="text-container">
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100!</span>
            <span>ORDER BY<span class="highlight"> 7:30 </span>FOR NEXT DAY SHIPPING</span>
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100!</span>
            <span>ORDER BY<span class="highlight">7:30</span>FOR NEXT DAY SHIPPING</span>
        </div>
    </div>
    <br><br>

    <div class="content-wrapper">
        <main class="checkout-container">
            <h1>Checkout</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
           
            <form id="checkout-form" action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf

                <input type="hidden" name="discount" id="discountCodeInput"> 
                <input type="hidden" name="shipping_cost" id="shippingCostInput">
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->first_name . ' ' . $user->last_name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Shipping Address</label>
                    <input type="text" id="address" name="address" value="{{ $user->address }}" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>

                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" id="zip" name="zip" required>
                </div>

                <div class="form-group">
                    <label for="payment">Payment Method</label>
                    <select id="payment" name="payment" required>
                        <option value="credit-card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>

                
                <div id="credit-card-fields" style="">
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" id="card_number" name="card_number" maxlength="19" placeholder="1234 5678 9012 3456">
                    </div>

                    <div class="form-group">
                        <label for="expiry_date">Expiry Date (MM/YY)</label>
                        <input type="text" id="expiry_date" name="expiry_date" maxlength="5" placeholder="MM/YY">
                    </div>

                    <div class="form-group">
                        <label for="cvc">CVC</label>
                        <input type="text" id="cvc" name="cvc" maxlength="3" placeholder="123">
                    </div>
                </div>

                @if (auth()->check())
                    <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                @else
                    <script>
                        alert("You must be logged in to place an order.");
                        window.location.href = "{{ route('login') }}";
                    </script>
                @endif

                <br><br><br>
                <div class="form-group">
                <button type="submit" class="place-order-button">PLACE ORDER</button>
                </div>

                
                
    </div>
    </form>
    </main>

    <div class="faq-section">
        <!-- FAQ -->
        <div class="faq-dropdown">
            <input type="checkbox" id="faq-toggle">
            <label for="faq-toggle" class="faq-main">Frequently Asked Questions</label>

            <div class="faq-items">
                <!-- Question 1 -->
                <div class="faq-item">
                    <input type="checkbox" id="faq1">
                    <label for="faq1" class="faq-question">What is your return policy?</label>
                    <div class="faq-answer">
                        Items can be refunded or exchanged within 30 days of purchase. Please keep the order number and
                        receipt.
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="faq-item">
                    <input type="checkbox" id="faq2">
                    <label for="faq2" class="faq-question">Do you offer free shipping?</label>
                    <div class="faq-answer">
                        Yes, we offer free shipping on orders over £100
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="faq-item">
                    <input type="checkbox" id="faq3">
                    <label for="faq3" class="faq-question">How can I contact customer support?</label>
                    <div class="faq-answer">
                        You can contact us via social media or by email at contact@Astonic.com
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-specific-js')
    <script src="{{ asset('js/cartandcheckout.js') }}"></script>
@endsection
