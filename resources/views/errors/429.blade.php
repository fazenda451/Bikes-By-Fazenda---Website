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

  <title>Too Many Requests - Bikes By Fazenda</title>

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
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }
    
    .timer-container {
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .timer {
      font-size: 24px;
      font-weight: 600;
      color: #9935dc;
      background-color: #f8f9fa;
      padding: 10px 20px;
      border-radius: 8px;
      display: inline-block;
      margin-left: 10px;
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
          <i class="fas fa-tachometer-alt error-icon animate__animated animate__fadeIn"></i>
          <h1 class="error-code animate__animated animate__fadeInDown">429</h1>
          <h2 class="error-message animate__animated animate__fadeInUp">Too Many Requests</h2>
          <p class="error-description animate__animated animate__fadeInUp animate__delay-1s">Sorry, you've sent too many requests in a short period of time. Please wait a moment before trying again.</p>
          
          <div class="timer-container animate__animated animate__fadeIn animate__delay-1s">
            <span>Please try again in:</span>
            <div class="timer" id="countdown">30</div>
            <span>seconds</span>
          </div>
          
          <a href="/" class="home-btn animate__animated animate__fadeInUp animate__delay-1s">
            <i class="fas fa-home btn-icon"></i> Return to Homepage
          </a>
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
  
  <script>
    // Countdown timer
    let seconds = 30;
    const countdownElement = document.getElementById('countdown');
    
    const countdown = setInterval(function() {
      seconds--;
      countdownElement.textContent = seconds;
      
      if (seconds <= 0) {
        clearInterval(countdown);
        window.location.reload();
      }
    }, 1000);
  </script>
</body>
</html> 