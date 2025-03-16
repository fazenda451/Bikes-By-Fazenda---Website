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

  <title>Access Forbidden - Bikes By Fazenda</title>

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
    
    .error-icon {
      font-size: 100px;
      color: #9935dc;
      margin-bottom: 30px;
      animation: shake 2s infinite;
    }
    
    @keyframes shake {
      0%, 100% {
        transform: translateX(0);
      }
      10%, 30%, 50%, 70%, 90% {
        transform: translateX(-10px);
      }
      20%, 40%, 60%, 80% {
        transform: translateX(10px);
      }
    }
    
    .support-info {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 40px;
      max-width: 600px;
      border-left: 5px solid #9935dc;
    }
    
    .support-info h3 {
      font-size: 20px;
      color: #333;
      margin-bottom: 15px;
    }
    
    .support-info p {
      font-size: 16px;
      color: #666;
      margin-bottom: 10px;
    }
    
    .contact-options {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
    }
    
    .contact-btn {
      background-color: #f8f9fa;
      color: #333;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s;
      border: 1px solid #e1e1e1;
      display: inline-flex;
      align-items: center;
    }
    
    .contact-btn:hover {
      background-color: #e1e1e1;
      transform: translateY(-3px);
    }
    
    .contact-icon {
      margin-right: 8px;
      color: #9935dc;
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
      
      .support-info {
        margin: 0 20px 40px;
      }
      
      .contact-options {
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
          <i class="fas fa-ban error-icon animate__animated animate__fadeIn"></i>
          <h1 class="error-code animate__animated animate__fadeInDown">403</h1>
          <h2 class="error-message animate__animated animate__fadeInUp">Access Forbidden</h2>
          <p class="error-description animate__animated animate__fadeInUp animate__delay-1s">Sorry, you don't have permission to access this page. If you believe this is an error, please contact the website administrator.</p>
          
          <a href="/" class="home-btn animate__animated animate__fadeInUp animate__delay-1s">
            <i class="fas fa-home btn-icon"></i> Return to Homepage
          </a>
          
          <div class="support-info animate__animated animate__fadeIn animate__delay-1s">
            <h3>Need Help?</h3>
            <p>If you believe you should have access to this page, please contact our support team to resolve this issue.</p>
            
            <div class="contact-options">
              <a href="mailto:support@bikesbyfazenda.com" class="contact-btn">
                <i class="fas fa-envelope contact-icon"></i> Email Support
              </a>
              <a href="/contact" class="contact-btn">
                <i class="fas fa-headset contact-icon"></i> Contact Form
              </a>
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