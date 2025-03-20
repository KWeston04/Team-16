@extends('layouts.master')

@section('title', 'Search Results - Astonic Sports')

@section('content')

<main>
    <h2>Search Results</h2>

    @if($products->count() > 0)
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p class="price">£{{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('product.show', ['id' => $product->product_id]) }}" class="view-btn">View</a>
                </div>
            @endforeach
        </div>
    @else
        <p>No products found.</p>
    @endif
</main>

@endsection
