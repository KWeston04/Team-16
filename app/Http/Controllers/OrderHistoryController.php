<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    public function orderHistory()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch the user's orders with their order items and products
        $orders = Order::where('user_id', $user->user_id)
            ->with('orderItems.product') // Ensure this matches the relationship name
            ->orderBy('order_date', 'desc')
            ->get();

        return view('orderhistory', compact('orders'));
    }
}