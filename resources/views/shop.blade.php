<!-- resources/views/shop.blade.php -->
@extends('layouts.master')

@section('title', 'Shop - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('css/shopping.css')}}">
@endsection

@section('content')
    <!--*****************-->
    <header class="header">
        <div class="logo">Astonic Sports</div>
    </header>


    <!-- Ibraheem's--***************-->
   <!-- Discount Banner -->
   <header>
        <div class="discount">
            <div class="text-container">
                @for ($i = 0; $i < 20; $i++)
                    <span>USE CODE <span class="highlight">ASTONIC24</span> FOR 5% DISCOUNT AT CHECKOUT!</span>
                @endfor
            </div>
        </div>
    </header>

    <!-- Search Section -->
    <section class="search-section">
        <form id="search-form" onsubmit="handleSearch(event)">
            <input type="text" placeholder="Search" id="search-bar" class="search-bar">
            <button type="submit" class="search-btn">Search</button>
            <p id="error-message" class="error-message hidden">Please enter a search term.</p>
        </form>
     </section>
    
    <!-- Categories Section -->
    <section class="categories">
        <div class="dropdown">
            <button class="category-btn dropdown-btn">New and Featured</button>
            <div id="mens-subcategories" class="dropdown-menu">
                <a href="{{ url('shirts') }}">Shirts</a>
                <a href="{{ url('pants') }}">Pants</a>
                <a href="{{ url('shorts') }}">Shorts</a>
                <a href="{{ url('shoes') }}">Shoes</a>
                <a href="{{ url('accessories') }}">Accessories</a>
            </div>
        </div>
    </section>

    <!-- Banner Section -->
    <section class="banner">
        <video autoplay loop muted playsinline class="banner-video">
            <source src="{{ asset('videos/Astonic_stadium_scene.mp4') }}" type="video/mp4">
        </video>

        <div class="banner-content">
            <h2>Our Biggest Sales</h2>
            <p>End of Year Sales are On Now!</p>
            <button class="Check-it-out">Shop Now</button>
        </div>
    </section>

    <!-- Best Sellers Section -->
    <section class="best-sellers">
        <h2 class="section-title">Best Sellers</h2>
        <p class="section-subtitle">Discover our best products loved by our customers</p>
        <div class="best-sellers-grid">
            <div class="product-card">
                <img src="{{ asset('images/shoes-Vortex_Runner_main.webp') }}" alt="Vortex Runner">
                <h3>Vortex Runner</h3>
                <p class="price">£120.00</p>
                <button class="buy-btn" onclick="location.href='{{ url('vortex_runner') }}'">View</button>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/shirts-Hoodie(main).webp') }}" alt="Sweat Hoodie Mens">
                <h3>Sweat Hoodie Mens</h3>
                <p class="price">£29.99</p>
                <button class="buy-btn" onclick="location.href='{{ url('sweat_hoodie_mens') }}'">View</button>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/shirt-Awayfootball(main).webp') }}" alt="Away Football Shirt">
                <h3>Away Football Shirt</h3>
                <p class="price">£39.99</p>
                <button class="buy-btn" onclick="location.href='{{ url('away_football_shirt') }}'">View</button>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/shorts-awayfootball(main).webp') }}" alt="Away Football Shorts">
                <h3>Away Football Shorts</h3>
                <p class="price">£19.99</p>
                <button class="buy-btn" onclick="location.href='{{ url('away_football_shorts') }}'">View</button>
            </div>
        </div>
    </section>
@endsection

@section('page-specific-js')
    <!--******************-->
    <script src="{{asset('js/shopping.js')}}"></script>
    <script src="{{asset('js/search.js')}}"></script>
@endsection