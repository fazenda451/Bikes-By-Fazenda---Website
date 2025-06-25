<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  
  <style>
    .deals-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background: linear-gradient(135deg, #e74c3c, #c0392b);
      color: white;
      padding: 8px 15px;
      border-radius: 25px;
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
      z-index: 2;
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    
    .price-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 15px 0;
    }
    
    .original-price {
      text-decoration: line-through;
      color: #999;
      font-size: 1rem;
      margin-bottom: 5px;
    }
    
    .discounted-price {
      font-size: 1.4rem;
      font-weight: 700;
      color: #28a745;
      margin-bottom: 5px;
    }
    
    .discount-badge {
      background: linear-gradient(135deg, #9935dc, #7b2cbf);
      color: white;
      padding: 4px 12px;
      border-radius: 15px;
      font-size: 0.8rem;
      font-weight: 600;
    }
    
    .catalog-header {
      background: linear-gradient(135deg, #9935dc, #7b2cbf);
      color: white;
      padding: 60px 0;
      margin-bottom: 40px;
    }
    
    .catalog-title {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 15px;
      text-align: center;
    }
    
    .catalog-subtitle {
      font-size: 1.2rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      text-align: center;
    }
    
    .filter-section {
      background: #fff;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      position: sticky;
      top: 20px;
    }
    
    .filter-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 2px solid #9935dc;
    }
    
    .filter-group {
      margin-bottom: 20px;
    }
    
    .filter-label {
      display: block;
      font-weight: 600;
      color: #555;
      margin-bottom: 8px;
    }
    
    .filter-select, .filter-input, .search-input {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 8px;
      font-size: 0.95rem;
      transition: all 0.3s;
      background-color: #fff;
    }
    
    .filter-select:focus, .filter-input:focus, .search-input:focus {
      border-color: #9935dc;
      outline: none;
      box-shadow: 0 0 0 3px rgba(153, 53, 220, 0.1);
    }
    
    .search-box {
      position: relative;
    }
    
    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
    }
    
    .search-input {
      padding-left: 45px;
    }
    
    .filter-buttons {
      display: flex;
      gap: 10px;
      margin-top: 25px;
    }
    
    .btn-filter {
      flex: 1;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      text-align: center;
      transition: all 0.3s;
      cursor: pointer;
    }
    
    .btn-apply {
      background-color: #9935dc;
      color: white;
    }
    
    .btn-apply:hover {
      background-color: #8024c0;
      color: white;
      transform: translateY(-2px);
    }
    
    .btn-reset {
      background-color: #f8f9fa;
      color: #6c757d;
      border: 1px solid #dee2e6;
    }
    
    .btn-reset:hover {
      background-color: #e9ecef;
      color: #495057;
    }
    
    .results-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      padding: 15px 20px;
      background: #f8f9fa;
      border-radius: 10px;
    }
    
    .results-count {
      font-weight: 600;
      color: #333;
    }
    
    .mobile-filter-toggle {
      width: 100%;
      padding: 15px;
      background-color: #9935dc;
      color: white;
      border: none;
      border-radius: 10px;
      font-weight: 600;
      margin-bottom: 20px;
      display: none;
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

    .product-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 25px;
      margin-bottom: 40px;
    }

    .product-card {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      border: 1px solid #f0f0f0;
      position: relative;
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 35px rgba(153, 53, 220, 0.2);
    }

    .product-image {
      height: 250px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
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
      transform: scale(1.1);
    }

    .product-info {
      padding: 20px;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .product-title {
      font-size: 1.2rem;
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
      margin-bottom: 15px;
      font-size: 0.9rem;
      font-weight: 600;
    }

    .product-description {
      font-size: 0.9rem;
      color: #6c757d;
      margin-bottom: 15px;
      height: 2.4em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .product-actions {
      display: flex;
      gap: 10px;
      margin-top: auto;
    }

    .btn-details {
      flex: 2;
      padding: 12px;
      background-color: #9935dc;
      color: white;
      border: none;
      border-radius: 8px;
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
      box-shadow: 0 6px 15px rgba(153, 53, 220, 0.4);
    }

    .btn-cart {
      flex: 1;
      padding: 12px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      font-size: 0.9rem;
      text-decoration: none;
    }

    .btn-cart:hover {
      background-color: #218838;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin: 40px 0;
    }

    .no-results {
      text-align: center;
      padding: 60px 20px;
      color: #6c757d;
    }

    .no-results i {
      font-size: 4rem;
      margin-bottom: 20px;
      color: #dee2e6;
    }

    .no-results h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #495057;
    }

    @media (max-width: 992px) {
      .product-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }
      
      .mobile-filter-toggle {
        display: block;
      }
      
      .filter-section {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1000;
        background: white;
        padding: 20px;
        overflow-y: auto;
      }
      
      .catalog-title {
        font-size: 2rem;
      }
    }

    @media (max-width: 576px) {
      .product-grid {
        grid-template-columns: 1fr;
      }
      
      .catalog-title {
        font-size: 1.8rem;
      }
      
      .filter-buttons {
        flex-direction: column;
      }
      
      .results-info {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }
    }
  </style>
</head>

<body>
  @include('home.header')

  <!-- Deals Header -->
  <div class="catalog-header">
    <div class="container">
      <h1 class="catalog-title">🔥 Special Deals</h1>
      <p class="catalog-subtitle">Discover amazing discounts on our best products. Limited time offers with unbeatable prices!</p>
    </div>
  </div>

  <!-- Deals Content -->
  <div class="container py-4">
    <div class="row">
      <!-- Mobile Filter Button -->
      <div class="col-12 d-md-none">
        <button class="mobile-filter-toggle" id="mobileFilterToggle">
          <i class="fas fa-filter"></i> Show Filters
        </button>
      </div>
      
      <!-- Filter Column (Left) -->
      <div class="col-lg-4 col-xl-3">
        <div class="filter-section" id="filterSection">
          <h2 class="filter-title">Filter Deals</h2>
          <form action="{{ route('deals') }}" method="GET" class="filter-form">
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
              <label class="filter-label">Price range (after discount)</label>
              <div class="price-range">
                <input type="number" name="min_price" class="filter-input" placeholder="Min €" value="{{ request('min_price') }}">
                <span class="price-separator">-</span>
                <input type="number" name="max_price" class="filter-input" placeholder="Max €" value="{{ request('max_price') }}">
              </div>
            </div>

            <div class="filter-group">
              <label class="filter-label">Sort by</label>
              <select name="sort" class="filter-select">
                <option value="discount_desc" {{ request('sort') == 'discount_desc' ? 'selected' : '' }}>Highest Discount</option>
                <option value="discount_asc" {{ request('sort') == 'discount_asc' ? 'selected' : '' }}>Lowest Discount</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A-Z</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z-A</option>
              </select>
            </div>

            <div class="filter-buttons">
              <button type="submit" class="btn-filter btn-apply">
                <i class="fas fa-filter"></i> Apply Filters
              </button>
              <a href="{{ route('deals') }}" class="btn-filter btn-reset">
                <i class="fas fa-undo"></i> Clear Filters
              </a>
            </div>
          </form>
        </div>
      </div>

      <!-- Products Column (Right) -->
      <div class="col-lg-8 col-xl-9">
        <!-- Results Info -->
        <div class="results-info">
          <div class="results-count">
            Showing <strong>{{ $products->count() }}</strong> of <strong>{{ $products->total() }}</strong> deals
          </div>
          
          <div class="d-md-none">
            <span class="text-muted">{{ request('sort') ? 'Sorted by: ' . ucfirst(str_replace('_', ' ', request('sort'))) : 'Sorted by: Highest Discount' }}</span>
          </div>
        </div>

        @if($products->count() > 0)
          <div class="product-grid">
            @foreach($products as $product)
              <div class="product-card">
                <div class="deals-badge">
                  -{{ number_format($product->discount_percentage, 0) }}% OFF
                </div>
                
                <div class="product-image">
                  <img src="/products/{{$product->image}}" alt="{{ $product->title }}">
                </div>
                <div class="product-info">
                  <div class="product-category">{{ $product->category ? $product->category->category_name : 'No category' }}</div>
                  <h3 class="product-title">{{ $product->title }}</h3>
                  
                  <div class="product-description">
                    {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                  </div>
                  
                  <div class="price-container">
                    <div class="original-price">{{ number_format($product->price, 2, '.', ',') }}€</div>
                    <div class="discounted-price">{{ number_format($product->getDiscountedPrice(), 2, '.', ',') }}€</div>
                    <div class="discount-badge">Save {{ number_format($product->getDiscountAmount(), 2, '.', ',') }}€</div>
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

          <!-- Pagination -->
          <div class="pagination-container">
            {{ $products->appends(request()->query())->links() }}
          </div>
        @else
          <div class="no-results">
            <i class="fas fa-tags"></i>
            <h3>No deals found</h3>
            <p>We couldn't find any products with discounts matching your criteria.</p>
            <a href="{{ route('deals') }}" class="btn-filter btn-apply mt-3">
              <i class="fas fa-undo"></i> View All Deals
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
    // Mobile filter toggle
    document.getElementById('mobileFilterToggle')?.addEventListener('click', function() {
      const filterSection = document.getElementById('filterSection');
      if (filterSection.style.display === 'block') {
        filterSection.style.display = 'none';
        this.innerHTML = '<i class="fas fa-filter"></i> Show Filters';
      } else {
        filterSection.style.display = 'block';
        this.innerHTML = '<i class="fas fa-times"></i> Hide Filters';
      }
    });

    // Close filter on mobile when clicking outside
    document.addEventListener('click', function(event) {
      const filterSection = document.getElementById('filterSection');
      const toggleButton = document.getElementById('mobileFilterToggle');
      
      if (window.innerWidth <= 992 && 
          filterSection.style.display === 'block' && 
          !filterSection.contains(event.target) && 
          event.target !== toggleButton) {
        filterSection.style.display = 'none';
        toggleButton.innerHTML = '<i class="fas fa-filter"></i> Show Filters';
      }
    });
  </script>
</body>
</html>
