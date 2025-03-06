<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astonic Sports</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000;
            padding: 20px 50px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo img {
            height: 50px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .nav-links a:hover {
            color: #FFD700;
        }

        .hero-section {
            position: relative;
            width: 100%;
            height: 80vh;
            overflow: hidden;
        }

        .hero-section video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .content-section {
            max-width: 1200px;
            margin: auto;
            padding: 80px 20px;
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .content-section img {
            width: 50%;
            border-radius: 10px;
        }

        .content-text {
            width: 50%;
        }

        .content-text h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .content-text p {
            font-size: 18px;
            line-height: 1.6;
        }

        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 40px 20px;
            margin-top: 50px;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            align-items: center;
        }

        .footer-nav ul {
            list-style: none;
            padding: 0;
        }

        .footer-nav li {
            margin: 10px 0;
        }

        .footer-nav a {
            color: #e0e1dd;
            text-decoration: none;
            font-size: 16px;
        }

        .footer-nav a:hover {
            color: #5dade2;
        }
    </style>
</head>
<body> 
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="About.html">
                    <img src="{{ asset('images/Astonic Sports Logo.png') }}" alt="Astonic Sports Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/account">Account</a></li>
                <li><a href="/cart">Cart</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero-section">
        <video autoplay loop muted>
            <source src="Headquarters-video.mp4" type="video/mp4">
        </video>
    
    </section>

    <section class="content-section">
        <div class="content-text">
            <h2>Our Story</h2>
            <p>Astonic Sports was founded with a vision: to blend high-performance functionality with style, creating athletic wear that active men can rely on to meet their goals, unleashing their potential whilst also wearing high quality, comfortable sportswear. We are dedicated to creating the best quality sportswear by optimising the use of cutting-edge technology, enabling our customers to exercise in comfort and style.</p>
        </div>
        <img src="Headquarters.png" alt="Our Headquarters">
    </section>

    <section class="content-section">
        <video width="600" height="350" autoplay loop muted controls>
            <source src="Customers-video.mp4" type="video/mp4">
        </video>
            <h2>Our Mission</h2>
            <p>We aim to inspire and empower men to realize their athletic potential. By bridging the latest in fabric technology with effortless style, Astonic Sports delivers apparel that meets the rigorous demands of intense workouts while staying comfortable for everyday wear. Our gear embodies the motivation, resilience, and discipline needed to reach new levels of personal excellence.</p>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <p>&copy; 2024 Astonic Sports. All Rights Reserved.</p>
            <div class="footer-nav">
                <ul>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="About.html">About Us</a></li>
                    <li><a href="Contact.html">Contact Us</a></li>
                    <li><a href="product_listing.html">Shop</a></li>
                    <li><a href="login.html">Account</a></li>
                    <li><a href="index.html">Cart</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>