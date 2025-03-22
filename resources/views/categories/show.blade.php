@extends('layouts.master')

@section('title', $category->name . ' - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endsection

@section('content')

    <!-- Search Bar -->
    <section class="search-section">
        <form id="search-form" action="{{ route('product.search') }}" method="GET">
            <input type="text" placeholder="Search for products..." name="query" id="search-bar" class="search-bar">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </section>

    <main class="Categories-section">
        <aside class="sidebar">
            <h2>Featured</h2>
            <ul>
                <li><a href="{{ route('category.show', ['id' => 1]) }}">Shirts</a></li>
                <li><a href="{{ route('category.show', ['id' => 2]) }}">Pants</a></li>
                <li><a href="{{ route('category.show', ['id' => 3]) }}">Shorts</a></li>
                <li><a href="{{ route('category.show', ['id' => 4]) }}">Shoes</a></li>
                <li><a href="{{ route('category.show', ['id' => 5]) }}">Accessories</a></li>
            </ul>
        </aside>

        <!-- Product Grid -->
        <section class="product-grid">
            <h2>{{ $category->name }}</h2>
            <div class="best-sellers-grid">
                @foreach ($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
                        <p class="price">£{{ number_format($product->price, 2) }}</p>
                        <button class="buy-btn" onclick="location.href='{{ route('product.show', ['id' => $product->product_id]) }}'">
                            View
                        </button>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

@endsection

