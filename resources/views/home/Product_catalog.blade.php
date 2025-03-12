<!DOCTYPE html>
<html>
<head>
  @include('home.css')
  <style>
    /* Estilos para o catálogo de produtos */
    .catalog-header {
      background-color: #f8f9fa;
      padding: 20px 0;
      border-bottom: 1px solid #e9ecef;
    }

    .catalog-title {
      font-size: 2rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 15px;
      color: #6a1b9a; /* Roxo escuro */
    }

    .filter-section {
      background-color: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 20px;
      position: sticky;
      top: 20px;
    }

    .filter-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 15px;
      text-transform: uppercase;
      text-align: center;
      color: #6a1b9a; /* Roxo escuro */
    }

    .filter-group {
      margin-bottom: 15px;
    }

    .filter-label {
      display: block;
      font-weight: 500;
      margin-bottom: 6px;
      color: #333;
      font-size: 0.9rem;
    }

    .filter-select, .filter-input {
      width: 100%;
      padding: 8px 12px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      background-color: #fff;
      font-size: 0.9rem;
    }

    .filter-select:focus, .filter-input:focus {
      border-color: #9935dc;
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
    }

    .filter-buttons {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-top: 15px;
    }

    .btn-filter {
      padding: 8px 15px;
      border-radius: 4px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-align: center;
      font-size: 0.9rem;
    }

    .btn-apply {
      background-color: #9935dc;
      color: white;
      border: none;
    }

    .btn-apply:hover {
      background-color: #8024c0;
      transform: translateY(-2px);
    }

    .btn-reset {
      background-color: #f8f9fa;
      color: #333;
      border: 1px solid #ced4da;
      text-decoration: none;
    }

    .btn-reset:hover {
      background-color: #e9ecef;
    }

    .search-box {
      position: relative;
    }

    .search-input {
      width: 100%;
      padding: 8px 12px 8px 35px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      font-size: 0.9rem;
    }

    .search-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
      font-size: 0.9rem;
    }

    .sort-dropdown {
      width: 100%;
      margin-bottom: 15px;
    }

    /* Estilos para os cards de produtos */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 12px;
      margin-bottom: 25px;
    }

    .product-card {
      background: #fff;
      border-radius: 5px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      border-bottom: 2px solid #9935dc;
    }

    .product-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 16px rgba(153, 53, 220, 0.12);
    }

    .product-image {
      position: relative;
      padding-top: 75%; /* 4:3 Aspect Ratio */
      overflow: hidden;
    }

    .product-image img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
      transform: scale(1.05);
    }

    .product-info {
      padding: 10px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .product-title {
      font-size: 0.9rem;
      font-weight: 600;
      margin-bottom: 4px;
      color: #333;
      height: 2.4em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .product-category {
      color: #6c757d;
      margin-bottom: 6px;
      font-size: 0.75rem;
    }

    .product-specs {
      display: grid;
      grid-template-columns: 1fr;
      gap: 6px;
      margin-bottom: 6px;
      font-size: 0.75rem;
    }

    .spec-item {
      display: flex;
      align-items: center;
    }

    .spec-icon {
      color: #9935dc;
      margin-right: 4px;
      font-size: 0.8rem;
    }

    .product-price {
      font-size: 1.1rem;
      font-weight: 700;
      color: #333;
      margin-top: auto;
      margin-bottom: 8px;
    }

    .product-actions {
      display: flex;
      gap: 6px;
    }

    .btn-details {
      flex: 2;
      padding: 6px;
      background-color: #9935dc;
      color: white;
      border: none;
      border-radius: 4px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      transition: background-color 0.3s;
      font-size: 0.8rem;
    }

    .btn-details:hover {
      background-color: #8024c0;
      color: white;
    }

    .btn-cart {
      flex: 1;
      padding: 6px;
      background-color: #f8f9fa;
      color: #333;
      border: 1px solid #ced4da;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
      font-size: 0.8rem;
    }

    .btn-cart:hover {
      background-color: #e9ecef;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin: 30px 0;
    }

    .pagination {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .page-item {
      margin: 0 3px;
    }

    .page-link {
      display: block;
      padding: 6px 12px;
      border-radius: 4px;
      border: 1px solid #ced4da;
      color: #333;
      text-decoration: none;
      transition: all 0.3s;
      font-size: 0.9rem;
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
      padding: 40px 0;
      color: #6c757d;
    }

    .no-results i {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #9935dc;
    }

    .size-badge {
      display: inline-block;
      padding: 2px 5px;
      background-color: #e9ecef;
      color: #333;
      border-radius: 3px;
      font-size: 0.7rem;
      font-weight: 600;
      margin-right: 3px;
      margin-bottom: 3px;
    }

    .product-description {
      font-size: 0.75rem;
      color: #6c757d;
      margin-bottom: 6px;
      height: 2.4em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    @media (max-width: 992px) {
      .filter-section {
        position: relative;
        top: 0;
        margin-bottom: 20px;
      }
      
      .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      }
    }

    @media (max-width: 768px) {
      .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
      }
      
      .product-info {
        padding: 10px;
      }
      
      .product-title {
        font-size: 0.9rem;
      }
      
      .product-price {
        font-size: 1.1rem;
      }
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
      <h1 class="catalog-title">Encontre o Equipamento Perfeito</h1>
    </div>
  </div>

  <!-- Catálogo Content -->
  <div class="container py-4">
    <div class="row">
      <!-- Coluna de Filtros (Esquerda) -->
      <div class="col-lg-3">
        <div class="filter-section">
          <h2 class="filter-title">Filtros Avançados</h2>
          <form action="{{ route('product.catalog') }}" method="GET">
            <div class="filter-group">
              <label class="filter-label">Categoria</label>
              <select name="category" class="filter-select">
                <option value="">Todas as categorias</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="filter-group">
              <label class="filter-label">Nome do produto</label>
              <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="search" class="search-input" placeholder="Procurar por nome" value="{{ request('search') }}">
              </div>
            </div>

            <div class="filter-group">
              <label class="filter-label">Preço mínimo</label>
              <input type="number" name="min_price" class="filter-input" placeholder="€" value="{{ request('min_price') }}">
            </div>

            <div class="filter-group">
              <label class="filter-label">Preço máximo</label>
              <input type="number" name="max_price" class="filter-input" placeholder="€" value="{{ request('max_price') }}">
            </div>

            <div class="filter-group">
              <label class="filter-label">Ordenar por</label>
              <select name="sort" class="filter-select">
                <option value="recommended" {{ request('sort') == 'recommended' ? 'selected' : '' }}>Recomendado</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Preço: Menor para Maior</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Preço: Maior para Menor</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nome: A-Z</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nome: Z-A</option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mais recentes</option>
              </select>
            </div>

            <div class="filter-buttons">
              <button type="submit" class="btn-filter btn-apply">Aplicar Filtros</button>
              <a href="{{ route('product.catalog') }}" class="btn-filter btn-reset">Limpar Filtros</a>
            </div>
          </form>
        </div>
      </div>

      <!-- Coluna de Produtos (Direita) -->
      <div class="col-lg-9">
        <!-- Resultados -->
        <div class="results-info d-flex justify-content-between align-items-center mb-3">
          <div>
            <p class="mb-0" style="font-size: 0.9rem;">Exibindo {{ $products->count() }} de {{ $products->total() }} resultados</p>
          </div>
        </div>

        @if($products->count() > 0)
          <div class="product-grid">
            @foreach($products as $product)
              <div class="product-card">
                <div class="product-image">
                  <img src="/products/{{$product->image}}" alt="{{ $product->title }}">
                </div>
                <div class="product-info">
                  <h3 class="product-title">{{ $product->title }}</h3>
                  <div class="product-category">{{ $product->category ? $product->category->category_name : 'Sem categoria' }}</div>
                  
                  <div class="product-specs">
                    <div class="spec-item">
                      <i class="fas fa-box spec-icon"></i>
                      <span>Estoque: {{ $product->Quantity }}</span>
                    </div>
                  </div>
                  
                  <div class="size-badges mb-2">
                    @if($product->size)
                      @foreach(explode(',', $product->size) as $size)
                        <span class="size-badge">{{ trim($size) }}</span>
                      @endforeach
                    @else
                      <span class="size-badge">Tamanho único</span>
                    @endif
                  </div>
                  
                  <div class="product-description">
                    {{ \Illuminate\Support\Str::limit($product->description, 60) }}
                  </div>
                  
                  <div class="product-price">
                    {{ number_format($product->price, 2, ',', '.') }}€
                  </div>
                  
                  <div class="product-actions">
                    <a href="{{ url('product_details', $product->id) }}" class="btn-details">Ver Detalhes</a>
                    <a href="{{ url('add_cart', $product->id) }}" class="btn-cart">
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
            <h3>Nenhum produto encontrado</h3>
            <p>Tente ajustar seus filtros ou procurar por outro termo.</p>
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
    });
  </script>
</body>
</html>
