<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Bikes By Fazenda - Pagamento</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Stripe JS v3 -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- Custom styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <style>
        :root {
            --primary-color: #9935dc;
            --secondary-color: #8024c0;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .payment-section {
            padding: 80px 0;
        }
        
        .payment-container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
        }
        
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 1.2rem;
        }
        
        .card-title {
            margin-bottom: 0;
            font-weight: 600;
        }
        
        .amount {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-color);
            text-align: center;
            margin: 1.5rem 0;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-label {
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            background-color: #fff;
            border: 1px solid #ced4da;
            color: #333;
            border-radius: 5px;
            padding: 0.8rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
        }
        
        .btn-pay {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 0.8rem;
            font-weight: 600;
            border-radius: 5px;
            margin-top: 1rem;
            transition: all 0.3s;
        }
        
        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(138, 43, 226, 0.4);
            color: white;
        }
        
        .btn-pay:active {
            transform: translateY(0);
        }
        
        .btn-back {
            color: #555;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-bottom: 1rem;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .btn-back:hover {
            color: var(--primary-color);
        }
        
        .btn-back i {
            margin-right: 0.5rem;
        }
        
        .error-message {
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.2);
            color: #dc3545;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: none;
        }
        
        .has-error .form-control {
            border-color: #dc3545;
        }
        
        .payment-info {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            color: #555;
            font-size: 0.9rem;
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-radius: 5px;
        }
        
        .payment-info i {
            color: var(--primary-color);
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }
        
        .card-element {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 0.8rem;
            color: #333;
        }

        /* Estilos para os elementos do Stripe */
        .StripeElement {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        .StripeElement--focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
        }

        .StripeElement--invalid {
            border-color: #dc3545;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
        
        .payment-trust-badges {
            text-align: center;
            margin-top: 20px;
        }
        
        .payment-trust-badges i {
            font-size: 2rem;
            margin: 0 5px;
            color: #6c757d;
        }
        
        .order-summary {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .order-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
            display: flex;
            align-items: center;
        }
        
        .order-title i {
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        .divider {
            height: 1px;
            background-color: #dee2e6;
            margin: 10px 0;
        }
        
        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: #555;
        }
        
        .order-total {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 1.1rem;
            color: #333;
            margin-top: 10px;
        }
        
        /* Estilo para o loading */
        .loading-overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(255, 255, 255, 0.7);
          display: flex;
          justify-content: center;
          align-items: center;
          z-index: 9999;
          opacity: 0;
          visibility: hidden;
          transition: opacity 0.3s, visibility 0.3s;
        }
        
        .loading-overlay.active {
          opacity: 1;
          visibility: visible;
        }
        
        .loading-image {
          width: 600px;
          height: 600px;
          object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading..." class="loading-image">
    </div>
  
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <section class="payment-section">
        <div class="container">
            <div class="payment-container">
                <a href="{{ url('mycart') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Voltar para o carrinho
                </a>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Finalizar Pagamento</h3>
                    </div>
    
                    <div class="order-summary mx-4 mt-4">
                        <div class="order-title">
                            <i class="fas fa-receipt"></i> Resumo do Pedido
                        </div>
                        <div class="divider"></div>
                        <div class="order-item">
                            <span>Subtotal:</span>
                            <span>€{{ number_format($value - ($value * 0.23), 2, ',', '.') }}</span>
                        </div>
                        <div class="order-item">
                            <span>IVA (23%):</span>
                            <span>€{{ number_format($value * 0.23, 2, ',', '.') }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="order-total">
                            <span>Total:</span>
                            <span>€{{ number_format($value, 2, ',', '.') }}</span>
                        </div>
                    </div>
    
                    <div class="card-body">
                        <div class="payment-info">
                            <i class="fas fa-lock"></i>
                            <span>Este é um pagamento seguro. Seus dados estão protegidos.</span>
                        </div>
    
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <span id="error-text">Por favor, corrija os erros e tente novamente.</span>
                        </div>
    
                        <form id="payment-form" action="{{ route('stripe.post', $value) }}" method="post">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Nome no Cartão</label>
                                <input id="cardholder-name" class="form-control" type="text" placeholder="Nome completo conforme exibido no cartão" required>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Detalhes do Cartão</label>
                                <div id="card-element" class="card-element">
                                    <!-- Os elementos do cartão Stripe serão inseridos aqui -->
                                </div>
                            </div>
    
                            <input type="hidden" id="stripeToken" name="stripeToken">
                            
                            <button id="card-button" class="btn btn-pay w-100" type="submit">
                                <i class="fas fa-lock me-2"></i> Pagar Agora
                            </button>
                            
                            <div class="payment-trust-badges mt-4">
                                <i class="fab fa-cc-visa"></i>
                                <i class="fab fa-cc-mastercard"></i>
                                <i class="fab fa-cc-amex"></i>
                                <i class="fab fa-cc-discover"></i>
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.footer')
    
    <script>
    $(function() {
        // Criar uma instância do Stripe usando sua chave pública
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        
        // Criar uma instância de elementos do Stripe
        const elements = stripe.elements({
            locale: 'pt',
        });
        
        // Criar o elemento do cartão e montá-lo no DOM
        const cardElement = elements.create('card', {
            hidePostalCode: true,
            style: {
                base: {
                    color: '#333',
                    fontWeight: '400',
                    fontSize: '16px',
                    fontSmoothing: 'antialiased',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#dc3545',
                    iconColor: '#dc3545'
                }
            }
        });
        
        cardElement.mount('#card-element');
        
        // Lidar com mudanças no elemento do cartão
        cardElement.on('change', ({error}) => {
            const displayError = $('.error-message');
            if (error) {
                $('#error-text').text(error.message);
                displayError.show();
            } else {
                displayError.hide();
            }
        });
        
        // Manipular o envio do formulário
        const form = document.getElementById('payment-form');
        const cardButton = document.getElementById('card-button');
        const errorElement = $('.error-message');
        const loadingOverlay = document.querySelector('.loading-overlay');
        
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            
            cardButton.disabled = true;
            cardButton.textContent = 'Processando...';
            loadingOverlay.classList.add('active');
            
            // Validar campos
            const cardholderName = document.getElementById('cardholder-name').value;
            if (!cardholderName) {
                errorElement.show();
                $('#error-text').text('Por favor, informe o nome no cartão');
                cardButton.disabled = false;
                cardButton.innerHTML = '<i class="fas fa-lock me-2"></i> Pagar Agora';
                loadingOverlay.classList.remove('active');
                return;
            }
            
            try {
                // Criar um token de cartão
                const {token, error} = await stripe.createToken(cardElement, {
                    name: cardholderName
                });
                
                if (error) {
                    // Exibir erro
                    errorElement.show();
                    $('#error-text').text(error.message);
                    cardButton.disabled = false;
                    cardButton.innerHTML = '<i class="fas fa-lock me-2"></i> Pagar Agora';
                    loadingOverlay.classList.remove('active');
                    return;
                }
                
                // Se chegou aqui, significa que temos um token
                document.getElementById('stripeToken').value = token.id;
                
                // Enviar o formulário
                form.submit();
            } catch (e) {
                console.error(e);
                errorElement.show();
                $('#error-text').text('Ocorreu um erro ao processar o pagamento. Por favor, tente novamente.');
                cardButton.disabled = false;
                cardButton.innerHTML = '<i class="fas fa-lock me-2"></i> Pagar Agora';
                loadingOverlay.classList.remove('active');
            }
        });
        
        // Ativar loading overlay para links de navegação
        const navigationLinks = document.querySelectorAll('a:not([href="#"])');
        navigationLinks.forEach(link => {
            if (!link.getAttribute('href').startsWith('#') && !link.hasAttribute('data-bs-toggle')) {
                link.addEventListener('click', function() {
                    loadingOverlay.classList.add('active');
                });
            }
        });
    });
    </script>

    <!-- PHPFlasher para notificações -->
    @flasher_render
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>