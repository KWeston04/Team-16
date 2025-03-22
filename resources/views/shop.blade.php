<!-- resources/views/shop.blade.php -->
@extends('layouts.master')

@section('title', 'Shop - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endsection

@section('content')
    <header class="header">
        <div class="logo">Astonic Sports</div>
    </header>

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

    @if(session('error'))
        <p class="error-message">{{ session('error') }}</p>
    @endif

    <!-- Search Section -->
    <section class="search-section">
        <form action="{{ route('product.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search for products or categories..." id="search-bar" class="search-bar" value="{{ request('query') }}">
              <button type="submit" class="search-btn">Search</button>
            </form>

    </section>


    <!-- Categories Section -->
    <section class="categories">
        <div class="dropdown">
            <button class="category-btn dropdown-btn">Browse Categories</button>
            <div id="category-menu" class="dropdown-menu">
                @foreach($categories as $category)
                    <a href="{{ route('category.show', ['id' => $category->category_id]) }}">{{ $category->name }}</a>
                @endforeach
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
            <button class="Check-it-out" onclick="location.href='{{ route('shop.index') }}'">Shop Now</button>
        </div>
    </section>

    <!-- Best Sellers Section -->
    <section class="best-sellers">
        <h2 class="section-title">Best Sellers</h2>
        <p class="section-subtitle">Discover our best products loved by our customers</p>
        <div class="best-sellers-grid">
            @foreach ($bestSellers as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p class="price">£{{ number_format($product->price, 2) }}</p>

                    <!-- Dynamically route to the product page using its ID -->
                    <button class="buy-btn" onclick="location.href='{{ route('product.show', ['id' => $product->product_id]) }}'">View</button>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('page-specific-js')
    <script src="{{ asset('js/shopping.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
