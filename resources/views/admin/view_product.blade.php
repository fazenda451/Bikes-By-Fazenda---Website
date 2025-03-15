<!DOCTYPE html>
<html lang="pt">
<head> 
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style type="text/css">
        .content-wrapper {
            padding: 25px;
            background-color: #2d3035;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .page-title {
            color: #9935dc;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .search-container {
            width: 100%;
            margin: 20px 0;
            display: flex;
            align-items: center;
            background-color: #343a40;
            border-radius: 8px;
            padding: 5px 15px;
            border: 1px solid #3d4148;
        }
        
        .search-container i {
            color: #9935dc;
            margin-right: 10px;
        }
        
        .search-input {
            flex-grow: 1;
            background: transparent;
            border: none;
            color: #fff;
            padding: 10px 5px;
            font-size: 16px;
        }
        
        .search-input:focus {
            outline: none;
        }
        
        .search-button {
            background-color: #9935dc;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .search-button:hover {
            background-color: #8024c0;
        }
        
        .filters-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .filter-item {
            background-color: #343a40;
            border-radius: 6px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            border: 1px solid #3d4148;
        }
        
        .filter-label {
            color: #adb5bd;
            margin-right: 10px;
            font-size: 14px;
        }
        
        .filter-select {
            background-color: #2d3035;
            border: 1px solid #3d4148;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
        }
        
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #343a40;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .products-table th {
            background-color: #9935dc;
            color: white;
            text-align: left;
            padding: 15px;
            font-weight: 500;
            font-size: 15px;
        }
        
        .products-table td {
            padding: 15px;
            border-bottom: 1px solid #3d4148;
            color: #e9ecef;
            vertical-align: middle;
        }
        
        .products-table tr:last-child td {
            border-bottom: none;
        }
        
        .products-table tr:hover {
            background-color: #3d4148;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #3d4148;
        }
        
        .product-title {
            font-weight: 500;
            color: white;
        }
        
        .product-description {
            color: #adb5bd;
            font-size: 14px;
        }
        
        .product-category {
            background-color: #2d3035;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-block;
        }
        
        .product-price {
            font-weight: 600;
            color: #9935dc;
        }
        
        .product-quantity {
            text-align: center;
        }
        
        .quantity-badge {
            background-color: #2d3035;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .quantity-low {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }
        
        .quantity-medium {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        
        .quantity-high {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }
        
        .action-buttons-cell {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .btn-primary {
            background-color: #9935dc;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #8024c0;
        }
        
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        
        .btn-success:hover {
            background-color: #218838;
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-info:hover {
            background-color: #138496;
        }
        
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 5px;
        }
        
        .page-item {
            background-color: #343a40;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .page-link {
            display: block;
            padding: 8px 15px;
            color: #adb5bd;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .page-item.active .page-link {
            background-color: #9935dc;
            color: white;
        }
        
        .page-item:not(.active) .page-link:hover {
            background-color: #3d4148;
            color: white;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #adb5bd;
        }
        
        .empty-state i {
            font-size: 50px;
            color: #3d4148;
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: white;
        }
        
        .stats-container {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .stat-card {
            flex: 1;
            min-width: 200px;
            background-color: #343a40;
            border-radius: 8px;
            padding: 20px;
            display: flex;
            align-items: center;
            border: 1px solid #3d4148;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 20px;
        }
        
        .stat-products {
            background-color: rgba(153, 53, 220, 0.2);
            color: #9935dc;
        }
        
        .stat-categories {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }
        
        .stat-stock {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: 600;
            color: white;
            margin: 0;
        }
        
        .stat-label {
            font-size: 14px;
            color: #adb5bd;
            margin: 0;
        }
        
        /* Responsividade para tabelas em dispositivos móveis */
        @media (max-width: 992px) {
            .products-table {
                display: block;
                overflow-x: auto;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .action-buttons {
                width: 100%;
                justify-content: flex-start;
            }
            
            .stats-container {
                flex-direction: column;
            }
            
            .stat-card {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            <div class="content-wrapper">
                <div class="page-header">
                    <h1 class="page-title">Gerenciamento de Produtos</h1>
                    <div class="action-buttons">
                        <a href="{{ url('add_product') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Adicionar Produto
                        </a>
                        <button class="btn btn-info" onclick="window.print()">
                            <i class="fas fa-print"></i> Imprimir
                        </button>
                    </div>
                </div>
               
                <!-- Estatísticas Rápidas -->
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-icon stat-products">
                            <i class="fas fa-box"></i>
                        </div>
                        <div>
                            <h2 class="stat-value">{{ $product->total() }}</h2>
                            <p class="stat-label">Total de Produtos</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon stat-categories">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div>
                            <h2 class="stat-value">{{ \App\Models\Category::count() }}</h2>
                            <p class="stat-label">Categorias</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon stat-stock">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <div>
                            <h2 class="stat-value">{{ $product->sum('Quantity') }}</h2>
                            <p class="stat-label">Itens em Estoque</p>
                        </div>
                    </div>
                </div>
                
                <!-- Barra de Pesquisa -->
                <form action="{{ url('product_search') }}" method="get">
                    @csrf
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="search" name="search" class="search-input" placeholder="Buscar produtos por nome, categoria ou descrição..." value="{{ request('search') }}">
                        <button type="submit" class="search-button">Buscar</button>
                    </div>
                </form>
                
                <!-- Filtros -->
                <div class="filters-container">
                    <div class="filter-item">
                        <span class="filter-label">Ordenar por:</span>
                        <select class="filter-select" id="sort-select">
                            <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>Nome (A-Z)</option>
                            <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>Nome (Z-A)</option>
                            <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>Preço (Menor-Maior)</option>
                            <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Preço (Maior-Menor)</option>
                            
                        </select>
                    </div>
                    
                    <div class="filter-item">
                        <span class="filter-label">Categoria:</span>
                        <select class="filter-select" id="category-filter">
                            <option value="all">Todas as Categorias</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="filter-item">
                        <span class="filter-label">Estoque:</span>
                        <select class="filter-select" id="stock-filter">
                            <option value="all" {{ request('stock') == 'all' || !request('stock') ? 'selected' : '' }}>Todos</option>
                            <option value="in-stock" {{ request('stock') == 'in-stock' ? 'selected' : '' }}>Em Estoque</option>
                            <option value="low-stock" {{ request('stock') == 'low-stock' ? 'selected' : '' }}>Estoque Baixo (&lt; 10)</option>
                            <option value="out-of-stock" {{ request('stock') == 'out-of-stock' ? 'selected' : '' }}>Sem Estoque</option>
                        </select>
                    </div>
                </div>
                
                <!-- Tabela de Produtos -->
                @if($product->count() > 0)
                <div class="table-responsive">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Produto</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $products)
                            <tr>
                                <td>
                                    <img src="{{ asset('products/'.$products->image) }}" alt="{{ $products->title }}" class="product-image">
                                </td>
                                <td>
                                    <div class="product-title">{{ $products->title }}</div>
                                    <div class="product-description">{{ Str::limit($products->description, 50) }}</div>
                                </td>
                                <td>
                                    <span class="product-category">
                                        {{ $products->category ? $products->category->category_name : 'Sem categoria' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="product-price">{{ number_format($products->price, 2) }} €</div>
                                </td>
                                <td class="product-quantity">
                                    @php
                                        $quantityClass = 'quantity-high';
                                        if($products->Quantity <= 0) {
                                            $quantityClass = 'quantity-low';
                                        } elseif($products->Quantity < 10) {
                                            $quantityClass = 'quantity-medium';
                                        }
                                    @endphp
                                    <span class="quantity-badge {{ $quantityClass }}">
                                        {{ $products->Quantity }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons-cell">
                                        <a href="{{ url('update_product', $products->id) }}" class="btn btn-success" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete_product', $products->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')" title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <button class="btn btn-info" onclick="viewDetails({{ $products->id }})" title="Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginação -->
                <div class="pagination-container">
                    {{ $product->appends(request()->query())->onEachSide(1)->links() }}
                </div>
                @else
                <!-- Estado vazio -->
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>Nenhum produto encontrado</h3>
                    <p>Não encontramos produtos que correspondam aos seus critérios de busca.</p>
                    @if(request('search'))
                        <a href="{{ url('view_product') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-undo"></i> Limpar Filtros
                        </a>
                    @else
                        <a href="{{ url('add_product') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus"></i> Adicionar Produto
                        </a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal de Detalhes do Produto (será implementado com JavaScript) -->
    <div class="modal fade" id="productDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes do Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="productDetailsContent">
                    <!-- Conteúdo será carregado via AJAX -->
                </div>
            </div>
        </div>
    </div>

    @include('admin.js')
    
    <script>
        // Função para visualizar detalhes do produto (simulada)
        function viewDetails(productId) {
            alert('Detalhes do produto ID: ' + productId + '\nEsta funcionalidade seria implementada com AJAX para carregar os detalhes completos do produto.');
        }
        
        // Função para aplicar filtros e ordenação
        function applyFilters() {
            // Obter valores dos filtros
            const sortBy = document.getElementById('sort-select').value;
            const categoryId = document.getElementById('category-filter').value;
            const stockStatus = document.getElementById('stock-filter').value;
            
            // Construir URL com parâmetros de query
            let url = new URL(window.location.origin + window.location.pathname);
            
            // Adicionar parâmetro de ordenação
            if (sortBy) {
                url.searchParams.append('sort', sortBy);
            }
            
            // Adicionar parâmetro de categoria
            if (categoryId && categoryId !== 'all') {
                url.searchParams.append('category', categoryId);
            }
            
            // Adicionar parâmetro de estoque
            if (stockStatus && stockStatus !== 'all') {
                url.searchParams.append('stock', stockStatus);
            }
            
            // Manter parâmetro de busca se existir
            const searchParam = new URLSearchParams(window.location.search).get('search');
            if (searchParam) {
                url.searchParams.append('search', searchParam);
            }
            
            // Redirecionar para a URL com os filtros
            console.log('Redirecionando para: ' + url.toString());
            window.location.href = url.toString();
        }
        
        // Configurar os filtros com base nos parâmetros da URL atual
        function setupFiltersFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            
            // Configurar ordenação
            const sortParam = urlParams.get('sort');
            if (sortParam) {
                document.getElementById('sort-select').value = sortParam;
            }
            
            // Configurar categoria
            const categoryParam = urlParams.get('category');
            if (categoryParam) {
                document.getElementById('category-filter').value = categoryParam;
            }
            
            // Configurar estoque
            const stockParam = urlParams.get('stock');
            if (stockParam) {
                document.getElementById('stock-filter').value = stockParam;
            }
        }
        
        // Adicionar event listeners aos filtros
        document.getElementById('sort-select').addEventListener('change', applyFilters);
        document.getElementById('category-filter').addEventListener('change', applyFilters);
        
        
        // Configurar filtros ao carregar a página
        document.addEventListener('DOMContentLoaded', setupFiltersFromUrl);
    </script>
</body>
</html>
