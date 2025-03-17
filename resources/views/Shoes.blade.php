@extends('layouts.master')

@section('title', 'Shoes - Astonic Sports')

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
                    ["name" => "AirMax", "price" => "£69.99", "image" => "Shoes-Airmax(main).jpg", "link" => "#"],
                    ["name" => "Court Nature", "price" => "£69.99", "image" => "shoes-Courtnature.webp", "link" => "#"],
                    ["name" => "Jordan (White)", "price" => "£69.99", "image" => "shoes-Jordan(white).webp", "link" => "#"],
                    ["name" => "Jordan", "price" => "£69.99", "image" => "shoes-Jordan.webp", "link" => "#"],
                    ["name" => "Nature", "price" => "£69.99", "image" => "shoes-Nature.webp", "link" => "#"],
                    ["name" => "Vortex Runner", "price" => "£69.99", "image" => "shoes-Vortex_Runner_main.webp", "link" => "#"],
                    ["name" => "Slides (Navy)", "price" => "£69.99", "image" => "shoes-Navyslides.webp", "link" => "#"],
                    ["name" => "Slides", "price" => "£69.99", "image" => "shoes-Slides.webp", "link" => "#"],
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