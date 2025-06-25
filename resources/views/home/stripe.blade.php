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
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
            border-color: var(--primary-color);
        }

        .StripeElement--invalid {
            border-color: #dc3545;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #dc3545;
            text-align: left;
            font-size: 14px;
            margin-top: 10px;
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

        /* Melhorias para loading em mobile */
        @media (max-width: 768px) {
          .loading-image {
            width: 600px;
            height: 600px;
            object-fit: contain;
          }
        }

        /* Responsividade Mobile Completa */
        @media (max-width: 768px) {
            body {
                padding: 0;
                margin: 0;
            }

            .payment-section {
                padding: 40px 0;
            }

            .container {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .payment-container {
                max-width: 100%;
                margin: 0;
                padding: 0;
            }

            /* Back button mobile */
            .btn-back {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 10px 20px;
                margin-bottom: 1.5rem;
                background-color: #f8f9fa;
                border-radius: 8px;
                font-size: 0.95rem;
                text-decoration: none;
                color: #555;
                border: 1px solid #dee2e6;
                transition: all 0.3s ease;
            }

            .btn-back:hover {
                background-color: #e9ecef;
                color: var(--primary-color);
                border-color: var(--primary-color);
            }

            /* Card mobile */
            .card {
                border-radius: 15px;
                margin-bottom: 1rem;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            }

            .card-header {
                padding: 1.5rem;
                text-align: center;
                border-radius: 15px 15px 0 0;
            }

            .card-title {
                font-size: 1.2rem;
                margin-bottom: 0;
            }

            /* Order summary mobile */
            .order-summary {
                margin: 1rem;
                padding: 1.5rem;
                border-radius: 12px;
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                border: 1px solid #dee2e6;
            }

            .order-title {
                font-size: 1.1rem;
                text-align: center;
                margin-bottom: 1rem;
            }

            .order-title i {
                font-size: 1.2rem;
                margin-right: 8px;
            }

            .order-item {
                font-size: 0.95rem;
                padding: 0.5rem 0;
                justify-content: space-between;
                align-items: center;
            }

            .order-total {
                font-size: 1.2rem;
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 2px solid var(--primary-color);
                color: var(--primary-color);
            }

            /* Card body mobile */
            .card-body {
                padding: 1.5rem;
            }

            /* Payment info mobile */
            .payment-info {
                padding: 1rem;
                border-radius: 8px;
                font-size: 0.9rem;
                text-align: center;
                margin-bottom: 2rem;
                background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
                border: 1px solid #0ea5e9;
                color: #0c4a6e;
            }

            .payment-info i {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
                display: block;
            }

            /* Form mobile */
            .form-label {
                font-size: 1rem;
                font-weight: 600;
                margin-bottom: 0.75rem;
                text-align: center;
                display: block;
            }

            .form-control {
                padding: 1rem;
                font-size: 1rem;
                border-radius: 8px;
                border: 2px solid #e5e7eb;
                margin-bottom: 1.5rem;
                transition: all 0.3s ease;
                touch-action: manipulation;
            }

            .form-control:focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
                outline: none;
            }

            /* Stripe elements mobile */
            .card-element {
                padding: 1rem;
                border-radius: 8px;
                border: 2px solid #e5e7eb;
                margin-bottom: 1.5rem;
                transition: all 0.3s ease;
            }

            .StripeElement {
                padding: 1rem;
                font-size: 1rem;
                border-radius: 8px;
            }

            .StripeElement--focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
            }

            /* Error messages mobile */
            .error-message {
                padding: 1rem;
                border-radius: 8px;
                margin-bottom: 1.5rem;
                font-size: 0.9rem;
                text-align: center;
            }

            #card-errors {
                font-size: 0.9rem;
                margin-top: 0.5rem;
                text-align: center;
                padding: 0.5rem;
                border-radius: 6px;
                background-color: rgba(220, 53, 69, 0.1);
            }

            /* Payment button mobile */
            .btn-pay {
                width: 100%;
                padding: 1.2rem;
                font-size: 1.1rem;
                font-weight: 700;
                border-radius: 10px;
                margin-top: 1.5rem;
                touch-action: manipulation;
                min-height: 56px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                box-shadow: 0 4px 20px rgba(153, 53, 220, 0.4);
            }

            .btn-pay:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 25px rgba(153, 53, 220, 0.5);
            }

            .btn-pay:disabled {
                background: #6c757d;
                transform: none;
                box-shadow: none;
                cursor: not-allowed;
            }

            /* Trust badges mobile */
            .payment-trust-badges {
                margin-top: 1.5rem;
                padding-top: 1.5rem;
                border-top: 1px solid #dee2e6;
            }

            .payment-trust-badges i {
                font-size: 2.5rem;
                margin: 0 10px;
                opacity: 0.7;
                transition: opacity 0.3s ease;
            }

            .payment-trust-badges i:hover {
                opacity: 1;
            }

            /* Loading overlay mobile */
            .loading-image {
                width: 300px;
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .payment-section {
                padding: 20px 0;
            }

            .container {
                padding-left: 0.25rem;
                padding-right: 0.25rem;
            }

            /* Back button small mobile */
            .btn-back {
                padding: 8px 16px;
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            /* Card small mobile */
            .card {
                border-radius: 12px;
                margin-bottom: 0.5rem;
            }

            .card-header {
                padding: 1rem;
            }

            .card-title {
                font-size: 1.1rem;
            }

            /* Order summary small mobile */
            .order-summary {
                margin: 0.5rem;
                padding: 1rem;
            }

            .order-title {
                font-size: 1rem;
            }

            .order-item {
                font-size: 0.9rem;
            }

            .order-total {
                font-size: 1.1rem;
            }

            /* Card body small mobile */
            .card-body {
                padding: 1rem;
            }

            /* Payment info small mobile */
            .payment-info {
                padding: 0.75rem;
                font-size: 0.85rem;
                margin-bottom: 1.5rem;
            }

            .payment-info i {
                font-size: 1.25rem;
            }

            /* Form small mobile */
            .form-label {
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
            }

            .form-control {
                padding: 0.875rem;
                font-size: 0.95rem;
                margin-bottom: 1rem;
            }

            .card-element {
                padding: 0.875rem;
                margin-bottom: 1rem;
            }

            .StripeElement {
                padding: 0.875rem;
                font-size: 0.95rem;
            }

            /* Error messages small mobile */
            .error-message {
                padding: 0.75rem;
                font-size: 0.85rem;
                margin-bottom: 1rem;
            }

            #card-errors {
                font-size: 0.85rem;
                padding: 0.4rem;
            }

            /* Payment button small mobile */
            .btn-pay {
                padding: 1rem;
                font-size: 1rem;
                margin-top: 1rem;
                min-height: 50px;
            }

            /* Trust badges small mobile */
            .payment-trust-badges {
                margin-top: 1rem;
                padding-top: 1rem;
            }

            .payment-trust-badges i {
                font-size: 2rem;
                margin: 0 8px;
            }

            /* Loading small mobile */
            .loading-image {
                width: 200px;
                height: 200px;
            }
        }

        /* Melhorias para orientação landscape em tablets */
        @media (max-width: 1024px) and (orientation: landscape) {
            .payment-section {
                padding: 60px 0;
            }

            .payment-container {
                max-width: 500px;
                margin: 0 auto;
            }

            .card-body {
                padding: 1.5rem;
            }
        }

        /* Touch device optimizations */
        @media (hover: none) {
            .btn-back:hover,
            .btn-pay:hover {
                transform: none;
                box-shadow: inherit;
            }

            .payment-trust-badges i:hover {
                opacity: 0.7;
            }

            .form-control:hover,
            .card-element:hover {
                border-color: #e5e7eb;
            }
        }

        /* Melhorias para devices com telas muito pequenas */
        @media (max-width: 320px) {
            .payment-section {
                padding: 15px 0;
            }

            .btn-back {
                padding: 6px 12px;
                font-size: 0.85rem;
            }

            .card-header {
                padding: 0.75rem;
            }

            .card-title {
                font-size: 1rem;
            }

            .order-summary {
                margin: 0.25rem;
                padding: 0.75rem;
            }

            .card-body {
                padding: 0.75rem;
            }

            .form-control,
            .card-element {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .btn-pay {
                padding: 0.875rem;
                font-size: 0.95rem;
                min-height: 44px;
            }

            .payment-trust-badges i {
                font-size: 1.75rem;
                margin: 0 5px;
            }

            .loading-image {
                width: 150px;
                height: 150px;
            }
        }

        /* Acessibilidade melhorada */
        @media (prefers-reduced-motion: reduce) {
            .btn-back,
            .btn-pay,
            .form-control,
            .card-element,
            .StripeElement {
                transition: none;
            }

            .btn-back:hover,
            .btn-pay:hover {
                transform: none;
            }
        }

        /* Melhorias específicas para iOS */
        @supports (-webkit-touch-callout: none) {
            .form-control,
            .card-element {
                -webkit-appearance: none;
                border-radius: 8px;
            }

            .btn-pay {
                -webkit-appearance: none;
                border-radius: 10px;
            }
        }

        /* Melhorias para dark mode */
        @media (prefers-color-scheme: dark) {
            .payment-info {
                background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
                border-color: #475569;
                color: #e2e8f0;
            }

            .order-summary {
                background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
                border-color: #475569;
                color: #e2e8f0;
            }
        }

        /* Melhorias para high contrast */
        @media (prefers-contrast: high) {
            .form-control,
            .card-element {
                border-width: 3px;
            }

            .btn-pay {
                border: 3px solid #fff;
            }
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
                <i class="fas fa-arrow-left"></i> Back to Cart
            </a>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Finish the Payment</h3>
                </div>

                <div class="order-summary mx-4 mt-4">
                    <div class="order-title">
                        <i class="fas fa-receipt"></i> Order Summary
                    </div>
                    <div class="divider"></div>
                    <div class="order-item">
                        <span>Subtotal:</span>
                        <span>€{{ number_format($value - ($value * 0.23), 2, ',', '.') }}</span>
                    </div>
                    <div class="order-item">
                        <span>VAT (23%):</span>
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
                        <span>This is a secure payment. Your data is protected.</span>
                    </div>

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="error-text">Please correct the errors and try again.</span>
                    </div>

                    <form id="payment-form" action="{{ route('stripe.post', $value) }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Name on Card</label>
                            <input id="cardholder-name" class="form-control" type="text" placeholder="Full name as shown on card" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Card Details</label>
                            <div id="card-element" class="card-element">

                            </div>
                            <div id="card-errors" class="invalid-feedback" role="alert"></div>
                        </div>

                        <input type="hidden" id="stripeToken" name="stripeToken">
                        
                        <button id="card-button" class="btn btn-pay w-100" type="submit">
                            <i class="fas fa-lock me-2"></i> Pay Now
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
        // Inicializa o Stripe com sua chave pública
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements({
            locale: 'pt',
            appearance: {
                theme: 'stripe',
                variables: {
                    colorPrimary: '#9935dc',
                    colorBackground: '#ffffff',
                    colorText: '#424770',
                    colorDanger: '#dc3545',
                    fontFamily: 'system-ui, sans-serif',
                    spacingUnit: '4px',
                    borderRadius: '4px',
                }
            }
        });

        // Cria o elemento do cartão
        const card = elements.create('card', {
            hidePostalCode: true,
            style: {
                base: {
                    fontSize: '16px',
                    color: '#424770',
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

        // Monta o elemento do cartão
        card.mount('#card-element');

        // Manipula erros de validação em tempo real
        card.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Manipula o envio do formulário
        const form = document.getElementById('payment-form');
        const cardButton = document.getElementById('card-button');
        const loadingOverlay = document.querySelector('.loading-overlay');

        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            
            // Desabilita o botão e mostra loading
            cardButton.disabled = true;
            cardButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Processando...';
            loadingOverlay.classList.add('active');

            try {
                // Obtém o nome do titular do cartão
                const cardholderName = document.getElementById('cardholder-name').value;
                
                // Cria o token do cartão
                const {token, error} = await stripe.createToken(card, {
                    name: cardholderName
                });

                if (error) {
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                    cardButton.disabled = false;
                    cardButton.innerHTML = '<i class="fas fa-lock me-2"></i> Pagar Agora';
                    loadingOverlay.classList.remove('active');
                    return;
                }

                // Adiciona o token ao formulário
                document.getElementById('stripeToken').value = token.id;

                // Envia o formulário
                form.submit();
            } catch (e) {
                console.error('Erro:', e);
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = 'Ocorreu um erro ao processar o pagamento. Por favor, tente novamente.';
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
  
  <!-- Toastr Assets -->
  @include('home.toastr_assets')
  
  <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>