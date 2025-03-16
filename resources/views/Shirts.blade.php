<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shirts - Astonic Sports</title>
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
                    ["name" => "Sweat Hoodie", "price" => "£29.99", "image" => "shirts-Hoodie(main).webp", "link" => "sweat_hoodie_mens"],
                    ["name" => "Away Football Shirts", "price" => "£39.99", "image" => "shirt-Awayfoortball(main).webp", "link" => "Away_Football_Shirt"],
                    ["name" => "Training T-Shirts", "price" => "£19.99", "image" => "shirts-Training_Shirts.webp", "link" => "#"],
                    ["name" => "Compression Top", "price" => "£39.99", "image" => "shirts-compressiontop(main).webp", "link" => "#"],
                    ["name" => "Home Football Shirts", "price" => "£39.99", "image" => "shirts-Homefootballshirt(main).webp", "link" => "#"],
                    ["name" => "Half-Zip Running Pullover", "price" => "£29.99", "image" => "shirts-Halfziprunningpullover(main).webp", "link" => "#"],
                    ["name" => "TankTop", "price" => "£29.99", "image" => "shirts-Tanktop.webp", "link" => "#"],
                    ["name" => "Wind Runner Jacket", "price" => "£59.99", "image" => "shirts-Windrunner_Jacket.webp", "link" => "#"],
                    ["name" => "Wind Breaker Jacket", "price" => "£59.99", "image" => "shirts-windbreaker(side).webp", "link" => "#"],
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

    <style>
        .Categories-section {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, black, black);
            padding: 25px;
            height: 100vh;
            position: sticky;
            top: 0;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
            color: white;
            transition: all 0.3s ease-in-out;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            letter-spacing: 1px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 10px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
            transition: transform 0.2s ease-in-out;
        }

        .sidebar ul li:hover {
            transform: translateX(10px);
        }

        .sidebar ul li a {
            display: block;
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: 500;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar ul li a:hover {
            background: rgba(255, 255, 255, 0.3);
            color: skyblue;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            flex-grow: 1;
        }

        .product-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</body>

</html>
