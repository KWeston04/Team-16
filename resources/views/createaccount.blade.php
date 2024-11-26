
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Astonic sports</title>
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
        <h1>Register</h1>
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color:  #1a1a2e;
            margin: 0;
        }
        h1{
            color: #e0e1dd;
        }
        .register-container {
            background-color: whitesmoke;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-left: 20px;
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
        </style>
        <div class="register-container">
            <form id="registerSection">
                <label for="Title">Title:</label>
                <select type="text" id="Title" name="Title" required>
                    <option value="" disabled selected>Select your title</option>
                    <option value="Mr">Mr</option>
                    <option value="Ms">Ms</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Mrs">Miss</option>
                </select> <br>
                <br> <label for="First Name">First Name :</label>
                <input type="First Name" id="First Name" name="First Name" required><br>
               <br> <label for="Last Name">Last Name:</label>
                <input type="text" id="Last Name" name="Last Name" required><br>

                <br> <label for="Email Address">Email Address:</label>
                <input type="text" id="Email" name="Email Address" required><br>
                <br><label for="Mobile Number">Mobile Number :</label>
                <input type="text" id="Mobile Number" name="Mobile Number" required><br>
                <br><p> Please enter atleast 8 characters which should include atleast one capital letter, one lowercase letter, one numbers and one symbols(!"£$%^&*")</p>
                <br> <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <br> <label for="Confirmpassword">Confirm Password:</label>
                <input type="Confirm password" id="Confirm password" name="Confirm password" required><br>
                <br> <label for="country">Country:</label>
                <input type="country" id="country" name="country" required><br>
                <br> <label for="Address">Address:</label>
                <input type="Address" id="Address" name="Address" required><br>
                <br> <button type="Register">Register</button>
            </form>
    </div>
</body>
</html>