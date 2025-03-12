<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos - BikesByFazenda</title>

    @include('home.css')

    <style type="text/css">
        .orders-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .orders-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 3px solid #9935dc;
            padding-bottom: 10px;
            display: inline-block;
        }

        .title-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .orders-table {
            width: 100%;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .orders-table th {
            background-color: #9935dc;
            color: white;
            padding: 15px;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .orders-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .orders-table img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
            transition: transform 0.3s ease;
        }

        .orders-table img:hover {
            transform: scale(1.1);
        }

        .product-name {
            font-weight: 600;
            color: #333;
        }

        .product-price {
            font-weight: 600;
            color: #9935dc;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        .status-in-progress {
            background-color: #ffeeba;
            color: #856404;
        }

        .status-on-the-way {
            background-color: #b8daff;
            color: #004085;
        }

        .status-delivered {
            background-color: #c3e6cb;
            color: #155724;
        }

        .order-info {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .order-date {
            white-space: nowrap;
        }

        .no-orders {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .no-orders i {
            font-size: 3rem;
            color: #9935dc;
            margin-bottom: 20px;
        }

        .no-orders h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .no-orders p {
            color: #6c757d;
            margin-bottom: 20px;
        }

        .btn-shop {
            display: inline-block;
            background-color: #9935dc;
            color: white;
            padding: 10px 25px;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-shop:hover {
            background-color: #8024c0;
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .orders-table {
                display: block;
                overflow-x: auto;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .orders-table th,
            .orders-table td {
                min-width: 120px;
            }

            .order-info {
                display: block;
                margin-top: 5px;
            }
        }

        .order-group {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .order-header {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-bottom: 1px solid #dee2e6;
        }

        .order-header h3 {
            color: #333;
            margin: 0 0 1rem 0;
            font-size: 1.2rem;
        }

        .order-total {
            background-color: #f8f9fa;
        }

        .order-total td {
            padding: 1rem;
            font-size: 1.1rem;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <section class="orders-section">
        <div class="orders-container">
            <div class="title-container">
                <h1 class="section-title">Meus Pedidos</h1>
            </div>

            @if(isset($orders) && $orders->count() > 0)
                @php
                    $groupedOrders = $orders->groupBy('order_number');
                @endphp

                @foreach($groupedOrders as $orderNumber => $orderItems)
                    <div class="order-group mb-4">
                        <div class="order-header">
                            <h3>Pedido #{{$orderNumber}}</h3>
                            <p class="order-date">Data: {{date('d/m/Y H:i', strtotime($orderItems->first()->created_at))}}</p>
                            <p class="order-info">
                                Endereço: {{$orderItems->first()->rec_address}}<br>
                                Telefone: {{$orderItems->first()->phone}}
                            </p>
                        </div>

                        <div class="table-responsive">
                            <table class="orders-table">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>Quantidade</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Metodo de Pagamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $orderTotal = 0; @endphp
                                    @foreach($orderItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->is_motorcycle)
                                                        <img src="{{ $item->motorcycle->photos->first() ? asset('motorcycles/' . $item->motorcycle->photos->first()->image) : asset('images/no-image.jpg') }}" alt="{{$item->motorcycle->name}}" class="product-image me-3">
                                                        <div>
                                                            <div class="product-title">{{$item->motorcycle->name}}</div>
                                                            <small class="text-muted">Moto</small>
                                                        </div>
                                                    @else
                                                        <img src="/products/{{$item->product->image}}" alt="{{$item->product->title}}" class="product-image me-3">
                                                        <div>
                                                            <div class="product-title">{{$item->product->title}}</div>
                                                            <small class="text-muted">Produto</small>
                                                            @if($item->size)
                                                            <small class="text-muted">Tamanho: {{$item->size}}</small>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->is_motorcycle)
                                                    {{$item->motorcycle->price}}€
                                                @else
                                                    {{$item->product->price}}€
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->is_motorcycle)
                                                    1
                                                @else
                                                    {{$item->quantity}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->is_motorcycle)
                                                    {{$item->motorcycle->price}}€
                                                @else
                                                    {{$item->product->price * $item->quantity}}€
                                                @endif
                                            </td>
                                            <td>
                                                <span class="status-badge status-{{str_replace(' ', '-', $item->status)}}">{{$item->status}}</span>
                                            </td>
                                            <td>
                                                <span class="payment-badge payment-{{str_replace(' ', '-', $item->payment_status)}}">{{$item->payment_status}}</span>
                                            </td>
                                        </tr>
                                        @php 
                                            if($item->is_motorcycle) {
                                                $orderTotal += $item->motorcycle->price;
                                            } else {
                                                $orderTotal += $item->product->price * $item->quantity;
                                            }
                                        @endphp
                                    @endforeach
                                    <tr class="order-total">
                                        <td colspan="3" class="text-right"><strong>Total do Pedido:</strong></td>
                                        <td colspan="3" class="product-price"><strong>{{$orderTotal}}€</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-orders">
                    <i class="fas fa-shopping-bag"></i>
                    <h3>Nenhum pedido encontrado</h3>
                    <p>Você ainda não fez nenhum pedido. Que tal começar a comprar?</p>
                    <a href="{{ route('motorcycle.catalog') }}" class="btn-shop">
                        <i class="fas fa-motorcycle"></i> Ver Catálogo
                    </a>
                </div>
            @endif
        </div>
    </section>

    @include('home.footer')
</body>
</html>