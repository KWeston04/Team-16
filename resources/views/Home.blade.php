<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports</title>
  <link rel="stylesheet" href="{{asset('css/Style_AstonicSports_Home_JB.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
  <!-- Navigation Bar -->
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="about_us.html">
          <img src="{{asset('images/astonic sports logo.png')}}" alt="Astonic Sports Logo">
        </a>
      </div>
      <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="/contact">Contact Us</a></li>
        <li><a href="/shop">Shop</a></li>
        <li class="dropdown">
          @if (Auth::check())
            <!-- If user is logged in -->
            <a href="#" class="dropbtn">{{ Auth::user()->first_name }}'s Account</a>
            <div class="dropdown-content">
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                <a href="admin_dashboard.html">Admin Dashboard</a>
            </div>
          @else
            <!-- If user is not logged in -->
            <a href="#" class="dropbtn">Account</a>
            <div class="dropdown-content">
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            </div>
          @endif
        </li>
        <li><a href="/cart">Cart</a></li>
      </ul>
    </nav>
  </header>

  @if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
  @endif

  @if (session('failure'))
    <div class="alert alert-danger text-center">
        {{ session('failure') }}
    </div>
  @endif


  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-overlay">
      <div class="hero-content">
        <h1>Unleash Your Potential</h1>
        <p>Performance sportswear crafted for athletes.</p>
        <button class="cta-button">Shop Now</button>
      </div>
    </div>
    <div class="image-placeholder">[Hero Image Placeholder]</div>
  </section>

  <!-- Collections Section -->
  <section id="mens-collections" class="collections-section">
    <h2>Men's Collections</h2>
    <div class="collections-grid">
      <div class="collection-card">
        <div class="image-placeholder">[Training Gear Image]</div>
        <h3><a href="product_listing.html?category=training">Training Gear</a></h3>
      </div>
      <div class="collection-card">
        <div class="image-placeholder">[Running Shoes Image]</div>
        <h3><a href="product_listing.html?category=footwear">Running</a></h3>
      </div>
      <div class="collection-card">
        <div class="image-placeholder">[Winter Wear Image]</div>
        <h3><a href="product_listing.html?category=winterwear">Winter Wear</a></h3>
      </div>
      <div class="collection-card">
        <div class="image-placeholder">[Casual Wear Image]</div>
        <h3><a href="product_listing.html?category=casualwear">Casual Wear</a></h3>
      </div>
    </div>
  </section>

  <!-- Seasonal Offers Section -->
  <section id="seasonal-offers" class="offers-section">
    <h2>Seasonal Offers</h2>
    <p>Exclusive discounts for a limited time.</p>
    <button class="cta-button">Explore Offers</button>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="socials">
        <p>Follow Us</p>
        <a href="#"><img src="{{asset('images/facebook.png')}}" alt="Facebook"></a>
        <a href="#"><img src="{{asset('images/twitter-logo.png')}}" alt="Twitter"></a>
        <a href="#"><img src="{{asset('images/instagram.png')}}" alt="Instagram"></a>
      </div>
      <div class="newsletter">
        <h4>Sign Up for Updates</h4>
        <form action="#">
          <input type="email" placeholder="Enter your email">
          <button type="submit">Subscribe</button>
        </form>
        <p>&copy; 2024 Astonic Sports.</p>
      </div>
      <div class="footer-nav">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/about">About Us</a></li>
          <li><a href="/contact">Contact Us</a></li>
          <li><a href="/shop">Shop</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>
