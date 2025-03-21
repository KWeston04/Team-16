@extends('layouts.master')

@section('title', 'Away Football Shorts - Astonic Sports')

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
                    <img src="{{ asset('images/shorts-awayfootball(main).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 1">
                    <img src="{{ asset('images/shorts-awayfootball(side).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 2">
                    <img src="{{ asset('images/shorts-awayfootball(back).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 3">
                    <img src="{{ asset('images/shirt-Awayfootball(stadium).webp') }}" class="thumbnail" onclick="changeImage(this)" alt="sample 4">
                </div>
                <div class="product-image">
                    <img id="mainImage" src="{{ asset('images/shorts-awayfootball(main).webp') }}" alt="Away Football Shorts">
                </div>
            </div>
            <div class="product-info">
                <h1>Away Football Shorts</h1>
                <p class="price">£30.00</p>
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

    <script>
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
        }
    </script>
@endsection
