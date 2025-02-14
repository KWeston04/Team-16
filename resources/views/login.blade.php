<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Astonic sports login</title>
        <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .big-container{
          display: flex;
            justify-content: center;
            margin-top: 150px;
            gap: 60px;
             
        }
        .login-container{
            background-color: whitesmoke;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin-left: 10px;
            
            
        }
        .Benefit-container{
            background-color: whitesmoke;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin-right: 10px;
            
        }
        h1{
            text-align:center;
        }
        h2{
            text-align: center;
        }
        .rp {
            margin-top: 10px;
        }
         /*jacks nav bar*/ 
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
    </head>
    <body>
        <header>
            <!-- /*jacks nav bar*/ -->
            <nav class="navbar">
                <div class="logo">
                  <a href="about_us.html">
                    <!--<img src="Astonic logo.webp" alt="Astonic Sports Logo"> -->
                   <img src="{{ asset('images/Astonic Sports Logo.webp') }}" alt="Astonic Sports Logo">
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
        <div class="big-container">
        <div class="login-container">
        <h1>Login</h1>
        <form id="loginSection" action="/login" method="POST">
          @csrf <!-- CSRF protection -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <br> <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <br> <button type="submit">Login</button>
        </form>
    <div class="rp">
        <a href=>Forgot Password?</a><br>
        <h2>
         ----create an account----
        </h2>
    <div>
      <button> <a href="/register">Create an account</a> </button> 
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
   <br> &copy; 2024 Astonic Sports. All Rights Reserved.
</footer> 
<script src="Login section.js"></script>
    </body>
    </html>