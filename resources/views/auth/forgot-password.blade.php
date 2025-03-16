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

  <title>Password Recovery - Bikes By Fazenda</title>

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
    .forgot-section {
      padding: 80px 0;
      min-height: 70vh;
      display: flex;
      align-items: center;
      background-color: #f8f9fa;
    }
    
    .forgot-container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 900px;
      margin: 0 auto;
      transition: all 0.3s ease;
    }
    
    .forgot-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(153, 53, 220, 0.15);
    }
    
    .forgot-row {
      display: flex;
      flex-wrap: wrap;
    }
    
    .forgot-image {
      flex: 0 0 45%;
      background-image: url('images/motorcycle-forgot.jpg');
      background-size: cover;
      background-position: center;
      min-height: 500px;
      position: relative;
      transition: all 0.5s ease;
    }
    
    .forgot-image-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(153, 53, 220, 0.85) 0%, rgba(102, 36, 147, 0.9) 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      padding: 40px;
      text-align: center;
    }
    
    .forgot-image-title {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .forgot-image-text {
      font-size: 18px;
      margin-bottom: 30px;
      line-height: 1.6;
    }
    
    .forgot-form {
      flex: 0 0 55%;
      padding: 50px;
      transition: all 0.3s ease;
    }
    
    .forgot-title {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
      text-align: center;
      position: relative;
      padding-bottom: 15px;
    }
    
    .forgot-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background-color: #9935dc;
      border-radius: 3px;
    }
    
    .forgot-subtitle {
      font-size: 16px;
      color: #666;
      text-align: center;
      margin-bottom: 30px;
      line-height: 1.6;
    }
    
    .form-group {
      margin-bottom: 25px;
      position: relative;
    }
    
    .form-label {
      display: block;
      font-size: 15px;
      color: #444;
      margin-bottom: 10px;
      font-weight: 600;
      transition: all 0.3s;
    }
    
    .form-control {
      width: 100%;
      height: 50px;
      padding: 12px 20px;
      border: 2px solid #e1e1e1;
      border-radius: 8px;
      font-size: 15px;
      transition: all 0.3s;
      background-color: #f9f9f9;
    }
    
    .form-control:focus {
      border-color: #9935dc;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
      background-color: #fff;
    }
    
    .input-icon {
      position: absolute;
      top: 42px;
      right: 15px;
      color: #9935dc;
      font-size: 18px;
    }
    
    .forgot-btn {
      background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
      color: white;
      padding: 14px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: none;
      width: 100%;
      cursor: pointer;
      font-size: 16px;
      letter-spacing: 0.5px;
      box-shadow: 0 4px 15px rgba(153, 53, 220, 0.3);
      margin-top: 10px;
    }
    
    .forgot-btn:hover {
      background: linear-gradient(135deg, #7b2ab0 0%, #9935dc 100%);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
    }
    
    .forgot-btn:active {
      transform: translateY(0);
    }
    
    .login-link {
      text-align: center;
      margin-top: 30px;
      font-size: 15px;
      color: #555;
    }
    
    .login-link a {
      color: #9935dc;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
    }
    
    .login-link a:hover {
      color: #7b2ab0;
      text-decoration: underline;
    }
    
    .status-message {
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 25px;
      font-size: 15px;
      background-color: #d1e7dd;
      color: #0f5132;
      border: 1px solid #badbcc;
    }
    
    .error-message {
      color: #dc3545;
      font-size: 13px;
      margin-top: 5px;
      font-weight: 500;
    }
    
    @media (max-width: 991px) {
      .forgot-container {
        max-width: 90%;
      }
    }
    
    @media (max-width: 768px) {
      .forgot-image {
        flex: 0 0 100%;
        min-height: 200px;
      }
      
      .forgot-form {
        flex: 0 0 100%;
        padding: 40px 30px;
      }
      
      .forgot-row {
        flex-direction: column;
      }
      
      .forgot-image-title {
        font-size: 28px;
      }
      
      .forgot-image-text {
        font-size: 16px;
      }
    }
    
    @media (max-width: 576px) {
      .forgot-form {
        padding: 30px 20px;
      }
      
      .forgot-title {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Forgot Password Section -->
  <section class="forgot-section">
    <div class="container">
      <div class="forgot-container animate__animated animate__fadeIn">
        <div class="forgot-row">
          <div class="forgot-image">
            <div class="forgot-image-overlay">
              <h2 class="forgot-image-title animate__animated animate__fadeInUp">Forgot your password?</h2>
              <p class="forgot-image-text animate__animated animate__fadeInUp animate__delay-1s">Don't worry! It happens to the best of us. We'll send you an email so you can reset your password and regain access to your account.</p>
            </div>
          </div>
          <div class="forgot-form">
            <h2 class="forgot-title animate__animated animate__fadeInDown">Password Recovery</h2>
            <p class="forgot-subtitle animate__animated animate__fadeIn">Enter your email address and we'll send you a link to reset your password.</p>
            
            <!-- Session Status -->
            @if (session('status'))
              <div class="status-message animate__animated animate__fadeIn">
                {{ session('status') }}
              </div>
            @endif
            
            <form method="POST" action="{{ route('password.email') }}" class="animate__animated animate__fadeIn animate__delay-1s">
              @csrf
              
              <!-- Email Address -->
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Digite seu email cadastrado" />
                <i class="fas fa-envelope input-icon"></i>
                @error('email')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
              
              <button type="submit" class="forgot-btn">
                <i class="fas fa-paper-plane mr-2"></i> Send Password Reset Link
              </button>
              
              <div class="login-link">
                Remembered your password? <a href="{{ route('login') }}">Back to login</a>
              </div>
            </form>
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
