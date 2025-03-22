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
        <div class="buttons">
            <button class="button active" onclick="showSection('current-orders')">Current Orders</button>
            <button class="button" onclick="showSection('previous-orders')">Previous Orders</button>
        </div>

        @if ($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            <div id="current-orders" class="active-order active">
                @foreach ($orders as $order)
                    @if ($order->status === 'ordered' || $order->status === 'dispatched')
                        <div class="clothing-order">
                            <div class="clothing">
                                @foreach ($order->orderItems as $item)
                                    <img src="{{ asset('storage/' . $item->product->image_url) }}" alt="{{ $item->product->name }}">
                                @endforeach
                            </div>
                            <div class="order-details">
                                <p><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}</p>
                                <p><strong>Order Total:</strong> £{{ number_format($order->total_amount, 2) }}</p>
                                <p><strong>Status:</strong> {{ $order->status }}</p>
                                <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div id="previous-orders" class="active-order">
                @foreach ($orders as $order)
                    @if ($order->status === 'delivered')
                        <div class="clothing-order">
                            <div class="clothing">
                                @foreach ($order->orderItems as $item)
                                    <img src="{{ asset($item->product->image_url) }}" alt="{{ $item->product->name }}">
                                @endforeach
                            </div>
                            <div class="order-details">
                                <p><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}</p>
                                <p><strong>Order Total:</strong> £{{ number_format($order->total_amount, 2) }}</p>
                                <p><strong>Delivered Date:</strong> {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

@section('page-specific-js')
<script src="{{ asset('js/Order_History.js') }}"></script>
@endsection