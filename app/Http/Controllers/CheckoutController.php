<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Basket;
use App\Models\BasketItems;
use App\Models\OrderItem;
use App\Models\Inventory;
use App\Models\User;
use App\Notifications\LowStockNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('checkout', ['user' => $user]);
    }


    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'shipping_cost' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $basket = Basket::where('user_id', $user->user_id)->first();

            if (!$basket) {
                return redirect()->back()->with('error', 'No basket found for the user.');
            }

            $cartItems = BasketItems::where('basket_id', $basket->basket_id)
                ->join('products', 'basket_items.product_id', '=', 'products.product_id')
                ->select('basket_items.*', 'products.name', 'products.price')
                ->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }

            $order = Order::create([
                'user_id' => $user->user_id,
                'order_date' => Carbon::now(),
                'status' => 'ordered',
                'delivery_address' => $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('zip'),
            ]);

            $totalAmount = 0;

            foreach ($cartItems as $cartItem) {
                $product = Product::find($cartItem->product_id);

                if (!$product) {
                    Log::error("Product not found for product ID: {$cartItem->product_id}");
                    continue; 
                }

                $inventory = Inventory::where('product_id', $cartItem->product_id)->first();

                if (!$inventory) {
                    Log::error("Inventory not found for product ID: {$cartItem->product_id}");
                    continue;
                }

                $quantity = $cartItem->quantity;
                $subtotal = $product->price * $quantity;
                $totalAmount += $subtotal;

                OrderItem::create([
                    'order_id' => $order->order_id,
                    'product_id' => $product->product_id,
                    'quantity' => $quantity,
                    'price_at_purchase' => $product->price,
                ]);

                $inventory->quantity_in_stock -= $quantity;
                $inventory->save();

                
                
                if ($inventory->quantity_in_stock <= $inventory->low_stock_threshold) {
                    Log::warning("Low stock alert for product ID: {$product->product_id}, Stock: {$inventory->quantity_in_stock}");
                    
                }
            }

         
            $discountCode = $request->input('discount');
            $discount = 0;
            if ($discountCode === 'ASTONIC24') {
                $discount = $totalAmount * 0.05;
                $totalAmount -= $discount;
            }

            
            $creditsUsed = 0;
            if ($user->credits > 0) {
                $creditsUsed = min($user->credits, $totalAmount);
                $totalAmount -= $creditsUsed;
                $user->credits -= $creditsUsed;
                $user->save();
            }

           
            $order->update(['total_amount' => $totalAmount]);

            
            $creditsEarned = (int)($totalAmount / 10);
            $user->credits += $creditsEarned;
            $user->save();

            
            BasketItems::where('basket_id', $basket->basket_id)->delete();

            
            Mail::to($user->email)->send(new OrderConfirmation($order, $user, $discount, $request->input('shipping_cost')));

            DB::commit();

            return redirect()->back()->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Order placement failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Order placement failed: ' . $e->getMessage());
        }
    }
}
