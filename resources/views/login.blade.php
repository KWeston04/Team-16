<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Astonic sports login</title>
        <!-- <link rel="stylesheet" href="login.css"> -->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body>
        <header>
            <!-- /*jacks nav bar*/ -->
            <nav class="navbar">
                <div class="logo">
                  <a href="about_us.html">
                     <!--<img src="Astonic logo.webp" alt="Astonic Sports Logo"> -->
                   <img src="{{ asset('images/Astonic logo.webp') }}" alt="Astonic Sports Logo">
                  </a>
                </div>
                <ul class="nav-links">
                  <li><a href="Home.html">Home</a></li>
                  <li><a href="about_us.html">About Us</a></li>
                  <li><a href="contact_us.html">Contact Us</a></li>
                  <li><a href="product_listing.html">Shop</a></li>
                  <li><a href="login.html">Account</a></li>
                  <li><a href="cart.html">Cart</a></li>
                </ul>
              </nav>
        </header>
        <div class="big-container">
        <div class="login-container">
        <h1>Login</h1>
        <form id="loginSection">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required><br>

            <br> <label for="password">Password</label>
            <input type="password" id="password" name="password" required><br>
            
            <br> <button type="submit">Login</button>
        </form>
    <div class="rp">
        <a href="resetpassword.html">Forgot Password?</a><br>
        <h2>
         ----create an account----
        </h2>
    <div>
      <button> <a href="createaccount.html">Create an account</a> </button> 
    </div>
    </div>
</div>
<div class="Benefit-container">
<form id="Benefits">
    <h3> Benefits of registering with Astonic sports </h3>
    <p> 
      <br>1. Receive special offers <br>
      <br>2. Manage your orders and preferences<br>
     <br> 3. Access your saved items<br>
     <br> 4. Instant access to your account <br>
     <br> 5. Speed your way to the checkout<br>
    </p>
</form>
</div>
</div> 
  <footer class="footer">
 <!-- Footer made by ibraheem -->
 <div class="footer-container">

  <!--Social Links-->
  <div class="socials">
      <p>FOLLOW US ON SOCIALS</p>
      <br>
      <div class="social-links">
          <a href="#"aria-label="Follow us on Facebook"></a> <!--<img src="facebook-logo.png" alt="Facebook"></a> --> <img src="{{ asset('images/facebook-logo.png') }}" alt="Facebook">
          <a href="#"aria-label="Follow us on Twitter"></a> <!--<img src="twitter-logo.png" alt="Twitter"></a> --> <img src="{{ asset('images/twitter-logo.png') }}" alt="Twitter">
          <a href="#"aria-label="Follow us on Instagram"></a><!--<img src="instagram-logo.png" alt="Instagram"></a> --> <img src="{{ asset('images/instagram-logo.png') }}" alt="Instagram">
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
<script src="Login section.js"></script>
    </body>
    </html>