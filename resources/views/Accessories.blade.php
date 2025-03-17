@extends('layouts.master')

@section('title', 'Accessories - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endsection

@section('content')

    <!-- Search Bar -->
    <section class="search-section">
        <form id="search-form" onsubmit="handleSearch(event)">
            <input type="text" placeholder="Search" id="search-bar" class="search-bar">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </section>

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

        <section class="product-grid">
            @php
                $accessories = [
                    ['name' => 'Lifting Belt', 'image' => 'accessories-Liftingbelt(main).webp', 'price' => '£69.99'],
                    ['name' => 'Bucket Hat', 'image' => 'accessories-Buckethat.webp', 'price' => '£69.99'],
                    ['name' => 'Head Band', 'image' => 'accessories-Headband.webp', 'price' => '£69.99'],
                    ['name' => 'Back Pack', 'image' => 'accessories-raining_backpack.webp', 'price' => '£69.99'],
                ];
            @endphp

            @foreach ($accessories as $item)
                <div class="product-card">
                    <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    <h3>{{ $item['name'] }}</h3>
                    <p class="price">{{ $item['price'] }}</p>
                    <button class="buy-btn" onclick="location.href='#'">View</button>
                </div>
            @endforeach
        </section>


    </main>

@endsection
@section('page-specific-js')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
