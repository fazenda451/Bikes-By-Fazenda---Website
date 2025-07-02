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

  <title>Registro - Bikes By Fazenda</title>

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
    .register-section {
      padding: 80px 0;
      min-height: 70vh;
      background-color: #f8f9fa;
    }
    
    .register-container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 1000px;
      margin: 0 auto;
      transition: all 0.3s ease;
    }
    
    .register-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(153, 53, 220, 0.15);
    }
    
    .register-row {
      display: flex;
      flex-wrap: wrap;
    }
    
    .register-image {
      flex: 0 0 45%;
      background-image: url('images/motorcycle-register.jpg');
      background-size: cover;
      background-position: center;
      min-height: 700px;
      position: relative;
      transition: all 0.5s ease;
    }
    
    .register-image-overlay {
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
    
    .register-image-title {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .register-image-text {
      font-size: 18px;
      margin-bottom: 30px;
      line-height: 1.6;
    }
    
    .register-benefits {
      margin-top: 30px;
      width: 100%;
    }
    
    .benefit-item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      text-align: left;
    }
    
    .benefit-icon {
      font-size: 24px;
      margin-right: 15px;
      color: rgba(255, 255, 255, 0.9);
    }
    
    .benefit-text {
      font-size: 16px;
      color: rgba(255, 255, 255, 0.9);
    }
    
    .register-form {
      flex: 0 0 55%;
      padding: 50px;
      transition: all 0.3s ease;
    }
    
    .register-title {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      margin-bottom: 30px;
      text-align: center;
      position: relative;
      padding-bottom: 15px;
    }
    
    .register-title:after {
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
    
    .register-btn {
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
      margin-top: 15px;
    }
    
    .register-btn:hover {
      background: linear-gradient(135deg, #7b2ab0 0%, #9935dc 100%);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
    }
    
    .register-btn:active {
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
    
    .form-row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -10px;
    }
    
    .form-col {
      flex: 0 0 50%;
      padding: 0 10px;
    }
    
    .error-message {
      color: #dc3545;
      font-size: 13px;
      margin-top: 5px;
      font-weight: 500;
    }
    
    .form-steps {
      display: flex;
      justify-content: space-between;
      margin-bottom: 30px;
    }
    
    .form-step {
      flex: 1;
      text-align: center;
      position: relative;
    }
    
    .step-number {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: #e1e1e1;
      color: #777;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 10px;
      font-weight: 600;
      transition: all 0.3s;
    }
    
    .step-text {
      font-size: 14px;
      color: #777;
      transition: all 0.3s;
    }
    
    .form-step.active .step-number {
      background-color: #9935dc;
      color: white;
    }
    
    .form-step.active .step-text {
      color: #9935dc;
      font-weight: 600;
    }
    
    .form-step.completed .step-number {
      background-color: #28a745;
      color: white;
    }
    
    .form-step:not(:last-child):after {
      content: '';
      position: absolute;
      top: 15px;
      right: -50%;
      width: 100%;
      height: 2px;
      background-color: #e1e1e1;
      z-index: 0;
    }
    
    .form-step.active:not(:last-child):after,
    .form-step.completed:not(:last-child):after {
      background-color: #9935dc;
    }
    
    .password-strength {
      margin-top: 10px;
      height: 5px;
      border-radius: 3px;
      background-color: #e1e1e1;
      overflow: hidden;
    }
    
    .password-strength-meter {
      height: 100%;
      width: 0;
      transition: all 0.3s;
    }
    
    .password-strength-text {
      font-size: 12px;
      margin-top: 5px;
      text-align: right;
    }
    
    .weak {
      width: 25%;
      background-color: #dc3545;
    }
    
    .medium {
      width: 50%;
      background-color: #ffc107;
    }
    
    .strong {
      width: 75%;
      background-color: #17a2b8;
    }
    
    .very-strong {
      width: 100%;
      background-color: #28a745;
    }
    
    .terms-check {
      display: flex;
      align-items: flex-start;
      margin-top: 20px;
    }
    
    .terms-check-input {
      margin-right: 10px;
      margin-top: 3px;
    }
    
    .terms-check-label {
      font-size: 14px;
      color: #555;
      line-height: 1.5;
    }
    
    .terms-check-label a {
      color: #9935dc;
      text-decoration: none;
      font-weight: 600;
    }
    
    .terms-check-label a:hover {
      text-decoration: underline;
    }
    
    /* Password toggle button styles */
    .input-group {
      position: relative;
    }
    
    .input-group-text {
      background-color: #f8f9fa;
      border: 2px solid #e1e1e1;
      border-right: none;
      color: #9935dc;
      font-size: 16px;
      padding: 12px 15px;
      border-radius: 8px 0 0 8px;
    }
    
    .input-group .form-control {
      border-left: none;
      border-radius: 0 8px 8px 0;
    }
    
    .input-group .form-control:focus {
      border-left: none;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
    }
    
    .toggle-password {
      position: absolute;
      right: 0;
      top: 0;
      height: 100%;
      border: 2px solid #e1e1e1;
      border-left: none;
      background-color: #f8f9fa;
      color: #9935dc;
      border-radius: 0 8px 8px 0;
      padding: 0 15px;
      transition: all 0.3s ease;
      z-index: 10;
    }
    
    .toggle-password:hover {
      background-color: #9935dc;
      color: white;
      border-color: #9935dc;
    }
    
    .toggle-password:focus {
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
    }
    
    /* Password strength bar styles */
    .password-strength-bar {
      height: 5px;
      background-color: #e1e1e1;
      border-radius: 3px;
      overflow: hidden;
      margin-top: 8px;
    }
    
    .strength-meter {
      height: 100%;
      width: 0;
      transition: all 0.3s ease;
      border-radius: 3px;
    }
    
    @media (max-width: 991px) {
      .register-container {
        max-width: 90%;
      }
    }
    
    @media (max-width: 768px) {
      .register-image {
        flex: 0 0 100%;
        min-height: 300px;
      }
      
      .register-form {
        flex: 0 0 100%;
        padding: 40px 30px;
      }
      
      .register-row {
        flex-direction: column;
      }
      
      .register-image-title {
        font-size: 28px;
      }
      
      .register-image-text {
        font-size: 16px;
      }
      
      .form-col {
        flex: 0 0 100%;
      }
    }
    
    @media (max-width: 576px) {
      .register-form {
        padding: 30px 20px;
      }
      
      .register-title {
        font-size: 24px;
      }
      
      .form-steps {
        flex-wrap: wrap;
      }
      
      .form-step {
        flex: 0 0 50%;
        margin-bottom: 20px;
      }
      
      .form-step:not(:last-child):after {
        display: none;
      }
    }
    
    /* Tooltip styles */
    .tooltip-container {
      position: relative;
      display: inline-block;
    }
    
    .tooltip-icon {
      color: #9935dc;
      margin-left: 8px;
      cursor: help;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    
    .tooltip-icon:hover {
      color: #7b2ab0;
      transform: scale(1.1);
    }
    
    .tooltip-text {
      visibility: hidden;
      width: 250px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 8px 12px;
      position: absolute;
      z-index: 1000;
      bottom: 125%;
      left: 50%;
      margin-left: -125px;
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 13px;
      line-height: 1.4;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .tooltip-text::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #333 transparent transparent transparent;
    }
    
    .tooltip-container:hover .tooltip-text {
      visibility: visible;
      opacity: 1;
    }
    
    /* Mobile tooltip behavior */
    @media (max-width: 768px) {
      .tooltip-container:hover .tooltip-text {
        visibility: hidden;
        opacity: 0;
      }
      
      .tooltip-text.show {
        visibility: visible !important;
        opacity: 1 !important;
      }
      
      .tooltip-icon {
        font-size: 16px;
        padding: 8px;
        background-color: #f8f9fa;
        border-radius: 50%;
        border: 1px solid #e1e1e1;
      }
      
      .tooltip-icon:active {
        background-color: #9935dc;
        color: white;
      }
    }
    
    /* Form label with tooltip */
    .form-label-with-tooltip {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    
    .label-text {
      flex: 1;
    }
    
    .tooltip-wrapper {
      flex-shrink: 0;
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Register Section -->
  <!-- Register Section -->
<section class="register-section">
  <div class="container">
    <div class="register-container animate__animated animate__fadeIn">
      <div class="register-row">
        <div class="register-image">
          <div class="register-image-overlay">
            <h2 class="register-image-title animate__animated animate__fadeInUp">Join Us!</h2>
            <p class="register-image-text animate__animated animate__fadeInUp animate__delay-1s">Create your account to access exclusive offers, track your orders, and much more.</p>
            
            <div class="register-benefits animate__animated animate__fadeInUp animate__delay-2s">
              <div class="benefit-item">
                <i class="fas fa-tag benefit-icon"></i>
                <span class="benefit-text">Access to exclusive member promotions</span>
              </div>
              <div class="benefit-item">
                <i class="fas fa-truck benefit-icon"></i>
                <span class="benefit-text">Real-time order tracking</span>
              </div>
              <div class="benefit-item">
                <i class="fas fa-history benefit-icon"></i>
                <span class="benefit-text">Complete purchase history</span>
              </div>
              <div class="benefit-item">
                <i class="fas fa-heart benefit-icon"></i>
                <span class="benefit-text">Personalized favorites list</span>
              </div>
            </div>
          </div>
        </div>
        <div class="register-form">
          <h2 class="register-title animate__animated animate__fadeInDown">Create Account</h2>
          
          <div class="form-steps animate__animated animate__fadeIn animate__delay-1s">
            <div class="form-step active">
              <div class="step-number">1</div>
              <div class="step-text">Personal Information</div>
            </div>
            <div class="form-step">
              <div class="step-number">2</div>
              <div class="step-text">Address</div>
            </div>
            <div class="form-step">
              <div class="step-number">3</div>
              <div class="step-text">Confirmation</div>
            </div>
          </div>
          
          <form method="POST" action="{{ route('register') }}" class="animate__animated animate__fadeIn animate__delay-1s">
      @csrf

            <div class="form-row">
              <div class="form-col">
      <!-- Name -->
                <div class="form-group">
                  <div class="form-label-with-tooltip">
                    <span class="label-text">Full Name</span>
                    <div class="tooltip-wrapper">
                      <div class="tooltip-container">
                        <i class="fas fa-question-circle tooltip-icon"></i>
                        <span class="tooltip-text">Enter your complete name as it appears on official documents. Only letters and spaces are allowed.</span>
                      </div>
                    </div>
                  </div>
                  <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your full name" />
                  <i class="fas fa-user input-icon"></i>
                  @error('name')
                    <div class="error-message">{{ $message }}</div>
                  @enderror
                </div>
      </div>

              <div class="form-col">
      <!-- Email Address -->
                <div class="form-group">
                  <div class="form-label-with-tooltip">
                    <span class="label-text">Email</span>
                    <div class="tooltip-wrapper">
                      <div class="tooltip-container">
                        <i class="fas fa-question-circle tooltip-icon"></i>
                        <span class="tooltip-text">Enter a valid email address. This will be used for account verification and communications.</span>
                      </div>
                    </div>
                  </div>
                  <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Your email address" />
                  <i class="fas fa-envelope input-icon"></i>
                  @error('email')
                    <div class="error-message">{{ $message }}</div>
                  @enderror
                </div>
              </div>
      </div>

            <div class="form-row">
              <div class="form-col">
      <!-- Phone -->
                <div class="form-group">
                  <div class="form-label-with-tooltip">
                    <span class="label-text">Phone</span>
                    <div class="tooltip-wrapper">
                      <div class="tooltip-container">
                        <i class="fas fa-question-circle tooltip-icon"></i>
                        <span class="tooltip-text">Enter your phone number with area code. Format: (00) 00000-0000. Only numbers, spaces, parentheses and hyphens allowed.</span>
                      </div>
                    </div>
                  </div>
                  <input id="phone" class="form-control" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="tel" placeholder="(00) 00000-0000" />
                  <i class="fas fa-phone input-icon"></i>
                  @error('phone')
                    <div class="error-message">{{ $message }}</div>
                  @enderror
                </div>
      </div>

              <div class="form-col">
                <!-- Address -->
                <div class="form-group">
                  <div class="form-label-with-tooltip">
                    <span class="label-text">Address</span>
                    <div class="tooltip-wrapper">
                      <div class="tooltip-container">
                        <i class="fas fa-question-circle tooltip-icon"></i>
                        <span class="tooltip-text">Enter your complete address including street, number, and neighborhood. This will be used for delivery purposes.</span>
                      </div>
                    </div>
                  </div>
                  <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" required autocomplete="street-address" placeholder="Street, number, neighborhood" />
                  <i class="fas fa-map-marker-alt input-icon"></i>
                  @error('address')
                    <div class="error-message">{{ $message }}</div>
                  @enderror
                </div>
              </div>
      </div>

            <div class="form-row">
              <div class="form-col">
      <!-- Password -->
                <div class="mb-3">
                  <div class="form-label-with-tooltip">
                    <span class="label-text">Password</span>
                    <div class="tooltip-wrapper">
                      <div class="tooltip-container">
                        <i class="fas fa-question-circle tooltip-icon"></i>
                        <span class="tooltip-text">Create a strong password with at least 8 characters, including uppercase, lowercase, numbers and special characters.</span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Create a strong password" />
                    <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  
                  <div class="password-strength mt-2">
                    <div class="password-strength-bar">
                      <div class="strength-meter" id="strength-meter"></div>
                    </div>
                    <div class="password-strength-text">Password strength: Medium</div>
                  </div>
                </div>
      </div>

              <div class="form-col">
      <!-- Confirm Password -->
                <div class="mb-4">
                  <div class="form-label-with-tooltip">
                    <span class="label-text">Confirm Password</span>
                    <div class="tooltip-wrapper">
                      <div class="tooltip-container">
                        <i class="fas fa-question-circle tooltip-icon"></i>
                        <span class="tooltip-text">Re-enter your password exactly as you typed it above to confirm and avoid typos.</span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                    <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="terms-check">
              <div style="display: flex; align-items: flex-start;">
                <input type="checkbox" id="terms" name="terms" class="terms-check-input" required>
                <div style="flex: 1; display: flex; align-items: flex-start;">
                  <label for="terms" class="terms-check-label">
                    I have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> of Bikes By Fazenda.
                  </label>
                  <div class="tooltip-container" style="margin-left: 8px; margin-top: 2px;">
                    <i class="fas fa-question-circle tooltip-icon"></i>
                    <span class="tooltip-text">You must accept our terms and conditions to create an account. Please read them carefully before proceeding.</span>
                  </div>
                </div>
              </div>
      </div>

            <button type="submit" class="register-btn">
              <i class="fas fa-user-plus mr-2"></i> Create Account
            </button>
            
            <div class="login-link">
              Already have an account? <a href="{{ route('login') }}">Log in</a>
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
  
  <script>
    $(document).ready(function() {
      // Password toggle functionality
      $('.toggle-password').on('click', function() {
        const button = $(this);
        const input = button.closest('.input-group').find('input');
        const icon = button.find('i');
        
        if (input.attr('type') === 'password') {
          input.attr('type', 'text');
          icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          input.attr('type', 'password');
          icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });

      // Tooltip functionality for mobile devices
      $('.tooltip-icon').on('click touchstart', function(e) {
        e.preventDefault();
        const tooltip = $(this).siblings('.tooltip-text');
        
        // Hide all other tooltips
        $('.tooltip-text').not(tooltip).removeClass('show');
        
        // Toggle current tooltip
        tooltip.toggleClass('show');
        
        // Auto-hide after 5 seconds
        setTimeout(function() {
          tooltip.removeClass('show');
        }, 5000);
      });

      // Hide tooltips when clicking outside
      $(document).on('click', function(e) {
        if (!$(e.target).closest('.tooltip-container').length) {
          $('.tooltip-text').removeClass('show');
        }
      });

      // Password strength simulation
      const passwordInput = document.getElementById('password');
      const strengthMeter = document.getElementById('strength-meter');
      const strengthText = document.querySelector('.password-strength-text');
      
      passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        let width = '0%';
        let color = '#dc3545';
        let strengthTextValue = '';
        
        if (password.length > 0) {
          // Length check
          if (password.length >= 8) strength += 1;
          if (password.length >= 12) strength += 1;
          
          // Complexity checks
          if (/[A-Z]/.test(password)) strength += 1;
          if (/[0-9]/.test(password)) strength += 1;
          if (/[^A-Za-z0-9]/.test(password)) strength += 1;
          
          // Set width and color based on strength
          if (strength === 1) {
            width = '20%';
            color = '#dc3545';
            strengthTextValue = 'Password strength: Very weak';
          } 
          else if (strength === 2) {
            width = '40%';
            color = '#ffc107';
            strengthTextValue = 'Password strength: Weak';
          }
          else if (strength === 3) {
            width = '60%';
            color = '#fd7e14';
            strengthTextValue = 'Password strength: Medium';
          }
          else if (strength === 4) {
            width = '80%';
            color = '#20c997';
            strengthTextValue = 'Password strength: Strong';
          }
          else if (strength >= 5) {
            width = '100%';
            color = '#198754';
            strengthTextValue = 'Password strength: Very strong';
          }
        }
        
        strengthMeter.style.width = width;
        strengthMeter.style.backgroundColor = color;
        strengthText.textContent = strengthTextValue;
      });
    });
  </script>
</body>
</html>
