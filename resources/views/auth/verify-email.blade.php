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

  <title>Verificação de Email - Bikes By Fazenda</title>

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
    .verify-section {
      padding: 80px 0;
      min-height: 70vh;
      display: flex;
      align-items: center;
      background-color: #f8f9fa;
    }
    
    .verify-container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 800px;
      margin: 0 auto;
      transition: all 0.3s ease;
    }
    
    .verify-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(153, 53, 220, 0.15);
    }
    
    .verify-content {
      padding: 50px;
      text-align: center;
    }
    
    .verify-icon {
      font-size: 80px;
      color: #9935dc;
      margin-bottom: 30px;
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% {
        transform: scale(1);
        opacity: 1;
      }
      50% {
        transform: scale(1.1);
        opacity: 0.8;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }
    
    .verify-title {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 15px;
      display: inline-block;
    }
    
    .verify-title:after {
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
    
    .verify-description {
      font-size: 16px;
      color: #666;
      margin-bottom: 30px;
      line-height: 1.6;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }
    
    .alert-success {
      background-color: rgba(40, 167, 69, 0.1);
      border-color: rgba(40, 167, 69, 0.2);
      color: #28a745;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 25px;
      font-size: 15px;
      text-align: left;
    }
    
    .buttons-container {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
      flex-wrap: wrap;
    }
    
    .primary-btn {
      background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
      color: white;
      padding: 14px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: none;
      box-shadow: 0 4px 15px rgba(153, 53, 220, 0.3);
      display: inline-flex;
      align-items: center;
      cursor: pointer;
    }
    
    .primary-btn:hover {
      background: linear-gradient(135deg, #7b2ab0 0%, #9935dc 100%);
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
    }
    
    .secondary-btn {
      background-color: transparent;
      color: #666;
      padding: 14px 30px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: 1px solid #ddd;
      display: inline-flex;
      align-items: center;
      cursor: pointer;
    }
    
    .secondary-btn:hover {
      background-color: #f5f5f5;
      color: #333;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .btn-icon {
      margin-right: 10px;
      font-size: 16px;
    }
    
    .email-info {
      background-color: rgba(153, 53, 220, 0.1);
      border-radius: 10px;
      padding: 20px;
      margin: 30px auto;
      max-width: 600px;
      border-left: 4px solid #9935dc;
      text-align: left;
    }
    
    .email-info h3 {
      font-size: 18px;
      color: #333;
      margin-bottom: 10px;
      font-weight: 600;
    }
    
    .email-info p {
      font-size: 15px;
      color: #666;
      margin-bottom: 15px;
      line-height: 1.6;
    }
    
    .email-info ul {
      padding-left: 20px;
      margin-bottom: 0;
    }
    
    .email-info li {
      font-size: 14px;
      color: #666;
      margin-bottom: 8px;
    }
    
    @media (max-width: 768px) {
      .verify-content {
        padding: 40px 30px;
      }
      
      .verify-icon {
        font-size: 60px;
      }
      
      .verify-title {
        font-size: 24px;
      }
      
      .buttons-container {
        flex-direction: column;
        gap: 15px;
      }
      
      .primary-btn, .secondary-btn {
        width: 100%;
        justify-content: center;
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
      <div class="verify-container animate__animated animate__fadeIn">
        <div class="verify-content">
          <i class="fas fa-envelope-open-text verify-icon animate__animated animate__bounceIn"></i>
          <h2 class="verify-title animate__animated animate__fadeInDown">Verifique seu Email</h2>
          
          <p class="verify-description animate__animated animate__fadeIn animate__delay-1s">
            Obrigado por se cadastrar! Antes de começar, você poderia verificar seu endereço de email clicando no link que acabamos de enviar para você? Se você não recebeu o email, teremos prazer em enviar outro.
          </p>
          
          @if (session('status') == 'verification-link-sent')
            <div class="alert-success animate__animated animate__fadeIn">
              <i class="fas fa-check-circle mr-2"></i> Um novo link de verificação foi enviado para o endereço de email fornecido durante o registro.
            </div>
          @endif
          
          <div class="email-info animate__animated animate__fadeIn animate__delay-1s">
            <h3><i class="fas fa-info-circle mr-2"></i> Não recebeu o email?</h3>
            <p>Se você não encontrar o email em sua caixa de entrada, verifique:</p>
            <ul>
              <li>Sua pasta de spam ou lixo eletrônico</li>
              <li>Se você digitou o endereço de email corretamente</li>
              <li>As configurações de filtro do seu provedor de email</li>
            </ul>
          </div>
          
          <div class="buttons-container">
            <form method="POST" action="{{ route('verification.send') }}">
              @csrf
              <button type="submit" class="primary-btn">
                <i class="fas fa-paper-plane btn-icon"></i> Reenviar Email de Verificação
              </button>
            </form>
            
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="secondary-btn">
                <i class="fas fa-sign-out-alt btn-icon"></i> Sair
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
</body>
</html>
