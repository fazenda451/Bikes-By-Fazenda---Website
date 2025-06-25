<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

  <style>
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
  
  <!-- Header -->
  @include('home.header')

  <!-- Hero Section with Slider -->
  <section class="hero-section">
    @include('home.slider')
  </section>

  <!-- Featured Categories -->
  <section class="categories-section py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="category-card" onclick="window.location.href='#motorcycles'">
            <div class="category-icon">
              <i class="fas fa-motorcycle fa-3x"></i>
            </div>
            <h3>Motorcycles</h3>
            <p>Explore our high-performance motorcycle collection</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="category-card" onclick="window.location.href='#products'">
            <div class="category-icon">
              <i class="fas fa-helmet-safety fa-3x"></i>
            </div>
            <h3>Equipment</h3>
            <p>Essential protection gear and accessories</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="category-card" onclick="window.location.href='#products'">
            <div class="category-icon">
              <i class="fas fa-tools fa-3x"></i>
            </div>
            <h3>Accessories</h3>
            <p>Parts and accessories for your motorcycle</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Motorcycles -->
  <section id="motorcycles" class="featured-bikes py-5">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2>Featured Motorcycles</h2>
        <p>Discover our premium motorcycle selection</p>
      </div>
      @include('home.motorcycle')
    </div>
  </section>

  <!-- Featured Products -->
  <section id="products" class="featured-products py-5 bg-light">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2>Featured Products</h2>
        <p>Selected equipment and accessories</p>
      </div>
      @include('home.product')
    </div>
  </section>


  <!-- Benefits Section -->
  <section class="benefits-section py-5">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-md-3">
          <div class="benefit-item">
            <i class="fas fa-truck fa-3x mb-3"></i>
            <h4>Free Shipping</h4>
            <p>On orders over €500</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="benefit-item">
            <i class="fas fa-shield-alt fa-3x mb-3"></i>
            <h4>Secure Payment</h4>
            <p>100% secure checkout</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="benefit-item">
            <i class="fas fa-exchange-alt fa-3x mb-3"></i>
            <h4>Easy Returns</h4>
            <p>30-day return policy</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="benefit-item">
            <i class="fas fa-headset fa-3x mb-3"></i>
            <h4>24/7 Support</h4>
            <p>Expert assistance</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  @include('home.contact')

  <!-- flasher notification container -->
  @flasher_render

  <!-- Toastr Assets -->
  @include('home.toastr_assets')

  <!-- Footer -->
  @include('home.footer')

  <!-- Bootstrap JS -->
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
      
      // Ativar loading overlay para os cards de categoria
      const categoryCards = document.querySelectorAll('.category-card');
      categoryCards.forEach(card => {
        card.addEventListener('click', function() {
          const href = this.getAttribute('onclick');
          if (href && !href.includes('#')) {
            loadingOverlay.classList.add('active');
          }
        });
      });
      
      // Ativar loading overlay para os botões
      const buttons = document.querySelectorAll('.btn');
      buttons.forEach(button => {
        if (!button.hasAttribute('data-bs-toggle')) {
          button.addEventListener('click', function() {
            const href = this.getAttribute('href');
            if (href && !href.startsWith('#')) {
              loadingOverlay.classList.add('active');
            }
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

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      color: #333;
    }

    .section-header h2 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .section-header p {
      color: #666;
      font-size: 1.1rem;
    }

    .category-card {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease;
      cursor: pointer;
    }

    .category-card:hover {
      transform: translateY(-5px);
    }

    .category-icon {
      color: #9935dc;
      margin-bottom: 1rem;
    }

    .benefit-item {
      padding: 1.5rem;
      transition: transform 0.3s ease;
    }

    .benefit-item:hover {
      transform: translateY(-5px);
    }

    .benefit-item i {
      color: #9935dc;
    }

    .benefit-item h4 {
      margin: 1rem 0;
    }

    @media (max-width: 768px) {
      .category-card {
        margin-bottom: 1rem;
      }

      .section-header h2 {
        font-size: 2rem;
      }
    }
  </style>
</body>

</html>