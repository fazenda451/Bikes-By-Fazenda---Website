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

  <title>Redefinir Senha - Bikes By Fazenda</title>

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
    .reset-section {
      padding: 80px 0;
      min-height: 70vh;
      display: flex;
      align-items: center;
      background-color: #f8f9fa;
    }
    
    .reset-container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 900px;
      margin: 0 auto;
      transition: all 0.3s ease;
    }
    
    .reset-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(153, 53, 220, 0.15);
    }
    
    .reset-row {
      display: flex;
      flex-wrap: wrap;
    }
    
    .reset-image {
      flex: 0 0 45%;
      background-image: url('images/motorcycle-reset.jpg');
      background-size: cover;
      background-position: center;
      min-height: 500px;
      position: relative;
      transition: all 0.5s ease;
    }
    
    .reset-image-overlay {
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
    
    .reset-image-title {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .reset-image-text {
      font-size: 18px;
      margin-bottom: 30px;
      line-height: 1.6;
    }
    
    .reset-form {
      flex: 0 0 55%;
      padding: 50px;
      transition: all 0.3s ease;
    }
    
    .reset-title {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      margin-bottom: 30px;
      text-align: center;
      position: relative;
      padding-bottom: 15px;
    }
    
    .reset-title:after {
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
    
    .reset-btn {
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
    
    .reset-btn:hover {
      background: linear-gradient(135deg, #7b2ab0 0%, #9935dc 100%);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
    }
    
    .reset-btn:active {
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
    
    .error-message {
      color: #dc3545;
      font-size: 13px;
      margin-top: 5px;
      font-weight: 500;
    }
    
    @media (max-width: 991px) {
      .reset-container {
        max-width: 90%;
      }
    }
    
    @media (max-width: 768px) {
      .reset-image {
        flex: 0 0 100%;
        min-height: 200px;
      }
      
      .reset-form {
        flex: 0 0 100%;
        padding: 40px 30px;
      }
      
      .reset-row {
        flex-direction: column;
      }
      
      .reset-image-title {
        font-size: 28px;
      }
      
      .reset-image-text {
        font-size: 16px;
      }
    }
    
    @media (max-width: 576px) {
      .reset-form {
        padding: 30px 20px;
      }
      
      .reset-title {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Reset Password Section -->
  <section class="reset-section">
    <div class="container">
      <div class="reset-container animate__animated animate__fadeIn">
        <div class="reset-row">
          <div class="reset-image">
            <div class="reset-image-overlay">
              <h2 class="reset-image-title animate__animated animate__fadeInUp">Redefinir Senha</h2>
              <p class="reset-image-text animate__animated animate__fadeInUp animate__delay-1s">Crie uma nova senha segura para sua conta. Recomendamos usar uma combinação de letras, números e caracteres especiais.</p>
            </div>
          </div>
          <div class="reset-form">
            <h2 class="reset-title animate__animated animate__fadeInDown">Nova Senha</h2>
            
            <form method="POST" action="{{ route('password.store') }}" class="animate__animated animate__fadeIn animate__delay-1s">
              @csrf
              
              <!-- Password Reset Token -->
              <input type="hidden" name="token" value="{{ $request->route('token') }}">
              
              <!-- Email Address -->
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" readonly />
                <i class="fas fa-envelope input-icon"></i>
                @error('email')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
              
              <!-- Password -->
              <div class="form-group">
                <label for="password" class="form-label">Nova Senha</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Digite sua nova senha" />
                <i class="fas fa-lock input-icon"></i>
                @error('password')
                  <div class="error-message">{{ $message }}</div>
                @enderror
                
                <div class="password-strength">
                  <div class="password-strength-meter medium"></div>
                </div>
                <div class="password-strength-text">Força da senha: Média</div>
              </div>
              
              <!-- Confirm Password -->
              <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme sua nova senha" />
                <i class="fas fa-lock input-icon"></i>
                @error('password_confirmation')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
              
              <button type="submit" class="reset-btn">
                <i class="fas fa-key mr-2"></i> Redefinir Senha
              </button>
              
              <div class="login-link">
                Lembrou sua senha? <a href="{{ route('login') }}">Voltar para o login</a>
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
      // Simulação de força de senha
      $('#password').on('input', function() {
        var password = $(this).val();
        var strength = 0;
        
        if (password.length > 0) {
          // Comprimento
          if (password.length >= 8) strength += 1;
          
          // Letras maiúsculas e minúsculas
          if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
          
          // Números
          if (/[0-9]/.test(password)) strength += 1;
          
          // Caracteres especiais
          if (/[^a-zA-Z0-9]/.test(password)) strength += 1;
        }
        
        var meterClass = '';
        var strengthText = '';
        
        switch(strength) {
          case 0:
            meterClass = '';
            strengthText = 'Força da senha: Muito fraca';
            break;
          case 1:
            meterClass = 'weak';
            strengthText = 'Força da senha: Fraca';
            break;
          case 2:
            meterClass = 'medium';
            strengthText = 'Força da senha: Média';
            break;
          case 3:
            meterClass = 'strong';
            strengthText = 'Força da senha: Forte';
            break;
          case 4:
            meterClass = 'very-strong';
            strengthText = 'Força da senha: Muito forte';
            break;
        }
        
        $('.password-strength-meter').removeClass('weak medium strong very-strong').addClass(meterClass);
        $('.password-strength-text').text(strengthText);
      });
    });
  </script>
</body>
</html>
