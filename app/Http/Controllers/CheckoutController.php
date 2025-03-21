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
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'shipping_cost' => 'required|numeric',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,product_id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $user_id = $request->input('user_id');
        $delivery_address = $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('zip');
        $shippingCost = $request->input('shipping_cost');

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $user_id,
                'order_date' => Carbon::now(),
                'status' => 'ordered',
                'delivery_address' => $delivery_address,
            ]);

            $totalAmount = 0;

            foreach ($request->input('products') as $productData) {
                $product = Product::find($productData['product_id']);

                if (!$product) {
                    throw new \Exception("Product with ID {$productData['product_id']} not found");
                }

                if ($product->quantity < $productData['quantity']) {
                    throw new \Exception("Not enough stock for product {$product->name}");
                }

                $quantity = $productData['quantity'];
                $subtotal = $product->price * $quantity;
                $totalAmount += $subtotal;

                $order->products()->attach($product->product_id, ['quantity' => $quantity, 'subtotal' => $subtotal]);

                $product->decrement('quantity', $quantity);

                if ($product->isLowStock()) {
                    Notification::route('mail', 'sportsastonic@gmail.com')
                        ->notify(new LowStockNotification($product));
                }
            }

            $discountCode = $request->input('discount');
            $discount = 0;
            if ($discountCode === 'ASTONIC24') {
                $discount = $totalAmount * 0.05;
                $totalAmount -= $discount;
            }

            $user = User::find($user_id);
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

            $basket = Basket::where('user_id', $user_id)->first();
            if ($basket) {
                BasketItems::where('basket_id', $basket->basket_id)->delete();
            }

            Mail::to($user->email)->send(new OrderConfirmation($order, $user, $discount, $shippingCost));

            DB::commit();

            return redirect()->back()->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Order placement failed: ' . $e->getMessage());
        }
    }
}