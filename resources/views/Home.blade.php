<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports</title>
  <link rel="stylesheet" href="{{ asset('css/HomepageStyle.css') }}">
</head>
<body>
  <!-- Navigation Bar -->
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="{{ route('about_us') }}">
          <img src="{{ asset('images/astonic-sports-logo.png') }}" alt="Astonic Sports Logo" style="height: 50px; width: auto;">
        </a>
      </div>
      <ul class="nav-links">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about_us') }}">About Us</a></li>
        <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
        <li><a href="{{ route('product_listing') }}">Shop</a></li>
        <li class="dropdown">
          <a href="#" class="dropbtn">Account</a>
          <div class="dropdown-content">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('admin_dashboard') }}">Admin Dashboard</a>
          </div>
        </li>
        <li><a href="{{ route('cart') }}">Cart</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <div class="hero-section">
    <img src="{{ asset('images/hero-image.png') }}" alt="Hero Image" style="width: 100%; height: auto;">
  </div>

  <!-- Collections Section -->
  <section id="mens-collections" class="collections-section">
    <h2>Men's Collections</h2>
    <div class="collections-grid">
      <div class="collection-card">
        <img src="{{ asset('images/compression top.png') }}" alt="Compression Gear" style="width: 100%; height: auto;">
        <h3><a href="{{ route('product_listing', ['category' => 'Compression']) }}">Compression Gear</a></h3>
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/shoes.png') }}" alt="Running Shoes" style="width: 100%; height: auto;">
        <h3><a href="#">Running Shoes</a></h3>
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/wind breaker.png') }}" alt="Winter Wear" style="width: 100%; height: auto;">
        <h3><a href="#">Winter Wear</a></h3>
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/shirt design.png') }}" alt="Casual Wear" style="width: 100%; height: auto;">
        <h3><a href="{{ route('product_listing', ['category' => 'casualwear']) }}">Casual Wear</a></h3>
      </div>
    </div>
  </section>

<!-- Seasonal Offers Section -->
<section id="seasonal-offers" class="offers-section">
  <h2>Seasonal Offers</h2>
  <p>Exclusive discounts for a limited time.</p>
  <a href="{{ route('shop') }}" class="cta-button">Explore Offers</a>
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
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('about_us') }}">About Us</a></li>
          <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
          <li><a href="{{ route('product_listing') }}">Shop</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>
