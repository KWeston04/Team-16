@extends('layouts.master')

@section('title', 'Contact Us - Astonic Sports')

@section('page-specific-css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
    <main>
        <div id="main">
            <h4 class="uppercase">Get in touch with us regarding any inquiries</h4>

            @if (session('success'))
            <div class="alert alert-success">
                    {{ session('success') }}
            </div>
            @endif
            <form action="{{route('contact.store')}}" method="POST" id="contacts">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your name">
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <br>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" value="" required="" name="phone" required placeholder="Enter your phone number" maxlength="11" minlength="10">
                </div>
                <br>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required placeholder="Write your message here"></textarea>
                </div>
                <br>
                <button type="submit" class="button">Submit</button>
            </form>
        </div>
    </main>
@endsection