<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura - BikesByFazenda</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #9935dc;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .logo span {
            color: #9935dc;
        }

        .invoice-title {
            color: #9935dc;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .invoice-info div {
            flex: 1;
        }

        .invoice-info div:last-child {
            text-align: right;
        }

        .details {
            margin: 20px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .details h3 {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .details strong {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #9935dc;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .product-image {
            max-width: 80px;
            height: auto;
            border-radius: 5px;
            display: block;
            margin: 0 auto;
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .product-details {
            margin-left: 15px;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            color: #9935dc;
        }

        .footer {
            margin-top: 40px;
            padding: 20px 0;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #888;
            text-align: center;
        }

        .footer p {
            margin: 5px 0;
        }

        .terms {
            margin-top: 30px;
            font-size: 12px;
            color: #555;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .terms h4 {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #9935dc;
            text-transform: uppercase;
        }
        
        .payment-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        
        .payment-info h4 {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #9935dc;
            text-transform: uppercase;
        }
        
        .payment-method {
            font-weight: bold;
            color: #333;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }
        
        .status-paid {
            background-color: #28a745;
            color: white;
        }
        
        .status-pending {
            background-color: #ffc107;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Bikes<span>By</span>Fazenda</div>
            <div class="invoice-title">Invoice</div>
        </div>

        <div class="invoice-info">
            <div>
                <h3><strong>Company:</strong> BikesByFazenda</h3>
                <h3><strong>Address:</strong> Rua Alfredo Costa, Sobralinho 2615-308</h3>
                <h3><strong>VAT No:</strong> 269370635</h3>
                <h3><strong>Email:</strong> info@bikesbyfazenda.pt</h3>
            </div>
            <div>
                <h3><strong>Invoice No:</strong> {{ $orderNumber }}</h3>
                <h3><strong>Date:</strong> {{ now()->format('d/m/Y') }}</h3>
                <h3><strong>Status:</strong> 
                    <span class="status-badge status-{{ strtolower($orderItems->first()->payment_status) }}">
                        {{ $orderItems->first()->payment_status }}
                    </span>
                </h3>
            </div>
        </div>

        <div class="details">
            <h3><strong>Customer:</strong> {{ $orderItems->first()->name }}</h3>
            <h3><strong>Shipping Address:</strong> {{ $orderItems->first()->rec_address }}</h3>
            <h3><strong>Phone:</strong> {{ $orderItems->first()->phone }}</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $totalPedido = 0; @endphp
                @foreach($orderItems as $item)
                    @php 
                        if(isset($item->is_motorcycle) && $item->is_motorcycle) {
                            $itemTotal = $item->motorcycle->price;
                        } else {
                            if($item->product->hasDiscount()) {
                                $itemTotal = $item->product->getDiscountedPrice() * $item->quantity;
                            } else {
                                $itemTotal = $item->product->price * $item->quantity;
                            }
                        }
                        $totalPedido += $itemTotal;
                    @endphp
                    <tr>
                        <td>
                            <div class="product-info">
                                @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                    <div class="product-details">
                                        {{ $item->motorcycle->name }} <br>
                                        <small>Motorcycle</small>
                                    </div>
                                @else
                                    <div class="product-details">
                                        {{ $item->product->title }}
                                        @if($item->product->hasDiscount())
                                            <br><small style="color: #e74c3c; font-weight: bold;">PROMOTION -{{ number_format($item->product->discount_percentage, 0) }}%</small>
                                        @endif
                                        @if($item->size)
                                        <br><small>Size: {{ $item->size }}</small>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                1
                            @else
                                {{ $item->quantity }}
                            @endif
                        </td>
                        <td>
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                {{ number_format($item->motorcycle->price, 2, ',', '.') }}€
                            @else
                                @if($item->product->hasDiscount())
                                    <span style="text-decoration: line-through; color: #999;">{{ number_format($item->product->price, 2, ',', '.') }}€</span><br>
                                    <span style="color: #28a745; font-weight: bold;">{{ number_format($item->product->getDiscountedPrice(), 2, ',', '.') }}€</span>
                                @else
                                    {{ number_format($item->product->price, 2, ',', '.') }}€
                                @endif
                            @endif
                        </td>
                        <td>{{ number_format($itemTotal, 2, ',', '.') }}€</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="text-align: right; font-weight: bold;">Subtotal:</td>
                    <td style="text-align: right; font-weight: bold;">{{ number_format($totalPedido, 2, ',', '.') }}€</td>
                </tr>
                @if(isset($discountInfo) && $discountInfo['discount'] > 0)
                <tr>
                    <td colspan="3" style="text-align: right; color: #9935dc;">
                        <strong>Discount (Loyalty Points):</strong>
                        <br>
                        <small>{{ number_format($discountInfo['points_used'], 0, ',', '.') }} points used</small>
                    </td>
                    <td style="text-align: right; color: #9935dc; font-weight: bold;">
                        -{{ number_format($discountInfo['discount'], 2, ',', '.') }}€
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right; font-weight: bold; background-color: #f4f4f4;">Total with Discount:</td>
                    <td style="text-align: right; font-weight: bold; background-color: #f4f4f4;">{{ number_format($discountInfo['total_after_discount'], 2, ',', '.') }}€</td>
                </tr>
                @endif
            </tbody>
        </table>

        <div class="total">
            @if(isset($discountInfo) && $discountInfo['discount'] > 0)
            <p>Subtotal: {{ number_format($totalPedido, 2, ',', '.') }}€</p>
            <p style="color: #9935dc;">Discount (Loyalty Points): -{{ number_format($discountInfo['discount'], 2, ',', '.') }}€</p>
            <p style="font-size: 20px;">Total to Pay: {{ number_format($discountInfo['total_after_discount'], 2, ',', '.') }}€</p>
            @else
            <p>Total to Pay: {{ number_format($totalPedido, 2, ',', '.') }}€</p>
            @endif
        </div>
        
        <div class="payment-info">
            <h4>Payment Information</h4>
            <p><strong>Payment Method:</strong> <span class="payment-method">{{ $orderItems->first()->payment_method ?? 'Cash on Delivery' }}</span></p>
        </div>
        
        @if(isset($discountInfo) && $discountInfo['discount'] > 0)
        <div class="payment-info" style="border-left: 3px solid #9935dc;">
            <h4>Loyalty Program</h4>
            <p><strong>Points Used:</strong> {{ number_format($discountInfo['points_used'], 0, ',', '.') }} points</p>
            <p><strong>Discount Applied:</strong> {{ number_format($discountInfo['discount'], 2, ',', '.') }}€</p>
            <p><small>For every 1000 points, you get a 1% discount on the total purchase (up to a maximum of 10%).</small></p>
        </div>
        @endif

        <div class="terms">
            <h4>Terms and Conditions</h4>
            <p>1. Payment must be made within 30 days from the invoice date.</p>
            <p>2. A 5% interest will be applied to late payments.</p>
            <p>3. For any questions, please contact us at +351 123 456 789.</p>
            <p>4. All products have a 2-year warranty as per current legislation.</p>
        </div>

        <div class="footer">
            <p>BikesByFazenda | Rua Alfredo Costa, Sobralinho 2615-308 | VAT No: 269370635</p>
            <p>Tel: +351 123 456 789 | Email: info@bikesbyfazenda.pt | www.bikesbyfazenda.pt</p>
            <p>Invoice generated on {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>