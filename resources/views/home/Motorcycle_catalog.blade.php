<!DOCTYPE html>
<html>
<head>
  @include('home.css')
  <style>
    /* Estilos para o catálogo de motos */
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

    .filter-row {
      margin-bottom: 20px;
    }

    .filter-group {
      margin-bottom: 15px;
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

    /* Estilos para os cards de motos */
    .motorcycle-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-bottom: 40px;
    }

    .motorcycle-card {
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

    .motorcycle-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(153, 53, 220, 0.15);
    }
    
    .motorcycle-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #9935dc;
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      z-index: 2;
    }

    .motorcycle-image {
      height: 220px;
      position: relative;
      overflow: hidden;
    }

    .motorcycle-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .motorcycle-card:hover .motorcycle-image img {
      transform: scale(1.08);
    }

    .license-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: rgba(153, 53, 220, 0.85);
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      font-weight: bold;
      z-index: 10;
      font-size: 0.9rem;
    }

    .motorcycle-info {
      padding: 18px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .motorcycle-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 5px;
      height: 2.6em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .motorcycle-brand {
      color: #9935dc;
      margin-bottom: 10px;
      font-size: 0.9rem;
      font-weight: 600;
    }

    .motorcycle-specs {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px;
      margin-bottom: 15px;
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

    .motorcycle-price {
      font-size: 1.3rem;
      font-weight: 700;
      color: #9935dc;
      margin-top: auto;
      margin-bottom: 15px;
    }

    .motorcycle-actions {
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

    .btn-wishlist {
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

    .btn-wishlist:hover {
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
      .motorcycle-grid {
        grid-template-columns: repeat(2, 1fr);
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
      
      .motorcycle-grid {
        grid-template-columns: repeat(1, 1fr);
        gap: 15px;
      }
      
      .motorcycle-info {
        padding: 15px;
      }
      
      .motorcycle-title {
        font-size: 1rem;
      }
      
      .motorcycle-price {
        font-size: 1.2rem;
      }
      
      .catalog-title {
        font-size: 1.8rem;
      }
      
      .catalog-header {
        padding: 30px 0;
      }
    }

    /* Estilos para alertas */
    .alert {
      border-radius: 8px;
      padding: 15px 20px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      position: relative;
    }
    
    .alert-success {
      background-color: rgba(40, 167, 69, 0.1);
      border-color: rgba(40, 167, 69, 0.2);
      color: #28a745;
    }
    
    .alert-dismissible {
      padding-right: 4rem;
    }
    
    .alert-dismissible .btn-close {
      position: absolute;
      top: 0;
      right: 0;
      padding: 1.05rem 1.25rem;
      background: transparent;
      border: 0;
      font-size: 1.5rem;
      cursor: pointer;
      color: inherit;
      opacity: 0.5;
    }
    
    .alert-dismissible .btn-close:hover {
      opacity: 1;
    }
    
    .fade {
      transition: opacity 0.15s linear;
    }
    
    .fade.show {
      opacity: 1;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
  </div>

  <!-- Catálogo Header -->
  <div class="catalog-header">
    <div class="container">
      <h1 class="catalog-title">Find Your Perfect Motorcycle</h1>
    </div>
  </div>

  <!-- Catálogo Content -->
  <div class="container py-5">
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
          <h2 class="filter-title">Advanced Filters</h2>
          <form action="{{ route('motorcycle.catalog') }}" method="GET">
            <div class="filter-group">
              <label class="filter-label">Required License</label>
              <select name="license_type" class="filter-select">
                <option value="">Select option(s)</option>
                @foreach($licenseTypes as $licenseType)
                  <option value="{{ $licenseType->id }}" {{ request('license_type') == $licenseType->id ? 'selected' : '' }}>
                    {{ $licenseType->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="filter-group">
              <label class="filter-label">Maximum Power</label>
              <select name="power" class="filter-select">
                <option value="">Select range</option>
                <option value="0-50" {{ request('power') == '0-50' ? 'selected' : '' }}>0 - 50 cc</option>
                <option value="51-125" {{ request('power') == '51-125' ? 'selected' : '' }}>51 - 125 cc</option>
                <option value="126-250" {{ request('power') == '126-250' ? 'selected' : '' }}>126 - 250 cc</option>
                <option value="251-500" {{ request('power') == '251-500' ? 'selected' : '' }}>251 - 500 cc</option>
                <option value="501-750" {{ request('power') == '501-750' ? 'selected' : '' }}>501 - 750 cc</option>
                <option value="751-1000" {{ request('power') == '751-1000' ? 'selected' : '' }}>751 - 1000 cc</option>
                <option value="1001+" {{ request('power') == '1001+' ? 'selected' : '' }}>More than 1000 cc</option>
              </select>
            </div>

            <div class="filter-group">
              <label class="filter-label">Brand</label>
              <select name="brand" class="filter-select">
                <option value="">All brands</option>
                @foreach($brands as $brand)
                  <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="filter-group">
              <label class="filter-label">Price Range</label>
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
              <a href="{{ route('motorcycle.catalog') }}" class="btn-filter btn-reset">
                <i class="fas fa-undo"></i> Clear Filters
              </a>
            </div>
          </form>
        </div>
      </div>

      <!-- Coluna de Produtos (Direita) -->
      <div class="col-lg-8 col-xl-9">
        <!-- Mensagens de alerta -->
        @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
        @endif
        
        <!-- Results -->
        <div class="results-info">
          <div class="results-count">
            Showing <strong>{{ $motorcycles->count() }}</strong> of <strong>{{ $motorcycles->total() }}</strong> motorcycles
          </div>
          
          <div class="d-md-none">
            <span class="text-muted">{{ request('sort') ? 'Sorted by: ' . ucfirst(str_replace('_', ' ', request('sort'))) : 'Sorted by: Recommended' }}</span>
          </div>
        </div>

        @if($motorcycles->count() > 0)
          <div class="motorcycle-grid">
            @foreach($motorcycles as $motorcycle)
              <div class="motorcycle-card">
                @if($motorcycle->created_at->diffInDays(now()) < 30)
                  <div class="motorcycle-badge">New</div>
                @endif
                
                <div class="motorcycle-image">
                  @if($motorcycle->photos && $motorcycle->photos->isNotEmpty())
                    <img src="{{ asset('motorcycles/' . $motorcycle->photos->first()->image) }}" alt="{{ $motorcycle->model }}">
                  @else
                    <img src="{{ asset('images/no-image.jpg') }}" alt="No image available">
                  @endif
                  
                  @if($motorcycle->licenseType)
                    <div class="license-badge">{{ $motorcycle->licenseType->name }}</div>
                  @endif
                </div>
                
                <div class="motorcycle-info">
                  <h3 class="motorcycle-title">{{ $motorcycle->model }}</h3>
                  <div class="motorcycle-brand">{{ $motorcycle->brand->name }}</div>
                  
                  <div class="motorcycle-specs">
                    <div class="spec-item">
                      <i class="fas fa-tachometer-alt spec-icon"></i>
                      <span>{{ $motorcycle->displacement ?? 'N/A' }} {{ $motorcycle->displacement ? 'cc' : '' }}</span>
                    </div>
                    <div class="spec-item">
                      <i class="fas fa-bolt spec-icon"></i>
                      <span>{{ $motorcycle->max_power ?? 'N/A' }} {{ $motorcycle->max_power ? 'hp' : '' }}</span>
                    </div>
                    <div class="spec-item">
                      <i class="fas fa-weight spec-icon"></i>
                      <span>{{ $motorcycle->weight ?? 'N/A' }} {{ $motorcycle->weight ? 'kg' : '' }}</span>
                    </div>
                    <div class="spec-item">
                      <i class="fas fa-gas-pump spec-icon"></i>
                      <span>{{ $motorcycle->fuel_tank_capacity ?? 'N/A' }} {{ $motorcycle->fuel_tank_capacity ? 'L' : '' }}</span>
                    </div>
                  </div>
                  
                  <div class="motorcycle-price">
                    {{ number_format($motorcycle->price, 2, '.', ',') }}€
                  </div>
                  
                  <div class="motorcycle-actions">
                    <a href="{{ url('motorcycle_details', $motorcycle->id) }}" class="btn-details">
                      <i class="fas fa-eye"></i> View Details
                    </a>
                    <a href="{{ route('add.motorcycle.to.wishlist', $motorcycle->id) }}" class="btn-wishlist">
                      <i class="fas fa-heart"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Paginação -->
          <div class="pagination-container">
            {{ $motorcycles->appends(request()->query())->links() }}
          </div>
        @else
          <div class="no-results">
            <i class="fas fa-search"></i>
            <h3>No motorcycles found</h3>
            <p>Try adjusting your filters or search for another term.</p>
            <a href="{{ route('motorcycle.catalog') }}" class="btn-filter btn-apply mt-3">
              <i class="fas fa-undo"></i> Clear Filters
            </a>
          </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Footer -->
  @include('home.footer')

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
      
      // Inicializar os alertas do Bootstrap para que possam ser fechados
      const alertClose = document.querySelector('.alert .btn-close');
      if (alertClose) {
        alertClose.addEventListener('click', function() {
          this.closest('.alert').classList.remove('show');
          setTimeout(() => {
            this.closest('.alert').remove();
          }, 150);
        });
      }
    });
  </script>
</body>
</html>
