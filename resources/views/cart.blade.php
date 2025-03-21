@extends('layouts.master')
@section('title', 'Cart')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/cartandcheckout.css') }}"> 
@endsection

@section('content')

<div class="discount">
    <div class="text-container">
        @for ($i = 0; $i < 5; $i++)
            <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT</span>
            <span><span class="highlight">FREE</span> NEXT DAY DELIVERY ON ALL ORDERS OVER £100</span>
            <span>ORDER BY <span class="highlight">7:30</span> FOR NEXT DAY SHIPPING</span>
        @endfor
    </div>
</div>

<main>
    <div class="cart-container">
        <h2>Cart</h2><br><br>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (count($cartItems) > 0)
            <div class="cart-items">
                @foreach ($cartItems as $item)
                    <div class="cart-item" data-price="{{ $item->price }}"> 
                        <img src="{{ asset($item->image_url) }}" alt="{{ $item->name }}">

                        <div class="item-details">
                            <p class="item-name">{{ $item->name }}</p>
                            <span class="item-size">Size: N/A</span> ‎ ‎ 
                            <span class="item-color">Color: N/A</span>
                        </div>

                        <div class="item-quantity">
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="basket_item_id" value="{{ $item->basket_item_id }}">
                                <select name="quantity" onchange="this.form.submit()">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </form>
                        </div>

                        <div class="bag-item-price">£<span class="item-price">{{ number_format($item->price * $item->quantity, 2) }}</span></div>

                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="basket_item_id" value="{{ $item->basket_item_id }}">
                            <button type="submit" class="remove-item">✖</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="shipping-method">
                <h3>Shipping Method</h3>
                <div class="shipping-options">
                    <label class="shipping-option">
                        <input type="radio" name="shipping" value="4.50" checked> 
                        <span>Standard 2-3 Day Delivery - <span class="shipping-cost">£4.50</span></span>
                    </label>
                    <label class="shipping-option">
                        <input type="radio" name="shipping" value="10.00"> 
                        <span>Express Next Day Delivery - <span class="shipping-cost">£10.00</span></span>
                    </label>
                </div>
            </div>

            <div class="cart-summary">               
                <div class="cart-prices">
                    <p>Subtotal: <span class="highlight" id="subtotal">£{{ number_format($total, 2) }}</span></p>
                    <p>Shipping: <span class="highlight" id="delivery">£4.50</span></p>
                    <p class="Total">Total: <span class="highlight" id="total">£{{ number_format($total + 4.50, 2) }}</span></p><br>

                    <div class="coupon-section">
                        <input type="text" placeholder="Coupon Code">
                        <button class="apply-btn">Apply Promo Code</button>
                    </div>

                    <div class="savings-meter">
                        <h3>Your Savings</h3>
                        <div class="savings-progress">
                            <div class="savings-bar" id="savingsBar"></div>
                        </div>
                        <p><span id="savingsAmount">0.00</span></p>
                        <p>Spend £<span id="nextTier">0.00</span> more to reach the next discount tier!</p>
                    </div>

                    <a href="{{ route('checkout') }}" class="checkout-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        @else
            <p>Your cart is empty.</p>
            <a href="{{ url('/') }}" class="shop-btn">Continue Shopping</a>
        @endif
    </div>
</main>

<div class="faq-section">
    <div class="faq-dropdown">
        <input type="checkbox" id="faq-toggle">
        <label for="faq-toggle" class="faq-main">Frequently Asked Questions</label>
        
        <div class="faq-items">
            <div class="faq-item">
                <input type="checkbox" id="faq1">
                <label for="faq1" class="faq-question">What is your return policy?</label>
                <div class="faq-answer">
                    Items can be refunded or exchanged within 30 days of purchase. Please keep the order number and receipt.
                </div>
            </div>

            <div class="faq-item">
                <input type="checkbox" id="faq2">
                <label for="faq2" class="faq-question">Do you offer free shipping?</label>
                <div class="faq-answer">
                    Yes, we offer free shipping on orders over £100.
                </div>
            </div>

            <div class="faq-item">
                <input type="checkbox" id="faq3">
                <label for="faq3" class="faq-question">How can I contact customer support?</label>
                <div class="faq-answer">
                    You can contact us via social media or by email at contact@Astonic.com.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-specific-js')
    <script src="{{ asset('js/cartandcheckout.js') }}"></script>
@endsection