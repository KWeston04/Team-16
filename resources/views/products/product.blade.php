@extends('layouts.master')

@section('title', $product->name . ' - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endsection

@section('content')

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

<main>
    <section class="product-detail">
        <div class="product-gallery">
            <!-- Thumbnail Images -->
            <div class="thumbnails">
                @php
                    // Decode additional_images correctly
                    $images = is_string($product->additional_images) ? json_decode($product->additional_images, true) : $product->additional_images;
                    $images = is_array($images) ? $images : []; // Ensure it's an array

                    // Function to fix image paths
                    function fixImagePath($image) {
                        return str_starts_with($image, 'images/') ? asset($image) : asset('images/' . $image);
                    }
                @endphp

                <!-- Main Product Image -->
                <img src="{{ fixImagePath($product->image_url) }}" class="thumbnail" onclick="changeImage(this)" alt="{{ $product->name }}">

                <!-- Additional Images -->
                @foreach ($images as $image)
                    <img src="{{ fixImagePath($image) }}" class="thumbnail" onclick="changeImage(this)" alt="{{ $product->name }}">
                @endforeach
            </div>

            <!-- Main Display Image -->
            <div class="product-image">
                <img id="mainImage" src="{{ fixImagePath($product->image_url) }}" alt="{{ $product->name }}">
            </div>
        </div>

        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <p class="price">£{{ number_format($product->price, 2) }}</p>
            <p class="description">{{ $product->description }}</p>
            <ul class="features">
                <li>Lightweight and durable material</li>
                <li>Available in multiple sizes and colors</li>
                <li>Perfect for sports and casual wear</li>
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
                </select>
                <label for="quantity">Qty:</label>
                <select id="quantity">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>

            <!-- Reviews Section -->
            <div class="reviews">
                <h2>Reviews</h2>
                @php
                    $reviews = $product->reviews ?? [
                        ["name" => "Anonymous", "rating" => "★★★★☆", "comment" => "Great product, loved the quality!"],
                        ["name" => "Customer", "rating" => "★★★★★", "comment" => "Definitely buying again!"]
                    ];
                @endphp
                @foreach ($reviews as $review)
                    <div class="review">
                        <h4>{{ $review['name'] }}</h4>
                        <p>{{ $review['rating'] }} - {{ $review['comment'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<script>
    function changeImage(element) {
        document.getElementById('mainImage').src = element.src;
    }
</script>

@endsection
