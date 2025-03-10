@extends('layouts.master')
@section('title', 'Astonic Sports')

@section('page-specific-css')
  <link rel="stylesheet" href="{{ asset('css/Style_AstonicSports_Home_JB.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
@endsection

@section('content')
  <div class="notice">
    <p> Important notice: All images (except for social network images) are generated by ChatGPT, a service by OpenAI. Available at: https://chatgpt.com</p>
  </div>
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-overlay">
      <div class="hero-content">
        <h1>Unleash Your Potential</h1>
        <p>Performance sportswear crafted for athletes.</p>
        <a href="/shop" class="cta-button">Shop Now</a>
      </div>
    </div>
    <img src="{{ asset('images/Hero-image.png') }}" alt="Hero Image" style="width: 100%; height: auto;">
  </section>

  <!-- Collections Section -->
  <section id="mens-collections" class="collections-section">
    <h2>Men's Collections</h2>
    <div class="collections-grid">
      <div class="collection-card">
        <img src="{{ asset('images/compression top.png') }}" alt="Compression Gear" style="width: 100%; height: auto;">
        <h3><a href="">Compression Gear</a></h3> <!-- route('product_listing', ['category' => 'Compression'])  -->
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/shoes.png') }}" alt="Running Shoes" style="width: 100%; height: auto;">
        <h3><a href="">Running Shoes</a></h3> <!--  route('product_listing', ['category' => 'Running']) -->
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/wind breaker.png') }}" alt="Winter Wear" style="width: 100%; height: auto;">
        <h3><a href="">Winter Wear</a></h3> <!--  route('product_listing', ['category' => 'WinterWear'])  -->
      </div>
      <div class="collection-card">
        <img src="{{ asset('images/shirt design.png') }}" alt="Casual Wear" style="width: 100%; height: auto;">
        <h3><a href="">Casual Wear</a></h3> <!--  route('product_listing', ['category' => 'CasualWear'])  -->
      </div>
    </div>
  </section>

  <!-- Seasonal Offers Section -->
  <section id="seasonal-offers" class="offers-section">
    <h2>Seasonal Offers</h2>
    <p>Exclusive discounts for a limited time.</p>
    <a href="/shop" class="cta-button">Explore Offers</a>
  </section>

 @endsection