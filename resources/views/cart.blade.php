@extends('layouts.master')
@section('title', 'Cart')

@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('css/cartandcheckout.css')}}"> 
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

    <main>
        <div class="cart-container">
            <h2>Cart</h2><br><br>
            <div class="cart-items">
                <!-- First Item -->
                <div class="cart-item" data-price="50">
    <img src="{{ asset('images/compression top.png') }}" alt="Compression shirt">
    
    <div class="item-details">
        <p class="item-name">Astonic FC</p>
        <span class="item-size">XL</span>  ‎ ‎ 
        <span class="item-color">Black</span>
    </div>
    
    <div class="item-quantity">
        <select name="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    
    <div class="bag-item-price">£<span class="item-price">50.00</span></div>
    
    <button class="remove-item">✖</button>
</div>
        
<!-- Second Item -->
<div class="cart-item" data-price="135">
    <img src="{{ asset('images/vortex-shoe.webp') }}" alt="Vortex Shoes">
    
    <div class="item-details">
        <p class="item-name">Vortex Shoes</p>
        <span class="item-size">10</span>  ‎ ‎ 
        <span class="item-color">Black</span> 
    </div>
    
    <div class="item-quantity">
        <select name="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    
    <div class="bag-item-price">£<span class="item-price">135.00</span></div>
    
    <button class="remove-item">✖</button>
</div>
<!-- Third Item -->
<div class="cart-item" data-price="60">
    <img src="{{ asset('images/hoodie.png') }}" alt="Astonic Hoodie">
    
    <div class="item-details">
        <p class="item-name">Astonic Hoodie</p>
        <span class="item-size">S</span> ‎ ‎  
        <span class="item-color">Black</span>
    </div>
    
    <div class="item-quantity">
        <select name="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    
    <div class="bag-item-price">£<span class="item-price">60.00</span></div>
    
    <button class="remove-item">✖</button>
</div>

<!-- Fourth Item -->
<div class="cart-item" data-price="90">
    <img src="{{ asset('images/wind_breaker.png') }}" alt="Wind Breaker">
    
    <div class="item-details">
        <p class="item-name">Windbreaker</p>
        <span class="item-size">M</span> ‎ ‎ 
        <span class="item-color">Black</span>
    </div>
    
    <div class="item-quantity">
        <select name="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    
    <div class="bag-item-price">£<span class="item-price">90.00</span></div>
    
    <button class="remove-item">✖</button>
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
    
        <!-- Cart Summary -->
        <div class="cart-summary">               
            <div class="cart-prices">
                <p>Subtotal: <span class="highlight" id="subtotal">£0.00</span></p>
                <p>Shipping: <span class="highlight" id="delivery">£4.50</span></p>
                <p class="Total">Total: <span class="highlight" id="total">£0.00</span></p><br>
                    <div class="coupon-section">
                <input type="text" placeholder="Coupon Code">
                <button class="apply-btn">Apply Promo Code</button>
            </div>
            <div class="savings-meter">
    <h3>Your Savings</h3>
    <div class="savings-progress">
        <div class="savings-bar" id="savingsBar"></div>
    </div>
    <p>‎ ‎  <span id="savingsAmount">0.00</span></p>
 <p>Spend £<span id="nextTier">0.00</span> ‎ more to reach the next discount tier!</p>
</div>

            <button class="checkout-btn">PROCEED TO CHECKOUT</button>
        </div>
    </div>
</div>
</div><br><br><br>

<div class="featured-products">
    <div class="featured-title">
        <h2>Featured Products</h2>
        <br>
    </div>
    <div class="product-list">

        <!-- Product 1 -->
        <div class="product">
            <img src="images/vortex shoes.webp" alt="Vortex 2 Shoes">
            <h3>Vortex 2 Shoes</h3>
            <p>£140.00</p><br>
            <button class="add-to-cart">+</button>
        </div>

        <!-- Product 2 -->
        <div class="product">
            <img src="images/flask.webp" alt="Astonic Flask">
            <h3>Astonic Flask</h3>
            <p>£10.00</p><br>
            <button class="add-to-cart">+</button>
        </div>

        <!-- Product 3 -->
        <div class="product" >
            <img src="images/hat.png" alt="Vortex Hat">
            <h3>Vortex Hat</h3>
            <p>£20.00</p><br>
            <button class="add-to-cart">+</button>
        </div>

        <!-- Product 4 -->
        <div class="product">
            <img src="images/edge pro.webp" alt="Edge Pro Running Shoes">
            <h3>Edge Pro</h3>
            <p>£90.00</p><br>
            <button class="add-to-cart">+</button>
        </div>

        <!-- Product 5 -->
        <div class="product">
            <img src="images/Football shirt white.webp" alt="Football Shirt">
            <h3>Football Shirt</h3>
            <p>£40.00</p><br>
            <button class="add-to-cart">+</button>
        </div>
    </div>



        <div class="faq-section">
            <!-- FAQ Dropdown -->
            <div class="faq-dropdown">
                <input type="checkbox" id="faq-toggle">
                <label for="faq-toggle" class="faq-main">Frequently Asked Questions</label>
                
                <div class="faq-items">
                    <!-- Question 1 -->
                    <div class="faq-item">
                        <input type="checkbox" id="faq1">
                        <label for="faq1" class="faq-question">What is your return policy?</label>
                        <div class="faq-answer">
                            Items can be refunded or exchanged within 30 days of purchase. Please keep the order number and receipt.
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
    </main>

@endsection
@section('page-specific-js')
    <script src="{{asset('js/cartandcheckout.js')}}"></script>
@endsection
