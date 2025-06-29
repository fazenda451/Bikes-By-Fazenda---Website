@extends('layouts.app')

@section('content')
<div class="hero_area">
    @include('home.header')
</div>

<div class="container py-5">
    <div class="row">
        <!-- Menu lateral -->
        <div class="col-md-3">
            <div class="card shadow-sm profile-sidebar">
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
                            <i class="fas fa-user me-2"></i> <span class="nav-text">My Profile</span>
                        </a>
                        <a href="{{ url('/orders') }}" class="list-group-item list-group-item-action active d-flex align-items-center">
                            <i class="fas fa-shopping-bag me-2"></i> <span class="nav-text">My Orders</span>
                        </a>
                        <a href="{{ route('loyalty.points') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-award me-2"></i> <span class="nav-text">Loyalty Points</span>
                        </a>
                        <a href="{{url('wishlist')}}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-heart me-2"></i> <span class="nav-text">Wishlist</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-map-marker-alt me-2"></i> <span class="nav-text">Addresses</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-credit-card me-2"></i> <span class="nav-text">Cards</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-cog me-2"></i> <span class="nav-text">Settings</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo principal -->
        <div class="col-md-9">
            <div class="card shadow-sm main-content">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4 page-header">
                        <h5 class="card-title fw-bold mb-0">Order History</h5>
                    </div>

                    @if(isset($orders) && $orders->count() > 0)
                        @php
                            $groupedOrders = $orders->groupBy('order_number');
                        @endphp

                        @foreach($groupedOrders as $orderNumber => $orderItems)
                            <div class="order-item mb-4">
                                <div class="order-header d-flex justify-content-between align-items-center mb-3">
                                    <div class="order-info">
                                        <h6 class="mb-1 order-number">Order #{{$orderNumber}}</h6>
                                        <small class="text-muted order-date">Realized at {{date('d/m/Y H:i', strtotime($orderItems->first()->created_at))}}</small>
                                    </div>
                                    <div class="text-end order-status">
                                        @php
                                            $statusColors = [
                                                'in progress' => 'bg-warning',
                                                'On the way' => 'bg-info',
                                                'Delivered' => 'bg-success'
                                            ];
                                            $statusText = [
                                                'in progress' => 'In Progress',
                                                'On the way' => 'On the way',
                                                'Delivered' => 'Delivered'
                                            ];
                                            $mainStatus = $orderItems->pluck('status')->contains('in progress') ? 'in progress' : 
                                                          ($orderItems->pluck('status')->contains('On the way') ? 'On the way' : 'Delivered');
                                        @endphp
                                        <span class="badge {{ $statusColors[$mainStatus] ?? 'bg-secondary' }} mb-2 status-badge">
                                            {{ $statusText[$mainStatus] ?? $mainStatus }}
                                        </span>
                                        <div class="order-total fw-bold">
                                            @php
                                                $orderTotal = $orderItems->sum(function($item) {
                                                    if(isset($item->is_motorcycle) && $item->is_motorcycle) {
                                                        return $item->motorcycle->price;
                                                    } else {
                                                        if($item->product->hasDiscount()) {
                                                            return $item->product->getDiscountedPrice() * $item->quantity;
                                                        } else {
                                                            return $item->product->price * $item->quantity;
                                                        }
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
                                                     class="me-3 rounded product-image" 
                                                     style="width: 80px; height: 80px; object-fit: cover;">
                                                <div class="flex-grow-1 product-details">
                                                    <h6 class="mb-1 product-title">{{$item->motorcycle->name}}</h6>
                                                    <small class="text-muted product-meta">Quantity: 1</small>
                                                    <div class="product-price mt-1">{{ number_format($item->motorcycle->price, 2, ',', '.') }}€</div>
                                                </div>
                                            @else
                                                <img src="/products/{{$item->product->image}}" 
                                                     alt="{{$item->product->title}}" 
                                                     class="me-3 rounded product-image"
                                                     style="width: 80px; height: 80px; object-fit: cover;">
                                                <div class="flex-grow-1 product-details">
                                                    <h6 class="mb-1 product-title">{{$item->product->title}}</h6>
                                                    <small class="text-muted product-meta">Quantity: {{$item->quantity}}</small>
                                                    @if($item->size)
                                                        <small class="text-muted product-meta">Size: {{$item->size}}</small>
                                                    @endif
                                                    <div class="product-price mt-1">
                                                        @if($item->product->hasDiscount())
                                                            <span style="text-decoration: line-through; color: #999; font-size: 0.9rem; margin-right: 5px;">{{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}€</span>
                                                            <span style="color: #28a745; font-weight: bold;">{{ number_format($item->product->getDiscountedPrice() * $item->quantity, 2, ',', '.') }}€</span>
                                                            <div style="margin-top: 3px;">
                                                                <span style="background: #e74c3c; color: white; padding: 2px 6px; border-radius: 8px; font-size: 0.7rem;">-{{ number_format($item->product->discount_percentage, 0) }}% OFF</span>
                                                            </div>
                                                        @else
                                                            {{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}€
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <div class="order-footer mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-start order-details-row">
                                        <div class="delivery-info">
                                            <small class="text-muted">Delivery method:</small>
                                            <div class="delivery-method">
                                                @if($orderItems->first()->delivery_method == 'home')
                                                    <span class="badge bg-info delivery-badge">
                                                        <i class="fas fa-home me-1"></i> Home Delivery
                                                    </span>
                                                    <div class="mt-2 address-info">
                                                        <small class="text-muted">Delivery address:</small>
                                                        <div class="address-text">{{$orderItems->first()->rec_address}}</div>
                                                    </div>
                                                @else
                                                    <span class="badge bg-primary delivery-badge">
                                                        <i class="fas fa-store me-1"></i> Store Pickup
                                                    </span>
                                                    <div class="mt-2 address-info">
                                                        <small class="text-muted">Store location:</small>
                                                        <div class="address-text">
                                                            @switch($orderItems->first()->store_location)
                                                                @case('lisbon')
                                                                    Lisbon Store - Av. da Liberdade 123
                                                                    @break
                                                                @case('porto')
                                                                    Porto Store - Rua de Santa Catarina 456
                                                                    @break
                                                                @case('faro')
                                                                    Faro Store - Rua de Santo António 789
                                                                    @break
                                                                @case('braga')
                                                                    Braga Store - Avenida Central 101
                                                                    @break
                                                                @default
                                                                    {{$orderItems->first()->store_location}}
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mt-2 phone-info">
                                                <small class="text-muted">Phone:</small> 
                                                <span class="phone-number">{{$orderItems->first()->phone}}</span>
                                            </div>
                                        </div>
                                        <div class="text-end payment-info">
                                            <small class="text-muted">Payment method:</small>
                                            <div class="payment-method">{{$orderItems->first()->payment_status}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-5 empty-orders">
                            <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                            <h3>No orders found</h3>
                            <p class="text-muted">You haven't placed any orders yet. How about starting to shop?</p>
                            <a href="{{ route('motorcycle.catalog') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-motorcycle me-2"></i>View Catalog
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

/* Media Queries para Responsividade Mobile */
@media (max-width: 768px) {
    .container {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .py-5 {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
    }

    /* Menu lateral em mobile */
    .profile-sidebar {
        margin-bottom: 1.5rem;
    }

    .profile-header {
        padding: 15px 0;
    }

    .profile-avatar {
        margin-bottom: 1rem !important;
    }

    .profile-avatar i {
        font-size: 2.5rem !important;
    }

    .card-title {
        font-size: 1.1rem;
    }

    .list-group-item {
        padding: 10px 15px;
        margin-bottom: 3px;
    }

    .nav-text {
        font-size: 0.9rem;
    }

    /* Conteúdo principal */
    .main-content .card-body {
        padding: 1rem;
    }

    .page-header {
        flex-direction: column;
        align-items: flex-start !important;
        text-align: center;
        margin-bottom: 2rem !important;
    }

    .page-header .card-title {
        width: 100%;
        text-align: center;
    }

    /* Cards de pedidos */
    .order-item {
        padding: 15px;
        margin-bottom: 1.5rem;
    }

    .order-header {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 1rem;
        margin-bottom: 2rem !important;
    }

    .order-info {
        width: 100%;
        text-align: center;
    }

    .order-number {
        font-size: 1.1rem;
        margin-bottom: 0.5rem !important;
    }

    .order-date {
        font-size: 0.85rem;
    }

    .order-status {
        width: 100%;
        text-align: center !important;
    }

    .status-badge {
        font-size: 0.9rem;
        padding: 6px 12px;
    }

    .order-total {
        font-size: 1.2rem;
        margin-top: 0.5rem;
    }

    /* Produtos nos pedidos */
    .product-item {
        flex-direction: column;
        align-items: flex-start !important;
        text-align: center;
        padding: 1rem !important;
    }

    .product-image {
        width: 60px !important;
        height: 60px !important;
        margin: 0 auto 1rem auto !important;
    }

    .product-details {
        width: 100%;
        text-align: center;
    }

    .product-title {
        font-size: 1rem;
        margin-bottom: 0.5rem !important;
    }

    .product-meta {
        display: block;
        margin-bottom: 0.25rem;
        font-size: 0.8rem;
    }

    .product-price {
        font-size: 1rem;
        margin-top: 0.5rem !important;
    }

    /* Footer do pedido */
    .order-footer {
        margin-top: 2rem !important;
        padding-top: 1rem !important;
    }

    .order-details-row {
        flex-direction: column !important;
        gap: 1.5rem;
    }

    .delivery-info,
    .payment-info {
        width: 100%;
        text-align: center !important;
    }

    .delivery-badge {
        font-size: 0.85rem;
        padding: 6px 10px;
    }

    .address-info,
    .phone-info {
        margin-top: 1rem !important;
    }

    .address-text,
    .phone-number,
    .payment-method {
        font-size: 0.9rem;
        line-height: 1.4;
    }

    /* Estado vazio */
    .empty-orders {
        padding: 2rem 1rem !important;
    }

    .empty-orders i {
        font-size: 2.5rem !important;
    }

    .empty-orders h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
    }

    .empty-orders p {
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }
}

@media (max-width: 576px) {
    .container {
        padding-left: 0.25rem;
        padding-right: 0.25rem;
    }

    .py-5 {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
    }

    .card {
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .profile-sidebar .card-body,
    .main-content .card-body {
        padding: 0.75rem;
    }

    .profile-header {
        padding: 10px 0;
    }

    .list-group-item {
        padding: 8px 12px;
        font-size: 0.85rem;
    }

    .order-item {
        padding: 12px;
        margin-bottom: 1rem;
    }

    .order-number {
        font-size: 1rem;
    }

    .order-date {
        font-size: 0.8rem;
    }

    .status-badge {
        font-size: 0.8rem;
        padding: 4px 8px;
    }

    .order-total {
        font-size: 1.1rem;
    }

    .product-item {
        padding: 0.75rem !important;
    }

    .product-image {
        width: 50px !important;
        height: 50px !important;
    }

    .product-title {
        font-size: 0.9rem;
    }

    .product-meta {
        font-size: 0.75rem;
    }

    .product-price {
        font-size: 0.9rem;
    }

    .delivery-badge {
        font-size: 0.75rem;
        padding: 4px 8px;
    }

    .address-text,
    .phone-number,
    .payment-method {
        font-size: 0.8rem;
    }
}

/* Melhorias adicionais para navegação mobile */
@media (max-width: 768px) {
    .list-group-item {
        justify-content: center;
    }
    
    .list-group-item i {
        margin-right: 0.5rem !important;
    }
}

/* Ajustes para o card do perfil */
.profile-sidebar .card-body {
    padding: 1rem;
}

.main-content {
    min-height: 400px;
}
</style>

<!-- Toastr Assets -->
@include('home.toastr_assets')

@endsection