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

        /* Responsividade Mobile Completa */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 15px;
                margin-bottom: 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
                margin-bottom: 20px;
            }

            .page-title {
                font-size: 20px;
                text-align: center;
            }

            .action-buttons {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .btn {
                flex: 1;
                min-width: 120px;
                margin: 0.25rem;
            }

            /* Stats Cards Responsivos */
            .stats-container {
                flex-direction: column;
                gap: 15px;
                margin-bottom: 20px;
            }

            .stat-card {
                width: 100%;
                min-width: auto;
                padding: 15px;
            }

            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
                margin-right: 12px;
            }

            .stat-value {
                font-size: 20px;
            }

            .stat-label {
                font-size: 13px;
            }

            /* Search e Filters Responsivos */
            .search-container {
                padding: 10px;
                margin: 15px 0;
            }

            .search-input {
                font-size: 14px;
                padding: 8px 5px;
            }

            .search-button {
                padding: 8px 15px;
                font-size: 14px;
            }

            .filters-container {
                flex-direction: column;
                gap: 10px;
                margin-bottom: 15px;
            }

            .filter-item {
                width: 100%;
                padding: 8px 12px;
            }

            .filter-label {
                font-size: 13px;
                margin-right: 8px;
            }

            .filter-select {
                padding: 4px 8px;
                font-size: 13px;
                flex-grow: 1;
            }

            /* Esconder tabela e mostrar cards em mobile */
            .products-table {
                display: none;
            }

            /* Cards de produtos para mobile */
            .products-mobile-container {
                display: block;
            }

            .product-card {
                background-color: #343a40;
                border-radius: 8px;
                padding: 15px;
                margin-bottom: 15px;
                border: 1px solid #3d4148;
                transition: all 0.3s;
            }

            .product-card:hover {
                background-color: #3d4148;
                transform: translateY(-2px);
            }

            .product-card-header {
                display: flex;
                align-items: center;
                margin-bottom: 15px;
                gap: 15px;
            }

            .product-card-image {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 6px;
                border: 1px solid #3d4148;
                flex-shrink: 0;
            }

            .product-card-info {
                flex-grow: 1;
            }

            .product-card-title {
                font-weight: 500;
                color: white;
                font-size: 16px;
                margin-bottom: 5px;
                line-height: 1.3;
            }

            .product-card-description {
                color: #adb5bd;
                font-size: 13px;
                margin-bottom: 8px;
                line-height: 1.4;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .product-card-category {
                background-color: #2d3035;
                padding: 3px 8px;
                border-radius: 15px;
                font-size: 11px;
                display: inline-block;
                color: #adb5bd;
            }

            .product-card-details {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 15px;
                margin-bottom: 15px;
            }

            .product-card-detail {
                text-align: center;
            }

            .product-card-detail-label {
                color: #adb5bd;
                font-size: 12px;
                margin-bottom: 5px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .product-card-detail-value {
                color: white;
                font-size: 14px;
                font-weight: 500;
            }

            .product-card-price {
                font-weight: 600;
                color: #9935dc;
                font-size: 16px;
            }

            .product-card-quantity {
                padding: 4px 8px;
                border-radius: 15px;
                font-size: 12px;
                font-weight: 500;
            }

            .product-card-actions {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
            }

            .product-card-actions .btn {
                flex: 1;
                min-width: auto;
                font-size: 12px;
                padding: 6px 10px;
                margin: 0;
            }

            /* Pagination Responsiva */
            .pagination-container {
                margin-top: 20px;
            }

            .pagination {
                gap: 3px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .page-link {
                padding: 6px 10px;
                font-size: 13px;
            }

            /* Empty State */
            .empty-state {
                padding: 30px 15px;
            }

            .empty-state i {
                font-size: 40px;
            }

            .empty-state h3 {
                font-size: 18px;
            }
        }

        @media (max-width: 576px) {
            .content-wrapper {
                padding: 10px;
                margin-bottom: 15px;
            }

            .page-title {
                font-size: 18px;
            }

            .btn {
                font-size: 12px;
                padding: 6px 12px;
                min-width: 100px;
            }

            .stat-card {
                padding: 12px;
            }

            .stat-icon {
                width: 35px;
                height: 35px;
                font-size: 16px;
                margin-right: 10px;
            }

            .stat-value {
                font-size: 18px;
            }

            .product-card {
                padding: 12px;
                margin-bottom: 12px;
            }

            .product-card-header {
                gap: 12px;
                margin-bottom: 12px;
            }

            .product-card-image {
                width: 60px;
                height: 60px;
            }

            .product-card-title {
                font-size: 14px;
            }

            .product-card-description {
                font-size: 12px;
            }

            .product-card-details {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-bottom: 12px;
            }

            .product-card-actions {
                gap: 5px;
            }

            .product-card-actions .btn {
                font-size: 11px;
                padding: 5px 8px;
            }

            .search-container {
                padding: 8px;
                margin: 10px 0;
            }

            .filters-container {
                gap: 8px;
                margin-bottom: 12px;
            }

            .filter-item {
                padding: 6px 10px;
            }
        }

        /* Cards de produtos para mobile (inicialmente escondido) */
        .products-mobile-container {
            display: none;
        }

        @media (max-width: 768px) {
            .products-mobile-container {
                display: block;
            }
        }

        /* Ajustes para orientação landscape em tablets */
        @media (max-width: 1024px) and (orientation: landscape) {
            .stats-container {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .stat-card {
                flex: 1;
                min-width: calc(50% - 10px);
            }

            .filters-container {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .filter-item {
                flex: 1;
                min-width: 200px;
            }
        }

        /* Melhorias para touch devices */
        @media (hover: none) {
            .product-card:hover {
                transform: none;
                background-color: #343a40;
            }

            .btn:hover {
                transform: none;
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
                <h1 class="page-title">Product Management</h1>
                <div class="action-buttons">
                    <a href="{{ url('add_product') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                    <button class="btn btn-info" onclick="window.print()">
                        <i class="fas fa-print"></i> Print
                    </button>
                </div>
            </div>
           
            <!-- Quick Stats -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon stat-products">
                        <i class="fas fa-box"></i>
                    </div>
                    <div>
                        <h2 class="stat-value">{{ $product->total() }}</h2>
                        <p class="stat-label">Total Products</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon stat-categories">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div>
                        <h2 class="stat-value">{{ \App\Models\Category::count() }}</h2>
                        <p class="stat-label">Categories</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon stat-stock">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <div>
                        <h2 class="stat-value">{{ $product->sum('Quantity') }}</h2>
                        <p class="stat-label">Items in Stock</p>
                    </div>
                </div>
            </div>
            
            <!-- Search Bar -->
            <form action="{{ url('product_search') }}" method="get">
                @csrf
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="search" name="search" class="search-input" placeholder="Search products by name, category, or description..." value="{{ request('search') }}">
                    <button type="submit" class="search-button">Search</button>
                </div>
            </form>
            
            <!-- Filters -->
            <div class="filters-container">
                <div class="filter-item">
                    <span class="filter-label">Sort by:</span>
                    <select class="filter-select" id="sort-select">
                        <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>Name (A-Z)</option>
                        <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>Name (Z-A)</option>
                        <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>Price (Low-High)</option>
                        <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Price (High-Low)</option>
                    </select>
                </div>
                
                <div class="filter-item">
                    <span class="filter-label">Category:</span>
                    <select class="filter-select" id="category-filter">
                        <option value="all">All Categories</option>
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="filter-item">
                    <span class="filter-label">Stock:</span>
                    <select class="filter-select" id="stock-filter">
                        <option value="all" {{ request('stock') == 'all' || !request('stock') ? 'selected' : '' }}>All</option>
                        <option value="in-stock" {{ request('stock') == 'in-stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="low-stock" {{ request('stock') == 'low-stock' ? 'selected' : '' }}>Low Stock (&lt; 10)</option>
                        <option value="out-of-stock" {{ request('stock') == 'out-of-stock' ? 'selected' : '' }}>Out of Stock</option>
                    </select>
                </div>
            </div>

                
                <!-- Tabela de Produtos -->
                @if($product->count() > 0)
    <div class="table-responsive">
        <table class="products-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
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
                            {{ $products->category ? $products->category->category_name : 'No category' }}
                        </span>
                    </td>
                    <td>
                        <div class="product-price">
                            @if($products->hasDiscount())
                                <span style="text-decoration: line-through; color: #999; font-size: 0.9rem;">{{ number_format($products->price, 2) }}€</span><br>
                                <span style="color: #28a745; font-weight: bold;">{{ number_format($products->getDiscountedPrice(), 2) }}€</span>
                                <small style="color: #9935dc; display: block;">-{{ $products->discount_percentage }}%</small>
                            @else
                                {{ number_format($products->price, 2) }}€
                            @endif
                        </div>
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
                            <a href="{{ url('update_product', $products->id) }}" class="btn btn-success" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('delete_product', $products->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                            <button class="btn btn-info" onclick="viewDetails({{ $products->id }})" title="Details">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Cards de Produtos para Mobile -->
    <div class="products-mobile-container">
        @foreach($product as $products)
            <div class="product-card">
                <div class="product-card-header">
                    <img src="{{ asset('products/'.$products->image) }}" alt="{{ $products->title }}" class="product-card-image">
                    <div class="product-card-info">
                        <div class="product-card-title">{{ $products->title }}</div>
                        <div class="product-card-description">{{ Str::limit($products->description, 60) }}</div>
                        <span class="product-card-category">
                            {{ $products->category ? $products->category->category_name : 'No category' }}
                        </span>
                    </div>
                </div>
                
                <div class="product-card-details">
                    <div class="product-card-detail">
                        <div class="product-card-detail-label">Price</div>
                        <div class="product-card-detail-value">
                            @if($products->hasDiscount())
                                <div style="text-align: center;">
                                    <span style="text-decoration: line-through; color: #999; font-size: 0.8rem; display: block;">{{ number_format($products->price, 2) }}€</span>
                                    <span class="product-card-price">{{ number_format($products->getDiscountedPrice(), 2) }}€</span>
                                    <small style="color: #9935dc; display: block; font-size: 0.7rem; margin-top: 2px;">-{{ $products->discount_percentage }}% OFF</small>
                                </div>
                            @else
                                <span class="product-card-price">{{ number_format($products->price, 2) }}€</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="product-card-detail">
                        <div class="product-card-detail-label">Stock</div>
                        <div class="product-card-detail-value">
                            @php
                                $quantityClass = 'quantity-high';
                                if($products->Quantity <= 0) {
                                    $quantityClass = 'quantity-low';
                                } elseif($products->Quantity < 10) {
                                    $quantityClass = 'quantity-medium';
                                }
                            @endphp
                            <span class="product-card-quantity {{ $quantityClass }}">
                                {{ $products->Quantity }} units
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="product-card-actions">
                    <a href="{{ url('update_product', $products->id) }}" class="btn btn-success" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ url('delete_product', $products->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')" title="Delete">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                    <button class="btn btn-info" onclick="viewDetails({{ $products->id }})" title="Details">
                        <i class="fas fa-eye"></i> Details
                    </button>
                </div>
            </div>
        @endforeach
    </div>

                <!-- Paginação -->
                <div class="pagination-container">
    {{ $product->appends(request()->query())->onEachSide(1)->links() }}
</div>
@else
<!-- Empty state -->
<div class="empty-state">
    <i class="fas fa-box-open"></i>
    <h3>No products found</h3>
    <p>We couldn't find any products matching your search criteria.</p>
    @if(request('search'))
        <a href="{{ url('view_product') }}" class="btn btn-primary mt-3">
            <i class="fas fa-undo"></i> Clear Filters
        </a>
    @else
        <a href="{{ url('add_product') }}" class="btn btn-primary mt-3">
            <i class="fas fa-plus"></i> Add Product
        </a>
    @endif
</div>
@endif
</div>
</div>
</div>

<!-- Product Details Modal (to be implemented with JavaScript) -->
<div class="modal fade" id="productDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="productDetailsContent">
                <!-- Content will be loaded via AJAX -->
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
