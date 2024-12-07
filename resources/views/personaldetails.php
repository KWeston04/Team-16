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
      color: #666;
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
    <h1>Personal Details</h1>
    <form id="PDSection">
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

        <br> <label for="Address">Address</label>
        <input type="text" id="Address" name="Address" required><br>

        <br> <label for="country">Country</label>
        <input type="country" id="country" name="country" required><br>

        <br> <button type="submit">Confirm</button>
  </div>
  <script>
      document.getElementById("PDSection").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    
    const title = document.getElementById("Title").value;
    const firstName = document.getElementById("FirstName").value;
    const lastName = document.getElementById("LastName").value;
    const address = document.getElementById("Address").value;
    const country = document.getElementById("country").value;

    
    if (title === "") {
      alert("Please select a title.");
      return;
    }

    
    if (firstName.length === "") {
      alert("Please enter a First Name");
      return;
    }

    
    if (lastName === "") {
      alert("Please enter a Last Name");
      return;
    }

    
    if (address ==="") {
      alert("Please enter an address");
      return;
    }

    
    if (country === "") {
      alert("Please enter your country.");
      return;
    }

    alert("Changed successfully!");
    this.submit();
  });
  </script>
</body>
</html>


