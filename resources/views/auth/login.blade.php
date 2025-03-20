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

  <title>Login - Bikes By Fazenda</title>

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
    .login-section {
      padding: 80px 0;
      min-height: 70vh;
      display: flex;
      align-items: center;
      background-color: #f8f9fa;
    }
    
    .login-container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 1000px;
      margin: 0 auto;
      transition: all 0.3s ease;
    }
    
    .login-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(153, 53, 220, 0.15);
    }
    
    .login-row {
      display: flex;
      flex-wrap: wrap;
    }
    
    .login-image {
      flex: 0 0 45%;
      background-image: url('images/motorcycle-login.jpg');
      background-size: cover;
      background-position: center;
      min-height: 500px;
      position: relative;
      transition: all 0.5s ease;
    }
    
    .login-image-overlay {
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
    
    .login-image-title {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .login-image-text {
      font-size: 18px;
      margin-bottom: 30px;
      line-height: 1.6;
    }
    
    .login-form {
      flex: 0 0 55%;
      padding: 50px;
      transition: all 0.3s ease;
    }
    
    .login-title {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      margin-bottom: 30px;
      text-align: center;
      position: relative;
      padding-bottom: 15px;
    }
    
    .login-title:after {
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
    
    .form-check {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
    }
    
    .form-check-input {
      margin-right: 10px;
      width: 18px;
      height: 18px;
      cursor: pointer;
    }
    
    .form-check-label {
      font-size: 15px;
      color: #555;
      cursor: pointer;
    }
    
    .login-btn {
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
    }
    
    .login-btn:hover {
      background: linear-gradient(135deg, #7b2ab0 0%, #9935dc 100%);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
    }
    
    .login-btn:active {
      transform: translateY(0);
    }
    
    .forgot-password {
      display: block;
      text-align: right;
      font-size: 15px;
      color: #9935dc;
      margin-bottom: 25px;
      text-decoration: none;
      transition: all 0.3s;
    }
    
    .forgot-password:hover {
      color: #7b2ab0;
      text-decoration: underline;
    }
    
    .register-link {
      text-align: center;
      margin-top: 30px;
      font-size: 15px;
      color: #555;
    }
    
    .register-link a {
      color: #9935dc;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
    }
    
    .register-link a:hover {
      color: #7b2ab0;
      text-decoration: underline;
    }
    
    .social-login {
      margin-top: 30px;
      text-align: center;
    }
    
    .social-login-title {
      position: relative;
      margin-bottom: 20px;
      font-size: 15px;
      color: #777;
    }
    
    .social-login-title:before,
    .social-login-title:after {
      content: "";
      position: absolute;
      top: 50%;
      width: 30%;
      height: 1px;
      background-color: #e1e1e1;
    }
    
    .social-login-title:before {
      left: 0;
    }
    
    .social-login-title:after {
      right: 0;
    }
    
    .social-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
    }
    
    .social-button {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #f5f5f5;
      color: #555;
      font-size: 20px;
      transition: all 0.3s;
      border: 1px solid #e1e1e1;
    }
    
    .social-button:hover {
      transform: translateY(-3px);
    }
    
    .social-button.facebook:hover {
      background-color: #3b5998;
      color: white;
    }
    
    .social-button.google:hover {
      background-color: #db4437;
      color: white;
    }
    
    .social-button.twitter:hover {
      background-color: #1da1f2;
      color: white;
    }
    
    .alert-success {
      background-color: rgba(40, 167, 69, 0.1);
      border-color: rgba(40, 167, 69, 0.2);
      color: #28a745;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 25px;
      font-size: 15px;
    }
    
    .error-message {
      color: #dc3545;
      font-size: 13px;
      margin-top: 5px;
      font-weight: 500;
    }
    
    @media (max-width: 991px) {
      .login-container {
        max-width: 90%;
      }
    }
    
    @media (max-width: 768px) {
      .login-image {
        flex: 0 0 100%;
        min-height: 200px;
      }
      
      .login-form {
        flex: 0 0 100%;
        padding: 40px 30px;
      }
      
      .login-row {
        flex-direction: column;
      }
      
      .login-image-title {
        font-size: 28px;
      }
      
      .login-image-text {
        font-size: 16px;
      }
    }
    
    @media (max-width: 576px) {
      .login-form {
        padding: 30px 20px;
      }
      
      .login-title {
        font-size: 24px;
      }
      
      .social-login-title:before,
      .social-login-title:after {
        width: 25%;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Login Section -->
  <section class="login-section">
    <div class="container">
      <div class="login-container animate__animated animate__fadeIn">
        <div class="login-row">
          <div class="login-image">
            <div class="login-image-overlay">
              <h2 class="login-image-title animate__animated animate__fadeInUp">Welcome back!</h2>
              <p class="login-image-text animate__animated animate__fadeInUp animate__delay-1s">Log into your account to access your purchases, favorites, and enjoy exclusive member offers.</p>
            </div>
          </div>
          <div class="login-form">
            <h2 class="login-title animate__animated animate__fadeInDown">Sign In</h2>
            
    <!-- Session Status -->
            @if (session('status'))
              <div class="alert-success animate__animated animate__fadeIn">
                {{ session('status') }}
              </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}" class="animate__animated animate__fadeIn animate__delay-1s">
        @csrf

        <!-- Email Address -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your email address" />
                </div>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

        <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your password" />
                  <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

        <!-- Remember Me -->
              <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember_me">Remember me</label>
              </div>

        @if (Route::has('password.request'))
            <div class="mb-4 text-center">
              <a class="forgot-password-link" href="{{ route('password.request') }}">
                Forgot your password?
              </a>
            </div>
        @endif

              <div class="d-grid">
                <button type="submit" class="btn btn-primary login-btn">
                  <i class="fas fa-sign-in-alt mr-2"></i> Login
                </button>
              </div>
              
              <div class="social-login">
                <div class="social-login-title">Ou entre com</div>
                <div class="social-buttons">
                  <a href="{{ route('auth.google') }}" class="social-button google">
                    <i class="fab fa-google"></i>
                  </a>
                </div>
              </div>
              
              <div class="register-link">
                Don't have an account? <a href="{{ route('register') }}">Register now</a>
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
