<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // using db facade and carbon for this
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Basket;
use App\Models\BasketItems;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Inventory;


class CheckoutController extends Controller
{
    

    public function checkout(){ // To access the checkout page, this now also pre-fills the user data
        
        // Get the authenticated user
        $user = Auth::user();
        
        // If user is not authenticated then we need to redirect to login otherwise a big error will likely happen
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Pass the user data to the view for pre-filling the form for convienience
        return view('checkout', ['user' => $user]);
    }

    public function placeOrder(Request $request) // Place order
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,user_id', // Making sure the user who is passed exists 
            'address' => 'required|string', 
            'city' => 'required|string',
            'zip' => 'required|string',
        
        ]);

        $user_id = $request->input('user_id'); // Getting the user id 

        // Combine fields to make the address
        $delivery_address = $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('zip');


        // Fetch the items from the user's cart
        $basket = Basket::where('user_id', $user_id)->first();
        if (!$basket){ // If there is nothing in the basket
            return redirect()->back()->with('error', 'Your cart is empty');
        }

        $cartItems = BasketItems::where('basket_id', $basket->basket_id)->get();

        if ($cartItems->isEmpty()){
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $totalAmount = 0; // Creating the total order amount variable

        foreach ($cartItems as $item){ // Adding up the total amount 
            $product = $item->product;
            $totalAmount += $product->price * $item->quantity;
        }

        //Creating the new order
        $order = Order::create([
            'user_id' => $user_id,
            'order_date' => Carbon::now(),
            'status' => 'ordered',
            'delivery_address' => $delivery_address,
            'total_amount' => $totalAmount,
            'created_at' => now(),
        ]);

        foreach ($cartItems as $item) {
            $product = $item->product;
            
            OrderItem::create([
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price_at_purchase' => $product->price,
            ]);

            // Deduct the stock so accurate tracking is kept
            $inventory = Inventory::where('product_id', $item->product_id)->first();
            if ($inventory) {
                $inventory->quantity_in_stock -= $item->quantity;
                $inventory->save();
            }
        }

        // Clearing the basket
        BasketItems::where('basket_id', $basket->basket_id)->delete();

        // Returning the success back to the user
        return redirect()->back()->with('success', 'Your order has been placed successfully!');
      
    }

}
