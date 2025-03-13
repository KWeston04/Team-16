@extends('layouts.master')

@section('title', 'About Us')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<main>
    <section class="hero-section">
        <video autoplay loop muted>
            <source src="{{ asset('videos/Headquarters-video.mp4') }}" type="video/mp4">
        </video>
    </section>

    <section class="content-section">
        <div class="content-text">
            <h2>Our Story</h2>
            <p>Astonic Sports was founded with a vision: to blend high-performance functionality with style, creating athletic wear that active men can rely on to meet their goals. We are dedicated to creating the best quality sportswear by optimizing the use of cutting-edge technology, enabling our customers to exercise in comfort and style.</p>
        </div>
        <img src="{{ asset('images/Headquarters.png') }}" alt="Our Headquarters">
    </section>

    <section class="content-section">
        <video width="600" height="350" autoplay loop muted controls>
            <source src="{{ asset('videos/Customers-video.mp4') }}" type="video/mp4">
        </video>
        <div class="content-text">
            <h2>Our Mission</h2>
            <p>We aim to inspire and empower men to realize their athletic potential. By bridging the latest in fabric technology with effortless style, Astonic Sports delivers apparel that meets the rigorous demands of intense workouts while staying comfortable for everyday wear. Our gear embodies the motivation, resilience, and discipline needed to reach new levels of personal excellence.</p>
        </div>
    </section>
</main>
@endsection
