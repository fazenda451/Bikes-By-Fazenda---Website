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
            <div class="invoice-title">Fatura</div>
        </div>

        <div class="invoice-info">
            <div>
                <h3><strong>Empresa:</strong> BikesByFazenda</h3>
                <h3><strong>Endereço:</strong> Rua Alfredo Costa, Sobralinho 2615-308</h3>
                <h3><strong>NIF:</strong> 269370635</h3>
                <h3><strong>Email:</strong> info@bikesbyfazenda.pt</h3>
            </div>
            <div>
                <h3><strong>Fatura Nº:</strong> {{ $orderNumber }}</h3>
                <h3><strong>Data:</strong> {{ now()->format('d/m/Y') }}</h3>
                <h3><strong>Status:</strong> 
                    <span class="status-badge status-{{ strtolower($orderItems->first()->payment_status) }}">
                        {{ $orderItems->first()->payment_status }}
                    </span>
                </h3>
            </div>
        </div>

        <div class="details">
            <h3><strong>Cliente:</strong> {{ $orderItems->first()->name }}</h3>
            <h3><strong>Endereço de Entrega:</strong> {{ $orderItems->first()->rec_address }}</h3>
            <h3><strong>Telefone:</strong> {{ $orderItems->first()->phone }}</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
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
                            $itemTotal = $item->product->price * $item->quantity;
                        }
                        $totalPedido += $itemTotal;
                    @endphp
                    <tr>
                        <td>
                            <div class="product-info">
                                @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                    <div class="product-details">
                                        {{ $item->motorcycle->name }} <br>
                                        <small>Moto</small>
                                    </div>
                                @else
                                    <div class="product-details">
                                        {{ $item->product->title }}
                                        @if($item->size)
                                        <br><small>Tamanho: {{ $item->size }}</small>
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
                                {{ number_format($item->product->price, 2, ',', '.') }}€
                            @endif
                        </td>
                        <td>{{ number_format($itemTotal, 2, ',', '.') }}€</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <h3>Total: {{ number_format($totalPedido, 2, ',', '.') }}€</h3>
        </div>
        
        <div class="payment-info">
            <h4>Informações de Pagamento</h4>
            <p><strong>Método de Pagamento:</strong> <span class="payment-method">{{ $orderItems->first()->payment_status }}</span></p>
            <p><strong>Data de Pagamento:</strong> {{ now()->format('d/m/Y') }}</p>
        </div>

        <div class="terms">
            <h4>Termos e Condições</h4>
            <p>1. O pagamento deve ser realizado dentro de 30 dias a partir da data da fatura.</p>
            <p>2. Juros de 5% serão aplicados a pagamentos atrasados.</p>
            <p>3. Para dúvidas, entre em contato pelo telefone: +351 123 456 789.</p>
            <p>4. Garantia de 2 anos para todos os produtos, conforme legislação em vigor.</p>
        </div>

        <div class="footer">
            <p>BikesByFazenda | Rua Alfredo Costa, Sobralinho 2615-308 | NIF: 269370635</p>
            <p>Tel: +351 123 456 789 | Email: info@bikesbyfazenda.pt | www.bikesbyfazenda.pt</p>
            <p>Fatura gerada em {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>