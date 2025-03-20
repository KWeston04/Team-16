@extends('layouts.master')
@section('title', 'Astonic Sports | Unleash your potential')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/Style_AstonicSports_Home_JB.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Montserrat:wght@400;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #B11226;
            --primary-hover: #8e0e1f;
            --accent: #B11226;
            --accent-hover: #8e0e1f;
            --athletic-font: 'Anton', sans-serif;
            --card-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            --transition-normal: 0.3s ease;
        }


        .hero-slider {
            position: relative;
            height: 90vh;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1s ease, visibility 1s ease;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.5) 30%, rgba(0, 0, 0, 0.3) 100%);
            z-index: 1;
        }

        .hero-slide-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }

        .hero-slider .hero-content {
            position: absolute;
            bottom: 15%;
            left: 8%;
            z-index: 2;
            color: white;
            max-width: 650px;
            animation: fadeInUp 1.2s var(--transition-normal);
        }

        /* Hero Navigation */
        .hero-nav {
            position: absolute;
            bottom: 5%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            z-index: 10;
        }

        .hero-nav-prev,
        .hero-nav-next {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hero-nav-prev:hover,
        .hero-nav-next:hover {
            background: white;
            color: var(--primary);
            transform: scale(1.1);
        }

        .hero-dots {
            display: flex;
            gap: 0.8rem;
        }

        .hero-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hero-dot.active {
            background: white;
            transform: scale(1.2);
        }


        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content h1 {
            font-family: var(--athletic-font);
            font-size: 7.8rem;
            line-height: 0.82;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .just-in-tag {
            display: inline-block;
            font-size: 1rem;
            font-weight: 600;
            background-color: var(--primary);
            padding: 0.3rem 1rem;
            border-radius: 2px;
            margin-bottom: 0.8rem;
            letter-spacing: 2px;
        }

        .slogan {
            font-size: 1.3rem;
            font-weight: 600;
            letter-spacing: 2.5px;
            margin-bottom: 2.5rem;
        }

        .shop-btn {
            padding: 1.1rem 3.2rem;
            border-radius: 4px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            margin-top: 1.5rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            background: white;
            color: #121212;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .shop-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(177, 18, 38, 0.45);
        }

        .shop-btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
            margin-left: 1rem;
        }

        .shop-btn-outline:hover {
            background: white;
            color: var(--primary);
        }


        .shipping-banner {
            background: linear-gradient(to right, var(--primary), var(--primary-hover));
            padding: 1rem 0;
        }

        .banner-scroll {
            font-size: 1.05rem;
        }

        .collection-grid .grid-item:first-child .image-placeholder {
            background-image: url('{{ asset('images/mbappe.jpg') }}') !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: transform 0.6s ease;
        }


        .collection-grid .grid-item:last-child .image-placeholder {
            background-image: url('{{ asset('images/neymar.jpg') }}') !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: transform 0.6s ease;
        }

        /* Enhanced overlay for Mbappé image */
        .collection-grid .grid-item:first-child .image-placeholder::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,
                    rgba(177, 18, 38, 0.4),
                    rgba(0, 0, 0, 0.75));
            z-index: 1;
        }

        .collection-grid .grid-item:last-child .image-placeholder::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,
                    rgba(255, 87, 34, 0.4),
                    rgba(0, 0, 0, 0.75));
            z-index: 1;
        }


        .grid-item {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .grid-item:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }

        .grid-item:hover .image-placeholder {
            transform: scale(1.08);
        }


        .grid-item .content {
            bottom: 2.8rem;
            left: 2.8rem;
            text-shadow: 0 3px 6px rgba(0, 0, 0, 0.5);
            transition: transform 0.4s var(--transition-normal);
        }

        .grid-item:hover .content {
            transform: translateY(-15px);
        }


        .grid-item h2 {
            font-size: 3rem;
            font-weight: 800;
            font-family: var(--athletic-font);
            margin-bottom: 1.8rem;
            padding-bottom: 0.8rem;
        }

        .grid-item h2::after {
            width: 70px;
            height: 5px;
            border-radius: 3px;
        }


        .collection-grid .grid-item:first-child h2::after {
            background: var(--primary);
        }


        .explore-btn {
            padding: 0.9rem 2.2rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }


        .collection-grid .grid-item:first-child .explore-btn:hover {
            background: var(--primary);
            color: white;
            transform: skewX(-15deg) translateY(-5px);
            box-shadow: 0 10px 25px rgba(177, 18, 38, 0.5);
        }

        .collection-grid .grid-item:last-child .explore-btn:hover {
            background: #FF5722;
            color: white;
            transform: skewX(-15deg) translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.5);
        }


        .product-card {
            position: relative;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: visible;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-shadow);
        }

        .product-card:hover .image-placeholder {
            transform: scale(1.08);
        }

        /* Enhanced "New" badge */
        .product-card::before {
            content: 'NEW';
            position: absolute;
            top: 12px;
            right: 12px;
            padding: 0.3rem 0.9rem;
            border-radius: 3px;
            font-weight: 700;
            letter-spacing: 1.2px;
            background: var(--primary);
            color: white;
            font-size: 0.7rem;
            z-index: 2;
            box-shadow: 0 3px 8px rgba(177, 18, 38, 0.3);
        }


        .product-wishlist-btn {
            position: absolute;
            top: 12px;
            left: 12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
            z-index: 10;
            color: #666;
            opacity: 0;
            transform: translateY(10px);
        }

        .product-card:hover .product-wishlist-btn {
            opacity: 1;
            transform: translateY(0);
        }

        .product-wishlist-btn:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1) !important;
        }

        .product-wishlist-btn.active {
            background: var(--primary);
            color: white;
        }


        .product-info h3 {
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .product-info p {
            font-size: 1.15rem;
        }

        /* Enhanced add to cart button */
        .add-to-cart-btn {
            width: 100%;
            padding: 0.9rem 0;
            background: var(--primary);
            color: white;
            font-weight: 600;
            letter-spacing: 1.2px;
            border: none;
            font-family: var(--heading-font);
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .add-to-cart-btn:hover {
            background: var(--primary-hover);
        }

        .add-to-cart-btn.added {
            background-color: var(--success);
        }

        /* Notification */
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
            background-color: white;
            color: var(--text-primary);
            padding: 12px 20px;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s, transform 0.3s;
            font-weight: 500;
            min-width: 280px;
            border-left: 4px solid var(--primary);
        }

        /* Wishlist specific styles */
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

        .wishlist-btn-container {
            position: relative;
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
            transition: all 0.3s ease;
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

        /* Responsive enhancements */
        @media (max-width: 1200px) {
            .hero-content h1 {
                font-size: 6rem;
            }

            .grid-item h2 {
                font-size: 2.4rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 4.8rem;
            }

            .grid-item h2 {
                font-size: 2.2rem;
            }

            .wishlist-dropdown,
            .cart-dropdown {
                width: 300px;
                right: -50px;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 3.8rem;
            }

            .hero-slider {
                height: 80vh;
            }

            .shop-btn {
                padding: 0.9rem 2.2rem;
            }

            .grid-item h2 {
                font-size: 1.9rem;
            }

            .explore-btn {
                padding: 0.8rem 1.8rem;
            }
        }
    </style>
@endsection

@section('content')
    <section class="hero-slider">
        <div class="hero-slide active">
            <div class="hero-slide-bg" style="background-image: url('{{ asset('images/HeroImage1.jpg') }}');"></div>
            <div class="hero-content">
                <div class="just-in-tag">JUST IN</div>
                <h1>UNLEASH YOUR POTENTIAL</h1>
                <div class="slogan">EXPERIENCE AN UNREAL SENSATION OF MOVEMENT.</div>
                <div>
                    <a href="{{ url('/shop') }}" class="shop-btn">SHOP ALL</a>
                </div>
            </div>
        </div>

        <div class="hero-slide">
            <div class="hero-slide-bg" style="background-image: url('{{ asset('images/elitecollectionheroimage.jpg') }}');">
            </div>
            <div class="hero-content">
                <div class="just-in-tag">ELITE ATHLETES</div>
                <h1>PERFORMANCE DRIVEN</h1>
                <div class="slogan">EQUIPMENT TRUSTED BY WORLD-CLASS ATHLETES.</div>
                <div>
                    <a href="{{ url('/shop') }}" class="shop-btn">SHOP COLLECTION</a>
                </div>
            </div>
        </div>

        <div class="hero-slide">
            <div class="hero-slide-bg" style="background-image: url('{{ asset('images/FootballHeroImage.jpg') }}');"></div>
            <div class="hero-content">
                <div class="just-in-tag">FOOTBALL GEAR</div>
                <h1>DOMINATE THE FIELD</h1>
                <div class="slogan">PRECISION ENGINEERED FOR THE BEAUTIFUL GAME.</div>
                <div>
                    <a href="{{ url('/shop') }}" class="shop-btn">SHOP FOOTBALL</a>
                </div>
            </div>
        </div>

        <div class="hero-nav">
            <button class="hero-nav-prev" aria-label="Previous slide">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="hero-dots">
                <button class="hero-dot active" aria-label="Go to slide 1"></button>
                <button class="hero-dot" aria-label="Go to slide 2"></button>
                <button class="hero-dot" aria-label="Go to slide 3"></button>
            </div>
            <button class="hero-nav-next" aria-label="Next slide">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>
    <div class="shipping-banner">
        <div class="banner-scroll">
            <span>USE CODE ASTONIC25 FOR 10% DISCOUNT AT CHECKOUT</span>
            <span style="margin: 0 20px;">•</span>
            <span>FREE SHIPPING ON ORDERS OVER £75</span>
            <span style="margin: 0 20px;">•</span>
            <span>EASY 30-DAY RETURNS</span>
        </div>
    </div>

    <section class="new-releases">
        <h2>New Releases</h2>
        <div class="product-grid">
            <div class="product-card">
                <button class="product-wishlist-btn" aria-label="Add to wishlist" data-name="Performance T-Shirt"
                    data-price="£45.00" data-image="{{ asset('images/Astonic_Performance_Shirt.webp') }}">
                    <i class="far fa-heart"></i>
                </button>
                <div class="image-placeholder"
                    style="background-image: url('{{ asset('images/Astonic_Performance_Shirt.webp') }}');"
                    data-image="{{ asset('images/Astonic_Performance_Shirt.webp') }}"></div>
                <div class="product-info">
                    <h3>Performance T-Shirt</h3>
                    <p>£45.00</p>
                    <span class="color-options">3 colors</span>
                </div>
                <button class="add-to-cart-btn">ADD TO CART</button>
            </div>

            <div class="product-card">
                <button class="product-wishlist-btn" aria-label="Add to wishlist" data-name="Training Joggers"
                    data-price="£55.00" data-image="{{ asset('images/Astonic_Training_Joggers.webp') }}">
                    <i class="far fa-heart"></i>
                </button>
                <div class="image-placeholder"
                    style="background-image: url('{{ asset('images/Astonic_Training_Joggers.webp') }}');"
                    data-image="{{ asset('images/Astonic_Training_Joggers.webp') }}"></div>
                <div class="product-info">
                    <h3>Training Joggers</h3>
                    <p>£55.00</p>
                    <span class="color-options">3 colors</span>
                </div>
                <button class="add-to-cart-btn">ADD TO CART</button>
            </div>

            <div class="product-card">
                <button class="product-wishlist-btn" aria-label="Add to wishlist" data-name="Tech Hoodie"
                    data-price="£60.00" data-image="{{ asset('images/Astonic_tech_Hoodie.webp') }}">
                    <i class="far fa-heart"></i>
                </button>
                <div class="image-placeholder"
                    style="background-image: url('{{ asset('images/Astonic_tech_Hoodie.webp') }}');"
                    data-image="{{ asset('images/Astonic_tech_Hoodie.webp') }}"></div>
                <div class="product-info">
                    <h3>Tech Hoodie</h3>
                    <p>£60.00</p>
                    <span class="color-options">3 colors</span>
                </div>
                <button class="add-to-cart-btn">ADD TO CART</button>
            </div>

            <div class="product-card">
                <button class="product-wishlist-btn" aria-label="Add to wishlist" data-name="Performance Shorts"
                    data-price="£42.00" data-image="{{ asset('images/Astonic_Performance_Shorts.webp') }}">
                    <i class="far fa-heart"></i>
                </button>
                <div class="image-placeholder"
                    style="background-image: url('{{ asset('images/Astonic_Performance_Shorts.webp') }}');"
                    data-image="{{ asset('images/Astonic_Performance_Shorts.webp') }}"></div>
                <div class="product-info">
                    <h3>Performance Shorts</h3>
                    <p>£42.00</p>
                    <span class="color-options">3 colors</span>
                </div>
                <button class="add-to-cart-btn">ADD TO CART</button>
            </div>

            <div class="product-card">
                <button class="product-wishlist-btn" aria-label="Add to wishlist" data-name="Compression Shirt"
                    data-price="£48.00" data-image="{{ asset('images/Astonic_Compression_Shirt.webp') }}">
                    <i class="far fa-heart"></i>
                </button>
                <div class="image-placeholder"
                    style="background-image: url('{{ asset('images/Astonic_Compression_Shirt.webp') }}');"
                    data-image="{{ asset('images/Astonic_Compression_Shirt.webp') }}"></div>
                <div class="product-info">
                    <h3>Compression Shirt</h3>
                    <p>£48.00</p>
                    <span class="color-options">3 colors</span>
                </div>
                <button class="add-to-cart-btn">ADD TO CART</button>
            </div>

            <div class="product-card">
                <button class="product-wishlist-btn" aria-label="Add to wishlist" data-name="Sports Tank Top"
                    data-price="£38.00" data-image="{{ asset('images/Astonic_Tank_Top.webp') }}">
                    <i class="far fa-heart"></i>
                </button>
                <div class="image-placeholder" style="background-image: url('{{ asset('images/Astonic_Tank_Top.webp') }}');"
                    data-image="{{ asset('images/Astonic_Tank_Top.webp') }}"></div>
                <div class="product-info">
                    <h3>Sports Tank Top</h3>
                    <p>£38.00</p>
                    <span class="color-options">3 colors</span>
                </div>
                <button class="add-to-cart-btn">ADD TO CART</button>
            </div>
        </div>
    </section>


    <section class="collection-grid">
        <div class="grid-item">
            <div class="image-placeholder"></div>
            <div class="content">
                <h2>PERFORMANCE WEAR</h2>
                <a href="{{ url('/shop') }}?category=performance" class="explore-btn">EXPLORE</a>
            </div>
        </div>

        <div class="grid-item">
            <div class="image-placeholder"></div>
            <div class="content">
                <h2>FOOTBALL COLLECTION</h2>
                <a href="{{ url('/shop') }}?category=football" class="explore-btn">EXPLORE</a>
            </div>
        </div>
    </section>
@endsection

@section('page-specific-js')
    <script src="{{ asset('js/EnhancedHome.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Check if EnhancedHome.js has been loaded properly
            if (typeof window.initWishlist !== 'function') {
                console.warn('EnhancedHome.js not loaded correctly, adding fallback initialization');


                const createWishlistElements = function () {
                    const wishlistBtn = document.querySelector('.wishlist-btn');
                    if (!wishlistBtn) return;


                    const parent = wishlistBtn.parentElement;


                    let wishlistContainer;
                    if (parent.classList.contains('wishlist-btn-container')) {
                        wishlistContainer = parent;
                    } else {

                        wishlistContainer = document.createElement('div');
                        wishlistContainer.className = 'wishlist-btn-container';


                        parent.insertBefore(wishlistContainer, wishlistBtn);
                        wishlistContainer.appendChild(wishlistBtn);
                    }


                    if (!wishlistBtn.querySelector('.wishlist-count')) {
                        const wishlistCount = document.createElement('span');
                        wishlistCount.className = 'wishlist-count';
                        wishlistCount.style.display = 'none';
                        wishlistCount.textContent = '0';
                        wishlistBtn.appendChild(wishlistCount);
                    }

                    if (!wishlistContainer.querySelector('.wishlist-dropdown')) {
                        const wishlistDropdown = document.createElement('div');
                        wishlistDropdown.className = 'wishlist-dropdown';
                        wishlistDropdown.innerHTML = `
                                <h3>My Wishlist</h3>
                                <div id="wishlist-items-container">
                                    <div class="empty-wishlist">Your wishlist is empty</div>
                                </div>
                                <div class="wishlist-buttons">
                                    <a href="/wishlist" class="wishlist-button view-wishlist-btn">View Wishlist</a>
                                </div>
                            `;

                        // Add to container
                        wishlistContainer.appendChild(wishlistDropdown);
                    }


                    setupWishlistEvents();
                };

                // Setup wishlist event handlers
                const setupWishlistEvents = function () {
                    const wishlistBtn = document.querySelector('.wishlist-btn');
                    const wishlistDropdown = document.querySelector('.wishlist-dropdown');

                    if (wishlistBtn && wishlistDropdown) {

                        wishlistBtn.addEventListener('click', function (e) {
                            if (window.innerWidth < 992) {
                                e.preventDefault();
                                wishlistDropdown.classList.toggle('show');


                                const cartDropdown = document.querySelector('.cart-dropdown');
                                if (cartDropdown && cartDropdown.classList.contains('show')) {
                                    cartDropdown.classList.remove('show');
                                }
                            }
                        });
                    }


                    document.querySelectorAll('.product-wishlist-btn').forEach(button => {
                        if (!button.getAttribute('data-setup')) {
                            button.setAttribute('data-setup', 'true');

                            button.addEventListener('click', function (e) {
                                e.preventDefault();
                                e.stopPropagation();


                                this.classList.toggle('active');

                                if (this.classList.contains('active')) {
                                    this.innerHTML = '<i class="fas fa-heart"></i>';

                                    showNotification(`${this.getAttribute('data-name')} added to wishlist`, 'success');
                                } else {
                                    this.innerHTML = '<i class="far fa-heart"></i>';

                                    showNotification(`${this.getAttribute('data-name')} removed from wishlist`, 'info');
                                }
                            });
                        }
                    });
                };


                if (typeof window.showNotification !== 'function') {
                    window.showNotification = function (message, type = 'info') {

                        let container = document.querySelector('.notification-container');
                        if (!container) {
                            container = document.createElement('div');
                            container.className = 'notification-container';
                            document.body.appendChild(container);
                        }


                        const notification = document.createElement('div');
                        notification.className = 'notification';
                        notification.textContent = message;


                        container.appendChild(notification);


                        setTimeout(() => {
                            notification.style.opacity = '1';
                            notification.style.transform = 'translateY(0)';
                        }, 10);


                        setTimeout(() => {
                            notification.style.opacity = '0';
                            notification.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                notification.remove();
                            }, 300);
                        }, 3000);
                    };
                }


                createWishlistElements();
            }
        });
    </script>
@endsection