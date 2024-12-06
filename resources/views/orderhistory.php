<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports Profile</title>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .nav-container {
      width: 200px;
      background-color: #1a1a2e;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 15px;
      margin-right: 20px;
    }

    .nav-container h2 {
      text-align: center;
      color: whitesmoke;
      margin-bottom: 20px;
    }

    .nav-link {
      display: block;
      padding: 10px;
      margin: 10px 0;
      text-decoration: none;
      color: #1a1a2e;
      background-color: whitesmoke;
      border-radius: 5px;
      text-align: center;
    }

    .nav-link:hover {
      background-color: #E9edf6;
    }

    /* Right Container - Content */
    .content-container {
      flex: 1;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 10px;

    }

    .content-container h1 {
      color: #1a1a2e;
      margin-bottom: 20px;
    }

    .content-container p {
      color: #1a1a2e;
      margin-bottom: 20px;
    }

    .clothing {
      justify-content: left;
      display: flex;

    }

    .clothing img {
      height: 190px;
      width: auto;
      display: block;
    }

    .order1 {
      flex: 1;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      height: 500px;
      padding: 20px;
    }

    .order1 p {
      text-align: left;
      height: auto;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <div class="nav-container">
    <h2>Astonic Sports</h2>
    <a href="Personal Details.html" class="nav-link">Personal Details</a>
    <a href="order history.html" class="nav-link">Order History</a>
    <a href="change password.html" class="nav-link">Change Password</a>
    <a href="payment method.html" class="nav-link">Payment Method</a>
    <a href="contact preferences.html" class="nav-link">Contact Preferences</a>
    <a href="contact us.html" class="nav-link">Contact Us</a>
    <a href="wishlist.html" class="nav-link">Wishlist</a>
  </div>
  <div class="content-container">
    <h1>Orders</h1>
    <div class="order1">
      <div class="clothing">

        <!-- <img src="wind_breaker.png" alt="wind breaker Logo"> -->
        <img src="{{ asset('images/wind_breaker.png') }}" alt="wind breaker Logo">
        </a>
      </div>

      <b>
        <p> Order Date: </p>
      </b>
      <P>19/11/2029</P>
      <b>
        <p> Order Total:</p>
      </b>
      <p>£100</p>
      <b>
        <p> Dispatched Date:</p>
      </b>
      <P>20/11/2029</P>
      <b>
        <p> Delivered Date:</p>
      </b>
      <P>21/11/2029</P>
    </div>
  </div>
  </div>
</body>

</html>