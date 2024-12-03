<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Astonic Sports</title>
    <link rel="stylesheet" href="{{ asset('css/cartandcheckout.css')}}"> 
</head>

<body>

    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="Home.html"><img src="{{asset('images/Astonic Sports Logo.webp')" alt="Astonic Sports Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="Home.html">Home</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="product_listing.html">Shop</a></li>
                <li><a href="login.html">Account</a></li>
                <li><a href="index.html">Cart</a></li>
            </ul>
        </nav>
    </header>

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
        <form id="checkout-form" action="confirmation.html">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Shipping Address</label>
                <input type="text" id="address" name="address" required>
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

    <footer>
        <!-- Footer made by ibraheem -->
        <div class="footer-container">
            <!-- Social Media Links Section -->
            <div class="socials">
                <p>FOLLOW US ON SOCIALS</p>
                <br>
                <div class="social-links">
                    <a href="#"aria-label="Follow us on Facebook"></a><img src="{{asset('images/facebook-logo.png')}}" alt="Facebook"></a>
                    <a href="#"aria-label="Follow us on Twitter"></a><img src="{{asset('images/twitter-logo.png')}}" alt="Twitter"></a>
                    <a href="#"aria-label="Follow us on Instagram"></a><img src="{{asset('images/instagram-logo.png')}}" alt="Instagram"></a>
                </div>
            </div>
    
            <!-- Newsletter Signup Section -->
            <div class="newsletter">
                <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <p>Sign up for the latest updates on product releases &amp; discounts!</p>
                <form action="email">
                    <input value="" name="EMAIL" class="email" id="footer-EMAIL" placeholder="Enter Email Address" required="" type="email">
                   <br><br>
                    <input value="Join" class="button" type="submit">
                </form>
                <p>&copy; 2024 Astonic Sports. All Rights Reserved.</p>
            </div>
    
        <div class="footer-nav">
            <ul>
                <li><a href="Home.html">Home</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="product_listing.html">Shop</a></li>
                <li><a href="login.html">Account</a></li>
                <li><a href="index.html">Cart</a></li>
            </ul>
        </div>
        </div>
    </footer>

    <script src="{{asset('js/cartandcheckout.js')}}"></script>
</body>
</html>
