<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation - Astonic Sports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #1a1a2e;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
        .button {
            display: inline-block;
            background-color: #1a1a2e;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .order-details {
            margin: 20px 0;
        }
        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-details th, .order-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .order-details th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>

        <div class="content">
            <h2>Hello {{ $user->first_name }},</h2>

            <p>Thank you for shopping with Astonic Sports! Your order has been placed successfully and is being processed at this moment.</p>

            <div class="order-details">
                <h3>Order Details</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>£{{ number_format($item->price_at_purchase, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @php
                    $subtotal = $order->orderItems->sum(function($item) {
                        return $item->price_at_purchase * $item->quantity;
                    });
                    $discount = $subtotal * 0.05; // 5% discount
                    $total = $subtotal - $discount + $shippingCost;
                @endphp
                <p><strong>Subtotal:</strong> £{{ number_format($subtotal, 2) }}</p>
                <p><strong>Discount:</strong> £{{ number_format($discount, 2) }}</p>
                <p><strong>Shipping:</strong> £{{ number_format($shippingCost, 2) }}</p>
                <p><strong>Total:</strong> £{{ number_format($total, 2) }}</p>
            </div>

            <div class="alert">
                <p>If you did not place this order, please contact our support team immediately on our website.</p>
            </div>

            <p>You can track your order by visiting your account on our website.</p>

            <a href="{{ url('/profile/order-history') }}" class="button">View Your Order</a>

            <p>If you have any questions or concerns, please don't hesitate to contact our support team.</p>

            <p>Best regards,<br>
            Astonic Sports</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Astonic Sports. All rights reserved.</p>
            <p>This email was sent to {{ $user->email }}</p>
        </div>
    </div>
</body>
</html>