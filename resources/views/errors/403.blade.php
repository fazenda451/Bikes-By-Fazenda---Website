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

  <title>Acesso Proibido - Bikes By Fazenda</title>

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
    
    .home-btn i {
      margin-right: 10px;
    }
    
    .error-icon {
      font-size: 100px;
      color: #9935dc;
      margin-bottom: 30px;
      animation: shake 1.5s ease-in-out infinite;
    }
    
    @keyframes shake {
      0%, 100% {
        transform: rotate(0deg);
      }
      20% {
        transform: rotate(10deg);
      }
      40% {
        transform: rotate(-10deg);
      }
      60% {
        transform: rotate(5deg);
      }
      80% {
        transform: rotate(-5deg);
      }
    }
    
    .contact-info {
      background-color: rgba(153, 53, 220, 0.1);
      border-radius: 10px;
      padding: 20px;
      margin-top: 30px;
      max-width: 600px;
      border-left: 4px solid #9935dc;
    }
    
    .contact-info h3 {
      font-size: 18px;
      color: #333;
      margin-bottom: 10px;
      font-weight: 600;
    }
    
    .contact-info p {
      font-size: 15px;
      color: #666;
      margin-bottom: 15px;
    }
    
    .contact-info .contact-btn {
      display: inline-flex;
      align-items: center;
      background-color: #f5f5f5;
      color: #333;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: 1px solid #e1e1e1;
      font-size: 14px;
    }
    
    .contact-info .contact-btn:hover {
      background-color: #9935dc;
      color: white;
      border-color: #9935dc;
    }
    
    .contact-info .contact-btn i {
      margin-right: 8px;
      font-size: 16px;
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
    }
    
    @media (max-width: 576px) {
      .error-code {
        font-size: 80px;
      }
      
      .error-message {
        font-size: 20px;
      }
      
      .contact-info {
        margin: 30px 20px 0;
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
          <i class="fas fa-ban error-icon animate__animated animate__fadeIn"></i>
          <h1 class="error-code animate__animated animate__fadeInDown">403</h1>
          <h2 class="error-message animate__animated animate__fadeInUp">Acesso Proibido</h2>
          <p class="error-description animate__animated animate__fadeInUp animate__delay-1s">Desculpe, você não tem permissão para acessar esta página. Se você acredita que isso é um erro, entre em contato com o administrador do site.</p>
          
          <a href="/" class="home-btn animate__animated animate__fadeInUp animate__delay-1s">
            <i class="fas fa-home"></i> Voltar para a Página Inicial
          </a>
          
          <div class="contact-info animate__animated animate__fadeIn animate__delay-2s">
            <h3>Precisa de ajuda?</h3>
            <p>Se você acredita que deveria ter acesso a esta página, por favor entre em contato com nossa equipe de suporte para resolver este problema.</p>
            <a href="mailto:suporte@bikesbyfazenda.com" class="contact-btn">
              <i class="fas fa-envelope"></i> Contatar Suporte
            </a>
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