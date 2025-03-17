@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
  
  <style>
    /* Estilos minimalistas para a lista de desejos */
    :root {
      --primary-color: #9935dc;
      --primary-light: rgba(153, 53, 220, 0.1);
      --primary-hover: #8024c0;
      --text-dark: #333;
      --text-muted: #6c757d;
      --bg-light: #f8f9fa;
      --border-color: #e9ecef;
      --success-color: #28a745;
      --success-hover: #218838;
      --danger-color: #dc3545;
      --danger-hover: #c82333;
      --white: #fff;
      --shadow-sm: 0 2px 5px rgba(0, 0, 0, 0.05);
      --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.08);
      --shadow-hover: 0 10px 25px rgba(153, 53, 220, 0.15);
      --transition: all 0.3s ease;
    }

    body {
      background-color: #f2f0f5;
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

    .wishlist-item {
      display: flex;
      background-color: var(--white);
      border-radius: 8px;
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      margin-bottom: 1.5rem;
      transition: var(--transition);
      border: 1px solid var(--border-color);
    }

    .wishlist-item:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-hover);
    }

    .wishlist-image {
      width: 180px;
      height: 180px;
      overflow: hidden;
      position: relative;
      flex-shrink: 0;
    }

    .wishlist-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: var(--transition);
    }

    .wishlist-item:hover .wishlist-image img {
      transform: scale(1.05);
    }

    .wishlist-info {
      padding: 1.5rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .wishlist-name {
      font-size: 1.25rem;
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: var(--text-dark);
    }

    .wishlist-brand {
      color: var(--text-muted);
      margin-bottom: 0.75rem;
      font-size: 0.9rem;
    }

    .wishlist-price {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 1rem;
    }

    .wishlist-actions {
      display: flex;
      gap: 0.75rem;
    }

    .btn-action {
      padding: 0.5rem 1rem;
      border-radius: 4px;
      font-weight: 500;
      font-size: 0.9rem;
      text-align: center;
      text-decoration: none;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-view {
      background-color: var(--primary-color);
      color: var(--white);
      border: none;
    }

    .btn-view:hover {
      background-color: var(--primary-hover);
      color: var(--white);
    }

    .btn-primary {
      background-color: #9935dc;
      border-color: #9935dc;
      padding: 10px 25px;
      border-radius: 10px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #8024c0;
      border-color: #8024c0;
      transform: translateY(-2px);
    }

    .btn-cart {
      background-color: var(--success-color);
      color: var(--white);
      border: none;
    }

    .btn-cart:hover {
      background-color: var(--success-hover);
      color: var(--white);
    }

    .btn-remove {
      background-color: var(--white);
      color: var(--danger-color);
      border: 1px solid var(--danger-color);
    }

    .btn-remove:hover {
      background-color: var(--danger-color);
      color: var(--white);
    }

    .section-title {
      font-size: 1.5rem;
      font-weight: 500;
      margin: 2.5rem 0 1.5rem;
      color: var(--text-dark);
      position: relative;
      padding-bottom: 0.5rem;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 2px;
      background-color: var(--primary-color);
    }

    .license-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: rgba(153, 53, 220, 0.85);
      color: var(--white);
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      font-weight: 500;
      font-size: 0.75rem;
      z-index: 10;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .alert {
      border-radius: 4px;
      padding: 1rem;
      margin-bottom: 1.5rem;
      border: none;
      box-shadow: var(--shadow-sm);
    }

    .alert-success {
      background-color: rgba(40, 167, 69, 0.1);
      color: #155724;
    }

    .btn-close {
      font-size: 0.9rem;
      opacity: 0.5;
    }

    .btn-close:hover {
      opacity: 1;
    }

    .explore-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .wishlist-empty {
      text-align: center;
      padding: 4rem 0;
      color: var(--text-muted);
      background-color: var(--white);
      border-radius: 8px;
      box-shadow: var(--shadow-sm);
    }

    .wishlist-empty i {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--primary-color);
      opacity: 0.7;
    }

    .wishlist-empty h3 {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: var(--text-dark);
    }

    .wishlist-empty p {
      max-width: 400px;
      margin: 0 auto 1.5rem;
    }

    @media (max-width: 768px) {
      .wishlist-item {
        flex-direction: column;
      }

      .wishlist-image {
        width: 100%;
        height: 200px;
      }

      .wishlist-actions {
        flex-wrap: wrap;
      }

      .btn-action {
        flex: 1 0 auto;
      }
    }

    .text-danger {
      color: #9935dc !important;
    }

    .text-primary {
      color: #9935dc !important;
    }

    /* Estilo para o loading */
    .loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.7);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s, visibility 0.3s;
    }
    
    .loading-overlay.active {
      opacity: 1;
      visibility: visible;
    }
    
    .loading-image {
      width: 600px;
      height: 600px;
      object-fit: contain;
    }
  </style>
</head>

<body>
  <!-- Loading Overlay -->
  <div class="loading-overlay">
    <img src="{{ asset('images/loading.gif') }}" alt="Loading..." class="loading-image">
  </div>
  
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
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
                        <i class="fas fa-user me-2"></i> My Profile
                    </a>
                    <a href="{{ url('/orders') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-shopping-bag me-2"></i> My Orders
                    </a>
                    <a href="{{ route('loyalty.points') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-award me-2"></i> Loyalty Points
                      </a>
                    <a href="{{url('wishlist')}}" class="list-group-item list-group-item-action active d-flex align-items-center">
                        <i class="fas fa-heart me-2"></i> Wishlist
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-map-marker-alt me-2"></i> Addresses
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-credit-card me-2"></i> Payment Methods
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-cog me-2"></i> Settings
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
              <h5 class="card-title fw-bold mb-0">My Wishlist</h5>
            </div>

            @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if($wishlist_motorcycles->count() > 0)
              <h2 class="section-title">Motorcycles</h2>
              @foreach($wishlist_motorcycles as $item)
                <div class="wishlist-item">
                  <div class="wishlist-image">
                    @if($item->motorcycle->photos->isNotEmpty())
                      <img src="{{ asset('motorcycles/' . $item->motorcycle->photos->first()->image) }}" alt="{{ $item->motorcycle->name }}">
                    @else
                      <img src="{{ asset('images/no-image.jpg') }}" alt="No image available">
                    @endif
                    @if($item->motorcycle->licenseType)
                      <div class="license-badge">{{ $item->motorcycle->licenseType->name }}</div>
                    @endif
                  </div>
                  <div class="wishlist-info">
                    <div>
                      <h3 class="wishlist-name">{{ $item->motorcycle->name }}</h3>
                      <div class="wishlist-brand">{{ $item->motorcycle->brand->brand_name }}</div>
                      <div class="wishlist-price">
                        @if($item->motorcycle->price)
                          {{ number_format($item->motorcycle->price, 2, ',', '.') }}€
                        @else
                          Preço sob consulta
                        @endif
                      </div>
                    </div>
                    <div class="wishlist-actions">
                      <a href="{{ url('motorcycle_details', $item->motorcycle->id) }}" class="btn-action btn-view">
                        <i class="fas fa-eye"></i> View Details
                      </a>
                      <a href="{{ route('move.to.cart', $item->id) }}" class="btn-action btn-cart">
                        <i class="fas fa-shopping-cart"></i> Move to Cart
                      </a>
                      <a href="{{ route('delete.wishlist.item', $item->id) }}" class="btn-action btn-remove" onclick="return confirm('Are you sure you want to remove this item from your wishlist?')">
                        <i class="fas fa-trash-alt"></i> Remove
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif

            @if($wishlist_products->count() > 0)
              <h2 class="section-title">Products</h2>
              @foreach($wishlist_products as $item)
                <div class="wishlist-item">
                  <div class="wishlist-image">
                    <img src="/products/{{$item->product->image}}" alt="{{ $item->product->title }}">
                  </div>
                  <div class="wishlist-info">
                    <div>
                      <h3 class="wishlist-name">{{ $item->product->title }}</h3>
                      <div class="wishlist-brand">{{ $item->product->category->category_name }}</div>
                      <div class="wishlist-price">
                        @if($item->product->discount_price)
                          <span style="text-decoration: line-through; color: #999; font-size: 0.9rem; margin-right: 0.5rem;">{{ number_format($item->product->price, 2, ',', '.') }}€</span>
                          {{ number_format($item->product->discount_price, 2, ',', '.') }}€
                        @else
                          {{ number_format($item->product->price, 2, ',', '.') }}€
                        @endif
                      </div>
                    </div>
                    <div class="wishlist-actions">
                      <a href="{{ url('product_details', $item->product->id) }}" class="btn-action btn-view">
                        <i class="fas fa-eye"></i> View Details
                      </a>
                      <a href="{{ route('move.to.cart', $item->id) }}" class="btn-action btn-cart">
                        <i class="fas fa-shopping-cart"></i> Move to Cart
                      </a>
                      <a href="{{ route('delete.wishlist.item', $item->id) }}" class="btn-action btn-remove" onclick="return confirm('Are you sure you want to remove this item from your wishlist?')">
                        <i class="fas fa-trash-alt"></i> Remove
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif

            @if($wishlist_motorcycles->count() == 0 && $wishlist_products->count() == 0)
              <div class="wishlist-empty">
                <i class="fas fa-heart-broken"></i>
                <h3>Your wishlist is empty</h3>
                <p>Add items to your wishlist to save them for later.</p>
                <div class="explore-buttons">
                  <a href="{{ route('motorcycle.catalog') }}" class="btn-action btn-view">
                    <i class="fas fa-motorcycle"></i> Explore Motorcycles
                  </a>
                  <a href="{{ route('product.catalog') }}" class="btn-action btn-view">
                    <i class="fas fa-tshirt"></i> Explore Products
                  </a>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Fechar alertas automaticamente após 5 segundos
      setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
          const closeButton = alert.querySelector('.btn-close');
          if (closeButton) {
            closeButton.click();
          }
        });
      }, 5000);
    });
  </script>

  <!-- Footer -->
  @include('home.footer')

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Loading overlay
    document.addEventListener('DOMContentLoaded', function() {
      const loadingOverlay = document.querySelector('.loading-overlay');
      
      // Ativar loading overlay para os links de navegação
      const navigationLinks = document.querySelectorAll('a:not([href="#"])');
      navigationLinks.forEach(link => {
        if (!link.getAttribute('href').startsWith('#') && !link.hasAttribute('data-bs-toggle')) {
          link.addEventListener('click', function() {
            loadingOverlay.classList.add('active');
          });
        }
      });
    });
  </script>
</body>

</html>
@endsection 