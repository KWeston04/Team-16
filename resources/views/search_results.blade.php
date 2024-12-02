<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{asset('css/shopping.css')}}">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="about_us.html"><img src="Astonic Sports.webp" alt="Astonic Sports Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="Home.html">Home</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="product_listing.html">Shop</a></li>
            </ul>
        </nav>
    </header>

    <section class="best-sellers">
        <h2>Search Results</h2>
        <div id="results-container" class="best-sellers-grid"></div>
    </section>

    <script src="{{asset('js/shopping.js')}}"></script>
</body>

</html>
