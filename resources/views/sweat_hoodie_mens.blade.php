@extends('layouts.master')

@section('title', 'Hoodie - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('css/shopping.css')}}">
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
                <div class="thumbnails">
                    @php
                        $images = [
                            "shirts-Hoodie(main).webp",
                            "shirts-Hoodie(back).webp",
                            "shirts-Hoodie(jogging).webp",
                            "shirts-Hoodie(squat).webp"
                        ];
                    @endphp
                    @foreach ($images as $image)
                        <img src="{{ asset('images/' . $image) }}" class="thumbnail" onclick="changeImage(this)" alt="Sweat Hoodie">
                    @endforeach
                </div>
                <div class="product-image">
                    <img id="mainImage" src="{{ asset('images/shirts-Hoodie(main).webp') }}" alt="Sweat Hoodie Mens">
                </div>
            </div>
            <div class="product-info">
                <h1>Sweat Hoodie</h1>
                <p class="price">£29.99</p>
                <p class="description">
                    This sweat hoodie provides extreme comfort, flexibility, and style for all-day wear.
                </p>
                <ul class="features">
                    <li>Soft and breathable fabric</li>
                    <li>Perfect for workouts and casual wear</li>
                    <li>Available in multiple colors</li>
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
                    @php
                        $reviews = [
                            ["name" => "John C.", "rating" => "★★★★★", "comment" => "Love this hoodie! Super comfortable and flexible."],
                            ["name" => "Chris B.", "rating" => "★★★★☆", "comment" => "Great quality, but we need way more bigger size too."],
                            ["name" => "Ronnie C.", "rating" => "★★★★★", "comment" => "Perfect for sweating! Provides soft texture and not even smelly."]
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