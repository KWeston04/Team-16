<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes - Astonic Sports</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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

    <!-- Main Section -->
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

        <!-- Product Grid -->
        <section class="product-grid">
            @php
                $products = [
                    ["name" => "AirMax", "price" => "£69.99", "image" => "Shoes-Airmax(main).jpg", "link" => "#"],
                    ["name" => "Court Nature", "price" => "£69.99", "image" => "shoes-Courtnature.webp", "link" => "#"],
                    ["name" => "Jordan (White)", "price" => "£69.99", "image" => "shoes-Jordan(white).webp", "link" => "#"],
                    ["name" => "Jordan", "price" => "£69.99", "image" => "shoes-Jordan.webp", "link" => "#"],
                    ["name" => "Nature", "price" => "£69.99", "image" => "shoes-Nature.webp", "link" => "#"],
                    ["name" => "Vortex Runner", "price" => "£69.99", "image" => "shoes-Vortex_Runner_main.webp", "link" => "#"],
                    ["name" => "Slides (Navy)", "price" => "£69.99", "image" => "shoes-Navyslides.webp", "link" => "#"],
                    ["name" => "Slides", "price" => "£69.99", "image" => "shoes-Slides.webp", "link" => "#"],
                ];
            @endphp

            @foreach ($products as $product)
            <div class="product-card">
                <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}">
                <h3>{{ $product['name'] }}</h3>
                <p class="price">{{ $product['price'] }}</p>
                <button class="buy-btn" onclick="location.href='{{ url($product['link']) }}'">View</button>
            </div>
            @endforeach
        </section>

        <script src="{{ asset('js/search.js') }}"></script>
    </main>
</body>

</html>
