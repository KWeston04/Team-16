
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Astonic sports - Register</title>
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
        
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color:  #1a1a2e;
            margin: 0;
        }
        h1{
            color: #e0e1dd;
            text-align: center;
        }
        .hero-section {
                background: url('main_image.webp');
                background-size: cover;
                background-position: center;
                height: 100vh;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                text-align: center;
            }

        .register-container {
             background-color: white;
                padding: 40px;
                border-radius: 10px;
                text-align: center;
                color: #333;
                width: 80%;
                max-width: 500px;
                box-sizing: border-box;
                z-index: 2;
        }
        .navbar {
  position: sticky;
  top: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1a1a2e;
  padding: 15px 50px;
  z-index: 1000;
}

.logo img {
  height: 50px;
  width: auto;
  display: block;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 30px;
}

.nav-links a {
  color: #e0e1dd; 
  text-decoration: none;
  font-size: 16px;
  font-weight: 600;
}

.nav-links a:hover,.nav-links a:focus {
  color: #5dade2; }

  .footer{
padding: 10px;
text-align: center;
color: white;
background-color:#1a1a2e ;
}
        </style>
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
                    <option value="Mrs">Miss</option>
                </select> <br>
                <br> <label for="FirstName">First Name </label>
                <input type="text" id="FirstName" name="FirstName" required><br>

               <br> <label for="LastName">Last Name</label>
                <input type="text" id="LastName" name="LastName" required><br>

                <br> <label for="Email">Email Address</label>
                <input type="email" id="Email" name="Email" required><br>

                <br><label for="MobileNumber">Mobile Number</label>
                <input type="tel" id="MobileNumber" name="MobileNumber" required><br>

                <br> <label for="password">Password</label>
                <input type="password" id="password" name="password" required><br>

                <br> <label for="Confirmpassword">Confirm Password</label>
                <input type="password" id="Confirmpassword" name="Confirmpassword" required><br>

                <br> <label for="country">Country</label>
                <input type="country" id="country" name="country" required><br>

                <br> <label for="Address">Address</label>
                <input type="Address" id="Address" name="Address" required><br>

                <br> <button type="Register">Register</button>
            </form>
    </div>
  </div>
    <footer class="footer">
      <br> &copy; 2024 Astonic Sports. All Rights Reserved.
   </footer> 
    <script src="register.js"></script>
</body>
</html>