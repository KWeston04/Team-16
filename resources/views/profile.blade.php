<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Astonic Sports Profile</title>
  <style>
 

    body {
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }
    .main-container {
    display: flex;
    min-height: 100vh; /* Ensure it takes the full viewport height */
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

  @if (session('success'))
  <div class="alert alert-success text-center mb-4" role="alert">
      {{ session('success') }}
  </div>
  @endif

  @if (session('failure'))
  <div class="alert alert-danger text-center mb-4" role="alert">
      {{ session('failure') }}
  </div>
  @endif
  <div class="main-container">
    <div class="nav-container">
      <h2>Astonic Sports</h2>
      <a href="{{route('profile.personal.details') }}" class="nav-link">Personal Details</a>
      <a href="{{route('profile.order.history') }}" class="nav-link">Order History</a>
      <a href="{{route('profile.change.password') }}" class="nav-link">Change Password</a>
      <a href="{{route('profile.payment.method') }}" class="nav-link">Payment Method</a>
      <a href="{{route('profile.contact.preferences') }}" class="nav-link">Contact Preferences</a>
      <a href="{{route('profile.contact.us') }}" class="nav-link">Contact Us</a>
      <a href="{{route('profile.wishlist') }}" class="nav-link">Wishlist</a>
    </div>
  

    <div class="content-container">
      <h1>Welcome to Astonic Sports</h1>
      <p>Manage your profile and preferences by selecting an option from the left menu.</p>
      <p>Select a section from the menu to view or update your information.</p>
    </div>
  </div>

</body>
</html>


