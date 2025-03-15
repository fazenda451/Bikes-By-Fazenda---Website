<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

</head>

<body>
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
            <h3>Motos</h3>
            <p>Explore nossa coleção de motos de alto desempenho</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="category-card" onclick="window.location.href='#products'">
            <div class="category-icon">
              <i class="fas fa-helmet-safety fa-3x"></i>
            </div>
            <h3>Equipamentos</h3>
            <p>Equipamentos essenciais de proteção e acessórios</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="category-card" onclick="window.location.href='#products'">
            <div class="category-icon">
              <i class="fas fa-tools fa-3x"></i>
            </div>
            <h3>Acessórios</h3>
            <p>Peças e acessórios para sua moto</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Motorcycles -->
  <section id="motorcycles" class="featured-bikes py-5">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2>Motos em Destaque</h2>
        <p>Descubra nossa seleção premium de motocicletas</p>
      </div>
      @include('home.motorcycle')
    </div>
  </section>

  <!-- Featured Products -->
  <section id="products" class="featured-products py-5 bg-light">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2>Produtos em Destaque</h2>
        <p>Equipamentos e acessórios selecionados</p>
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
            <h4>Frete Grátis</h4>
            <p>Em pedidos acima de €500</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="benefit-item">
            <i class="fas fa-shield-alt fa-3x mb-3"></i>
            <h4>Pagamento Seguro</h4>
            <p>Checkout 100% seguro</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="benefit-item">
            <i class="fas fa-exchange-alt fa-3x mb-3"></i>
            <h4>Devolução Fácil</h4>
            <p>Política de devolução de 30 dias</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="benefit-item">
            <i class="fas fa-headset fa-3x mb-3"></i>
            <h4>Suporte 24/7</h4>
            <p>Assistência especializada</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  @include('home.contact')

  <!-- Footer -->
  @include('home.footer')

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