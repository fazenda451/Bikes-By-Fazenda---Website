<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Update - BikesByFazenda</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }
        
        .email-wrapper {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #9935dc 0%, #8024c0 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .logo {
            font-size: 32px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .logo-icon {
            font-size: 40px;
            margin-right: 10px;
        }
        
        .header-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 18px;
            font-weight: 300;
            position: relative;
            z-index: 2;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 24px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .status-card {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            border-left: 5px solid #9935dc;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .status-title {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .status-in-progress {
            background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
            color: #212529;
        }
        
        .status-on-the-way {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: #ffffff;
        }
        
        .status-delivered {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: #ffffff;
        }
        
        .order-details {
            background: #ffffff;
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            border: 2px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .order-details h3 {
            color: #2d3748;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 500;
            color: #64748b;
        }
        
        .detail-value {
            font-weight: 600;
            color: #2d3748;
        }
        
        .products-section {
            margin: 30px 0;
        }
        
        .products-title {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .product-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            margin: 15px 0;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }
        
        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .product-name {
            font-weight: 600;
            color: #2d3748;
            font-size: 16px;
            flex: 1;
        }
        
        .product-type {
            background: #9935dc;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            margin-left: 10px;
        }
        
        .product-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #64748b;
            font-size: 14px;
        }
        
        .product-price {
            font-weight: 600;
            color: #9935dc;
            font-size: 16px;
        }
        
        .status-message {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            border-left: 5px solid #0ea5e9;
            text-align: center;
        }
        
        .status-message p {
            font-size: 16px;
            color: #0c4a6e;
            font-weight: 500;
            margin: 0;
        }
        
        .contact-section {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            text-align: center;
        }
        
        .contact-title {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 20px;
        }
        
        .contact-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #64748b;
            font-weight: 500;
        }
        
        .contact-icon {
            width: 20px;
            height: 20px;
            background: #9935dc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }
        
        .footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #a0aec0;
            padding: 30px;
            text-align: center;
        }
        
        .footer-logo {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 15px;
        }
        
        .footer-text {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        
        .footer-links {
            margin-top: 20px;
        }
        
        .footer-link {
            color: #9935dc;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 500;
        }
        
        .footer-link:hover {
            text-decoration: underline;
        }
        
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, #e2e8f0 50%, transparent 100%);
            margin: 30px 0;
        }
        
        .icon {
            font-size: 18px;
        }
        
        @media (max-width: 600px) {
            .email-wrapper {
                margin: 10px;
                border-radius: 15px;
            }
            
            .header, .content, .footer {
                padding: 20px;
            }
            
            .logo {
                font-size: 24px;
            }
            
            .greeting {
                font-size: 20px;
            }
            
            .contact-info {
                flex-direction: column;
                gap: 15px;
            }
            
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <span class="logo-icon">🚲</span>
                BikesByFazenda
            </div>
            <div class="header-subtitle">Order Update</div>
        </div>
        
        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Hello <strong>{{ $customerName }}</strong>! 👋
            </div>
            
            <p style="text-align: center; color: #64748b; font-size: 16px; margin-bottom: 30px;">
                We have an important update about your order that we would like to share with you.
            </p>
            
            <!-- Status Card -->
            <div class="status-card">
                <div class="status-title">
                    <span class="icon">📦</span>
                    Order Status Updated
                </div>
                <div style="margin-bottom: 20px;">
                    <strong>Order Number:</strong> #{{ $orderNumber }}
                </div>
                <div style="margin-bottom: 15px;">
                    <strong>New Status:</strong>
                </div>
                <span class="status-badge status-{{ str_replace(' ', '-', $status) }}">
                    @switch($status)
                        @case('in progress')
                            🔄 In Progress
                            @break
                        @case('On the way')
                            🚚 On the Way
                            @break
                        @case('Delivered')
                            ✅ Delivered
                            @break
                        @default
                            {{ $status }}
                    @endswitch
                </span>
            </div>
            
            <!-- Order Details -->
            <div class="order-details">
                <h3>
                    <span class="icon">📋</span>
                    Order Details
                </h3>
                <div class="detail-row">
                    <span class="detail-label">Order Number:</span>
                    <span class="detail-value">#{{ $orderNumber }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Update Date:</span>
                    <span class="detail-value">{{ now()->format('d/m/Y H:i') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Items:</span>
                    <span class="detail-value">{{ $orderItems->count() }} {{ $orderItems->count() == 1 ? 'item' : 'items' }}</span>
                </div>
            </div>
            
            <!-- Products Section -->
            <div class="products-section">
                <h3 class="products-title">
                    <span class="icon">🛍️</span>
                    Order Items
                </h3>
                
                @foreach($orderItems as $item)
                    <div class="product-card">
                        <div class="product-header">
                            <div class="product-name">
                                @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                    {{ $item->motorcycle->name }}
                                @else
                                    {{ $item->product->title }}
                                @endif
                            </div>
                            <span class="product-type">
                                @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                    🏍️ Motorcycle
                                @else
                                    🛒 Product
                                @endif
                            </span>
                        </div>
                        <div class="product-details">
                            <div>
                                @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                    Quantity: 1
                                @else
                                    Quantity: {{ $item->quantity }}
                                    @if($item->size)
                                        | Size: {{ $item->size }}
                                    @endif
                                @endif
                            </div>
                            <div class="product-price">
                                @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                    {{ number_format($item->motorcycle->price, 2, ',', '.') }}€
                                @else
                                    @if($item->product->hasDiscount())
                                        <span style="text-decoration: line-through; color: #999; font-size: 0.9rem; margin-right: 5px;">{{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}€</span>
                                        <span style="color: #28a745; font-weight: bold;">{{ number_format($item->product->getDiscountedPrice() * $item->quantity, 2, ',', '.') }}€</span>
                                        <div style="margin-top: 3px;">
                                            <span style="background: #e74c3c; color: white; padding: 2px 6px; border-radius: 8px; font-size: 0.7rem;">PROMOTION -{{ number_format($item->product->discount_percentage, 0) }}%</span>
                                        </div>
                                    @else
                                        {{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}€
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Status Message -->
            <div class="status-message">
                @switch($status)
                    @case('in progress')
                        <p>🔄 Your order is being processed and prepared for shipping. Our team is working to ensure everything is perfect!</p>
                        @break
                    @case('On the way')
                        <p>🚚 Your order is on its way! It will arrive at your destination soon. Get ready to receive your products!</p>
                        @break
                    @case('Delivered')
                        <p>✅ Your order has been successfully delivered! We hope you are satisfied with your purchase. Thank you for choosing BikesByFazenda!</p>
                        @break
                    @default
                        <p>Your order status has been successfully updated.</p>
                @endswitch
            </div>
            
            <!-- Contact Section -->
            <div class="contact-section">
                <h3 class="contact-title">
                    <span class="icon">📞</span>
                    Need Help?
                </h3>
                <p style="color: #64748b; margin-bottom: 25px;">
                    If you have any questions about your order, don't hesitate to contact us. We're here to help!
                </p>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <span>info@bikesbyfazenda.com</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📱</div>
                        <span>+351 123 456 789</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">🏪</div>
                        <span>Rua Alfredo Costa, Sobralinho</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">🚲 BikesByFazenda</div>
            <div class="footer-text">
                Thank you for choosing BikesByFazenda for your motorcycle and accessory needs.
            </div>
            <div class="footer-text">
                This email was sent automatically. Please do not reply to this email.
            </div>
            <div class="footer-links">
                <a href="#" class="footer-link">Website</a>
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
            </div>
            <div class="footer-text" style="margin-top: 20px; font-size: 12px;">
                &copy; {{ date('Y') }} BikesByFazenda. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html> 