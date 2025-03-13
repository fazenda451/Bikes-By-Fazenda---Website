<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Página não encontrada - Bikes By Fazenda</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <style>
    .error-container {
      text-align: center;
      padding: 100px 0;
      min-height: 70vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
    }
    
    .error-code {
      font-size: 120px;
      font-weight: 700;
      color: #9935dc;
      margin-bottom: 20px;
      line-height: 1;
      text-shadow: 0 2px 10px rgba(153, 53, 220, 0.2);
    }
    
    .error-message {
      font-size: 28px;
      margin-bottom: 30px;
      color: #333;
      font-weight: 600;
    }
    
    .error-description {
      font-size: 18px;
      margin-bottom: 40px;
      color: #666;
      max-width: 600px;
      line-height: 1.6;
    }
    
    .buttons-container {
      display: flex;
      gap: 15px;
      margin-bottom: 40px;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .home-btn {
      background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
      color: white;
      padding: 14px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: none;
      box-shadow: 0 4px 15px rgba(153, 53, 220, 0.3);
      display: inline-flex;
      align-items: center;
    }
    
    .home-btn:hover {
      background: linear-gradient(135deg, #7b2ab0 0%, #9935dc 100%);
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(153, 53, 220, 0.4);
    }
    
    .search-btn {
      background-color: #f5f5f5;
      color: #333;
      padding: 14px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: 1px solid #e1e1e1;
      display: inline-flex;
      align-items: center;
    }
    
    .search-btn:hover {
      background-color: #e1e1e1;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .btn-icon {
      margin-right: 10px;
    }
    
    .error-icon {
      font-size: 100px;
      color: #9935dc;
      margin-bottom: 30px;
      animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
      }
      40% {
        transform: translateY(-20px);
      }
      60% {
        transform: translateY(-10px);
      }
    }
    
    .search-container {
      max-width: 500px;
      margin: 0 auto 40px;
      position: relative;
    }
    
    .search-input {
      width: 100%;
      height: 50px;
      padding: 10px 20px;
      border: 2px solid #e1e1e1;
      border-radius: 8px;
      font-size: 16px;
      transition: all 0.3s;
      background-color: #fff;
      padding-right: 50px;
    }
    
    .search-input:focus {
      border-color: #9935dc;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
      outline: none;
    }
    
    .search-button {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #9935dc;
      font-size: 20px;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .search-button:hover {
      color: #7b2ab0;
    }
    
    .popular-links {
      margin-top: 20px;
    }
    
    .popular-links h3 {
      font-size: 18px;
      color: #333;
      margin-bottom: 15px;
      font-weight: 600;
    }
    
    .links-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
    }
    
    .popular-link {
      background-color: #fff;
      color: #333;
      padding: 8px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
      transition: all 0.3s;
      border: 1px solid #e1e1e1;
    }
    
    .popular-link:hover {
      background-color: #9935dc;
      color: white;
      border-color: #9935dc;
    }
    
    @media (max-width: 768px) {
      .error-code {
        font-size: 100px;
      }
      
      .error-message {
        font-size: 24px;
      }
      
      .error-description {
        font-size: 16px;
        padding: 0 20px;
      }
      
      .error-icon {
        font-size: 80px;
      }
      
      .buttons-container {
        flex-direction: column;
        gap: 10px;
      }
      
      .search-container {
        width: 90%;
      }
    }
    
    @media (max-width: 576px) {
      .error-code {
        font-size: 80px;
      }
      
      .error-message {
        font-size: 20px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Error Section -->
  <section class="error-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <i class="fas fa-exclamation-triangle error-icon animate__animated animate__fadeIn"></i>
          <h1 class="error-code animate__animated animate__fadeInDown">404</h1>
          <h2 class="error-message animate__animated animate__fadeInUp">Página não encontrada</h2>
          <p class="error-description animate__animated animate__fadeInUp animate__delay-1s">Desculpe, a página que você está procurando não existe ou foi movida. Por favor, verifique o URL ou retorne à página inicial.</p>
          
          <div class="search-container animate__animated animate__fadeIn animate__delay-1s">
            <form action="/search" method="GET">
              <input type="text" class="search-input" placeholder="Buscar no site..." name="q">
              <button type="submit" class="search-button">
                <i class="fas fa-search"></i>
              </button>
            </form>
          </div>
          
          <div class="buttons-container animate__animated animate__fadeInUp animate__delay-1s">
            <a href="/" class="home-btn">
              <i class="fas fa-home btn-icon"></i> Página Inicial
            </a>
            <a href="/products" class="search-btn">
              <i class="fas fa-motorcycle btn-icon"></i> Ver Produtos
            </a>
          </div>
          
          <div class="popular-links animate__animated animate__fadeIn animate__delay-2s">
            <h3>Links Populares</h3>
            <div class="links-container">
              <a href="/products/category/motorcycles" class="popular-link">Motocicletas</a>
              <a href="/products/category/accessories" class="popular-link">Acessórios</a>
              <a href="/products/category/parts" class="popular-link">Peças</a>
              <a href="/contact" class="popular-link">Contato</a>
              <a href="/about" class="popular-link">Sobre Nós</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('home.footer')

  <!-- jQery -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <!-- custom js -->
  <script src="{{asset('js/custom.js')}}"></script>
</body>
</html> 