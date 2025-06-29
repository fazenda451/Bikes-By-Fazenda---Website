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

  <title>Confirm Password - Bikes By Fazenda</title>

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
    .confirm-section {
      padding: 80px 0;
      min-height: 70vh;
      display: flex;
      align-items: center;
      background-color: #f8f9fa;
    }
    
    .confirm-container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 900px;
      margin: 0 auto;
      transition: all 0.3s ease;
    }
    
    .confirm-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(153, 53, 220, 0.15);
    }
    
    .confirm-row {
      display: flex;
      flex-wrap: wrap;
    }
    
    .confirm-image {
      flex: 0 0 45%;
      background-image: url('images/motorcycle-secure.jpg');
      background-size: cover;
      background-position: center;
      min-height: 500px;
      position: relative;
      transition: all 0.5s ease;
    }
    
    .confirm-image-overlay {
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
    
    .confirm-image-title {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .confirm-image-text {
      font-size: 18px;
      margin-bottom: 30px;
      line-height: 1.6;
    }
    
    .confirm-form {
      flex: 0 0 55%;
      padding: 50px;
      transition: all 0.3s ease;
    }
    
    .confirm-title {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
      text-align: center;
      position: relative;
      padding-bottom: 15px;
    }
    
    .confirm-title:after {
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
    
    .confirm-subtitle {
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
    
    .confirm-btn {
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
    
    .confirm-btn:hover {
      background: linear-gradient(135deg, #7b2ab0 0%, #9935dc 100%);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
    }
    
    .confirm-btn:active {
      transform: translateY(0);
    }
    
    .security-icon {
      font-size: 24px;
      color: #9935dc;
      margin-right: 10px;
      vertical-align: middle;
    }
    
    .error-message {
      color: #dc3545;
      font-size: 13px;
      margin-top: 5px;
      font-weight: 500;
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
    
    @media (max-width: 991px) {
      .confirm-container {
        max-width: 90%;
      }
    }
    
    @media (max-width: 768px) {
      .confirm-image {
        flex: 0 0 100%;
        min-height: 200px;
      }
      
      .confirm-form {
        flex: 0 0 100%;
        padding: 40px 30px;
      }
      
      .confirm-row {
        flex-direction: column;
      }
      
      .confirm-image-title {
        font-size: 28px;
      }
      
      .confirm-image-text {
        font-size: 16px;
      }
    }
    
    @media (max-width: 576px) {
      .confirm-form {
        padding: 30px 20px;
      }
      
      .confirm-title {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Confirm Password Section -->
  <section class="confirm-section">
    <div class="container">
      <div class="confirm-container animate__animated animate__fadeIn">
        <div class="confirm-row">
          <div class="confirm-image">
            <div class="confirm-image-overlay">
              <h2 class="confirm-image-title animate__animated animate__fadeInUp">Security Check</h2>
              <p class="confirm-description animate__animated animate__fadeInUp animate__delay-1s">This is a secure area of the application. Please confirm your password before continuing to ensure the protection of your data.</p>
            </div>
          </div>
          <div class="confirm-form">
            <h2 class="confirm-title animate__animated animate__fadeInDown">
              <i class="fas fa-shield-alt security-icon"></i>Confirm Password
            </h2>
            <p class="confirm-subtitle animate__animated animate__fadeInDown animate__delay-1s">
              For your security, please confirm your password before proceeding.
            </p>
            
            <form method="POST" action="{{ route('password.confirm') }}" class="animate__animated animate__fadeIn animate__delay-1s">
              @csrf
              
              <!-- Password -->
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Enter your current password" />
                  <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
                @error('password')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
              
              <button type="submit" class="confirm-btn">
                <i class="fas fa-check-circle mr-2"></i> Confirm
              </button>
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
    });
  </script>
</body>
</html>
