<!DOCTYPE html>
<html>
<head>
  @include('home.css')
  <style>
    /* Styles for the product catalog */
    .catalog-header {
      background-color: #f8f9fa;
      padding: 40px 0;
      border-bottom: 1px solid #e9ecef;
      margin-bottom: 30px;
      background-image: linear-gradient(135deg, rgba(153, 53, 220, 0.1) 0%, rgba(153, 53, 220, 0.05) 100%);
    }

    .catalog-title {
      font-size: 2.2rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 15px;
      color: #6a1b9a; /* Roxo escuro */
    }
    
    .catalog-subtitle {
      font-size: 1.1rem;
      text-align: center;
      color: #6c757d;
      max-width: 700px;
      margin: 0 auto;
    }

    .filter-section {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
      margin-bottom: 30px;
      position: sticky;
      top: 20px;
      transition: all 0.3s ease;
      border: 1px solid #f0f0f0;
      margin-right: 15px;
    }
    
    .filter-section:hover {
      box-shadow: 0 5px 20px rgba(153, 53, 220, 0.15);
    }

    .filter-title {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-transform: uppercase;
      text-align: center;
      color: #6a1b9a; /* Roxo escuro */
      position: relative;
      padding-bottom: 10px;
    }
    
    .filter-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 50px;
      height: 3px;
      background-color: #9935dc;
      border-radius: 3px;
    }

    .filter-group {
      margin-bottom: 20px;
    }

    .filter-label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
      color: #333;
      font-size: 0.95rem;
    }

    .filter-select, .filter-input {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ced4da;
      border-radius: 6px;
      background-color: #fff;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    .filter-select:focus, .filter-input:focus {
      border-color: #9935dc;
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
    }

    .filter-buttons {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 20px;
    }

    .btn-filter {
      padding: 12px 15px;
      border-radius: 6px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-align: center;
      font-size: 0.95rem;
      cursor: pointer;
    }

    .btn-apply {
      background-color: #9935dc;
      color: white;
      border: none;
    }

    .btn-apply:hover {
      background-color: #8024c0;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(153, 53, 220, 0.3);
    }

    .btn-reset {
      background-color: #f8f9fa;
      color: #333;
      border: 1px solid #ced4da;
      text-decoration: none;
    }

    .btn-reset:hover {
      background-color: #e9ecef;
      transform: translateY(-2px);
    }

    .search-box {
      position: relative;
    }

    .search-input {
      width: 100%;
      padding: 10px 15px 10px 40px;
      border: 1px solid #ced4da;
      border-radius: 6px;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }
    
    .search-input:focus {
      border-color: #9935dc;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
    }

    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
      font-size: 1rem;
    }

    .sort-dropdown {
      width: 100%;
      margin-bottom: 15px;
    }
    
    .price-range {
      display: flex;
      gap: 10px;
      align-items: center;
    }
    
    .price-range .filter-input {
      flex: 1;
    }
    
    .price-separator {
      color: #6c757d;
      font-weight: 600;
    }

    /* Styles for product cards */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-bottom: 40px;
    }

    .product-card {
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      border: 1px solid #f0f0f0;
      position: relative;
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(153, 53, 220, 0.15);
    }
    
    .product-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: #9935dc;
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      z-index: 2;
    }

    .product-image {
      height: 220px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px;
      background-color: #f8f9fa;
      position: relative;
      overflow: hidden;
    }

    .product-image img {
      max-height: 100%;
      max-width: 100%;
      object-fit: contain;
      transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
      transform: scale(1.08);
    }

    .product-info {
      padding: 18px;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .product-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 10px;
      height: 2.6em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .product-category {
      color: #9935dc;
      margin-bottom: 10px;
      font-size: 0.85rem;
      font-weight: 600;
    }

    .product-specs {
      display: grid;
      grid-template-columns: 1fr;
      gap: 8px;
      margin-bottom: 10px;
      font-size: 0.85rem;
    }

    .spec-item {
      display: flex;
      align-items: center;
    }

    .spec-icon {
      color: #9935dc;
      margin-right: 6px;
      font-size: 0.9rem;
    }
    
    .size-badges-container {
      margin-bottom: 12px;
    }

    .size-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 5px;
    }

    .size-badge {
      display: inline-block;
      padding: 3px 8px;
      background-color: #f0f0f0;
      color: #333;
      border-radius: 4px;
      font-size: 0.8rem;
      font-weight: 600;
      transition: all 0.2s ease;
    }
    
    .size-badge:hover {
      background-color: #9935dc;
      color: white;
    }

    .product-description {
      font-size: 0.85rem;
      color: #6c757d;
      margin-bottom: 12px;
      height: 2.4em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .product-price {
      font-size: 1.3rem;
      font-weight: 700;
      color: #9935dc;
      margin-top: auto;
      margin-bottom: 15px;
    }

    .product-actions {
      display: flex;
      gap: 10px;
    }

    .btn-details {
      flex: 2;
      padding: 10px;
      background-color: #9935dc;
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      transition: all 0.3s ease;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-details:hover {
      background-color: #8024c0;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(153, 53, 220, 0.3);
    }

    .btn-cart {
      flex: 1;
      padding: 10px;
      background-color: #f8f9fa;
      color: #333;
      border: 1px solid #ced4da;
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      font-size: 0.9rem;
    }

    .btn-cart:hover {
      background-color: #e9ecef;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin: 40px 0;
    }

    .pagination {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
      border-radius: 8px;
      overflow: hidden;
    }

    .page-item {
      margin: 0;
    }
    
    .page-item:not(:last-child) {
      border-right: 1px solid #f0f0f0;
    }

    .page-link {
      display: block;
      padding: 10px 15px;
      color: #333;
      text-decoration: none;
      transition: all 0.3s;
      font-size: 0.95rem;
      background-color: white;
    }

    .page-item.active .page-link {
      background-color: #9935dc;
      color: white;
      border-color: #9935dc;
    }

    .page-link:hover {
      background-color: #f8f9fa;
    }

    .no-results {
      text-align: center;
      padding: 60px 0;
      color: #6c757d;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    }

    .no-results i {
      font-size: 3rem;
      margin-bottom: 20px;
      color: #9935dc;
    }
    
    .no-results h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #333;
    }
    
    .results-info {
      background-color: white;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .results-count {
      font-size: 0.95rem;
      color: #6c757d;
      font-weight: 500;
    }
    
    .mobile-filter-toggle {
      display: none;
      width: 100%;
      padding: 12px;
      background-color: #9935dc;
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      margin-bottom: 20px;
      cursor: pointer;
      text-align: center;
      font-size: 1rem;
    }
    
    .mobile-filter-toggle i {
      margin-right: 8px;
    }

    @media (max-width: 1199px) {
      .product-grid {
        grid-template-columns: repeat(3, 1fr);
      }
      
      .catalog-title {
        font-size: 2rem;
      }
    }

    @media (max-width: 768px) {
      .mobile-filter-toggle {
        display: block;
      }
      
      .filter-section {
        display: none;
      }
      
      .filter-section.active {
        display: block;
      }
      
      .product-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
      }
      
      .product-info {
        padding: 15px;
      }
      
      .product-title {
        font-size: 1rem;
      }
      
      .product-price {
        font-size: 1.2rem;
      }
      
      .catalog-title {
        font-size: 1.8rem;
      }
      
      .catalog-subtitle {
        font-size: 1rem;
      }
      
      .catalog-header {
        padding: 30px 0;
      }
    }
    
    @media (max-width: 576px) {
      .product-grid {
        grid-template-columns: repeat(1, 1fr);
        gap: 12px;
      }
      
      .product-actions {
        flex-direction: column;
      }
      
      .btn-details, .btn-cart {
        width: 100%;
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

  <!-- Catálogo Header -->
  <div class="catalog-header">
    <div class="container">
      <h1 class="catalog-title">Product Catalog</h1>
      <p class="catalog-subtitle">Discover our collection of high-quality equipment for motorcyclists. Find the perfect product for your needs.</p>
    </div>
  </div>

  <!-- Catálogo Content -->
  <div class="container py-4">
    <div class="row">
      <!-- Botão de filtro para mobile -->
      <div class="col-12 d-md-none">
        <button class="mobile-filter-toggle" id="mobileFilterToggle">
          <i class="fas fa-filter"></i> Show Filters
        </button>
      </div>
      
      <!-- Coluna de Filtros (Esquerda) -->
      <div class="col-lg-4 col-xl-3">
        <div class="filter-section" id="filterSection">
          <h2 class="filter-title">Filters</h2>
          <form action="{{ route('product.catalog') }}" method="GET" class="filter-form">
            <div class="filter-group">
              <label class="filter-label">Category</label>
              <select name="category" class="filter-select">
                <option value="">All categories</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="filter-group">
              <label class="filter-label">Search product</label>
              <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="search" class="search-input" placeholder="Name or description" value="{{ request('search') }}">
              </div>
            </div>

            <div class="filter-group">
              <label class="filter-label">Price range</label>
              <div class="price-range">
                <input type="number" name="min_price" class="filter-input" placeholder="Min €" value="{{ request('min_price') }}">
                <span class="price-separator">-</span>
                <input type="number" name="max_price" class="filter-input" placeholder="Max €" value="{{ request('max_price') }}">
              </div>
            </div>

            <div class="filter-group">
              <label class="filter-label">Sort by</label>
              <select name="sort" class="filter-select">
                <option value="recommended" {{ request('sort') == 'recommended' ? 'selected' : '' }}>Recommended</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A-Z</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z-A</option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
              </select>
            </div>

            <div class="filter-buttons">
              <button type="submit" class="btn-filter btn-apply">
                <i class="fas fa-filter"></i> Apply Filters
              </button>
              <a href="{{ route('product.catalog') }}" class="btn-filter btn-reset">
                <i class="fas fa-undo"></i> Clear Filters
              </a>
            </div>
          </form>
        </div>
      </div>

      <!-- Coluna de Produtos (Direita) -->
      <div class="col-lg-8 col-xl-9">
        <!-- Resultados -->
        <div class="results-info">
          <div class="results-count">
            Showing <strong>{{ $products->count() }}</strong> of <strong>{{ $products->total() }}</strong> products
          </div>
          
          <div class="d-md-none">
            <span class="text-muted">{{ request('sort') ? 'Sorted by: ' . ucfirst(str_replace('_', ' ', request('sort'))) : 'Sorted by: Recommended' }}</span>
          </div>
        </div>

        @if($products->count() > 0)
          <div class="product-grid">
            @foreach($products as $product)
              <div class="product-card">
                @if($product->hasDiscount())
                  <div class="product-badge" style="background-color: #e74c3c;">-{{ number_format($product->discount_percentage, 0) }}% OFF</div>
                @elseif($product->Quantity <= 5 && $product->Quantity > 0)
                  <div class="product-badge">Last units</div>
                @elseif($product->created_at->diffInDays(now()) < 30)
                  <div class="product-badge">New</div>
                @endif
                
                <div class="product-image">
                  <img src="/products/{{$product->image}}" alt="{{ $product->title }}">
                </div>
                <div class="product-info">
                  <div class="product-category">{{ $product->category ? $product->category->category_name : 'No category' }}</div>
                  <h3 class="product-title">{{ $product->title }}</h3>
                  
                  <div class="product-specs">
                    <div class="spec-item">
                      <i class="fas fa-box spec-icon"></i>
                      <span>{{ $product->Quantity > 0 ? 'In stock: ' . $product->Quantity . ' units' : 'Out of stock' }}</span>
                    </div>
                  </div>
                  
                  @if($product->size)
                    <div class="size-badges-container">
                      <div class="size-badges">
                        @foreach(explode(',', $product->size) as $size)
                          <span class="size-badge">{{ trim($size) }}</span>
                        @endforeach
                      </div>
                    </div>
                  @endif
                  
                  <div class="product-description">
                    {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                  </div>
                  
                  <div class="product-price">
                    @if($product->hasDiscount())
                      <span style="text-decoration: line-through; color: #999; font-size: 1rem; margin-right: 10px;">{{ number_format($product->price, 2, '.', ',') }}€</span>
                      <span style="color: #28a745; font-weight: bold;">{{ number_format($product->getDiscountedPrice(), 2, '.', ',') }}€</span>
                      <div style="margin-top: 5px;">
                        <span style="background: #9935dc; color: white; padding: 3px 8px; border-radius: 12px; font-size: 0.8rem;">-{{ number_format($product->discount_percentage, 0) }}% OFF</span>
                      </div>
                    @else
                      {{ number_format($product->price, 2, '.', ',') }}€
                    @endif
                  </div>
                  
                  <div class="product-actions">
                    <a href="{{ url('product_details', $product->id) }}" class="btn-details">
                      <i class="fas fa-eye"></i> View Details
                    </a>
                    <a href="{{ url('add_cart', $product->id) }}" class="btn-cart" {{ $product->Quantity <= 0 ? 'disabled' : '' }}>
                      <i class="fas fa-shopping-cart"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Paginação -->
          <div class="pagination-container">
            {{ $products->appends(request()->query())->links() }}
          </div>
        @else
          <div class="no-results">
            <i class="fas fa-search"></i>
            <h3>No products found</h3>
            <p>Try adjusting your filters or search for another term.</p>
            <a href="{{ route('product.catalog') }}" class="btn-filter btn-apply mt-3">
              <i class="fas fa-undo"></i> Clear Filters
            </a>
          </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Footer -->
  @include('home.footer')

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Adicionar classes do Bootstrap à paginação
      const paginationLinks = document.querySelectorAll('.pagination li');
      paginationLinks.forEach(item => {
        item.classList.add('page-item');
        const link = item.querySelector('a, span');
        if (link) {
          link.classList.add('page-link');
        }
      });
      
      // Toggle de filtros em dispositivos móveis
      const mobileFilterToggle = document.getElementById('mobileFilterToggle');
      const filterSection = document.getElementById('filterSection');
      
      if (mobileFilterToggle && filterSection) {
        mobileFilterToggle.addEventListener('click', function() {
          filterSection.classList.toggle('active');
          
          if (filterSection.classList.contains('active')) {
            mobileFilterToggle.innerHTML = '<i class="fas fa-times"></i> Hide Filters';
          } else {
            mobileFilterToggle.innerHTML = '<i class="fas fa-filter"></i> Show Filters';
          }
        });
      }
      
      // Loading overlay
      const loadingOverlay = document.querySelector('.loading-overlay');
      const filterForm = document.querySelector('.filter-form');
      
      if (filterForm && loadingOverlay) {
        filterForm.addEventListener('submit', function() {
          loadingOverlay.classList.add('active');
        });
      }
      
      // Aplicar filtros automaticamente ao mudar os selects
      const filterSelects = document.querySelectorAll('.filter-select');
      filterSelects.forEach(select => {
        select.addEventListener('change', function() {
          // Mostrar loading overlay
          if (loadingOverlay) {
            loadingOverlay.classList.add('active');
          }
          
          // Enviar o formulário automaticamente após um pequeno delay
          setTimeout(() => {
            this.closest('form').submit();
          }, 300);
        });
      });
      
      // Ativar loading overlay para os links de paginação
      const paginationItems = document.querySelectorAll('.pagination .page-link');
      paginationItems.forEach(link => {
        link.addEventListener('click', function() {
          if (loadingOverlay) {
            loadingOverlay.classList.add('active');
          }
        });
      });
      
      // Ativar loading overlay para os links de produtos
      const productLinks = document.querySelectorAll('.product-card a');
      productLinks.forEach(link => {
        link.addEventListener('click', function() {
          if (loadingOverlay) {
            loadingOverlay.classList.add('active');
          }
        });
      });
      
      // Disable cart buttons for out-of-stock products
      const cartButtons = document.querySelectorAll('.btn-cart[disabled]');
      cartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          alert('This product is out of stock.');
        });
        button.style.opacity = '0.6';
        button.style.cursor = 'not-allowed';
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
