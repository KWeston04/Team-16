<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Astonic Sports</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Astonic Sports</h1>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->first_name }},</h2>
            
            <p>Thank you for creating an account with Astonic Sports!</p>
            
            <p>We're excited to have you join our community of sports enthusiasts. With your new account, you can:</p>
            
            <ul>
                <li>Shop our exclusive collection of sportswear</li>
                <li>Track your orders easily</li>
                <li>Receive special offers and discounts</li>
                <li>Save your favourite items to your wishlist</li>
            </ul>
            
            <p>We look forward to providing you with the best quality sportswear to help you achieve your fitness goals.</p>
            
            <a href="{{ url('/') }}" class="button">Start Shopping Now</a>
            
            <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>
            
            <p>Best regards,<br>
            The Astonic Sports Team</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Astonic Sports. All rights reserved.</p>
            <p>This email was sent to {{ $user->email }}</p>
        </div>
    </div>
</body>
</html>