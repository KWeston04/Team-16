<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vortex Runner - Astonic Sports</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="Home.html">
                    <img src="Astonic Sports.webp" alt="Astonic Sports Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="Home.html">Home</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="product_listing.html">Shop</a></li>
                <li><a href="login.html">Account</a></li>
                <li><a href="cart.html">Cart</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="product-detail">
            <div class="product-image">
                <img src="Astonic Vortex Runner.webp" alt="Vortex Runner">
            </div>
            <div class="product-info">
                <h1>Vortex Runner</h1>
                <p class="price">£120.00</p>
                <p class="description">
                    The Vortex Runner combines style and functionality, providing unmatched comfort and support for runners.
                </p>
                <ul class="features">
                    <li>Lightweight, breathable material</li>
                    <li>Advanced sole for shock absorption</li>
                    <li>Available in multiple sizes and colors</li>
                </ul>
                <div class="purchase-options">
                    <label for="size">Size:</label>
                    <select id="size">
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <label for="quantity">Qty:</label>
                    <select id="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-nav">
                <ul>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="about_us.html">About Us</a></li>
                    <li><a href="contact_us.html">Contact Us</a></li>
                    <li><a href="product_listing.html">Shop</a></li>
                </ul>
            </div>
            <p>&copy; 2024 Astonic Sports. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
