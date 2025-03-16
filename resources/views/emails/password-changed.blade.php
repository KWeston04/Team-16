<!DOCTYPE html>
<html>
<head>
    <title>Password Changed - Astonic Sports</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Changed</h1>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->first_name }},</h2>
            
            <p>This email is to confirm that your password for your Astonic Sports account has been successfully changed.</p>
            
            <div class="alert">
                <p>If you did not make this change, please contact our support team immediately by replying to this email or calling our customer service team.</p>
            </div>
            
            <p>For security reasons, we recommend that you:</p>
            
            <ul>
                <li>Use unique passwords for different websites</li>
                <li>Update your passwords regularly</li>
                <li>Never share your login credentials with others</li>
            </ul>
            
            <p>You can access your account at any time by visiting our website.</p>
            
            <a href="{{ url('/login') }}" class="button">Log In to Your Account</a>
            
            <p>If you have any questions or concerns, please don't hesitate to contact our support team.</p>
            
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