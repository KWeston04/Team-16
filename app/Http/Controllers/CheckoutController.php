<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // using db facade and carbon for this
use Carbon\Carbon;

class CheckoutController extends Controller
{
    //

    public function checkout(){ // to access the checkout page
        return view('checkout');
    }

    public function placeOrder(Request $request) // place order
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,user_id', // making sure the user who is passed exists (this will change after the MVP)
            'address' => 'required|string', // making sure the user has provided the address, later (after the mvp) this will be automatically taken from a users account if they are logged in.
        ]);

        // Combine fields to make the address
        $delivery_address = $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('zip');

        // inserting the order into the orders table
        DB::table('orders')->insert([
            'user_id' => $request->input('user_id'),
            'order_date' => Carbon::now()->toDateString(),
            'status' => 'ordered',
            'delivery_address' => $delivery_address, // combined address
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // return the success message
        return redirect()->back()->with('success', 'Your order was placed successfully!');
    }

}
