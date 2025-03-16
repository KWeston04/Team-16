@extends('layouts.master')

@section('title', isset($product) ? $product->name : 'Product Not Found')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endsection

@section('content')
    <main>
        <section class="product-detail">
            @if(isset($product))
                <div class="product-image">
                    <img src="{{ asset('images/vortex shoes.webp') }}" alt="{{ $product->name }}">
                </div>
                <div class="product-info">
                    <h1>{{ $product->name }}</h1>
                    <p class="price">£{{ number_format($product->price, 2) }}</p>
                    <p class="description">{{ $product->description }}</p>

                    @if(isset($product->features) && is_array($product->features))
                        <ul class="features">
                            @foreach($product->features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="purchase-options">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
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
            @else
                <p>Product not found.</p>
            @endif
        </section>
    </main>
@endsection

