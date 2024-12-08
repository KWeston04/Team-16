<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
        <style>
         body{
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            margin: 0;
            display: flex;
            flex-direction: column;
            color: #e0e1dd;
            min-height: 100vh;
          }
          .main{
            flex: 1;
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
      <br> &copy; 2024 Astonic Sports. All Rights Reserved.
   </footer> 
    </body>
    <script src="forgotten password.js"></script>
</html>


