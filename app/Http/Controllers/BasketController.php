<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\BasketItems;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    // Show the cart page
    public function showCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to view your cart.');
        }

        $user = Auth::user();
        $basket = Basket::firstOrCreate(['user_id' => $user->user_id]);

        $cartItems = BasketItems::where('basket_id', $basket->basket_id)
            ->join('products', 'basket_items.product_id', '=', 'products.product_id')
            ->select('basket_items.*', 'products.name', 'products.price', 'products.image_url')
            ->get();

        $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        return view('cart', compact('cartItems', 'total'));
    }

    // Add the product to the cart (basket)
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $basket = Basket::firstOrCreate(['user_id' => $user->user_id]);

        // Check if the product is already in the basket
        $basketItem = BasketItems::where('basket_id', $basket->basket_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($basketItem) {
            // Update the quantity if the product exists in basket
            $basketItem->quantity += $request->quantity;
            $basketItem->save();
        } else {
            // Add the new item to the basket
            BasketItems::create([
                'basket_id' => $basket->basket_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.show')->with('success', 'Product added to cart!');
    }

    // Update the cart
    public function updateCart(Request $request)
    {
        $request->validate([
            'basket_item_id' => 'required|exists:basket_items,basket_item_id',
            'quantity' => 'required|integer|min:1'
        ]);

        $basketItem = BasketItems::findOrFail($request->basket_item_id);
        $basketItem->quantity = $request->quantity;
        $basketItem->save();

        return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
    }

    // Remove the item from the cart
    public function removeItem(Request $request)
    {
    $request->validate([
        'basket_item_id' => 'required|exists:basket_items,basket_item_id'
    ]);

    // Find the basket item
    $basketItem = BasketItems::find($request->basket_item_id);

    if ($basketItem) {
        // Delete the basket item
        $basketItem->delete();
        return redirect()->route('cart.show')->with('success', 'Item removed from cart!');
    }

    // If the item was not found then return with an error message
    return redirect()->route('cart.show')->with('error', 'Item not found in cart.');
    }


}
