<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Astonic Sports')</title>
    
    <!-- the css file for the navbar and footer -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    
    <!-- where you can link to your page specific css -->
    @yield('page-specific-css')
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

    <main>
        @yield('content')
    </main>

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

    <!-- add any page specific js -->
    @yield('page-specific-js')
</body>
</html>