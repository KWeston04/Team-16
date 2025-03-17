<?php
// search.php

// sample
$products = [
    ["name" => "Sports Shirt", "category" => "Shirts", "image" => "shirt.jpg"],
    ["name" => "Running Pants", "category" => "Pants", "image" => "pants.jpg"],
    ["name" => "Training Shorts", "category" => "Shorts", "image" => "shorts.jpg"],
    ["name" => "Running Shoes", "category" => "Shoes", "image" => "shoes.jpg"],
    ["name" => "Sports Cap", "category" => "Accessories", "image" => "cap.jpg"],
];

$search_query = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$filtered_products = [];

if ($search_query) {
    foreach ($products as $product) {
        if (strpos(strtolower($product['name']), $search_query) !== false) {
            $filtered_products[] = $product;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Astonic Sports</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
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

    <section class="search-section">
        <form id="search-form">
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

        <section class="search-results">
            <h2>Search Results</h2>
            <p class="no-results hidden">No products found.</p>
            <div id="results-container" class="product-grid"></div>
        </section>
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</body>

</html>
