<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura do Pedido - BikesByFazenda</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #9935dc;
            margin-bottom: 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .logo span {
            color: #9935dc;
        }
        h1 {
            color: #333;
            font-size: 22px;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 15px;
            font-size: 16px;
        }
        .order-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .order-details p {
            margin: 5px 0;
        }
        .button {
            display: inline-block;
            background-color: #9935dc;
            color: #ffffff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 15px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .footer p {
            margin: 5px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Bikes<span>By</span>Fazenda</div>
        </div>
        
        <h1>Olá, {{ $customerName }}!</h1>
        
        <p>Obrigado por comprar na BikesByFazenda. Seu pedido foi confirmado e está sendo processado.</p>
        
        <div class="order-details">
            <p><strong>Número do Pedido:</strong> {{ $orderNumber }}</p>
            <p><strong>Data:</strong> {{ now()->format('d/m/Y H:i') }}</p>
            <p><strong>Total de Itens:</strong> {{ $orderItems->count() }}</p>
        </div>
        
        <p>Anexamos a fatura do seu pedido a este email. Você também pode acompanhar o status do seu pedido a qualquer momento através da sua conta.</p>
        
        <h2>Detalhes do Pedido</h2>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr style="background-color: #f4f4f4;">
                    <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ddd;">Produto</th>
                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ddd;">Quantidade</th>
                    <th style="padding: 10px; text-align: right; border-bottom: 1px solid #ddd;">Preço</th>
                    <th style="padding: 10px; text-align: right; border-bottom: 1px solid #ddd;">Total</th>
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
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                {{ $item->motorcycle->name }} <br>
                                <small style="color: #777;">Moto</small>
                            @else
                                {{ $item->product->title }}
                                @if($item->size)
                                <br><small style="color: #777;">Tamanho: {{ $item->size }}</small>
                                @endif
                            @endif
                        </td>
                        <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ddd;">
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                1
                            @else
                                {{ $item->quantity }}
                            @endif
                        </td>
                        <td style="padding: 10px; text-align: right; border-bottom: 1px solid #ddd;">
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                                {{ number_format($item->motorcycle->price, 2, ',', '.') }}€
                            @else
                                {{ number_format($item->product->price, 2, ',', '.') }}€
                            @endif
                        </td>
                        <td style="padding: 10px; text-align: right; border-bottom: 1px solid #ddd;">
                            {{ number_format($itemTotal, 2, ',', '.') }}€
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="padding: 10px; text-align: right; font-weight: bold;">Total:</td>
                    <td style="padding: 10px; text-align: right; font-weight: bold;">{{ number_format($totalPedido, 2, ',', '.') }}€</td>
                </tr>
            </tbody>
        </table>
        
        <p>Se tiver alguma dúvida sobre seu pedido, não hesite em nos contatar.</p>
        
        <div class="footer">
            <p>BikesByFazenda | Rua Alfredo Costa, Sobralinho 2615-308</p>
            <p>Tel: +351 123 456 789 | Email: bikesbyfazenda@gmail.com</p>
            <p>© {{ date('Y') }} BikesByFazenda. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html> 