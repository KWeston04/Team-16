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
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,product_id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);


        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $request->input('user_id'),
                'order_date' => Carbon::now(),
                'status' => 'ordered',
                'delivery_address' => $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('zip'),
            ]);


            $totalAmount = 0;

            foreach ($request->input('products') as $productData) {
                $product = Product::find($productData['product_id']);
                $inventory = Inventory::where('product_id', $productData['product_id'])->first();
                $quantity = $productData['quantity'];
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
                 // We need to get some form of reporting done to implement this part too
                }
            }

            $discountCode = $request->input('discount');
            $discount = 0;
            if ($discountCode === 'ASTONIC24') {
                $discount = $totalAmount * 0.05;
                $totalAmount -= $discount;
            }

            $user = User::find($request->input('user_id'));
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
           
            $basket = Basket::where('user_id', $request->input('user_id'))->first();
            if ($basket) {
                BasketItems::where('basket_id', $basket->basket_id)->delete();
            }

            Mail::to($user->email)->send(new OrderConfirmation($order, $user, $discount, $request->input('shipping_cost')));

            DB::commit();

            return redirect()->back()->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            
            DB::rollback();
            return redirect()->back()->with('error', 'Order placement failed: ' . $e->getMessage());
        }
    }
}
