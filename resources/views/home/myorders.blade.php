@extends('layouts.app')

@section('content')
<div class="hero_area">
    @include('home.header')
</div>

<div class="container py-5">
    <div class="row">
        <!-- Menu lateral -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="profile-header text-center mb-4">
                        <div class="profile-avatar mb-3">
                            <i class="fas fa-user-circle fa-4x text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold">{{ auth()->user()->name }}</h5>
                        <p class="text-muted">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('profile') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-user me-2"></i> Meu Perfil
                        </a>
                        <a href="{{ url('/orders') }}" class="list-group-item list-group-item-action active d-flex align-items-center">
                            <i class="fas fa-shopping-bag me-2"></i> Meus Pedidos
                        </a>
                        <a href="{{ route('loyalty.points') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-award me-2"></i> Pontos de Fidelidade
                          </a>
                        <a href="{{url('wishlist')}}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-heart me-2"></i> Lista de Desejos
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-map-marker-alt me-2"></i> Endereços
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-credit-card me-2"></i> Cartões
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-cog me-2"></i> Configurações
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo principal -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold mb-0">Histórico de Pedidos</h5>
                    </div>

                    @if(isset($orders) && $orders->count() > 0)
                        @php
                            $groupedOrders = $orders->groupBy('order_number');
                        @endphp

                        @foreach($groupedOrders as $orderNumber => $orderItems)
                            <div class="order-item mb-4">
                                <div class="order-header d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-1">Pedido #{{$orderNumber}}</h6>
                                        <small class="text-muted">Realizado em {{date('d/m/Y H:i', strtotime($orderItems->first()->created_at))}}</small>
                                    </div>
                                    <div class="text-end">
                                        @php
                                            $statusColors = [
                                                'in progress' => 'bg-warning',
                                                'On the way' => 'bg-info',
                                                'Delivered' => 'bg-success'
                                            ];
                                            $statusText = [
                                                'in progress' => 'Em Processamento',
                                                'On the way' => 'Em Trânsito',
                                                'Delivered' => 'Entregue'
                                            ];
                                            $mainStatus = $orderItems->pluck('status')->contains('in progress') ? 'in progress' : 
                                                          ($orderItems->pluck('status')->contains('On the way') ? 'On the way' : 'Delivered');
                                        @endphp
                                        <span class="badge {{ $statusColors[$mainStatus] ?? 'bg-secondary' }} mb-2">
                                            {{ $statusText[$mainStatus] ?? $mainStatus }}
                                        </span>
                                        <div class="order-total fw-bold">
                                            @php
                                                $orderTotal = $orderItems->sum(function($item) {
                                                    if(isset($item->is_motorcycle) && $item->is_motorcycle) {
                                                        return $item->motorcycle->price;
                                                    } else {
                                                        return $item->product->price * $item->quantity;
                                                    }
                                                });
                                            @endphp
                                            {{ number_format($orderTotal, 2, ',', '.') }}€
                                        </div>
                                    </div>
                                </div>

                                <div class="order-products">
                                    @foreach($orderItems as $item)
                                        <div class="product-item d-flex align-items-center p-3 bg-light rounded mb-2">
                                            @if($item->is_motorcycle)
                                                <img src="{{ $item->motorcycle->photos->first() ? asset('motorcycles/' . $item->motorcycle->photos->first()->image) : asset('images/no-image.jpg') }}" 
                                                     alt="{{$item->motorcycle->name}}" 
                                                     class="me-3 rounded" 
                                                     style="width: 80px; height: 80px; object-fit: cover;">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{$item->motorcycle->name}}</h6>
                                                    <small class="text-muted">Quantidade: 1</small>
                                                    <div class="product-price mt-1">{{ number_format($item->motorcycle->price, 2, ',', '.') }}€</div>
                                                </div>
                                            @else
                                                <img src="/products/{{$item->product->image}}" 
                                                     alt="{{$item->product->title}}" 
                                                     class="me-3 rounded"
                                                     style="width: 80px; height: 80px; object-fit: cover;">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{$item->product->title}}</h6>
                                                    <small class="text-muted">Quantidade: {{$item->quantity}}</small>
                                                    @if($item->size)
                                                        <small class="text-muted">Tamanho: {{$item->size}}</small>
                                                    @endif
                                                    <div class="product-price mt-1">{{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}€</div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <div class="order-footer mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <small class="text-muted">Endereço de entrega:</small>
                                            <div>{{$orderItems->first()->rec_address}}</div>
                                            <div>Telefone: {{$orderItems->first()->phone}}</div>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Forma de pagamento:</small>
                                            <div>{{$orderItems->first()->payment_status}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                            <h3>Nenhum pedido encontrado</h3>
                            <p class="text-muted">Você ainda não fez nenhum pedido. Que tal começar a comprar?</p>
                            <a href="{{ route('motorcycle.catalog') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-motorcycle me-2"></i>Ver Catálogo
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
body {
    background-color: #f0f2f5;
}

.card {
    border: none;
    border-radius: 15px;
    background-color: rgba(128, 0, 128, 0.075);
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.profile-header {
    padding: 20px 0;
    border-bottom: 2px solid #f0f2f5;
    background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
    border-radius: 15px 15px 0 0;
}

.profile-avatar {
    color: #9935dc;
}

.list-group-item {
    border: none;
    padding: 12px 20px;
    margin-bottom: 5px;
    border-radius: 10px !important;
    transition: all 0.3s ease;
    color: #555;
    background-color: #f8f9fa;
}

.list-group-item:hover {
    background-color: #e9ecef;
    transform: translateX(5px);
    color: #9935dc;
}

.list-group-item.active {
    background-color: #9935dc;
    border-color: #9935dc;
    color: white;
    box-shadow: 0 2px 10px rgba(153, 53, 220, 0.3);
}

.card-title {
    color: #333;
    font-size: 1.25rem;
}

.hero_area {
    background: #fff;
    padding: 30px 0;
    margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Estilos específicos para a página de pedidos */
.order-item {
    background: #fff;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.order-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.badge {
    padding: 8px 12px;
    font-weight: 500;
    border-radius: 8px;
}

.product-item {
    transition: all 0.3s ease;
}

.product-item:hover {
    background-color: #f8f9fa !important;
}

.product-price {
    color: #9935dc;
    font-weight: 500;
}

.order-total {
    color: #9935dc;
    font-size: 1.1rem;
}

/* Adiciona uma borda sutil aos cards */
.card-body {
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 15px;
}

/* Melhora o contraste do texto */
.text-muted {
    color: #6c757d !important;
}

.text-danger {
    color: #9935dc !important;
}
</style>
@endsection