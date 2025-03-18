<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Bikes By Fazenda - Pagamento</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Stripe JS v3 -->
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        :root {
            --primary-color: #8a2be2;
            --secondary-color: #a92ab4;
            --dark-bg: #1e1e2f;
            --card-bg: #27293d;
            --text-color: #ffffff;
            --text-muted: #a3a3a3;
            --border-radius: 10px;
        }
        
        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .payment-container {
            max-width: 600px;
            width: 100%;
            margin: 2rem auto;
        }
        
        .card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
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
            color: white;
            text-align: center;
            margin: 1rem 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-color);
            border-radius: 5px;
            padding: 0.8rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: var(--secondary-color);
            color: white;
            box-shadow: 0 0 0 3px rgba(169, 42, 180, 0.25);
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
        }
        
        .btn-pay:active {
            transform: translateY(0);
        }
        
        .btn-back {
            color: var(--text-muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-bottom: 1rem;
            transition: color 0.3s;
        }
        
        .btn-back:hover {
            color: var(--text-color);
        }
        
        .btn-back i {
            margin-right: 0.5rem;
        }
        
        .error-message {
            background-color: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #e55c6c;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: none;
        }
        
        .has-error .form-control {
            border-color: #e55c6c;
        }
        
        .payment-info {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        
        .payment-info i {
            color: var(--secondary-color);
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }
        
        .card-element {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            padding: 0.8rem;
            color: white;
        }

        /* Estilos para os elementos do Stripe */
        .StripeElement {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        .StripeElement--focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(169, 42, 180, 0.25);
        }

        .StripeElement--invalid {
            border-color: #e55c6c;
        }

        .StripeElement--webkit-autofill {
            background-color: rgba(255, 255, 255, 0.15) !important;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <a href="{{ url()->previous() }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Voltar para a loja
        </a>
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Finalizar Pagamento</h3>
                            </div>

            <div class="amount">
                €{{ number_format($value, 2, ',', '.') }}
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
                    
                    <div class="mt-3 text-center" style="color: var(--text-muted); font-size: 0.85rem;">
                        <i class="fab fa-cc-visa mx-1"></i>
                        <i class="fab fa-cc-mastercard mx-1"></i>
                        <i class="fab fa-cc-amex mx-1"></i>
                        <i class="fab fa-cc-discover mx-1"></i>
                        </div>
                    </form>
            </div>        
        </div>
    </div>
    
    <script>
$(function() {
            // Criar uma instância do Stripe usando sua chave pública
            const stripe = Stripe('{{ env('STRIPE_KEY') }}');
            
            // Criar uma instância de elementos do Stripe
            const elements = stripe.elements({
                locale: 'pt',
                appearance: {
                    theme: 'night',
                    variables: {
                        colorPrimary: '#a92ab4',
                        colorBackground: 'rgba(255, 255, 255, 0.1)',
                        colorText: '#ffffff',
                        colorDanger: '#e55c6c',
                        fontFamily: 'Segoe UI, system-ui, sans-serif',
                        spacingUnit: '4px',
                        borderRadius: '5px'
                    }
                }
            });
            
            // Criar o elemento do cartão e montá-lo no DOM
            const cardElement = elements.create('card', {
                hidePostalCode: true,
                style: {
                    base: {
                        color: '#ffffff',
                        fontWeight: '400',
                        fontSize: '16px',
                        fontSmoothing: 'antialiased',
                        '::placeholder': {
                            color: 'rgba(255, 255, 255, 0.6)'
                        }
                    },
                    invalid: {
                        color: '#e55c6c',
                        iconColor: '#e55c6c'
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
            
            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                
                cardButton.disabled = true;
                cardButton.textContent = 'Processando...';
                
                // Validar campos
                const cardholderName = document.getElementById('cardholder-name').value;
                if (!cardholderName) {
                    errorElement.show();
                    $('#error-text').text('Por favor, informe o nome no cartão');
                    cardButton.disabled = false;
                    cardButton.innerHTML = '<i class="fas fa-lock me-2"></i> Pagar Agora';
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
                }
            });
        });
</script>

<!-- PHPFlasher para notificações -->
@flasher_render

</body>
</html>