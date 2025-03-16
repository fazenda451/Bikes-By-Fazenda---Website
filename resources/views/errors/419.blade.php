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

  <title>Page Expired - Bikes By Fazenda</title>

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
    }
    
    .error-code {
      font-size: 120px;
      font-weight: 700;
      color: #9935dc;
      margin-bottom: 20px;
      line-height: 1;
    }
    
    .error-message {
      font-size: 28px;
      margin-bottom: 30px;
      color: #333;
    }
    
    .error-description {
      font-size: 18px;
      margin-bottom: 40px;
      color: #666;
      max-width: 600px;
    }
    
    .buttons-container {
      display: flex;
      gap: 20px;
      margin-bottom: 40px;
    }
    
    .home-btn {
      background-color: #9935dc;
      color: white;
      padding: 12px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: none;
      display: inline-flex;
      align-items: center;
    }
    
    .home-btn:hover {
      background-color: #7b2ab0;
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .back-btn {
      background-color: #f8f9fa;
      color: #333;
      padding: 12px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: 1px solid #e1e1e1;
      display: inline-flex;
      align-items: center;
    }
    
    .back-btn:hover {
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
      animation: flip 2s infinite;
    }
    
    @keyframes flip {
      0% {
        transform: rotateY(0);
      }
      50% {
        transform: rotateY(180deg);
      }
      100% {
        transform: rotateY(360deg);
      }
    }
    
    .info-box {
      background-color: #f8f9fa;
      border-left: 4px solid #9935dc;
      padding: 20px;
      margin-bottom: 30px;
      border-radius: 8px;
      max-width: 600px;
      text-align: left;
    }
    
    .info-box h3 {
      font-size: 18px;
      color: #333;
      margin-bottom: 10px;
    }
    
    .info-box p {
      font-size: 15px;
      color: #666;
      margin-bottom: 0;
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
          <i class="fas fa-hourglass-end error-icon animate__animated animate__fadeIn"></i>
          <h1 class="error-code animate__animated animate__fadeInDown">419</h1>
          <h2 class="error-message animate__animated animate__fadeInUp">Page Expired</h2>
          <p class="error-description animate__animated animate__fadeInUp animate__delay-1s">Sorry, your session has expired due to inactivity or the CSRF token has expired. Please go back to the previous page and try again.</p>
          
          <div class="info-box animate__animated animate__fadeIn animate__delay-1s">
            <h3><i class="fas fa-info-circle"></i> Why did this happen?</h3>
            <p>For security reasons, forms on our website expire after a period of inactivity. This helps protect your information and ensures a secure browsing experience.</p>
          </div>
          
          <div class="buttons-container animate__animated animate__fadeInUp animate__delay-1s">
            <a href="/" class="home-btn">
              <i class="fas fa-home btn-icon"></i> Homepage
            </a>
            <a href="javascript:history.back()" class="back-btn">
              <i class="fas fa-arrow-left btn-icon"></i> Go Back
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