@extends('layouts.master')

@section('title', 'Pants - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('css/shopping.css')}}">
@endsection

@section('content')

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
                    ["name" => "Cargo Pants", "price" => "£19.99", "image" => "pants-Cargo(main).webp", "link" => "product/cargo_pants"],
                    ["name" => "Jogging Pants", "price" => "£29.99", "image" => "pants-joggingpants.webp", "link" => "product/jogging_pants"],
                    ["name" => "Strike Pants", "price" => "£29.99", "image" => "pants-Strikepants.webp", "link" => "product/strike_pants"],
                    ["name" => "Tapered-Fit Jogger Pants", "price" => "£29.99", "image" => "pants-Tapered_Fit_Jogger_Pants.webp", "link" => "product/tapered_fit_jogger"],
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
@endsection