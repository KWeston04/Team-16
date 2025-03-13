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
 
<script src="login.js"></script>
    </body>
    </html>