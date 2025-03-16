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
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

  <title>Service Unavailable - Bikes By Fazenda</title>

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
    .maintenance-container {
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
    
    .maintenance-message {
      font-size: 28px;
      margin-bottom: 30px;
      color: #333;
    }
    
    .maintenance-description {
      font-size: 18px;
      margin-bottom: 40px;
      color: #666;
      max-width: 600px;
    }
    
    .maintenance-info {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 40px;
      max-width: 600px;
      border-left: 5px solid #9935dc;
    }
    
    .maintenance-info h3 {
      font-size: 20px;
      color: #333;
      margin-bottom: 15px;
    }
    
    .maintenance-info p {
      font-size: 16px;
      color: #666;
      margin-bottom: 10px;
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
      margin-bottom: 30px;
    }
    
    .home-btn:hover {
      background-color: #7b2ab0;
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .btn-icon {
      margin-right: 10px;
    }
    
    .maintenance-icon {
      font-size: 100px;
      color: #9935dc;
      margin-bottom: 30px;
      animation: wrench 2.5s ease infinite;
    }
    
    @keyframes wrench {
      0% {
        transform: rotate(-12deg);
      }
      8% {
        transform: rotate(12deg);
      }
      10% {
        transform: rotate(24deg);
      }
      18% {
        transform: rotate(-24deg);
      }
      20% {
        transform: rotate(-24deg);
      }
      28% {
        transform: rotate(24deg);
      }
      30% {
        transform: rotate(24deg);
      }
      38% {
        transform: rotate(-24deg);
      }
      40% {
        transform: rotate(-24deg);
      }
      48% {
        transform: rotate(24deg);
      }
      50% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(0deg);
      }
    }
    
    .social-links {
      margin-top: 20px;
    }
    
    .social-links a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #f8f9fa;
      color: #9935dc;
      margin: 0 5px;
      font-size: 18px;
      transition: all 0.3s;
    }
    
    .social-links a:hover {
      background-color: #9935dc;
      color: white;
      transform: translateY(-3px);
    }
    
    @media (max-width: 768px) {
      .error-code {
        font-size: 100px;
      }
      
      .maintenance-message {
        font-size: 24px;
      }
      
      .maintenance-description {
        font-size: 16px;
        padding: 0 20px;
      }
      
      .maintenance-icon {
        font-size: 80px;
      }
      
      .maintenance-info {
        margin: 0 20px 40px;
      }
    }
    
    @media (max-width: 576px) {
      .error-code {
        font-size: 80px;
      }
      
      .maintenance-message {
        font-size: 20px;
      }
    }
  </style>
</head>

<body>
  <!-- Maintenance Section -->
  <section class="maintenance-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <i class="fas fa-wrench maintenance-icon animate__animated animate__fadeIn"></i>
          <h1 class="error-code animate__animated animate__fadeInDown">503</h1>
          <h2 class="maintenance-message animate__animated animate__fadeInUp">Service Temporarily Unavailable</h2>
          <p class="maintenance-description animate__animated animate__fadeInUp animate__delay-1s">We're currently performing scheduled maintenance on our website to improve your experience. We'll be back online shortly.</p>
          
          <div class="maintenance-info animate__animated animate__fadeIn animate__delay-1s">
            <h3>Maintenance Information</h3>
            <p><strong>Expected Duration:</strong> Approximately 2 hours</p>
            <p><strong>Started:</strong> {{date('F j, Y, g:i a')}}</p>
            <p>During this time, our website will be unavailable. We apologize for any inconvenience this may cause.</p>
          </div>
          
          <a href="/" class="home-btn animate__animated animate__fadeInUp animate__delay-1s">
            <i class="fas fa-sync-alt btn-icon"></i> Check Again
          </a>
          
          <p class="animate__animated animate__fadeIn animate__delay-2s">Follow us for updates:</p>
          <div class="social-links animate__animated animate__fadeIn animate__delay-2s">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- jQery -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <!-- custom js -->
  <script src="{{asset('js/custom.js')}}"></script>
</body>
</html> 