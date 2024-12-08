<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports</title>
  <link rel="stylesheet" href="{{ asset('css/Style_AstonicSports_Home_JB.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head>
<body>
  <!-- Navigation Bar -->
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="/">
          <img src="{{ asset('images/astonic sports logo.png') }}" alt="Astonic Sports Logo" style="height: 50px; width: auto;">
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
            <a href="/profile" class="dropbtn">{{ Auth::user()->first_name }}'s Account</a>
            <div class="dropdown-content">
              <a href="/profile">Profile</a>
              <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a href="/admin_dashboard">Admin Dashboard</a>
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
        <li><a href="/cart" class="cart-link" style="font-size: 20px;">🛒</a></li>
      </ul>
    </nav>
  </header>

  <!-- Discount Banner -->
  <div class="discount">
    <div class="text-container">
      <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
      <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
      <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-overlay">
      <div class="hero-content">
        <h1>Unleash Your Potential</h1>
        <p>Performance sportswear crafted for athletes.</p>
        <a href="/shop" class="cta-button">Shop Now</a>
      </div>
    </div>
    <img src="{{ asset('images/Hero-image.png') }}" alt="Hero Image" style="width: 100%; height: auto;">
  </section>

  <!-- Collections Section -->
  <section id="mens-collections" class="collections-section">
    <h2>Men's Collections</h2>
    <div class="collections-grid">
      <div class="collection-card">
        <img src="{{ asset('images/compression top.png') }}" alt="Compression Gear" style="width: 100%; height: auto;">
        <h3><a href="">Compression Gear</a></h3> <!-- route('product_listing', ['category' => 'Compression'])  -->
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/shoes.png') }}" alt="Running Shoes" style="width: 100%; height: auto;">
        <h3><a href="">Running Shoes</a></h3> <!--  route('product_listing', ['category' => 'Running']) -->
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/wind breaker.png') }}" alt="Winter Wear" style="width: 100%; height: auto;">
        <h3><a href="">Winter Wear</a></h3> <!--  route('product_listing', ['category' => 'WinterWear'])  -->
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/shirt design.png') }}" alt="Casual Wear" style="width: 100%; height: auto;">
        <h3><a href="">Casual Wear</a></h3> <!--  route('product_listing', ['category' => 'CasualWear'])  -->
      </div>
    </div>
  </section>

  <!-- Seasonal Offers Section -->
  <section id="seasonal-offers" class="offers-section">
    <h2>Seasonal Offers</h2>
    <p>Exclusive discounts for a limited time.</p>
    <a href="/shop" class="cta-button">Explore Offers</a>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="socials">
        <p>Follow Us</p>
        <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="Facebook"></a>
        <a href="#"><img src="{{ asset('images/twitter-logo.png') }}" alt="Twitter"></a>
        <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a>
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
