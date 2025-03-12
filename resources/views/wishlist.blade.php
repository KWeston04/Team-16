@extends('layouts.master')

@section('title', 'Wishlist') 

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}"> 
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
        <h1>Wishlist</h1>
        <div class="Item-container">
            <div class="Item-saved">
                <p>Detail about the item of clothing or accessories saved...</p>
                <p>Price</p>
                <p>Discount (if applied)</p>

                <form>
                    <label for="Colour">Colour:</label>
                    <select id="Colour" name="Colour" required>
                        <option value="" disabled selected>Select your Colour</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Purple">Purple</option>
                    </select> 
                    <br><br>

                    <label for="Size">Size:</label>
                    <select id="Size" name="Size" required>
                        <option value="" disabled selected>Select your Size</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">XL</option>
                    </select> 
                    <br><br>

                    <label for="Qty">Qty:</label>
                    <select id="Qty" name="Qty" required>
                        <option value="" disabled selected>Select your Quantity</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <br><br>

                    <button type="submit">ADD TO BAG</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
