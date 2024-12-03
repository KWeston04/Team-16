<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASTONIC SPORTS CHECKOUT</title>
    <link rel="stylesheet" href="{{asset('css/cartandcheckout.css')}}"> 
</head>

<body>
    <header>
        <nav class="navbar">
          <div class="logo">
            <a href="/">
              <img src="{{asset('images/Astonic Sports Logo.webp')}}" alt="Home.html">
            </a>
          </div>
          <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="login.html">Account</a></li>
            <li><a href="/cart">Cart</a></li>
          
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
<div class="container">
    <div class="bag-container">
        <!-- Bag Items -->
        <div class="bag-items">
        <div class="bag-item" data-price="50">
            <img src="{{asset('images/Football shirt white.webp')}}" alt="White T-Shirt">
            <div class="bag-item-details">
                <div class="item-name">Astonic FC</div>
                <div class="bag-item-color-size">Color: White | Size: XL</div>
                <BR>
                <div class="bag-item-quantity">
                <label for="quantity" class="highlight">Quantity:</label>
                <br><br>
                <div class="item-form">
                    <select id="quantity" name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>             
                </div>
                </div>

            <div class="bag-item-price">£<span class="item-price">50.00</span></div>
            <button class="remove-item">REMOVE</button>
        </div>
    </div>

    <div class="bag-item" data-price="120">
        <img src="{{asset('images/vortex shoes.webp')}}" alt="Black T-Shirt">
        <div class="bag-item-details">
            <div class="item-name">Vortex shoes</div>
            <div class="bag-item-color-size">Color: Black | Size: 10</div>
            <BR>
            <div class="bag-item-quantity">
                <label for="quantity" class="highlight">Quantity:</label>
                <br><br>
                <div class="item-form">
                <select id="quantity" name="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>             
            </div>
            </div>
            <div class="bag-item-price">£<span class="item-price">120.00</span></div>
            <button class="remove-item">REMOVE</button>
        </div>
    </div>
        </div>

        <!-- Bag Summary -->
        <div class="bag-summary">
            <div class="bag-summary-title">TOTAL</div>
            <div class="bag-summary-item">
                <span class="highlight">Subtotal - ‎ </span>
                <span>£<span id="subtotal">0.00</span></span>
            </div>
            <div class="bag-summary-item">
                <span class="highlight">Delivery - ‎ </span>
                <span>£<span id="delivery">4.50</span></span>
            </div>
            <div class="bag-summary-item">
                <span class="highlight">Total - ‎ </span>
                <span>£<span id="total">0.00</span></span>
            </div>

            <a href="checkout.blade.php" class="checkout-button" id="checkout-button" style="pointer-events: none;">CHECKOUT</a>
            <br>
        </div>
    </div>
</div>
</div>

<br>
<br>
    
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
                <li><a href="/home">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="login.blade.php">Account</a></li>
                <li><a href="/cart">Cart</a></li>
            </ul>
        </div>
        </div>
    </footer>

    <script src="{{asset('cartandcheckout.js')}}"></script>
</body>
</html>
