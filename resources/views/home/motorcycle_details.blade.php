<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style type="text/css">
    /* Style inspired by Yamaha website */
    body {
      background-color: #f5f5f5;
      font-family: 'Roboto', 'Arial', sans-serif;
      color: #333;
      line-height: 1.6;
    }

    .hero_area {
      background-color: #000;
      color: #fff;
    }

    /* Main banner */
    .motorcycle-banner {
      position: relative;
      width: 100%;
      height: 60vh;
      background-color: #000;
      overflow: hidden;
      margin-bottom: 40px;
    }

    .motorcycle-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.85;
    }

    .license-badge {
      position: absolute;
      top: 20px;
      left: 20px;
      background-color: purple;
      color: white;
      padding: 8px 15px;
      border-radius: 4px;
      font-weight: bold;
      z-index: 10;
      font-size: 1rem;
      text-transform: uppercase;
    }

    .banner-content {
      position: absolute;
      bottom: 50px;
      left: 50px;
      color: #fff;
      z-index: 2;
    }

    .banner-content h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 10px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .banner-content p {
      font-size: 1.2rem;
      max-width: 600px;
    }

    .price-tag {
      display: inline-block;
      background-color: purple;
      color: #fff;
      padding: 10px 20px;
      font-size: 1.5rem;
      font-weight: 700;
      margin-top: 20px;
      border-radius: 4px;
    }

    /* Content section */
    .content-section {
      padding: 60px 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
    }

    /* Tab navigation */
    .tabs-navigation {
      display: flex;
      border-bottom: 1px solid #ddd;
      margin-bottom: 30px;
    }

    .tab-item {
      padding: 15px 30px;
      font-size: 1.1rem;
      font-weight: 600;
      color: #666;
      cursor: pointer;
      border-bottom: 3px solid transparent;
      transition: all 0.3s ease;
    }

    .tab-item.active {
      color: purple;
      border-bottom: 3px solid purple;
    }

    /* Image gallery */
    .gallery {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      margin-bottom: 40px;
    }

    .gallery-item {
      overflow: hidden;
      border-radius: 8px;
      height: 200px;
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.05);
    }

    /* Description */
    .description {
      margin-bottom: 40px;
    }

    .description h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 20px;
      color: #000;
    }

    .description p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #555;
    }

    /* Specifications */
    .specs-section {
      background-color: #fff;
      padding: 50px 0;
      margin-bottom: 40px;
    }

    .specs-section h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
      color: #000;
    }

    .specs-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
    }

    .specs-group {
      margin-bottom: 30px;
    }

    .specs-group h3 {
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 15px;
      padding-bottom: 10px;
      border-bottom: 2px solid purple;
      color: #000;
    }

    .specs-item {
      display: flex;
      justify-content: space-between;
      padding: 12px 0;
      border-bottom: 1px solid #eee;
    }

    .specs-item:last-child {
      border-bottom: none;
    }

    .specs-label {
      font-weight: 500;
      color: #666;
    }

    .specs-value {
      font-weight: 600;
      color: #333;
    }

    /* Action buttons */
    .action-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 40px 0;
    }

    .btn {
      padding: 15px 30px;
      font-size: 1rem;
      font-weight: 600;
      text-transform: uppercase;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s ease;
      letter-spacing: 1px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .btn-primary {
      background-color: purple;
      color: #fff;
      border: none;
    }

    .btn-primary:hover {
      background-color: purple;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgb(95, 10, 95);
    }

    .btn-secondary {
      background-color: #333;
      color: #fff;
      border: none;
    }

    .btn-secondary:hover {
      background-color: #222;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Responsiveness */
    @media (max-width: 992px) {
      .banner-content h1 {
        font-size: 2.5rem;
      }

      .specs-container {
        grid-template-columns: repeat(2, 1fr);
      }

      .gallery {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .banner-content {
        left: 30px;
        bottom: 30px;
      }

      .banner-content h1 {
        font-size: 2rem;
      }

      .tabs-navigation {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 5px;
      }

      .specs-container {
        grid-template-columns: 1fr;
      }

      .action-buttons {
        flex-direction: column;
      }

      .gallery {
        grid-template-columns: 1fr;
      }
    }

    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animated {
      animation: fadeIn 0.8s ease forwards;
    }

    /* Yamaha-style Product Carousel */
    .product-carousel {
      display: flex;
      margin-bottom: 40px;
    }

    .product-image-main {
      width: 70%;
      position: relative;
      overflow: hidden;
      background-color: #fff;
      border-radius: 4px;
    }

    .product-info {
      width: 30%;
      padding: 0 0 0 30px;
    }

    .carousel-slides {
      display: flex;
      transition: transform 0.5s ease;
    }

    .carousel-slide {
      min-width: 100%;
      height: 500px;
      position: relative;
    }

    .carousel-slide img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .carousel-nav {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
      z-index: 10;
    }

    .carousel-arrow {
      background: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: background 0.3s;
    }

    .carousel-arrow:hover {
      background: rgba(0, 0, 0, 0.8);
    }

    .carousel-arrow.prev {
      margin-left: 10px;
    }

    .carousel-arrow.next {
      margin-right: 10px;
    }

    .product-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .product-description {
      margin-bottom: 20px;
      color: #666;
    }

    .product-price {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .add-to-cart-btn {
      display: inline-block;
      background-color: purple;
      color: white;
      padding: 12px 25px;
      border-radius: 4px;
      font-weight: 600;
      text-decoration: none;
      margin-bottom: 20px;
      transition: background-color 0.3s, transform 0.2s;
      width: 100%;
      text-align: center;
    }

    .add-to-cart-btn:hover {
      background-color: rgb(73, 13, 73);
      transform: translateY(-2px);
      color: white;
    }

    .add-to-cart-btn i {
      margin-right: 8px;
    }

    .wishlist-btn {
      display: inline-block;
      background-color: #fff;
      color: #333;
      padding: 12px 25px;
      border-radius: 4px;
      font-weight: 500;
      text-decoration: none;
      margin-bottom: 20px;
      transition: all 0.25s ease;
      border: 1px solid #ddd;
      width: 100%;
      text-align: center;
    }

    .wishlist-btn:hover {
      background-color: #f8f9fa;
      transform: translateY(-2px);
      color: rgb(70, 18, 70);
      border-color: rgb(70, 18, 70);
    }

    .wishlist-btn i {
      margin-right: 8px;
      color: purple;
      transition: transform 0.3s ease;
    }
    
    .wishlist-btn:hover i {
      transform: scale(1.2);
    }

    .color-options {
      margin-bottom: 20px;
    }

    .color-title {
      font-weight: 600;
      margin-bottom: 10px;
    }

    .color-selector {
      display: inline-block;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 10px;
      cursor: pointer;
      border: 2px solid transparent;
    }

    .color-selector.active {
      border-color: #000;
    }

    .color-blue {
      background-color: #0046FF;
    }

    .notification-btn {
      display: flex;
      align-items: center;
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      padding: 10px 15px;
      border-radius: 4px;
      margin-bottom: 20px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .notification-btn:hover {
      background-color: #f0f0f0;
    }

    .notification-btn i {
      color: purple;
      margin-right: 10px;
    }

    @media (max-width: 992px) {
      .product-carousel {
        flex-direction: column;
      }

      .product-image-main, .product-info {
        width: 100%;
      }

      .product-info {
        padding: 20px 0 0 0;
      }
    }

    @media (max-width: 768px) {
      .banner-content {
        left: 30px;
        bottom: 30px;
      }

      .banner-content h1 {
        font-size: 2rem;
      }

      .carousel-slide {
        height: 350px;
      }

      .product-title {
        font-size: 2rem;
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

    /* Responsividade Mobile Completa */
    @media (max-width: 768px) {
      /* Container mobile */
      .container {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
      }

      /* Banner mobile otimizado */
      .motorcycle-banner {
        height: 50vh;
        margin-bottom: 2rem;
      }

      .banner-content {
        left: 1rem;
        right: 1rem;
        bottom: 1rem;
        text-align: center;
      }

      .banner-content h1 {
        font-size: 1.75rem;
        margin-bottom: 0.75rem;
      }

      .banner-content p {
        font-size: 1rem;
        line-height: 1.4;
      }

      .price-tag {
        font-size: 1.25rem;
        padding: 8px 16px;
        margin-top: 15px;
      }

      .license-badge {
        top: 15px;
        left: 15px;
        font-size: 0.875rem;
        padding: 6px 12px;
      }

      /* Carrossel mobile */
      .product-carousel {
        flex-direction: column;
        margin-bottom: 2rem;
      }

      .product-image-main,
      .product-info {
        width: 100%;
      }

      .product-info {
        padding: 1.5rem 0 0 0;
      }

      .carousel-slide {
        height: 300px;
      }

      .product-title {
        font-size: 1.75rem;
        text-align: center;
        margin-bottom: 1rem;
      }

      .product-description {
        text-align: center;
        margin-bottom: 1.5rem;
      }

      .product-price {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
      }

      /* Botões mobile */
      .add-to-cart-btn,
      .wishlist-btn {
        margin-bottom: 1rem;
        padding: 15px 25px;
        font-size: 1rem;
        text-align: center;
        border-radius: 8px;
      }

      .add-to-cart-btn {
        background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
        box-shadow: 0 4px 15px rgba(153, 53, 220, 0.4);
      }

      .wishlist-btn {
        border: 2px solid #9935dc;
        color: #9935dc;
        font-weight: 600;
      }

      .wishlist-btn:hover {
        background-color: #9935dc;
        color: white;
      }

      /* Color options mobile */
      .color-options {
        text-align: center;
        margin-bottom: 1.5rem;
      }

      .color-title {
        margin-bottom: 1rem;
        font-size: 1rem;
      }

      .color-selector {
        width: 40px;
        height: 40px;
        margin: 0 5px;
      }

      /* Notification mobile */
      .notification-btn {
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
      }

      /* Content Section mobile */
      .content-section {
        padding: 3rem 0;
      }

      /* Tabs Navigation mobile */
      .tabs-navigation {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 5px;
        margin-bottom: 2rem;
        -webkit-overflow-scrolling: touch;
      }

      .tab-item {
        display: inline-block;
        padding: 12px 20px;
        font-size: 1rem;
        margin-right: 15px;
        border-radius: 8px;
        white-space: nowrap;
        min-width: 120px;
        text-align: center;
      }

      .tab-item.active {
        background-color: rgba(153, 53, 220, 0.1);
        border-radius: 8px;
      }

      /* Description mobile */
      .description h2 {
        font-size: 1.5rem;
        text-align: center;
        margin-bottom: 1.5rem;
      }

      .description p {
        font-size: 1rem;
        line-height: 1.6;
        text-align: justify;
        padding: 0 0.5rem;
      }

      /* Specifications mobile */
      .specs-section {
        padding: 2rem 0;
      }

      .specs-section h2 {
        font-size: 1.5rem;
        margin-bottom: 2rem;
      }

      .specs-container {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }

      .specs-group {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
      }

      .specs-group h3 {
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        color: #9935dc;
      }

      .specs-item {
        padding: 1rem 0;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .specs-item:last-child {
        border-bottom: none;
      }

      .specs-label {
        font-size: 0.9rem;
        font-weight: 500;
        color: #666;
        flex: 1;
      }

      .specs-value {
        font-size: 0.9rem;
        font-weight: 600;
        color: #333;
        text-align: right;
        flex: 1;
      }

      /* Action buttons mobile */
      .action-buttons {
        flex-direction: column;
        gap: 15px;
        margin: 2rem 0;
        padding: 0 1rem;
      }

      .btn {
        padding: 15px 25px;
        font-size: 1rem;
        width: 100%;
        text-align: center;
        border-radius: 8px;
      }

      .btn-primary {
        background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
        box-shadow: 0 4px 15px rgba(153, 53, 220, 0.4);
      }

      .btn-secondary {
        background: #6c757d;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
      }
    }

    @media (max-width: 576px) {
      /* Ajustes para telas muito pequenas */
      .container {
        padding-left: 0.25rem;
        padding-right: 0.25rem;
      }

      .motorcycle-banner {
        height: 40vh;
        margin-bottom: 1.5rem;
      }

      .banner-content {
        left: 0.75rem;
        right: 0.75rem;
        bottom: 0.75rem;
      }

      .banner-content h1 {
        font-size: 1.5rem;
      }

      .banner-content p {
        font-size: 0.9rem;
      }

      .price-tag {
        font-size: 1.1rem;
        padding: 6px 12px;
      }

      .license-badge {
        font-size: 0.8rem;
        padding: 4px 8px;
      }

      .carousel-slide {
        height: 250px;
      }

      .product-title {
        font-size: 1.5rem;
      }

      .product-price {
        font-size: 1.25rem;
      }

      .add-to-cart-btn,
      .wishlist-btn {
        padding: 12px 20px;
        font-size: 0.9rem;
      }

      .tab-item {
        padding: 10px 15px;
        font-size: 0.9rem;
        min-width: 100px;
      }

      .description h2,
      .specs-section h2 {
        font-size: 1.25rem;
      }

      .description p {
        font-size: 0.9rem;
        padding: 0 0.25rem;
      }

      .specs-group {
        padding: 1rem;
      }

      .specs-group h3 {
        font-size: 1rem;
      }

      .specs-item {
        padding: 0.75rem 0;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .specs-label,
      .specs-value {
        font-size: 0.85rem;
        text-align: left;
      }

      .specs-value {
        font-weight: 700;
        color: #9935dc;
      }

      .action-buttons {
        margin: 1.5rem 0;
        padding: 0 0.5rem;
      }

      .btn {
        padding: 12px 20px;
        font-size: 0.9rem;
      }
    }

    /* Melhorias para orientação landscape em tablets */
    @media (max-width: 1024px) and (orientation: landscape) {
      .motorcycle-banner {
        height: 60vh;
      }

      .product-carousel {
        flex-direction: row;
      }

      .product-image-main {
        width: 60%;
      }

      .product-info {
        width: 40%;
        padding: 0 0 0 2rem;
      }

      .specs-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    /* Touch device optimizations */
    @media (hover: none) {
      .add-to-cart-btn:hover,
      .wishlist-btn:hover,
      .btn:hover {
        transform: none;
        box-shadow: inherit;
      }

      .tab-item:hover {
        background-color: transparent;
      }

      .tab-item.active:hover {
        background-color: rgba(153, 53, 220, 0.1);
      }
    }

    /* Melhorias para devices com densidade de pixels alta */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
      .motorcycle-banner img,
      .carousel-slide img {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
      }
    }

    /* Acessibilidade melhorada */
    @media (prefers-reduced-motion: reduce) {
      .carousel-slides,
      .add-to-cart-btn:hover,
      .wishlist-btn:hover,
      .btn:hover,
      .tab-item {
        transition: none;
        transform: none;
      }
    }

    /* Carrossel navigation mobile melhorado */
    @media (max-width: 768px) {
      .carousel-nav {
        bottom: 20px;
        top: auto;
        transform: none;
      }

      .carousel-arrow {
        width: 50px;
        height: 50px;
        background: rgba(153, 53, 220, 0.8);
        font-size: 1.25rem;
      }

      .carousel-arrow:hover {
        background: rgba(153, 53, 220, 1);
      }

      .carousel-arrow.prev {
        margin-left: 20px;
      }

      .carousel-arrow.next {
        margin-right: 20px;
      }
    }

    /* Melhorias de loading para mobile */
    @media (max-width: 768px) {
      .loading-image {
        width: 300px;
        height: 300px;
      }
    }

    @media (max-width: 576px) {
      .loading-image {
        width: 200px;
        height: 200px;
      }
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

  <!-- Motorcycle Banner (original) -->
  <div class="motorcycle-banner">
    @if($data->photos->isNotEmpty())
      <img src="{{ asset('motorcycles/' . $data->photos->first()->image) }}" alt="{{ $data->name }}">
    @else
      <img src="{{ asset('default-image.jpg') }}" alt="Default Image">
    @endif
    @if($data->licenseType)
      <div class="license-badge">{{ $data->licenseType->name }}</div>
    @endif
    <div class="banner-content">
      <h1>{{ $data->name }}</h1>
      <p>{{ Str::limit($data->description, 150) }}</p>
      <div class="price-tag">From: {{ number_format($data->price, 2, ',', '.') }}€</div>
    </div>
  </div>

  <!-- Carrossel de Produto estilo Yamaha -->
  <div class="container">
    <div class="product-carousel">
      <div class="product-image-main">
        <div class="carousel-slides">
          @if($data->photos->isNotEmpty())
            @foreach($data->photos as $photo)
              <div class="carousel-slide">
                <img src="{{ asset('motorcycles/' . $photo->image) }}" alt="{{ $data->name }}">
                @if($data->licenseType && $loop->first)
                  <div class="license-badge">{{ $data->licenseType->name }}</div>
                @endif
              </div>
            @endforeach
          @else
            <div class="carousel-slide">
              <img src="{{ asset('default-image.jpg') }}" alt="Default Image">
              @if($data->licenseType)
                <div class="license-badge">{{ $data->licenseType->name }}</div>
              @endif
            </div>
          @endif
        </div>
        <div class="carousel-nav">
          <button class="carousel-arrow prev">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="carousel-arrow next">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>
      <div class="product-info">
        <h2 class="product-title">{{ $data->name }}</h2>
        <p class="product-description">{{ Str::limit($data->description, 150) }}</p>
        <div class="product-price">From: {{ number_format($data->price, 2, ',', '.') }}€</div>
        
        <a href="{{url('add_cart', $data->id)}}" class="add-to-cart-btn">
          <i class="fas fa-shopping-cart"></i> Add to Cart
        </a>
        
        <a href="{{ route('add.motorcycle.to.wishlist', $data->id) }}" class="wishlist-btn">
          <i class="fas fa-heart"></i> Add to Wishlist
        </a>
        
        @if($data->color)
        <div class="color-options">
          <div class="color-title">Cor(es): {{ $data->color }}</div>
          <div class="color-selector color-blue active"></div>
        </div>
        @endif
        
        <div class="notification-btn">
          <i class="fas fa-bell"></i>
          <span>Be the first to know when you can test ride</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Section -->
  <section class="content-section">
    <div class="container">
      <!-- Tabs Navigation -->
      <div class="tabs-navigation">
        <div class="tab-item active" data-tab="overview">Overview</div>
        <div class="tab-item" data-tab="specifications">Specifications</div>
        <div class="tab-item" data-tab="accessories">Accessories</div>
      </div>

      <div class="tab-content-container">
        <!-- Description -->
        <div class="description animated tab-content active" id="overview">
          <h2>About the {{ $data->name }}</h2>
          <p>{{ $data->description }}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Specifications Section -->
  <section class="specs-section animated tab-content" id="specifications">
    <div class="container">
      <h2>Technical Specifications</h2>
      
      <div class="specs-container">
        <!-- Engine and Performance -->
        <div class="specs-group">
          <h3>Engine and Performance</h3>
          
          @if($data->engine_type)
          <div class="specs-item">
            <div class="specs-label">Engine Type</div>
            <div class="specs-value">{{ $data->engine_type }}</div>
          </div>
          @endif
          
          @if($data->displacement)
          <div class="specs-item">
            <div class="specs-label">Displacement</div>
            <div class="specs-value">{{ $data->displacement }} cc</div>
          </div>
          @endif
          
          @if($data->bore_stroke)
          <div class="specs-item">
            <div class="specs-label">Bore x Stroke</div>
            <div class="specs-value">{{ $data->bore_stroke }}</div>
          </div>
          @endif
          
          @if($data->compression_ratio)
          <div class="specs-item">
            <div class="specs-label">Compression Ratio</div>
            <div class="specs-value">{{ $data->compression_ratio }}</div>
          </div>
          @endif
          
          @if($data->max_power)
          <div class="specs-item">
            <div class="specs-label">Maximum Power</div>
            <div class="specs-value">{{ $data->max_power }}</div>
          </div>
          @endif
          
          @if($data->max_torque)
          <div class="specs-item">
            <div class="specs-label">Maximum Torque</div>
            <div class="specs-value">{{ $data->max_torque }}</div>
          </div>
          @endif
        </div>
        
        <!-- Transmission -->
        <div class="specs-group">
          <h3>Transmission</h3>
          
          @if($data->transmission_system_id)
          <div class="specs-item">
            <div class="specs-label">Transmission System</div>
            <div class="specs-value">{{ $data->transmissionSystem->name ?? 'N/A' }}</div>
          </div>
          @endif
          
          @if($data->clutch_type_id)
          <div class="specs-item">
            <div class="specs-label">Clutch Type</div>
            <div class="specs-value">{{ $data->clutchType->name ?? 'N/A' }}</div>
          </div>
          @endif
          
          @if($data->final_drive)
          <div class="specs-item">
            <div class="specs-label">Final Drive</div>
            <div class="specs-value">{{ $data->final_drive }}</div>
          </div>
          @endif
        </div>
        
        <!-- Chassis and Suspension -->
        <div class="specs-group">
          <h3>Chassis and Suspension</h3>
          
          @if($data->frame)
          <div class="specs-item">
            <div class="specs-label">Frame</div>
            <div class="specs-value">{{ $data->frame }}</div>
          </div>
          @endif
          
          @if($data->front_suspension_id)
          <div class="specs-item">
            <div class="specs-label">Front Suspension</div>
            <div class="specs-value">{{ $data->frontSuspension->name ?? 'N/A' }}</div>
          </div>
          @endif
          
          @if($data->front_travel)
          <div class="specs-item">
            <div class="specs-label">Front Travel</div>
            <div class="specs-value">{{ $data->front_travel }} mm</div>
          </div>
          @endif
          
          @if($data->rear_suspension_id)
          <div class="specs-item">
            <div class="specs-label">Rear Suspension</div>
            <div class="specs-value">{{ $data->rearSuspension->name ?? 'N/A' }}</div>
          </div>
          @endif
          
          @if($data->rear_travel)
          <div class="specs-item">
            <div class="specs-label">Rear Travel</div>
            <div class="specs-value">{{ $data->rear_travel }} mm</div>
          </div>
          @endif
        </div>

        <!-- Brakes and Wheels -->
        <div class="specs-group">
          <h3>Brakes and Wheels</h3>
          
          @if($data->front_brake)
          <div class="specs-item">
            <div class="specs-label">Front Brake</div>
            <div class="specs-value">{{ $data->front_brake }}</div>
          </div>
          @endif
          
          @if($data->rear_brake)
          <div class="specs-item">
            <div class="specs-label">Rear Brake</div>
            <div class="specs-value">{{ $data->rear_brake }}</div>
          </div>
          @endif
          
          @if($data->front_tire)
          <div class="specs-item">
            <div class="specs-label">Front Tire</div>
            <div class="specs-value">{{ $data->front_tire }}</div>
          </div>
          @endif
          
          @if($data->rear_tire)
          <div class="specs-item">
            <div class="specs-label">Rear Tire</div>
            <div class="specs-value">{{ $data->rear_tire }}</div>
          </div>
          @endif
        </div>

        <!-- Dimensions -->
        <div class="specs-group">
          <h3>Dimensions</h3>
          
          @if($data->total_length)
          <div class="specs-item">
            <div class="specs-label">Total Length</div>
            <div class="specs-value">{{ $data->total_length }} mm</div>
          </div>
          @endif
          
          @if($data->total_width)
          <div class="specs-item">
            <div class="specs-label">Total Width</div>
            <div class="specs-value">{{ $data->total_width }} mm</div>
          </div>
          @endif
          
          @if($data->total_height)
          <div class="specs-item">
            <div class="specs-label">Total Height</div>
            <div class="specs-value">{{ $data->total_height }} mm</div>
          </div>
          @endif
          
          @if($data->seat_height)
          <div class="specs-item">
            <div class="specs-label">Seat Height</div>
            <div class="specs-value">{{ $data->seat_height }} mm</div>
          </div>
          @endif
          
          @if($data->wheelbase)
          <div class="specs-item">
            <div class="specs-label">Wheelbase</div>
            <div class="specs-value">{{ $data->wheelbase }} mm</div>
          </div>
          @endif
          
          @if($data->ground_clearance)
          <div class="specs-item">
            <div class="specs-label">Ground Clearance</div>
            <div class="specs-value">{{ $data->ground_clearance }} mm</div>
          </div>
          @endif
          
          @if($data->weight)
          <div class="specs-item">
            <div class="specs-label">Weight</div>
            <div class="specs-value">{{ $data->weight }} kg</div>
          </div>
          @endif
        </div>

        <!-- Others -->
        <div class="specs-group">
          <h3>Others</h3>
          
          @if($data->fuel_tank_capacity)
          <div class="specs-item">
            <div class="specs-label">Fuel Tank Capacity</div>
            <div class="specs-value">{{ $data->fuel_tank_capacity }} L</div>
          </div>
          @endif
          
          @if($data->oil_tank_capacity)
          <div class="specs-item">
            <div class="specs-label">Oil Capacity</div>
            <div class="specs-value">{{ $data->oil_tank_capacity }} L</div>
          </div>
          @endif
          
          @if($data->fuel_consumption)
          <div class="specs-item">
            <div class="specs-label">Fuel Consumption</div>
            <div class="specs-value">{{ $data->fuel_consumption }} L/100km</div>
          </div>
          @endif
          
          @if($data->cos2_emissions)
          <div class="specs-item">
            <div class="specs-label">CO₂ Emissions</div>
            <div class="specs-value">{{ $data->cos2_emissions }} g/km</div>
          </div>
          @endif
          
          @if($data->license_type_id)
          <div class="specs-item">
            <div class="specs-label">License Type</div>
            <div class="specs-value">{{ $data->licenseType->name ?? 'N/A' }}</div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>

  <!-- Action Buttons -->
  <div class="container">
    <div class="action-buttons animated">
      <a href="{{url('/')}}" class="btn btn-secondary">Back to Homepage</a>
    </div>
  </div>

  <!-- JavaScript para as tabs e carrossel -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Código para as tabs
      const tabItems = document.querySelectorAll('.tab-item');
      const tabContents = document.querySelectorAll('.tab-content');

      tabItems.forEach(item => {
        item.addEventListener('click', function() {
          tabItems.forEach(tab => tab.classList.remove('active'));
          this.classList.add('active');

          const targetTab = this.dataset.tab;
          tabContents.forEach(content => {
            if (content.id === targetTab) {
              content.classList.add('active');
              content.style.display = 'block'; // Show the content
            } else {
              content.classList.remove('active');
              content.style.display = 'none'; // Hide the content
            }
          });
        });
      });

      // Inicializar o primeiro conteúdo ativo
      tabContents.forEach(content => {
        if (!content.classList.contains('active')) {
          content.style.display = 'none';
        }
      });

      // Código para o carrossel
      const slides = document.querySelector('.carousel-slides');
      const prevBtn = document.querySelector('.carousel-arrow.prev');
      const nextBtn = document.querySelector('.carousel-arrow.next');

      if (!slides || !prevBtn || !nextBtn) return;

      const slideCount = slides.children.length;
      let currentSlide = 0;

      // Função para mostrar um slide específico
      function showSlide(index) {
        if (index < 0) index = slideCount - 1;
        if (index >= slideCount) index = 0;

        slides.style.transform = `translateX(-${index * 100}%)`;
        currentSlide = index;
      }

      // Inicializar o primeiro slide
      showSlide(0);

      // Event listeners para os botões de navegação
      prevBtn.addEventListener('click', () => {
        showSlide(currentSlide - 1);
      });

      nextBtn.addEventListener('click', () => {
        showSlide(currentSlide + 1);
      });

      // Navegação com teclado
      document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
          showSlide(currentSlide - 1);
        } else if (e.key === 'ArrowRight') {
          showSlide(currentSlide + 1);
        }
      });
    });
  </script>

  <!-- info section -->
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
      
      // Ativar loading overlay para o botão de adicionar à wishlist
      const wishlistButton = document.querySelector('.btn-wishlist');
      if (wishlistButton && loadingOverlay) {
        wishlistButton.addEventListener('click', function() {
          loadingOverlay.classList.add('active');
        });
      }
    });
  </script>
  
  <!-- PHPFlasher para notificações -->
  @flasher_render
  
  <!-- Toastr Assets -->
  @include('home.toastr_assets')
  
  <script>
    // Corrige o loading infinito ao voltar no histórico
    window.addEventListener('pageshow', function(event) {
      const loadingOverlay = document.querySelector('.loading-overlay');
      if (loadingOverlay) {
        loadingOverlay.classList.remove('active');
      }
    });
  </script>
  
</body>

</html>