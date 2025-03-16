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

  <title>Email Verification - Bikes By Fazenda</title>

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
    .verify-container {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
      padding: 40px 20px;
    }
    
    .verify-card {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 100%;
      max-width: 600px;
      position: relative;
    }
    
    .verify-header {
      background-color: #9935dc;
      color: white;
      padding: 30px;
      text-align: center;
      position: relative;
    }
    
    .verify-header h1 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 10px;
    }
    
    .verify-header p {
      font-size: 16px;
      opacity: 0.9;
      margin-bottom: 0;
    }
    
    .verify-icon {
      font-size: 60px;
      margin-bottom: 20px;
      color: white;
    }
    
    .verify-body {
      padding: 30px;
    }
    
    .verify-title {
      font-size: 20px;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
      text-align: center;
    }
    
    .verify-text {
      font-size: 16px;
      color: #666;
      margin-bottom: 25px;
      text-align: center;
    }
    
    .verify-alert {
      background-color: #e8f5e9;
      border-left: 4px solid #4caf50;
      padding: 15px;
      margin-bottom: 25px;
      border-radius: 5px;
    }
    
    .verify-alert p {
      color: #2e7d32;
      margin-bottom: 0;
      font-size: 15px;
    }
    
    .verify-form {
      text-align: center;
    }
    
    .verify-btn {
      background-color: #9935dc;
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s;
      display: inline-block;
    }
    
    .verify-btn:hover {
      background-color: #7b2ab0;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .verify-help {
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #eee;
    }
    
    .verify-help-title {
      font-size: 18px;
      font-weight: 600;
      color: #333;
      margin-bottom: 15px;
      text-align: center;
    }
    
    .verify-help-text {
      font-size: 15px;
      color: #666;
      margin-bottom: 10px;
    }
    
    .verify-help-text i {
      color: #9935dc;
      margin-right: 8px;
    }
    
    .home-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #9935dc;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s;
    }
    
    .home-link:hover {
      color: #7b2ab0;
      text-decoration: underline;
    }
    
    @media (max-width: 768px) {
      .verify-header h1 {
        font-size: 22px;
      }
      
      .verify-icon {
        font-size: 50px;
      }
      
      .verify-title {
        font-size: 18px;
      }
      
      .verify-text {
        font-size: 15px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Verify Email Section -->
  <section class="verify-section">
    <div class="container">
      <div class="verify-container">
        <div class="verify-card animate__animated animate__fadeIn">
          <div class="verify-header">
            <i class="fas fa-envelope-open-text verify-icon animate__animated animate__bounceIn"></i>
            <h1>Email Verification</h1>
            <p>One more step to complete your registration</p>
          </div>
          
          <div class="verify-body">
            <h2 class="verify-title">Verify Your Email Address</h2>
            <p class="verify-text">Thank you for registering! Before you begin, please verify your email address by clicking on the link we just sent to your inbox.</p>
            
            @if (session('status') == 'verification-link-sent')
              <div class="verify-alert animate__animated animate__fadeIn">
                <p><i class="fas fa-check-circle"></i> A new verification link has been sent to the email address you provided during registration.</p>
              </div>
            @endif
            
            <div class="verify-help">
              <h3 class="verify-help-title">Didn't receive the email?</h3>
              <p class="verify-help-text"><i class="fas fa-check"></i> Check your spam folder</p>
              <p class="verify-help-text"><i class="fas fa-check"></i> Verify that you've entered your email address correctly</p>
              <p class="verify-help-text"><i class="fas fa-check"></i> Check if your email provider's filters are not blocking our emails</p>
              
              <form class="verify-form" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="verify-btn">
                  <i class="fas fa-paper-plane"></i> Resend Verification Email
                </button>
              </form>
            </div>
            
            <a href="/" class="home-link">
              <i class="fas fa-home"></i> Return to Homepage
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
