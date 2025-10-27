<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - {{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .header {
            background-color: #2563eb;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .content {
            padding: 25px;
        }

        .content h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .order-summary {
            margin-top: 20px;
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
        }

        .order-item {
            border-bottom: 1px solid #f3f4f6;
            padding: 8px 0;
            display: flex;
            justify-content: space-between;
        }

        .footer {
            background-color: #f9fafb;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: #fff !important;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>

        <div class="content">
            <p>Hi {{ $order->user->name ?? 'Customer' }},</p>

            <p>Thank you for your order! We’re happy to let you know that we’ve received it and it’s now being processed.</p>

            <div class="order-summary">
                <h2>Order #{{ $order->id }}</h2>

                @foreach ($order->items as $item)
                <div class="order-item">
                    <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                    <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                </div>
                @endforeach

                <div class="order-item total">
                    <span>Total</span>
                    <span>${{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>

            <p>You can track your order status anytime by visiting your account.</p>

            <a href="{{ url('/orders/'.$order->id) }}" class="btn">View My Order</a>

            <p>Thank you for shopping with {{ config('app.name') }}!</p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>
                <a href="{{ url('/') }}">Visit our website</a> |
                <a href="{{ url('/support') }}">Contact Support</a>
            </p>
        </div>
    </div>
</body>

</html>
