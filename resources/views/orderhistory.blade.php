@extends('layouts.master')

@section('title', 'Order History')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orderhistory.css') }}">
@endsection

@section('content')
<div class="main-container">  
    <div class="nav-container">
        <h2>Astonic Sports</h2>
        <a href="{{ route('profile.personal.details') }}" class="nav-link">Personal Details</a>
        <a href="{{ route('profile.order.history') }}" class="nav-link">Order History</a>
        <a href="{{ route('profile.change.password') }}" class="nav-link">Change Password</a>
        <a href="{{ route('profile.payment.method') }}" class="nav-link">Payment Method</a>
        <a href="{{ route('profile.contact.preferences') }}" class="nav-link">Contact Preferences</a>
        <a href="{{ route('profile.contact.us') }}" class="nav-link">Contact Us</a>
        <a href="{{ route('profile.wishlist') }}" class="nav-link">Wishlist</a>
    </div>

    <div class="content-container">
        <h1>Orders</h1>

        @if ($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            @foreach ($orders as $order)
                <div class="order1">
                    <div class="clothing">
                        @foreach ($order->orderItems as $item)
                            <img src="{{ asset($item->product->image_url) }}" alt="{{ $item->product->name }}">
                        @endforeach
                    </div>

                    <b><p>Order Date:</p></b>
                    <p>{{ $order->order_date->format('d/m/Y') }}</p>

                    <b><p>Order Total:</p></b>
                    <p>£{{ number_format($order->total_amount, 2) }}</p>

                    <b><p>Status:</p></b>
                    <p>{{ $order->status }}</p>

                    <b><p>Delivery Address:</p></b>
                    <p>{{ $order->delivery_address }}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection