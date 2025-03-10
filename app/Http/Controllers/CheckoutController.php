<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Product;  // Import the Product model
use App\Models\Order;    // Import the Order model
use App\Notifications\LowStockNotification; // Import the LowStockNotification
use Illuminate\Support\Facades\Notification; // Import the Notification Facade

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'address' => 'required|string',
            'products' => 'required|array',  // Ensure 'products' is an array
            'products.*.product_id' => 'required|exists:products,product_id',  // Validate each product's ID
            'products.*.quantity' => 'required|integer|min:1',  // Validate the quantity
        ]);

        $delivery_address = $request->input('address') . ', ' . $request->input('city') . ', ' . $request->input('zip');

        // Start a database transaction for data integrity
        DB::beginTransaction();

        try {
            // Create the order
            $order = Order::create([
                'user_id' => $request->input('user_id'),
                'order_date' => Carbon::now()->toDateString(),
                'status' => 'ordered',
                'delivery_address' => $delivery_address,
            ]);

            $totalAmount = 0; // To calculate the total order amount

            // Loop through each product in the order
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

                // Attach the product to the order and save the quantity and subtotal
                $order->products()->attach($product->product_id, ['quantity' => $quantity, 'subtotal' => $subtotal]);

                // Reduce the product quantity
                $product->decrement('quantity', $quantity);

                 // Check for low stock and send notification
                if ($product->isLowStock()) {
                    Notification::route('mail', 'admin@example.com')
                        ->notify(new LowStockNotification($product));
                }
            }

            // Update the order total amount
            $order->update(['total_amount' => $totalAmount]);

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Your order was placed successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            return redirect()->back()->with('error', 'Order placement failed: ' . $e->getMessage());
        }
    }
}

