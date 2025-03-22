<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        .info-row {
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #495057;
        }
        .value {
            color: #212529;
        }
        .message-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            background-color: #28a745;
            color: white;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2 style="margin: 0; color: #007bff;">New Contact Request</h2>
            <p style="margin: 5px 0 0 0;">Received on {{ date('F j, Y g:i A', strtotime($contactUsForm->submitted_at)) }}</p>
        </div>

        <div class="content">
            <div class="info-row">
                <span class="label">Status:</span>
                <span class="status-badge">{{ $contactUsForm->status }}</span>
            </div>

            <div class="info-row">
                <span class="label">Name:</span>
                <span class="value">{{ $contactUsForm->name }}</span>
            </div>

            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value">
                    <a href="mailto:{{ $contactUsForm->email }}">{{ $contactUsForm->email }}</a>
                </span>
            </div>

            <div class="info-row">
                <span class="label">Phone:</span>
                <span class="value">
                    <a href="tel:{{ $contactUsForm->phone }}">{{ $contactUsForm->phone }}</a>
                </span>
            </div>

            <div class="message-box">
                <div class="label">Message:</div>
                <p style="margin: 10px 0 0 0;">{{ $contactUsForm->message }}</p>
            </div>
        </div>

        <div class="footer">
            <p>Request ID: #{{ $contactUsForm->id }}</p>
            <p>
                <a href="{{ url('/admin/contact-us-forms/' . $contactUsForm->id . '/edit') }}" style="color: #007bff;">
                    View in Dashboard
                </a>
            </p>
            <p style="margin-top: 15px;">
                This is an automated message. Please do not reply directly to this email.
            </p>
        </div>
    </div>
</body>
</html>