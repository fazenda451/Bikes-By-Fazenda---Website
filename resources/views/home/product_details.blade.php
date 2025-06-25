<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

  <style type="text/css">
    .product-details {
      padding: 60px 0;
      background-color: #f8f9fa;
    }

    .product-container {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
      padding: 30px;
      margin-bottom: 30px;
    }

    .product-image-container {
      position: relative;
      margin-bottom: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      border-radius: 0.75rem;
      overflow: hidden;
    }

    .product-image {
      width: 100%;
      height: auto;
      object-fit: contain;
      border-radius: 0.75rem;
    }

    .product-title {
      font-size: 1.9rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 10px;
      border-bottom: 2px solid #9935dc;
      padding-bottom: 10px;
    }

    .product-ref {
      font-size: 0.95rem;
      color: #6c757d;
      margin-top: 5px;
      margin-bottom: 25px;
    }

    .product-price-container {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
    }

    .product-price {
      font-size: 2.2rem;
      font-weight: 700;
      color: #9935dc;
    }

    .product-tax {
      font-size: 0.95rem;
      color: #6c757d;
      margin-left: 12px;
    }

    .product-availability {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      padding: 12px 20px;
      background-color: #e8f5e9;
      border-radius: 0.75rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .availability-icon {
      color: #4caf50;
      margin-right: 10px;
      font-size: 1.2rem;
    }

    .availability-text {
      color: #2e7d32;
      font-weight: 600;
    }

    .product-options {
      margin-bottom: 30px;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 1rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .option-title {
      font-weight: 600;
      color: #333;
      margin-bottom: 15px;
    }

    .size-options {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 20px;
    }

    .size-option {
      display: none;
    }

    .size-label {
      display: inline-block;
      padding: 10px 20px;
      background-color: white;
      border: 2px solid #dee2e6;
      border-radius: 4px;
      font-weight: 600;
      color: #495057;
      cursor: pointer;
      transition: all 0.25s ease;
    }

    .size-option:checked + .size-label {
      background-color: #9935dc;
      border-color: #9935dc;
      color: white;
      box-shadow: 0 4px 10px rgba(153, 53, 220, 0.3);
      transform: translateY(-2px);
    }

    .size-label:hover {
      border-color: #9935dc;
      transform: translateY(-2px);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .size-guide {
      display: inline-block;
      margin-left: 15px;
      color: #9935dc;
      font-size: 0.9rem;
      text-decoration: underline;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .size-guide:hover {
      text-decoration: none;
      color: #8024c0;
    }

    .quantity-selector {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .quantity-label {
      margin-right: 15px;
      font-weight: 600;
      color: #495057;
    }

    .quantity-controls {
      display: flex;
      align-items: center;
      border: 1px solid #dee2e6;
      border-radius: 0.75rem;
      overflow: hidden;
    }

    .quantity-btn {
      background-color: #f8f9fa;
      border: none;
      color: #495057;
      width: 40px;
      height: 40px;
      font-size: 1.2rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .quantity-btn:hover {
      background-color: #e9ecef;
      transform: scale(1.05);
    }

    .quantity-input {
      width: 60px;
      height: 40px;
      border: none;
      border-left: 1px solid #dee2e6;
      border-right: 1px solid #dee2e6;
      text-align: center;
      font-weight: 600;
    }

    .quantity-input:focus {
      outline: none;
      border-color: #9935dc;
      box-shadow: 0 0 0 0.25rem rgba(153, 53, 220, 0.25);
    }

    .btn-add-cart {
      width: 100%;
      background-color: #9935dc;
      color: white;
      padding: 15px 30px;
      border-radius: 4px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      border: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font-size: 1.1rem;
    }

    .btn-add-cart:hover {
      background-color: #8024c0;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(153, 53, 220, 0.3);
      color: white;
      text-decoration: none;
    }

    .btn-add-cart[disabled] {
      opacity: 0.6;
      cursor: not-allowed;
      background-color: #cccccc;
      box-shadow: none;
      transform: none;
    }

    .btn-wishlist {
      display: block;
      width: 100%;
      padding: 12px 20px;
      background-color: #fff;
      color: #333;
      border: 1px solid #ced4da;
      border-radius: 0.75rem;
      font-weight: 500;
      text-align: center;
      text-decoration: none;
      transition: all 0.25s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font-size: 1rem;
      margin-top: 10px;
    }

    .btn-wishlist:hover {
      background-color: #f8f9fa;
      color: #9935dc;
      border-color: #9935dc;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(153, 53, 220, 0.1);
    }

    .btn-wishlist i {
      color: #9935dc;
      transition: transform 0.3s ease;
    }
    
    .btn-wishlist:hover i {
      transform: scale(1.2);
    }

    .product-features {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
    }

    .feature-item {
      flex: 1 1 calc(33.333% - 15px);
      min-width: 200px;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 15px;
      background-color: #f8f9fa;
      border-radius: 0.75rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      transition: all 0.3s ease;
    }

    .feature-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      width: 40px;
      height: 40px;
      background-color: rgba(153, 53, 220, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #9935dc;
      font-size: 1.2rem;
    }

    .feature-text {
      font-size: 0.9rem;
      color: #6c757d;
    }

    .product-description-container {
      margin-top: 30px;
    }

    .description-title {
      font-size: 1.4rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .product-description {
      font-size: 1.05rem;
      line-height: 1.7;
      color: #4a4a4a;
    }

    .product-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 25px;
      margin-top: 35px;
      padding-top: 20px;
      border-top: 1px solid #dee2e6;
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .meta-label {
      font-size: 0.95rem;
      color: #6c757d;
    }

    .meta-value {
      font-size: 0.95rem;
      font-weight: 600;
      color: #333;
    }

    @media (max-width: 768px) {
      .product-title {
        font-size: 1.5rem;
      }

      .product-price {
        font-size: 1.5rem;
      }

      .feature-item {
        flex: 1 1 100%;
      }
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

    .star-rating-input label {
      transition: transform 0.2s;
    }
    .star-rating-input label:hover,
    .star-rating-input label:hover ~ label {
      transform: scale(1.2);
      color: #ffb700 !important;
    }
    .star-rating-input input:checked ~ label {
      color: #9935dc !important;
    }

    .product-rating-innovative {
      margin-top: 0;
      margin-bottom: 10px;
      background: none;
      border: none;
      box-shadow: none;
      padding: 0;
    }
    .rating-circle {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: linear-gradient(135deg, #9935dc 60%, #ffb700 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 16px rgba(153,53,220,0.12);
      color: #fff;
      font-weight: bold;
      font-size: 1.2rem;
    }
    .circle-value {
      font-size: 2.1rem;
      font-weight: 700;
      line-height: 1;
    }
    .rating-label {
      font-size: 0.9rem;
      color: #fff;
      opacity: 0.8;
    }
    .star-group .fa-star, .star-group .fa-star-half-alt, .star-group .fa-star {
      font-size: 2.2rem;
      transition: color 0.2s;
      color: #FFD700;
      filter: drop-shadow(0 1px 2px #e9d7fa);
    }
    .star-group .fa-star-half-alt {
      color: #ffb700;
    }
    .star-group .fa-star:not(:last-child) {
      margin-right: 2px;
    }
    .star-rating-input-animated {
      display: inline-flex;
      flex-direction: row-reverse;
    }
    .star-rating-input-animated label {
      font-size: 2.3rem;
      color: #e0e0e0;
      cursor: pointer;
      transition: transform 0.2s, color 0.2s;
      filter: drop-shadow(0 1px 2px #e9d7fa);
    }
    .star-rating-input-animated label:hover,
    .star-rating-input-animated label:hover ~ label {
      color: #9935dc !important;
      transform: scale(1.2);
    }
    .star-rating-input-animated input:checked ~ label {
      color: #9935dc !important;
    }
    .avatar-circle {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, #9935dc 60%, #ffb700 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 1.3rem;
      font-weight: bold;
      box-shadow: 0 2px 8px rgba(153,53,220,0.10);
    }
    .card {
      border-radius: 1.2rem !important;
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .card-body {
      padding: 1.5rem !important;
    }

    /* Estilo para o textarea do comentário */
    .form-control:focus {
      border-color: #9935dc;
      box-shadow: 0 0 0 0.25rem rgba(153, 53, 220, 0.25);
      outline: 0;
    }

    /* Estilo para as mensagens de alerta */
    .alert {
      border-radius: 0.75rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      padding: 1rem 1.5rem;
      margin-bottom: 1.5rem;
    }

    /* Estilo para o botão Enviar Avaliação */
    .btn-purple {
      background-color: #9935dc;
      color: white;
      padding: 10px 25px;
      border-radius: 0.5rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      border: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 0.95rem;
    }

    .btn-purple:hover {
      background-color: #8024c0;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(153, 53, 220, 0.3);
      color: white;
      text-decoration: none;
    }

    /* Estilos para as seções de avaliação */
    .product-rating-form {
      margin-top: 40px;
      margin-bottom: 40px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Sombra um pouco mais visível */
    }

    .product-rating-list {
      margin-top: 60px;
      margin-bottom: 60px;
    }

    /* Estilos para o Modal de Tamanhos */
    .modal-header {
      border-bottom: 1px solid rgba(153, 53, 220, 0.2); /* Borda inferior com cor do tema */
      padding: 1.5rem; /* Aumentar padding */
    }

    .modal-footer {
      border-top: 1px solid rgba(153, 53, 220, 0.2); /* Borda superior com cor do tema */
      padding: 1.5rem; /* Aumentar padding */
    }

    .btn-close {
      transition: transform 0.2s ease; /* Transição para o hover */
    }

    .btn-close:hover {
      transform: rotate(90deg); /* Efeito de rotação no hover */
      opacity: 1; /* Garantir opacidade total no hover */
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
  
  <!-- Products details start -->
  <section class="product-details">
    <div class="container">
      <div class="product-container">
        <div class="row">
          <div class="col-md-6">
            <div class="product-image-container">
              <img src="/products/{{$data->image}}" alt="{{$data->title}}" class="product-image">
            </div>
          </div>

          <div class="col-md-6">
            <h1 class="product-title">{{$data->title}}</h1>
            <div class="product-ref">Ref: PROD-{{$data->id}}</div>
            
            <div class="product-price-container">
              <div class="product-price">{{$data->price}}€</div>
              <div class="product-tax">Impostos incluídos</div>
            </div>
            
            <!-- Avaliação de Estrelas - Resumo movido para cima -->
            <div class="product-rating-innovative">
              <div class="d-flex align-items-center gap-4 flex-wrap">
                <div class="rating-circle text-center me-4">
                  <div class="circle-value">
                    <span class="rating-value">{{ number_format($averageRating, 1) }}</span>
                  </div>
                  <div class="rating-label">Média</div>
                </div>
                <div class="star-group flex-grow-1">
                  <span class="star-animated">
                    @php $media = round($averageRating, 1); @endphp
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($media >= $i)
                        <i class="fas fa-star"></i>
                      @elseif ($media >= $i - 0.5)
                        <i class="fas fa-star-half-alt"></i>
                      @else
                        <i class="far fa-star"></i>
                      @endif
                    @endfor
                  </span>
                  <span class="ms-3 text-secondary">{{ $ratingsCount }} avaliações</span>
                </div>
              </div>
            </div>

            @if($data->Quantity > 0)
              <div class="product-availability">
                <i class="fas fa-check-circle availability-icon"></i>
                <span class="availability-text">In stock - {{$data->Quantity}} units available</span>
              </div>
            @else
              <div class="product-availability" style="background-color: #ffebee;">
                <i class="fas fa-times-circle availability-icon" style="color: #f44336;"></i>
                <span class="availability-text" style="color: #c62828;">Out of stock</span>
              </div>
            @endif

            <form action="{{ url('add_cart_with_size', $data->id) }}" method="POST">
              @csrf
              
              <div class="product-options">
                @if($data->size)
                  <div class="option-title">Select Size:</div>
                  <div class="size-options">
                    @php
                      $availableSizes = explode(',', $data->size);
                    @endphp
                    
                    @foreach($availableSizes as $index => $size)
                      <input type="radio" name="size" id="size-{{$index}}" value="{{ trim($size) }}" class="size-option" {{ $index === 0 ? 'checked' : '' }}>
                      <label for="size-{{$index}}" class="size-label">{{ trim($size) }}</label>
                    @endforeach
                  </div>
                  
                  <div class="text-end">
                    <span class="size-guide" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
                      <i class="fas fa-ruler"></i> Size Guide
                    </span>
                  </div>
                @else
                  <input type="hidden" name="size" value="Único">
                @endif
                
                <div class="option-title mt-4">Quantity:</div>
                <div class="quantity-selector">
                  <div class="quantity-controls">
                    <button type="button" class="quantity-btn" onclick="decrementQuantity()">-</button>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{$data->Quantity}}" class="quantity-input">
                    <button type="button" class="quantity-btn" onclick="incrementQuantity()">+</button>
                  </div>
                </div>
              </div>
              
              <button type="submit" class="btn-add-cart" {{ $data->Quantity <= 0 ? 'disabled' : '' }}>
                <i class="fas fa-shopping-cart"></i>
                Add to Cart
              </button>
            </form>
            
            <a href="{{ route('add.to.wishlist', $data->id) }}" class="btn-wishlist mt-3">
              <i class="fas fa-heart"></i>
              Add to Wishlist
            </a>
          </div>
        </div>
        
        <!-- Nova estrutura de abas para Descrição, Características e Avaliações -->
        <div class="mt-5">
          <ul class="nav nav-tabs mb-4" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Descrição</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button" role="tab" aria-controls="features" aria-selected="false">Características</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Avaliações</button>
            </li>
          </ul>
          <div class="tab-content" id="productTabsContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="product-description-container">
                <h2 class="description-title">Detalhes do Produto</h2>
                <div class="product-description">
                  {{$data->description}}
                </div>
                
                <div class="product-meta">
                  <div class="meta-item">
                    <div class="meta-label">Categoria:</div>
                    <div class="meta-value">{{$data->category ? $data->category->category_name : 'No category'}}</div>
                  </div>
                  
                  @if($data->size)
                  <div class="meta-item">
                    <div class="meta-label">Tamanhos Disponíveis:</div>
                    <div class="meta-value">{{$data->size}}</div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
              <div class="product-features">
                <div class="feature-item">
                  <div class="feature-icon">
                    <i class="fas fa-truck"></i>
                  </div>
                  <div class="feature-text">
                    <strong>Entrega Rápida</strong><br>
                    2-4 dias úteis
                  </div>
                </div>
                
                <div class="feature-item">
                  <div class="feature-icon">
                    <i class="fas fa-undo"></i>
                  </div>
                  <div class="feature-text">
                    <strong>Devoluções Grátis</strong><br>
                    Até 30 dias
                  </div>
                </div>
                
                <div class="feature-item">
                  <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                  </div>
                  <div class="feature-text">
                    <strong>Garantia de Qualidade</strong><br>
                    Produtos certificados
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              <!-- Formulário de Avaliação -->
              @if(Auth::check())
                <div class="product-rating-form p-4 bg-light rounded-4 shadow-sm mb-4">
                  <form action="{{ route('product.rating', $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="rating" class="form-label">Sua avaliação:</label><br>
                      <div class="star-rating-input-animated d-flex justify-content-end">
                        @for ($i = 5; $i >= 1; $i--)
                          <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required style="display:none;">
                          <label for="star{{ $i }}" title="{{ $i }} estrelas">&#9733;</label>
                        @endfor
                      </div>
                    </div>
                    <div class="mb-3">
                      <textarea name="comment" class="form-control" placeholder="Deixe um comentário (opcional)" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-purple">Enviar Avaliação</button>
                  </form>
                </div>
              @endif

              <!-- Lista de Avaliações -->
              <div class="product-rating-list">
                <h6 class="mb-3">O que os clientes dizem:</h6>
                <div class="row g-3">
                  @forelse($data->ratings as $rating)
                    <div class="col-md-6 col-lg-4">
                      <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body d-flex align-items-center gap-3">
                          <div class="avatar-circle">
                            <span>{{ strtoupper(mb_substr($rating->user->name ?? 'U', 0, 1)) }}</span>
                          </div>
                          <div>
                            <div class="mb-1" style="color: #FFD700; font-size:1.2rem;">
                              @for ($i = 1; $i <= 5; $i++)
                                @if ($rating->rating >= $i)
                                  <i class="fas fa-star"></i>
                                @else
                                  <i class="far fa-star"></i>
                                @endif
                              @endfor
                            </div>
                            <strong>{{ $rating->user->name ?? 'Usuário' }}</strong>
                            <span class="text-muted small ms-2">{{ $rating->created_at->format('d/m/Y') }}</span>
                            <div class="mt-2">{{ $rating->comment }}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @empty
                    <div class="col-12"><p>Seja o primeiro a avaliar este produto!</p></div>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Size Guide Modal -->
  <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="border-radius: 1rem; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);">
        <div class="modal-header">
          <h5 class="modal-title" id="sizeGuideModalLabel">Size Guide</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>European Size</th>
                  <th>Brazilian Size</th>
                  <th>Foot Length (cm)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>38</td>
                  <td>36</td>
                  <td>24.5</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>37</td>
                  <td>25.0</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>38</td>
                  <td>25.5</td>
                </tr>
                <tr>
                  <td>41</td>
                  <td>39</td>
                  <td>26.0</td>
                </tr>
                <tr>
                  <td>42</td>
                  <td>40</td>
                  <td>26.5</td>
                </tr>
                <tr>
                  <td>43</td>
                  <td>41</td>
                  <td>27.0</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td>42</td>
                  <td>27.5</td>
                </tr>
                <tr>
                  <td>45</td>
                  <td>43</td>
                  <td>28.0</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- end Products details -->

  <!-- info section -->
  @include('home.footer')

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function incrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      const maxQuantity = parseInt(quantityInput.getAttribute('max'));
      let currentValue = parseInt(quantityInput.value);
      
      if (currentValue < maxQuantity) {
        quantityInput.value = currentValue + 1;
      }
    }
    
    function decrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      let currentValue = parseInt(quantityInput.value);
      
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    }
    
    // Loading overlay
    document.addEventListener('DOMContentLoaded', function() {
      const loadingOverlay = document.querySelector('.loading-overlay');
      
      // Ativar loading overlay para o formulário de adicionar ao carrinho
      const addToCartForm = document.querySelector('form[action*="add_cart"]');
      if (addToCartForm && loadingOverlay) {
        addToCartForm.addEventListener('submit', function() {
          loadingOverlay.classList.add('active');
        });
      }
      
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

    // Corrige o loading infinito ao voltar no histórico
    window.addEventListener('pageshow', function(event) {
      const loadingOverlay = document.querySelector('.loading-overlay');
      if (loadingOverlay) {
        loadingOverlay.classList.remove('active');
      }
    });
  </script>
  
    <!-- PHPFlasher para notificações -->
  @flasher_render
  
  <!-- Toastr Assets -->
  @include('home.toastr_assets')

</body>

</html>