<!DOCTYPE html>
<html>
<head>
  @include('home.css')
  <style>
    /* Estilos para o catálogo de motos */
    .catalog-header {
      background-color: #f8f9fa;
      padding: 30px 0;
      border-bottom: 1px solid #e9ecef;
    }

    .catalog-title {
      font-size: 2.5rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 20px;
    }

    .filter-section {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 30px;
    }

    .filter-title {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 15px;
      text-transform: uppercase;
      text-align: center;
    }

    .filter-row {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 20px;
    }

    .filter-group {
      flex: 1;
      min-width: 200px;
    }

    .filter-label {
      display: block;
      font-weight: 500;
      margin-bottom: 8px;
      color: #333;
    }

    .filter-select, .filter-input {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      background-color: #fff;
      font-size: 0.95rem;
    }

    .filter-select:focus, .filter-input:focus {
      border-color: #9935dc;
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
    }

    .filter-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
    }

    .btn-filter {
      padding: 10px 25px;
      border-radius: 4px;
      font-weight: 600;
      transition: all 0.3s ease;
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
    }

    .btn-reset:hover {
      background-color: #e9ecef;
    }

    .search-box {
      position: relative;
      margin-bottom: 20px;
    }

    .search-input {
      width: 100%;
      padding: 12px 20px;
      padding-left: 45px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      font-size: 1rem;
    }

    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }

    .sort-dropdown {
      width: 200px;
      margin-left: auto;
    }

    /* Estilos para os cards de motos */
    .motorcycle-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 25px;
      margin-bottom: 40px;
    }

    .motorcycle-card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      border-bottom: 3px solid #9935dc;
    }

    .motorcycle-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(153, 53, 220, 0.15);
    }

    .motorcycle-image {
      position: relative;
      padding-top: 75%; /* 4:3 Aspect Ratio */
      overflow: hidden;
    }

    .motorcycle-image img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .motorcycle-card:hover .motorcycle-image img {
      transform: scale(1.05);
    }

    .motorcycle-info {
      padding: 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .motorcycle-title {
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 8px;
      color: #333;
      height: 2.8em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .motorcycle-brand {
      color: #6c757d;
      margin-bottom: 15px;
    }

    .motorcycle-specs {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-bottom: 15px;
      font-size: 0.9rem;
    }

    .spec-item {
      display: flex;
      align-items: center;
    }

    .spec-icon {
      color: #9935dc;
      margin-right: 8px;
      font-size: 1rem;
    }

    .motorcycle-price {
      font-size: 1.5rem;
      font-weight: 700;
      color: #333;
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
      border-radius: 4px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .btn-details:hover {
      background-color: #8024c0;
      color: white;
    }

    .btn-cart {
      flex: 1;
      padding: 10px;
      background-color: #f8f9fa;
      color: #333;
      border: 1px solid #ced4da;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
    }

    .btn-cart:hover {
      background-color: #e9ecef;
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
    }

    .page-item {
      margin: 0 5px;
    }

    .page-link {
      display: block;
      padding: 8px 15px;
      border-radius: 4px;
      border: 1px solid #ced4da;
      color: #333;
      text-decoration: none;
      transition: all 0.3s;
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
      padding: 50px 0;
      color: #6c757d;
    }

    .no-results i {
      font-size: 3rem;
      margin-bottom: 20px;
      color: #9935dc;
    }

    @media (max-width: 768px) {
      .filter-row {
        flex-direction: column;
        gap: 10px;
      }

      .filter-group {
        width: 100%;
      }

      .sort-dropdown {
        width: 100%;
        margin-left: 0;
        margin-top: 15px;
      }

      .motorcycle-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
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
      <h1 class="catalog-title">Encontre o Produto Perfeito</h1>
    </div>
  </div>

  <!-- Catálogo Content -->
  <div class="container py-5">
    <!-- Filtros -->
    <div class="filter-section">
      <h2 class="filter-title">Filtros Avançados</h2>
      <form action="{{ route('motorcycle.catalog') }}" method="GET">
        <div class="filter-row">
          <div class="filter-group">
            <label class="filter-label">Carta de condução necessária</label>
            <select name="license_type" class="filter-select">
              <option value="">Selecionar opção(ões)</option>
              @foreach($licenseTypes as $licenseType)
                <option value="{{ $licenseType->id }}" {{ request('license_type') == $licenseType->id ? 'selected' : '' }}>
                  {{ $licenseType->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="filter-group">
            <label class="filter-label">Potência máxima</label>
            <select name="power" class="filter-select">
              <option value="">Selecionar o intervalo</option>
              <option value="0-50" {{ request('power') == '0-50' ? 'selected' : '' }}>0 - 50 cc</option>
              <option value="51-125" {{ request('power') == '51-125' ? 'selected' : '' }}>51 - 125 cc</option>
              <option value="126-250" {{ request('power') == '126-250' ? 'selected' : '' }}>126 - 250 cc</option>
              <option value="251-500" {{ request('power') == '251-500' ? 'selected' : '' }}>251 - 500 cc</option>
              <option value="501-750" {{ request('power') == '501-750' ? 'selected' : '' }}>501 - 750 cc</option>
              <option value="751-1000" {{ request('power') == '751-1000' ? 'selected' : '' }}>751 - 1000 cc</option>
              <option value="1001+" {{ request('power') == '1001+' ? 'selected' : '' }}>Mais de 1000 cc</option>
            </select>
          </div>

          <div class="filter-group">
            <label class="filter-label">Nome do produto</label>
            <div class="search-box">
              <i class="fas fa-search search-icon"></i>
              <input type="text" name="search" class="search-input" placeholder="Procurar por nome" value="{{ request('search') }}">
            </div>
          </div>
        </div>

        <div class="filter-row">
          <div class="filter-group">
            <label class="filter-label">Marca</label>
            <select name="brand" class="filter-select">
              <option value="">Todas as marcas</option>
              @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                  {{ $brand->brand_name }}
                </option>
              @endforeach
            </select>
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
        </div>

        <div class="filter-buttons">
          <button type="submit" class="btn-filter btn-apply">Aplicar Filtros</button>
          <a href="{{ route('motorcycle.catalog') }}" class="btn-filter btn-reset">Limpar Filtros</a>
        </div>
      </form>
    </div>

    <!-- Resultados -->
    <div class="results-info d-flex justify-content-between align-items-center mb-4">
      <div>
        <p class="mb-0">Exibindo {{ $motorcycles->count() }} de {{ $motorcycles->total() }} resultados</p>
      </div>
    </div>

    @if($motorcycles->count() > 0)
      <div class="motorcycle-grid">
        @foreach($motorcycles as $motorcycle)
          <div class="motorcycle-card">
            <div class="motorcycle-image">
              @if($motorcycle->photos->isNotEmpty())
                <img src="{{ asset('motorcycles/' . $motorcycle->photos->first()->image) }}" alt="{{ $motorcycle->name }}">
              @else
                <img src="{{ asset('images/no-image.jpg') }}" alt="No image available">
              @endif
            </div>
            <div class="motorcycle-info">
              <h3 class="motorcycle-title">{{ $motorcycle->name }}</h3>
              <div class="motorcycle-brand">{{ $motorcycle->brand->brand_name }}</div>
              
              <div class="motorcycle-specs">
                <div class="spec-item">
                  <i class="fas fa-tachometer-alt spec-icon"></i>
                  <span>{{ $motorcycle->displacement ?? 'N/A' }} cc</span>
                </div>
                <div class="spec-item">
                  <i class="fas fa-bolt spec-icon"></i>
                  <span>{{ $motorcycle->max_power ?? 'N/A' }} cv</span>
                </div>
                <div class="spec-item">
                  <i class="fas fa-id-card spec-icon"></i>
                  <span>{{ $motorcycle->licenseType->name ?? 'N/A' }}</span>
                </div>
                <div class="spec-item">
                  <i class="fas fa-weight spec-icon"></i>
                  <span>{{ $motorcycle->weight ?? 'N/A' }} kg</span>
                </div>
              </div>
              
              <div class="motorcycle-price">
                @if($motorcycle->price)
                  {{ number_format($motorcycle->price, 2, ',', '.') }}€
                @else
                  Preço sob consulta
                @endif
              </div>
              
              <div class="motorcycle-actions">
                <a href="{{ url('motorcycle_details', $motorcycle->id) }}" class="btn-details">Ver Detalhes</a>
                <a href="{{ url('add_cart', $motorcycle->id) }}" class="btn-cart">
                  <i class="fas fa-shopping-cart"></i>
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
        <h3>Nenhuma motocicleta encontrada</h3>
        <p>Tente ajustar seus filtros ou procurar por outro termo.</p>
      </div>
    @endif
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
