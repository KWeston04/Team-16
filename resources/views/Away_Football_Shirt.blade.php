<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Away Football Shirt - Astonic Sports</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .product-gallery {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }
        .thumbnails {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .thumbnail {
            width: 80px;
            height: auto;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .product-image img {
            width: 600px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="{{ url('home') }}">
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

    <main>
        <section class="product-detail">
            <div class="product-gallery">
                <div class="thumbnails">
                    <img src="{{ asset('images/shirt-Awayfootball(main).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 1">
                    <img src="{{ asset('images/shirt-Awayfootball(side).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 2">
                    <img src="{{ asset('images/shirt-Awayfootball(back).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 3">
                    <img src="{{ asset('images/shirt-Awayfootball(stadium).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 4">
                </div>
                <div class="product-image">
                    <img id="mainImage" src="{{ asset('images/shirt-Awayfootball(main).webp') }}" alt="Away Football Shirt">
                </div>
            </div>
            <div class="product-info">
                <h1>Away Football Shirt</h1>
                <p class="price">£120.00</p>
                <p class="description">
                    (fill the detail of product pls)
                </p>
                <ul class="features">
                    <li>(fill the detail of product pls)</li>
                    <li>(fill the detail of product pls)</li>
                    <li>(fill the detail of product pls)</li>
                </ul>
                <div class="purchase-options">
                    <label for="size">Size:</label>
                    <select id="size">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        <option value="XXXL">XXXL</option>
                    </select>
                    <label for="quantity">Qty:</label>
                    <select id="quantity">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
                <div class="reviews">
                    <h2>Reviews</h2> 
                    <div class="review">
                        <h4>John C.</h4>
                        <p>★★★★★ - Bla Bla.</p>
                    </div>
                    <div class="review">
                        <h4>Chris B.</h4>
                        <p>★★★★☆ - Bla Bla.</p>
                    </div>
                    <div class="review">
                        <h4>Ronnie C.</h4>
                        <p>★★★★★ - Bla Bla.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="socials">
                <p>FOLLOW US ON SOCIALS</p>
                <br>
                <div class="social-links">
                    <a href="#"><img src="{{ asset('images/facebook-logo.png') }}" alt="Facebook"></a>
                    <a href="#"><img src="{{ asset('images/twitter-logo.png') }}" alt="Twitter"></a>
                    <a href="#"><img src="{{ asset('images/instagram-logo.png') }}" alt="Instagram"></a>
                </div>
            </div>

            <div class="newsletter">
                <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <p>Sign up for the latest updates on product releases & discounts!</p>
                <form action="email">
                    <input value="" name="EMAIL" class="email" id="footer-EMAIL" placeholder="Enter Email Address" required="" type="email">
                    <br><br>
                    <input value="Join" class="button" type="submit">
                </form>
                <p>&copy; 2024 Astonic Sports. All Rights Reserved.</p>
            </div>

            <div class="footer-nav">
                <ul>
                    <li><a href="{{ url('home') }}">Home</a></li>
                    <li><a href="{{ url('about_us') }}">About Us</a></li>
                    <li><a href="{{ url('contact_us') }}">Contact Us</a></li>
                    <li><a href="{{ url('shop') }}">Shop</a></li>
                    <li><a href="{{ url('login') }}">Account</a></li>
                    <li><a href="{{ url('cart') }}">Cart</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
        }
    </script>
</body>

</html>
