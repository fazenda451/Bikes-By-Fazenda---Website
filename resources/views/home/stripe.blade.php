<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bikes By Fazenda - Payment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Stripe JS v3 -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <style>
        :root {
            --primary: #2563eb; /* azul stripe */
            --success: #22c55e;
            --danger: #ef4444;
            --bg: #f4f6fb;
            --card-bg: #fff;
            --border: #e5e7eb;
            --shadow: 0 4px 32px rgba(30,41,59,0.08);
            --text: #222;
            --muted: #6b7280;
        }
        body {
            background: var(--bg);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        }
        .payment-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 0;
        }
        .payment-card {
            background: var(--card-bg);
            border-radius: 18px;
            box-shadow: var(--shadow);
            max-width: 420px;
            width: 100%;
            margin: 0 auto;
            padding: 0;
            overflow: hidden;
            border: 1.5px solid var(--border);
        }
        .payment-header {
            background: #f9fafb;
            padding: 2rem 2rem 1.2rem 2rem;
            border-bottom: 1.5px solid var(--border);
            text-align: center;
        }
        .payment-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.2rem;
        }
        .payment-header p {
            color: var(--muted);
            font-size: 1rem;
            margin-bottom: 0;
        }
        .order-summary {
            background: #f6f8fa;
            border-radius: 10px;
            margin: 1.5rem 2rem 0.5rem 2rem;
            padding: 1.1rem 1rem 0.7rem 1rem;
            border: 1px solid var(--border);
        }
        .order-summary .row {
            font-size: 1rem;
            color: var(--muted);
            margin-bottom: 0.3rem;
        }
        .order-summary .order-total {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.1rem;
            margin-top: 0.5rem;
        }
        .payment-body {
            padding: 2rem 2rem 1.5rem 2rem;
        }
        .secure-info {
            background: #e0f2fe;
            color: #2563eb;
            border-radius: 8px;
            padding: 0.7rem 1rem;
            font-size: 0.98rem;
            display: flex;
            align-items: center;
            margin-bottom: 1.2rem;
        }
        .secure-info i {
            margin-right: 0.7rem;
            font-size: 1.2rem;
        }
        .form-label {
            color: var(--text);
            font-weight: 600;
            margin-bottom: 0.3rem;
        }
        .form-control, .card-element {
            border-radius: 8px;
            border: 1.5px solid var(--border);
            padding: 0.9rem 1rem;
            font-size: 1rem;
            margin-bottom: 1.1rem;
            background: #fff;
            color: var(--text);
            box-shadow: none;
            transition: border-color 0.2s;
        }
        .form-control:focus, .card-element:focus {
            border-color: var(--primary);
            outline: none;
        }
        .btn-pay {
            background: var(--success);
            color: #fff;
            font-weight: 700;
            font-size: 1.15rem;
            border: none;
            border-radius: 10px;
            padding: 1rem 0;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            width: 100%;
            box-shadow: 0 4px 16px rgba(34,197,94,0.13);
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-pay:hover, .btn-pay:focus {
            background: #16a34a;
            box-shadow: 0 8px 24px rgba(34,197,94,0.18);
            transform: translateY(-2px) scale(1.01);
            color: #fff;
        }
        .btn-pay:disabled {
            background: #bdbdbd;
            color: #fff;
            cursor: not-allowed;
            box-shadow: none;
        }
        .payment-trust-badges {
            text-align: center;
            margin-top: 1.2rem;
        }
        .payment-trust-badges i {
            font-size: 2.1rem;
            margin: 0 8px;
            color: #bdbdbd;
            transition: color 0.2s, transform 0.2s;
        }
        .payment-trust-badges i:hover {
            color: var(--success);
            transform: scale(1.12);
        }
        .error-message {
            background: #fef2f2;
            color: var(--danger);
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 0.7rem 1rem;
            font-size: 0.98rem;
            margin-bottom: 1.1rem;
            display: none;
        }
        @media (max-width: 600px) {
            .payment-card {
                max-width: 100%;
                border-radius: 0;
            }
            .payment-header, .payment-body {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .order-summary {
                margin: 1.2rem 0.2rem 0 0.2rem;
                padding: 1.1rem 0.7rem 0.7rem 0.7rem;
            }
        }
    </style>
</head>
<body>
    @include('home.header')
    <div class="payment-section">
        <div class="payment-card">
            <div class="payment-header">
                <h2>Checkout</h2>
                <p>Complete your payment securely</p>
            </div>
            <div class="order-summary">
                <div class="row">
                    <div class="col">Subtotal:</div>
                    <div class="col text-end">€{{ number_format($value - ($value * 0.23), 2, ',', '.') }}</div>
                </div>
                <div class="row">
                    <div class="col">VAT (23%):</div>
                    <div class="col text-end">€{{ number_format($value * 0.23, 2, ',', '.') }}</div>
                </div>
                <div class="row order-total">
                    <div class="col">Total:</div>
                    <div class="col text-end">€{{ number_format($value, 2, ',', '.') }}</div>
                </div>
            </div>
            <div class="payment-body">
                <div class="secure-info mb-3">
                    <i class="fas fa-lock"></i>
                    <span>This is a secure payment. Your data is protected.</span>
                </div>
                <div class="error-message" id="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span id="error-text">Please correct the errors and try again.</span>
                </div>
                <form id="payment-form" action="{{ route('stripe.post', $value) }}" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="cardholder-name">Name on Card</label>
                        <input id="cardholder-name" name="cardholder_name" class="form-control" type="text" placeholder="Full name as shown on card" required autocomplete="cc-name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="card-element">Card Details</label>
                        <div id="card-element" class="card-element"></div>
                        <div id="card-errors" class="invalid-feedback" role="alert"></div>
                    </div>
                    <input type="hidden" id="stripeToken" name="stripeToken">
                    <!-- Campos ocultos para pontos -->
                    <input type="hidden" name="use_points" value="{{ request('use_points', '') }}">
                    <input type="hidden" name="points_to_use" value="{{ request('points_to_use', '') }}">
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
    @include('home.footer')
    <!-- Toastr Assets -->
    @include('home.toastr_assets')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Stripe JS e lógica já existente -->
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
</body>
</html>