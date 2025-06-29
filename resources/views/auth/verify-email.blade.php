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
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      padding: 40px 20px;
      position: relative;
      overflow: hidden;
    }
    
    .verify-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%239935dc" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%239935dc" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="%239935dc" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="%239935dc" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="%239935dc" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      pointer-events: none;
    }
    
    .verify-card {
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 100%;
      max-width: 650px;
      position: relative;
      z-index: 1;
      border: 1px solid rgba(153, 53, 220, 0.1);
    }
    
    .verify-header {
      background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
      color: white;
      padding: 40px 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    
    .verify-header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    .verify-header h1 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 15px;
      position: relative;
      z-index: 1;
    }
    
    .verify-header p {
      font-size: 18px;
      opacity: 0.95;
      margin-bottom: 0;
      position: relative;
      z-index: 1;
      font-weight: 300;
    }
    
    .verify-icon {
      font-size: 80px;
      margin-bottom: 25px;
      color: white;
      position: relative;
      z-index: 1;
      animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
      40% { transform: translateY(-10px); }
      60% { transform: translateY(-5px); }
    }
    
    .verify-body {
      padding: 40px 30px;
    }
    
    .verify-title {
      font-size: 24px;
      font-weight: 700;
      color: #333;
      margin-bottom: 25px;
      text-align: center;
    }
    
    .verify-text {
      font-size: 18px;
      color: #666;
      margin-bottom: 30px;
      text-align: center;
      line-height: 1.6;
    }
    
    .verify-alert {
      background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
      border-left: 5px solid #4caf50;
      padding: 20px;
      margin-bottom: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(76, 175, 80, 0.1);
    }
    
    .verify-alert p {
      color: #2e7d32;
      margin-bottom: 0;
      font-size: 16px;
      font-weight: 500;
    }
    
    .verify-alert i {
      color: #4caf50;
      margin-right: 10px;
      font-size: 18px;
    }
    
    .verify-help {
      margin-top: 35px;
      padding-top: 30px;
      border-top: 2px solid #f0f0f0;
    }
    
    .verify-help-title {
      font-size: 20px;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
      text-align: center;
    }
    
    .verify-help-text {
      font-size: 16px;
      color: #666;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      padding: 8px 0;
    }
    
    .verify-help-text i {
      color: #9935dc;
      margin-right: 12px;
      font-size: 16px;
      width: 20px;
      text-align: center;
    }
    
    .verify-form {
      text-align: center;
      margin-top: 25px;
    }
    
    .verify-btn {
      background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
      color: white;
      border: none;
      padding: 15px 40px;
      border-radius: 12px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      box-shadow: 0 8px 25px rgba(153, 53, 220, 0.3);
      position: relative;
      overflow: hidden;
    }
    
    .verify-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    
    .verify-btn:hover::before {
      left: 100%;
    }
    
    .verify-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(153, 53, 220, 0.4);
    }
    
    .verify-btn:active {
      transform: translateY(-1px);
    }
    
    .home-link {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-align: center;
      margin-top: 25px;
      color: #9935dc;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      transition: all 0.3s ease;
      padding: 10px 20px;
      border-radius: 8px;
      background: rgba(153, 53, 220, 0.1);
    }
    
    .home-link:hover {
      color: #7b2ab0;
      background: rgba(153, 53, 220, 0.15);
      transform: translateY(-2px);
      text-decoration: none;
    }
    
    .verification-steps {
      display: flex;
      justify-content: space-around;
      margin: 30px 0;
      flex-wrap: wrap;
      gap: 20px;
    }
    
    .step {
      text-align: center;
      flex: 1;
      min-width: 120px;
    }
    
    .step-number {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 18px;
      margin: 0 auto 15px;
      box-shadow: 0 4px 15px rgba(153, 53, 220, 0.3);
    }
    
    .step-text {
      font-size: 14px;
      color: #666;
      font-weight: 500;
    }
    
    @media (max-width: 768px) {
      .verify-header h1 {
        font-size: 24px;
      }
      
      .verify-header p {
        font-size: 16px;
      }
      
      .verify-icon {
        font-size: 60px;
      }
      
      .verify-title {
        font-size: 20px;
      }
      
      .verify-text {
        font-size: 16px;
      }
      
      .verify-body {
        padding: 30px 20px;
      }
      
      .verification-steps {
        flex-direction: column;
        align-items: center;
      }
      
      .step {
        min-width: auto;
        width: 100%;
        max-width: 200px;
      }
    }
    
    @media (max-width: 480px) {
      .verify-container {
        padding: 20px 15px;
      }
      
      .verify-header {
        padding: 30px 20px;
      }
      
      .verify-body {
        padding: 25px 15px;
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
            <p class="verify-text">Thank you for registering with Bikes By Fazenda! Before you begin exploring our amazing motorcycle collection, please verify your email address by clicking on the link we just sent to your inbox.</p>
            
            @if (session('status') == 'verification-link-sent')
              <div class="verify-alert animate__animated animate__fadeIn">
                <p><i class="fas fa-check-circle"></i> A new verification link has been sent to the email address you provided during registration.</p>
              </div>
            @endif
            
            <div class="verification-steps">
              <div class="step">
                <div class="step-number">1</div>
                <div class="step-text">Check your email</div>
              </div>
              <div class="step">
                <div class="step-number">2</div>
                <div class="step-text">Click the link</div>
              </div>
              <div class="step">
                <div class="step-number">3</div>
                <div class="step-text">Start exploring</div>
              </div>
            </div>
            
            <div class="verify-help">
              <h3 class="verify-help-title">Didn't receive the email?</h3>
              <p class="verify-help-text"><i class="fas fa-search"></i> Check your spam folder</p>
              <p class="verify-help-text"><i class="fas fa-check-circle"></i> Verify that you've entered your email address correctly</p>
              <p class="verify-help-text"><i class="fas fa-shield-alt"></i> Check if your email provider's filters are not blocking our emails</p>
              
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
