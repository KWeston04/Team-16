<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Astonic sports - Register</title>
       <!-- <link rel="stylesheet" href="createaccount.css"> -->
        <link rel="stylesheet" href="{{ asset('css/createaccount.css') }}">
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

        <div class="header-section">
          <h1>Join Astonic Sports Today!</h1>
      </div>
      <div class="hero-section">
        <div class="register-container">
            <form id="registerSection">
                <label for="Title">Title</label>
                <select type="text" id="Title" name="Title" required>
                    <option value="" disabled selected>Select your title</option>
                    <option value="Mr">Mr</option>
                    <option value="Ms">Ms</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                </select> <br>
                <br> <label for="FirstName">First Name </label>
                <input type="text" id="FirstName" name="FirstName" required><br>

               <br> <label for="LastName">Last Name</label>
                <input type="text" id="LastName" name="LastName" required><br>

                <br> <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required><br>

                <br><label for="mobileNumber">Mobile Number</label>
                <input type="tel" id="mobileNumber" name="mobileNumber" required><br>

                <br> <label for="password">Password</label>
                <input type="password" id="password" name="password" required><br>

                <br> <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword" required><br>

                <br> <label for="country">Country</label>
                <input type="text" id="country" name="country" required><br>

                <br> <label for="Address">Address</label>
                <input type="text" id="Address" name="Address" required><br>

                <br> <button type="submit">Register</button>
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
    <script src="register .js"></script>
</body>
</html>