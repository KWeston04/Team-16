<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports</title>
  <link rel="stylesheet" href="{{asset('css/Style_AstonicSports_Home_JB.css')}}">
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
        <li><a href="Home.html">Home</a></li>
        <li><a href="about_us.html">About Us</a></li>
        <li><a href="contact_us.html">Contact Us</a></li>
        <li><a href="product_listing.html">Shop</a></li>
        <li class="dropdown">
          <a href="#" class="dropbtn">Account</a>
          <div class="dropdown-content">
            <a href="#">Login</a>
            <a href="#">Register</a>
            <a href="admin_dashboard.html">Admin Dashboard</a>
          </div>
        </li>
        <li><a href="cart.html">Cart</a></li>
      </ul>
    </nav>
  </header>

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
        <a href="#"><img src="{{asset('images/twitter.png')}}" alt="Twitter"></a>
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
          <li><a href="Home.html">Home</a></li>
          <li><a href="about_us.html">About Us</a></li>
          <li><a href="contact_us.html">Contact Us</a></li>
          <li><a href="product_listing.html">Shop</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>
