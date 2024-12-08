<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Astonic Sports</title>
    <link rel="stylesheet" href="{{asset('css/shopping.css')}}">
</head>

<body>
    <!--Jack's-->
    <!--*****************-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/shop">
                    <img src="{{asset('images/Astonic Sports.webp')}}" alt="Astonic Sports Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="login.html">Account</a></li>
                <li><a href="/cart">Cart</a></li>
            </ul>
        </nav>
    </header>

    <!--*****************-->
    <header class="header">
        <div class="logo">Astonic Sports</div>
    </header>

    <header>
    <!-- Ibraheem's -->
    <div class="discount">
    <div class="text-container">
        <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
         <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
        <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
         <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
        <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
         <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
        <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
         <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
        <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
         <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
        <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
         <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
        <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>

    </div>
 </div>
    <!--**********-->
    </header>

    <!-- <section class="search-section">
        <input type="text" placeholder="Search" class="search-bar">
        <button class="search-btn">Search</button>
    </section> -->
    <section class="search-section">
        <form id="search-form" onsubmit="handleSearch(event)">
            <input type="text" placeholder="Search" id="search-bar" class="search-bar">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </section>
    

    <section class="categories">
        <button class="category-btn" onclick="showSubcategories('sales')">sales</button>
        <button class="category-btn" onclick="showSubcategories('mens')">mens</button>
        <button class="category-btn" onclick="showSubcategories('kids')">kids</button>

        <div id="sales-subcategories" class="subcategories hidden">
            <a href="#">Shirts</a>
            <a href="#">Pants</a>
            <a href="#">Shorts</a>
            <a href="#">Shoes</a>
            <a href="#">Accesseries</a>
        </div>

        <div id="mens-subcategories" class="subcategories hidden">
            <a href="#">Shirts</a>
            <a href="#">Pants</a>
            <a href="#">Shorts</a>
            <a href="#">Shoes</a>
            <a href="#">Accesseries</a>
        </div>

        <div id="kids-subcategories" class="subcategories hidden">
            <a href="#">Shirts</a>
            <a href="#">Pants</a>
            <a href="#">Shoes</a>
            <a href="#">Accesseries</a>
        </div>
    </section>

    <section class="banner">
        <h2>Our Biggest Sales</h2>
        <p>End of Year Sales are On Now!</p>
        <button class="Check-it-out">Shop Now</button>
    </section>

    <section class="best-sellers">
        <h2 class="section-title">Best Sellers</h2>
        <p class="section-subtitle">Discover our best products loved by our customers</p>
        <div class="best-sellers-grid">
            <div class="product-card">
                <img src="{{asset('images/Astonic Vortex Runner.webp')}}" alt="Vortex Runner">
                <h3>Vortex Runner</h3>
                <p class="price">£120.00</p>
                <!-- <button class="buy-btn">View</button> -->
                <button class="buy-btn" onclick="location.href='/vortex_runner'">View</button>

            </div>
            <div class="product-card">
                <img src="{{asset('images/Astonic Hoodie.webp')}}" alt="Sweat Hoodie Mens">
                <h3>Sweat Hoodie Mens</h3>
                <p class="price">£29.99</p>
                <button class="buy-btn">View</button>
            </div>
            <div class="product-card">
                <img src="{{asset('images/Astonic Away football shirt.webp')}}" alt="Away Football Shirt">
                <h3>Away Football Shirt</h3>
                <p class="price">£39.99</p>
                <button class="buy-btn">View</button>
            </div>
            <div class="product-card">
                <img src="{{asset('images/Astonic Home football shirt.webp')}}" alt="Home Football Shirt">
                <h3>Home Football Shirt</h3>
                <p class="price">£39.99</p>
                <button class="buy-btn">View</button>
            </div>
            <div class="product-card">
                <img src="{{asset('images/Astonic compression top.png')}}" alt="Compression Top">
                <h3>Compression Top</h3>
                <p class="price">£29.99</p>
                <button class="buy-btn">View</button>
            </div>
            <div class="product-card">
                <img src="{{asset('images/Astonic wind breaker.png')}}" alt="Wind Breaker Mens">
                <h3>Wind Breaker Mens</h3>
                <p class="price">£24.99</p>
                <button class="buy-btn">View</button>
            </div>
        </div>
    </section>
    


    
    <!-- Footer made by ibraheem -->
    <footer>
        <div class="footer-container">

        <!--Social Links-->
        <div class="socials">
            <p>FOLLOW US ON SOCIALS</p>
            <br>
            <div class="social-links">
                <a href="#"aria-label="Follow us on Facebook"></a><img src="{{asset('images/facebook-logo.png')}}" alt="Facebook"></a>
                <a href="#"aria-label="Follow us on Twitter"></a><img src="{{asset('images/twitter-logo.png')}}" alt="Twitter"></a>
                <a href="#"aria-label="Follow us on Instagram"></a><img src="{{asset('images/instagram-logo.png')}}" alt="Instagram"></a>
            </div>
        </div>

        <!--Newsletter Signup-->
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
        <!--Nav Section-->
    <div class="footer-nav">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="">Account</a></li>
            <li><a href="/cart">Cart</a></li>
        </ul>
    </div>
    </div>
</footer>

<!--******************-->
    <script src="{{asset('js/shopping.js')}}"></script>
</body>

</html>