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
  </style>
</head>

<body>
  <!-- Header -->
  @include('home.header')

  <!-- Register Section -->
  <section class="register-section">
    <div class="container">
      <div class="register-container animate__animated animate__fadeIn">
        <div class="register-row">
          <div class="register-image">
            <div class="register-image-overlay">
              <h2 class="register-image-title animate__animated animate__fadeInUp">Junte-se a nós!</h2>
              <p class="register-image-text animate__animated animate__fadeInUp animate__delay-1s">Crie sua conta para acessar ofertas exclusivas, acompanhar seus pedidos e muito mais.</p>
              
              <div class="register-benefits animate__animated animate__fadeInUp animate__delay-2s">
                <div class="benefit-item">
                  <i class="fas fa-tag benefit-icon"></i>
                  <span class="benefit-text">Acesso a promoções exclusivas para membros</span>
                </div>
                <div class="benefit-item">
                  <i class="fas fa-truck benefit-icon"></i>
                  <span class="benefit-text">Acompanhamento de pedidos em tempo real</span>
                </div>
                <div class="benefit-item">
                  <i class="fas fa-history benefit-icon"></i>
                  <span class="benefit-text">Histórico completo de compras</span>
                </div>
                <div class="benefit-item">
                  <i class="fas fa-heart benefit-icon"></i>
                  <span class="benefit-text">Lista de favoritos personalizada</span>
                </div>
              </div>
            </div>
          </div>
          <div class="register-form">
            <h2 class="register-title animate__animated animate__fadeInDown">Criar Conta</h2>
            
            <div class="form-steps animate__animated animate__fadeIn animate__delay-1s">
              <div class="form-step active">
                <div class="step-number">1</div>
                <div class="step-text">Informações Pessoais</div>
              </div>
              <div class="form-step">
                <div class="step-number">2</div>
                <div class="step-text">Endereço</div>
              </div>
              <div class="form-step">
                <div class="step-number">3</div>
                <div class="step-text">Confirmação</div>
              </div>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="animate__animated animate__fadeIn animate__delay-1s">
        @csrf

              <div class="form-row">
                <div class="form-col">
        <!-- Name -->
                  <div class="form-group">
                    <label for="name" class="form-label">Nome Completo</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Seu nome completo" />
                    <i class="fas fa-user input-icon"></i>
                    @error('name')
                      <div class="error-message">{{ $message }}</div>
                    @enderror
                  </div>
        </div>

                <div class="form-col">
        <!-- Email Address -->
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Seu endereço de email" />
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
                    <label for="phone" class="form-label">Telefone</label>
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
                    <label for="address" class="form-label">Endereço</label>
                    <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" required autocomplete="street-address" placeholder="Rua, número, bairro" />
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
                  <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Crie uma senha forte" />
                    <i class="fas fa-lock input-icon"></i>
                    @error('password')
                      <div class="error-message">{{ $message }}</div>
                    @enderror
                    
                    <div class="password-strength">
                      <div class="password-strength-meter medium"></div>
                    </div>
                    <div class="password-strength-text">Força da senha: Média</div>
                  </div>
        </div>

                <div class="form-col">
        <!-- Confirm Password -->
                  <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme sua senha" />
                    <i class="fas fa-lock input-icon"></i>
                    @error('password_confirmation')
                      <div class="error-message">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              
              <div class="terms-check">
                <input type="checkbox" id="terms" name="terms" class="terms-check-input" required>
                <label for="terms" class="terms-check-label">
                  Eu li e concordo com os <a href="#">Termos de Uso</a> e <a href="#">Política de Privacidade</a> da Bikes By Fazenda.
                </label>
        </div>

              <button type="submit" class="register-btn">
                <i class="fas fa-user-plus mr-2"></i> Criar Conta
              </button>
              
              <div class="login-link">
                Já tem uma conta? <a href="{{ route('login') }}">Faça login</a>
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
