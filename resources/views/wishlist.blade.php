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
      background-color:whitesmoke;
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
      padding: 20px;
    }

    .content-container h1 {
      color: #1a1a2e;
      margin-bottom: 20px;
    }

    .content-container p {
      color: #1a1a2e;
      margin-bottom: 20px;
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
    <h1>WishList</h1>
    <div class="Item-container">
        <div class="Item-saved">
            <P>Detail about the item of clothing or accesories saved...</P>
            <p>Price</p>
            <p>Discount(if applied)</p>
            <form id="ColourSection">
                <label for="Colour">Colour:</label>
                <select type="text" id="Colour" name="Colour" required>
                    <option value="" disabled selected>Select your Colour</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Purple">Purple</option>
                    <option value=""></option>
                </select> <br>
                <br><form id="SizeSection">
                    <label for="Size">Size:</label>
                    <select type="text" id="Size" name="Size" required>
                        <option value="" disabled selected>Select your Size</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">XL</option>
                    </select> <br>
                    <br><form id="QtySection">
                        <label for="Qty">Qty:</label>
                        <select type="text" id="Qty" name="Qty" required>
                            <option value="" disabled selected>Select your Quantity</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select> 
           
        </div>
        <br> <button type="ADD TO BAG">ADD TO BAG</button>
        </div>
    
  </div>
    
  </div>
</body>
</html>