
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
                  <li><a href="/">Home</a></li>
                  <li><a href="/about">About Us</a></li>
                  <li><a href="/contact">Contact Us</a></li>
                  <li><a href="/shop">Shop</a></li>
                  <li><a href="/login">Account</a></li>
                  <li><a href="/cart">Cart</a></li>
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
          <form id="registerSection" action="/register" method="POST">
            @csrf <!-- i have added a CSRF token for form security -->
            <br> <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required><br>
            
            <br> <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required><br>
        
            <br> <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required><br>
            
            <br> <label for="phone_number">Mobile Number:</label>
            <input type="text" id="phone_number" name="phone_number" required><br>
            
            <br><p>Please enter at least 8 characters which should include at least one capital letter, one lowercase letter, one number, and one symbol (!"£$%^&*").</p>
            <br> <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            
            <br> <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br>
            
            <br> <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>
            
            <br> <button type="submit">Register</button>
        </form>
        
    </div>
</body>
</html>