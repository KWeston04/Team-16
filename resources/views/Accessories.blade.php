<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories - Astonic Sports</title>
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="{{ url('about_us') }}">
                    <img src="{{ asset('images/Astonic_Sports.webp') }}" alt="Astonic Sports Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('about_us') }}">About Us</a></li>
                <li><a href="{{ url('contact_us') }}">Contact Us</a></li>
                <li><a href="{{ url('shop') }}">Shop</a></li>
                <li><a href="{{ url('login') }}">Account</a></li>
                <li><a href="{{ url('cart') }}">Cart</a></li>
            </ul>
        </nav>
    </header>

    <!-- Search Bar -->
    <section class="search-section">
        <form id="search-form" onsubmit="handleSearch(event)">
            <input type="text" placeholder="Search" id="search-bar" class="search-bar">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </section>

    <main class="Categories-section">
        <aside class="sidebar">
            <h2>Featured</h2>
            <ul>
                <li><a href="{{ url('shirts') }}">Shirts</a></li>
                <li><a href="{{ url('pants') }}">Pants</a></li>
                <li><a href="{{ url('shorts') }}">Shorts</a></li>
                <li><a href="{{ url('shoes') }}">Shoes</a></li>
                <li><a href="{{ url('accessories') }}">Accessories</a></li>
            </ul>
        </aside>

        <section class="product-grid">
            @php
                $accessories = [
                    ["name" => "Lifting Belt", "image" => "accessories-Liftingbelt(main).webp", "price" => "£69.99"],
                    ["name" => "Bucket Hat", "image" => "accessories-Buckethat.webp", "price" => "£69.99"],
                    ["name" => "Head Band", "image" => "accessories-Headband.webp", "price" => "£69.99"],
                    ["name" => "Back Pack", "image" => "accessories-raining_backpack.webp", "price" => "£69.99"],
                ];
            @endphp

            @foreach ($accessories as $item)
                <div class="product-card">
                    <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    <h3>{{ $item['name'] }}</h3>
                    <p class="price">{{ $item['price'] }}</p>
                    <button class="buy-btn" onclick="location.href='#'">View</button>
                </div>
            @endforeach
        </section>

        <script src="{{ asset('js/search.js') }}"></script>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="socials">
                <p>FOLLOW US ON SOCIALS</p>
                <div class="social-links">
                    <a href="#"><img src="{{ asset('images/facebook-logo.png') }}" alt="Facebook"></a>
                    <a href="#"><img src="{{ asset('images/twitter-logo.png') }}" alt="Twitter"></a>
                    <a href="#"><img src="{{ asset('images/instagram-logo.png') }}" alt="Instagram"></a>
                </div>
            </div>
            <div class="newsletter">
                <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <form>
                    <input type="email" placeholder="Enter Email Address" required>
                    <button type="submit">Join</button>
                </form>
                <p>&copy; 2024 Astonic Sports. All Rights Reserved.</p>
            </div>
            <div class="footer-nav">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('about_us') }}">About Us</a></li>
                    <li><a href="{{ url('contact_us') }}">Contact Us</a></li>
                    <li><a href="{{ url('shop') }}">Shop</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
