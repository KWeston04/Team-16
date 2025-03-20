<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Astonic Sports - Unleash Your Potential')</title>
    

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800;900&family=Anton&display=swap" rel="stylesheet">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    
    <style>
        /* Global CSS Variables - Refined Colour Palette */
        :root {
            --primary: #B11226;
            --primary-hover: #8e0e1f;
            --primary-light: #f8f1f2;
            --accent: #B11226;
            --accent-hover: #8e0e1f;
            --success: #28a745;
            --text-primary: #121212;
            --text-secondary: #444444;
            --text-muted: #666666;
            --bg-primary: #ffffff;
            --bg-secondary: #f8f8f8;
            --border-color: #e5e5e5;
            --nav-bg: #fcf9f2;
            --footer-bg: #f5f5f5;
            --card-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            
            /* Enhanced Typography */
            --heading-font: 'Montserrat', sans-serif;
            --body-font: 'Inter', sans-serif;
            --athletic-font: 'Anton', sans-serif;
            
            /* Animation */
            --transition-fast: 0.2s ease;
            --transition-normal: 0.3s ease;
            --transition-slow: 0.5s ease;
        }
        
        /* Enhanced Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--heading-font);
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        
        /* Enhanced Navbar */
        .navbar {
            padding: 0.9rem 2rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.07);
        }
        
        .logo {
            font-family: var(--athletic-font);
            font-size: 1.7rem;
            letter-spacing: 1.5px;
        }
        
        .nav-menu a {
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .nav-menu a:after {
            height: 3px;
            background-color: var(--primary);
            transition: width 0.3s var(--transition-normal);
        }
        
        .nav-menu a:hover:after {
            width: 100%;
        }
        
        /* Enhanced Logo Container */
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .logo-img {
            height: 42px;
            width: auto;
            margin-right: 6px;
        }
        
        /* Enhanced Nav Actions */
        .nav-actions {
            gap: 1.2rem;
        }
        
        .search-container {
            border-radius: 4px;
            transition: all 0.3s var(--transition-normal);
        }
        
        .search-container:hover {
            border-color: var(--primary);
            box-shadow: 0 2px 6px rgba(177, 18, 38, 0.15);
        }
        
        .search-input {
            width: 130px;
            padding: 0.4rem 0.2rem;
        }
        
        .icon-button {
            transition: all 0.3s var(--transition-normal);
        }
        
        .icon-button:hover {
            color: var(--primary);
            transform: translateY(-2px);
        }
        
        /* Enhanced Cart Button Badge */
        .cart-count, .wishlist-count {
            position: absolute;
            top: -6px;
            right: -6px;
            background-color: var(--accent);
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        /* Enhanced Cart Dropdown */
        .cart-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: var(--bg-primary);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            border-radius: 8px;
            width: 350px;
            padding: 1.5rem;
            z-index: 1001;
            border: 1px solid var(--border-color);
            transition: all 0.3s var(--transition-normal);
        }

        .cart-btn-container {
            position: relative;
        }

        .cart-btn-container:hover .cart-dropdown {
            display: block;
        }
        
        .cart-dropdown.show {
            display: block;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        .cart-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            margin-right: 1.2rem;
            border-radius: 6px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: var(--text-primary);
            font-family: var(--heading-font);
            font-size: 1.05rem;
        }

        .cart-item-price {
            font-size: 1rem;
            color: var(--primary);
            font-weight: 700;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            padding: 1.2rem 0;
            font-weight: 800;
            color: var(--text-primary);
            border-top: 1px solid var(--border-color);
            margin-top: 0.5rem;
            font-family: var(--heading-font);
            font-size: 1.1rem;
        }

        .cart-buttons {
            display: flex;
            gap: 1.2rem;
            margin-top: 1rem;
        }

        .cart-button {
            flex: 1;
            padding: 0.9rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s var(--transition-normal);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-family: var(--heading-font);
            font-size: 0.9rem;
        }

        .view-cart-btn {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
        }

        .checkout-btn {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(177, 18, 38, 0.2);
        }

        .view-cart-btn:hover {
            background-color: var(--border-color);
            transform: translateY(-2px);
        }

        .checkout-btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(177, 18, 38, 0.3);
        }

        .empty-cart {
            text-align: center;
            padding: 2rem 0;
            color: var(--text-muted);
            font-style: italic;
            font-size: 1.05rem;
        }

        .remove-item {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.3rem;
            transition: all 0.3s var(--transition-normal);
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-item:hover {
            color: var(--accent);
            background-color: rgba(177, 18, 38, 0.1);
        }
        
        /* Wishlist Dropdown */
        .wishlist-btn-container {
            position: relative;
        }
        
        .wishlist-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: var(--bg-primary);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            border-radius: 8px;
            width: 350px;
            padding: 1.5rem;
            z-index: 1001;
            border: 1px solid var(--border-color);
            transition: all 0.3s var(--transition-normal);
        }
        
        .wishlist-btn-container:hover .wishlist-dropdown {
            display: block;
        }
        
        .wishlist-dropdown.show {
            display: block;
        }
        
        .wishlist-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }
        
        .wishlist-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            margin-right: 1.2rem;
            border-radius: 6px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }
        
        .wishlist-item-info {
            flex: 1;
        }
        
        .wishlist-item-name {
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: var(--text-primary);
            font-family: var(--heading-font);
            font-size: 1.05rem;
        }
        
        .wishlist-item-price {
            font-size: 1rem;
            color: var(--primary);
            font-weight: 700;
        }
        
        .remove-wishlist-item {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.3rem;
            transition: all 0.3s var(--transition-normal);
            position: absolute;
            right: 0;
            top: 10px;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .remove-wishlist-item:hover {
            color: var(--accent);
            background-color: rgba(177, 18, 38, 0.1);
        }
        
        .add-to-cart-link {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-top: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .add-to-cart-link:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }
        
        .wishlist-buttons {
            display: flex;
            gap: 1.2rem;
            margin-top: 1rem;
        }
        
        .wishlist-button {
            flex: 1;
            padding: 0.9rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-family: var(--heading-font);
            font-size: 0.9rem;
        }
        
        .view-wishlist-btn {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
        }
        
        .view-wishlist-btn:hover {
            background-color: var(--border-color);
            transform: translateY(-2px);
        }
        
        .empty-wishlist {
            text-align: center;
            padding: 2rem 0;
            color: var(--text-muted);
            font-style: italic;
            font-size: 1.05rem;
        }
        
        /* Enhanced Theme Toggle */
        .theme-toggle {
            transition: all 0.3s var(--transition-normal);
        }
        
        .theme-toggle:hover {
            transform: rotate(20deg);
            color: var(--primary);
        }
        
        .theme-toggle .sun-icon,
        .theme-toggle .moon-icon {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        /* Enhanced Footer */
        .footer {
            background-color: var(--footer-bg);
            padding: 4rem 2rem 1.5rem;
            margin-top: 4rem;
        }
        
        .footer-column h3 {
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            padding-bottom: 0.7rem;
        }
        
        .footer-column h3:after {
            width: 45px;
            height: 3px;
        }
        
        .footer-column ul li a {
            transition: all 0.3s var(--transition-normal);
        }
        
        .footer-column ul li a:hover {
            color: var(--primary);
            padding-left: 8px;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            transition: all 0.3s var(--transition-normal);
        }
        
        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(177, 18, 38, 0.25);
        }
        
        .newsletter-form input {
            padding: 0.85rem;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        
        .newsletter-form button {
            padding: 0.85rem 1.2rem;
            font-weight: 700;
            transition: all 0.3s var(--transition-normal);
        }
        
        .newsletter-form button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(177, 18, 38, 0.2);
        }
        
        /* Dark Mode Refinements */
        body.dark-mode {
            --primary: #CF1B30;
            --primary-hover: #B11226;
            --text-primary: #f8f8f8;
            --text-secondary: #d5d5d5;
            --text-muted: #aaaaaa;
            --bg-primary: #121212;
            --bg-secondary: #1e1e1e;
            --border-color: #333333;
            --nav-bg: #0a0a0a;
            --footer-bg: #0a0a0a;
            --card-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        
        body.dark-mode .navbar {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
        }
        
        body.dark-mode .search-input::placeholder {
            color: #777777;
        }
        
        body.dark-mode .sun-icon {
            display: block;
            transform: rotate(180deg);
        }
        
        body.dark-mode .moon-icon {
            display: none;
        }
        
        /* Enhanced Mobile Menu */
        .mobile-menu-toggle {
            transition: all 0.3s var(--transition-normal);
        }
        
        .mobile-menu-toggle .bar {
            transition: all 0.4s var(--transition-normal);
        }
        
        .mobile-menu-toggle.active .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }
        
        .mobile-menu-toggle.active .bar:nth-child(2) {
            opacity: 0;
            transform: translateX(20px);
        }
        
        .mobile-menu-toggle.active .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }
        
        /* Notification System */
        .notification-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .notification {
            background-color: var(--primary);
            color: white;
            padding: 12px 20px;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s, transform 0.3s;
            font-weight: 500;
            min-width: 280px;
        }
        
        /* Responsive Enhancements */
        @media (max-width: 768px) {
            .nav-menu.show-mobile-menu {
                padding: 1.2rem 0;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }
            
            .nav-menu a {
                padding: 0.9rem 2rem;
                font-size: 1.05rem;
                border-bottom: 1px solid var(--border-color);
            }
            
            .nav-menu a:last-child {
                border-bottom: none;
            }
            
            .search-container {
                border: 1px solid var(--border-color);
            }
            
            .search-input {
                width: 100px;
            }
        }
        
        @media (max-width: 480px) {
            .logo-img {
                height: 32px;
            }
            
            .logo {
                font-size: 1.5rem;
            }
            
            .cart-dropdown,
            .wishlist-dropdown {
                width: 300px;
                right: -50px;
            }
        }
    </style>
    
    <!-- Page specific CSS -->
    @yield('page-specific-css')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo-container">
                <img src="{{ asset('images/astonic_logo.png') }}" alt="Astonic Sports Logo" class="logo-img">
                <span class="logo">ASTONIC</span>
            </a>
            
            <button class="mobile-menu-toggle" aria-label="Toggle navigation menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            
            <div class="nav-menu">
                <a href="{{ url('/') }}">HOME</a>
                <a href="{{ url('/shop') }}">SHOP</a>
                <a href="{{ url('/about') }}">ABOUT US</a>
                <a href="{{ url('/contact') }}">CONTACT</a>
            </div>
            
            <div class="nav-actions">
                <!-- Dark Mode Toggle Button -->
                <button id="theme-toggle" class="theme-toggle" aria-label="Toggle dark mode">
                    <!-- Moon icon (light mode) -->
                    <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    
                    <!-- Sun icon (dark mode) -->
                    <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </button>
                
                <div class="language-select-container">
                    <select class="language-select">
                        <option value="en">EN/£</option>
                        <option value="fr">FR/€</option>
                    </select>
                </div>
                
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search...">
                    <button class="icon-button search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
                <!-- Account Button - Links to login or profile -->
                @auth
                    <a href="{{ route('profile') }}" class="icon-button account-btn" aria-label="Account">
                        <i class="fas fa-user"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="icon-button account-btn" aria-label="Login">
                        <i class="fas fa-user"></i>
                    </a>
                @endauth
                
                <!-- Wishlist Button with Dropdown -->
                <div class="wishlist-btn-container">
                    <a href="{{ route('profile.wishlist') }}" class="icon-button wishlist-btn" aria-label="Wishlist">
                        <i class="fas fa-heart"></i>
                        <span class="wishlist-count" style="display: none;">0</span>
                    </a>
                    
                    <!-- Wishlist Dropdown -->
                    <div class="wishlist-dropdown">
                        <h3>My Wishlist</h3>
                        <div id="wishlist-items-container">
                            <div class="empty-wishlist">Your wishlist is empty</div>
                        </div>
                        <div class="wishlist-buttons">
                            <a href="/wishlist" class="wishlist-button view-wishlist-btn">View Wishlist</a>
                        </div>
                    </div>
                </div>
                
                <!-- Cart Button with Dropdown -->
                <div class="cart-btn-container">
                    <a href="/cart" class="icon-button cart-btn" aria-label="Cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count" style="display: none;">0</span>
                    </a>
                    
                    <!-- Cart Dropdown -->
                    <div class="cart-dropdown">
                        <div id="cart-items-container">
                            <!-- Cart items will be populated dynamically -->
                            <div class="empty-cart">Your cart is empty</div>
                        </div>
                        
                        <div class="cart-total">
                            <span>Total:</span>
                            <span>£0.00</span>
                        </div>
                        
                        <div class="cart-buttons">
                            <a href="/cart" class="cart-button view-cart-btn">View Cart</a>
                            <a href="/checkout" class="cart-button checkout-btn">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>Shop</h3>
                <ul>
                    <li><a href="/shop">All Products</a></li>
                    <li><a href="/shop?category=sale">Sale</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Information</h3>
                <ul>
                    <li><a href="/about">About us</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Customer Service</h3>
                <ul>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="/faq">FAQs</a></li>
                  </ul>
            </div>
            
            <div class="footer-column">
                <h3>Stay Connected</h3>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
                <p>Sign up for our newsletter to get updates on new releases and exclusive offers.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 Astonic Sports. Unleash your potential.</p>
            <div class="payment-methods">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-amex"></i>
                <i class="fab fa-cc-paypal"></i>
                <i class="fab fa-cc-apple-pay"></i>
            </div>
        </div>
    </footer>

    <!-- Mobile menu script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const navMenu = document.querySelector('.nav-menu');
            
            if (mobileMenuToggle && navMenu) {
                mobileMenuToggle.addEventListener('click', function() {
                    mobileMenuToggle.classList.toggle('active');
                    navMenu.classList.toggle('show-mobile-menu');
                });
            }
        });
    </script>

    <!-- Dark mode script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('theme-toggle');
        
        if (!themeToggle) return;
        
        // Check for saved theme preference or use device preference
        const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('theme');
        
        // Apply the saved theme or device preference
        if (savedTheme === 'dark' || (!savedTheme && prefersDarkMode)) {
            document.body.classList.add('dark-mode');
        }
        
        // Theme toggle functionality
        themeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            
            // Save preference to localStorage
            localStorage.setItem('theme', 
                document.body.classList.contains('dark-mode') ? 'dark' : 'light'
            );
        });
    });
</script>
    
    <!-- Ensure proper initialization of cart and wishlist -->
    <script>
        // Basic helper function to show notifications if needed
        function showNotification(message, type = 'info') {
            let container = document.querySelector('.notification-container');
            if (!container) {
                container = document.createElement('div');
                container.className = 'notification-container';
                document.body.appendChild(container);
            }
            
            // Create notification
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            
            // Add to container
            container.appendChild(notification);
            
            // Show with animation
            setTimeout(() => {
                notification.style.opacity = '1';
                notification.style.transform = 'translateY(0)';
            }, 10);
            
            // Remove after delay
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
    </script>
    
    <!-- Page specific JavaScript -->
    @yield('page-specific-js')
</body>
</html>