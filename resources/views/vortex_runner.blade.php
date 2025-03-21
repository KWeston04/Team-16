@extends('layouts.master')
@section('title', 'Vortex Runner')
@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endsection
@section('content')
    <main>
        <section class="product-detail">
            <div class="product-image">
                <img src="{{ asset('images/vortex shoes.webp') }}" alt="Vortex Runner">
            </div>
            <div class="product-info">
                <h1>Vortex Runner</h1>
                <!-- Dynamically displaying the price from the database, please make sure to also dynamically display the description and also the product to order when the product management is implemented (and also change this page name to a generic one please)-->
                <p class="price">£{{ number_format($product->price, 2) }}</p>
                <p class="description">
                    The Vortex Runner combines style and functionality, providing unmatched comfort and support for runners.
                </p>
                <ul class="features">
                    <li>Lightweight, breathable material</li>
                    <li>Advanced sole for shock absorption</li>
                    <li>Available in multiple sizes and colors</li>
                </ul>
                <div class="purchase-options">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="1"> {{-- Vortex runner currently has the ID of 1 so it is 1, when it becomes dynamic this will need to change too --}}
                        <label for="size">Size:</label>
                        <select id="size" name="size">
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <label for="quantity">Qty:</label>
                        <select id="quantity" name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        
                        @auth
                            <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                        @else
                            <a href="{{ route('login') }}" class="login-required-btn">Login to Add to Cart</a>
                        @endauth
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection