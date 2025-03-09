<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
        <!--<link rel="stylesheet" href="resetpassword.css"> -->
        <link rel="stylesheet" href="{{ asset('css/resetpassword.css') }}">
    </head>
    <body>
        <header>
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
        <main class ="main">
        <h1>Reset Password</h1>
     <p> To reset your password please enter your email address below.</p>
     <form id="resetpasswordsection">
        <label for="Email">Email:</label>
        <input type="text" id="Email" name="Email" required><br>
       <br> <button type="Reset password">Reset password</button>
     </form>
    </main>
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
    </body>
    <script src="forgotten password.js"></script>
</html>


