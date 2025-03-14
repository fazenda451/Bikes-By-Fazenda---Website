<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

  <style>
    .cart-section {
      padding: 4rem 0;
      background-color: #f8f9fa;
    }

    .cart-container {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .cart-table {
      width: 100%;
      border-collapse: collapse;
    }

    .cart-table th {
      background-color: #9935dc;
      color: white;
      padding: 1rem;
      text-align: left;
      font-weight: 600;
    }

    .cart-table td {
      padding: 1rem;
      border-bottom: 1px solid #dee2e6;
      vertical-align: middle;
    }

    .product-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 4px;
    }

    .product-title {
      font-weight: 600;
      color: #333;
      margin-bottom: 0.5rem;
    }

    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .quantity-btn {
      background: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s;
    }

    .quantity-btn:hover {
      background: #e9ecef;
    }

    .quantity-input {
      width: 50px;
      text-align: center;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      padding: 0.25rem;
    }

    .remove-btn {
      background: #dc3545;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .remove-btn:hover {
      background: #c82333;
    }

    .cart-summary {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .cart-total {
      font-size: 1.5rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 1rem;
    }

    .checkout-form {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: #333;
    }

    .form-control {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      transition: border-color 0.3s;
    }

    .form-control:focus {
      border-color: #9935dc;
      outline: none;
    }

    .btn-payment {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      text-align: center;
      border-radius: 4px;
      transition: all 0.3s;
      cursor: pointer;
      margin-right: 1rem;
    }

    .btn-cash {
      background-color: #9935dc;
      color: white;
      border: none;
    }

    .btn-cash:hover {
      background-color: #8024c0;
    }

    .btn-card {
      background-color: #28a745;
      color: white;
      text-decoration: none;
    }

    .btn-card:hover {
      background-color: #218838;
      color: white;
    }

    /* Novos estilos para melhorar a interface */
    .quantity-stepper {
      display: flex;
      align-items: center;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      overflow: hidden;
      width: fit-content;
    }

    .quantity-stepper button {
      background: #f8f9fa;
      border: none;
      width: 32px;
      height: 32px;
      font-size: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s;
    }

    .quantity-stepper button:hover {
      background: #e9ecef;
      color: #9935dc;
    }

    .quantity-stepper input {
      width: 40px;
      text-align: center;
      border: none;
      padding: 0.25rem;
      font-weight: 500;
    }

    .size-selector {
      position: relative;
      width: fit-content;
    }

    .size-selector select {
      appearance: none;
      padding: 0.5rem 2rem 0.5rem 1rem;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      background-color: white;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.2s;
    }

    .size-selector select:focus {
      border-color: #9935dc;
      outline: none;
    }

    .size-selector::after {
      content: '\f078';
      font-family: 'Font Awesome 5 Free';
      font-weight: 900;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
      color: #6c757d;
    }

    .size-selector:hover::after {
      color: #9935dc;
    }

    .product-info {
      display: flex;
      flex-direction: column;
    }

    .product-meta {
      margin-top: 0.5rem;
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .product-meta-item {
      background-color: #f8f9fa;
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      font-size: 0.8rem;
      color: #6c757d;
    }

    .auto-update-form {
      margin-bottom: 0;
    }

    /* Novos estilos para o layout do carrinho */
    .cart-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 1.5rem;
      text-transform: uppercase;
      border-bottom: 2px solid #9935dc;
      padding-bottom: 0.5rem;
      display: inline-block;
    }

    .order-summary-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 1.5rem;
      text-transform: uppercase;
      border-bottom: 2px solid #9935dc;
      padding-bottom: 0.5rem;
      display: inline-block;
    }

    .summary-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 0.75rem;
      font-size: 1rem;
    }

    .summary-item.total {
      font-size: 1.25rem;
      font-weight: 700;
      border-top: 1px solid #dee2e6;
      padding-top: 0.75rem;
      margin-top: 0.75rem;
    }

    .summary-item.original-price {
      text-decoration: line-through;
      color: #6c757d;
      font-size: 0.9rem;
    }

    .shipping-info {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      color: #28a745;
    }

    .shipping-info i {
      margin-right: 0.5rem;
    }

    .payment-options {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-top: 2rem;
    }

    .btn-payment {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn-payment i {
      margin-right: 0.5rem;
    }

    .form-row {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .form-col {
      flex: 1;
    }

    /* Estilos para o sistema de pontos de fidelidade */
    .loyalty-points {
      background-color: #f8f9fa;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    .badge.bg-primary {
      background-color: #9935dc !important;
      font-size: 0.9rem;
      padding: 5px 10px;
    }

    .possible-discount {
      color: #28a745;
      font-weight: 500;
    }

    .total-with-discount {
      font-weight: 600;
      color: #9935dc;
    }

    .use-points-check {
      background-color: #f8f9fa;
      padding: 10px;
      border-radius: 5px;
      border-left: 3px solid #9935dc;
    }

    .form-check-input:checked {
      background-color: #9935dc;
      border-color: #9935dc;
    }

    .loyalty-info {
      background-color: #f8f9fa;
      padding: 10px;
      border-radius: 5px;
      font-size: 0.9rem;
      color: #555;
      border-left: 3px solid #9935dc;
    }

    .points-preview .alert {
      padding: 10px;
      margin-bottom: 0;
      font-size: 0.9rem;
      border-left: 3px solid #17a2b8;
    }

    .points-preview .alert-info {
      background-color: rgba(23, 162, 184, 0.1);
      border-color: #17a2b8;
      color: #0c5460;
    }

    @media (max-width: 768px) {
      .cart-table {
        display: block;
        overflow-x: auto;
      }

      .product-image {
        width: 80px;
        height: 80px;
      }

      .form-group {
        margin-bottom: 1rem;
      }

      .form-row {
        flex-direction: column;
        gap: 0;
      }
    }
  </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->

    @include('home.header')

    <!-- end header section --> 

  </div>
 

    <section class="cart-section">
      <div class="container">
        <div class="row">
          <!-- Coluna da esquerda - Tabela do carrinho -->
          <div class="col-lg-8">
            <div class="cart-container">
              <h2 class="cart-title">A MINHA CESTA</h2>
              <table class="cart-table">
                <thead>
                  <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $total = 0; ?>
                  <?php $originalTotal = 0; ?>
                  @foreach ($cart as $item)
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          @if($item->is_motorcycle)
                            <img src="{{ $item->motorcycle->photos->first() ? asset('motorcycles/' . $item->motorcycle->photos->first()->image) : asset('images/no-image.jpg') }}" alt="{{$item->motorcycle->name}}" class="product-image me-3">
                            <div class="product-info">
                              <div class="product-title">{{$item->motorcycle->name}}</div>
                              <div class="product-meta">
                                <span class="product-meta-item">
                                  <i class="fas fa-motorcycle me-1"></i>Moto
                                </span>
                              </div>
                            </div>
                          @else
                            <img src="/products/{{$item->product->image}}" alt="{{$item->product->title}}" class="product-image me-3">
                            <div class="product-info">
                              <div class="product-title">{{$item->product->title}}</div>
                              <div class="product-meta">
                                <span class="product-meta-item">
                                  <i class="fas fa-box me-1"></i>Disponível: {{$item->product->Quantity}} unidades
                                </span>
                                @if($item->size)
                                <span class="product-meta-item">
                                  <i class="fas fa-ruler me-1"></i>Tamanho: {{$item->size}}
                                </span>
                                @endif
                              </div>
                            </div>
                          @endif
                        </div>
                      </td>
                      <td>
                        @if($item->is_motorcycle)
                          {{$item->motorcycle->price}}€
                        @else
                          {{$item->product->price}}€
                        @endif
                      </td>
                      <td>
                        @if($item->is_motorcycle)
                          <span class="badge bg-secondary">1</span>
                        @else
                          <form action="{{ url('update_quantity') }}" method="POST" class="auto-update-form" id="quantity-form-{{$item->id}}">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$item->id}}">
                            <div class="quantity-stepper">
                              <button type="button" onclick="decreaseQuantity(this)" class="quantity-btn-minus">
                                <i class="fas fa-minus"></i>
                              </button>
                              <input type="number" name="quantity" value="{{$item->quantity}}" min="1" max="{{$item->product->Quantity}}" class="quantity-input" onchange="autoSubmitForm('quantity-form-{{$item->id}}')">
                              <button type="button" onclick="increaseQuantity(this)" class="quantity-btn-plus">
                                <i class="fas fa-plus"></i>
                              </button>
                            </div>
                          </form>
                          
                          @if($item->size)
                          <form action="{{ url('update_size') }}" method="POST" class="mt-2 auto-update-form" id="size-form-{{$item->id}}">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$item->id}}">
                            <div class="size-selector">
                              <select name="size" onchange="autoSubmitForm('size-form-{{$item->id}}')">
                                @if($item->product->size)
                                  @foreach(explode(',', $item->product->size) as $size)
                                    <option value="{{ trim($size) }}" {{ $item->size == trim($size) ? 'selected' : '' }}>{{ trim($size) }}</option>
                                  @endforeach
                                @else
                                  <option value="{{ $item->size }}" selected>{{ $item->size }}</option>
                                @endif
                              </select>
                            </div>
                          </form>
                          @endif
                        @endif
                      </td>
                      <td>
                        @if($item->is_motorcycle)
                          {{$item->motorcycle->price}}€
                          <?php $total += $item->motorcycle->price; ?>
                          <?php $originalTotal += $item->motorcycle->price; ?>
                        @else
                          {{$item->product->price * $item->quantity}}€
                          <?php $total += $item->product->price * $item->quantity; ?>
                          <?php $originalTotal += $item->product->price * $item->quantity; ?>
                        @endif
                      </td>
                      <td>
                        <a href="{{url('delete_cart', $item->id)}}" class="remove-btn">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!-- Coluna da direita - Resumo do pedido e dados do destinatário -->
          <div class="col-lg-4">
            <!-- Resumo do pedido -->
            <div class="cart-summary">
              <h2 class="order-summary-title">RESUMO DO PEDIDO</h2>
              
              <div class="shipping-info">
                <i class="fas fa-truck"></i>
                <span>Frete grátis disponível para o seu pedido!</span>
              </div>

              <div class="summary-item">
                <span>{{ count($cart) }} item(s)</span>
                <span>{{ $total }}€</span>
              </div>

              <div class="summary-item">
                <span>Envio</span>
                <span>Grátis</span>
              </div>

              <!-- Sistema de Pontos de Fidelidade -->
              <div class="summary-item loyalty-points">
                <span>Seus Pontos de Fidelidade</span>
                <span class="badge bg-primary">{{ $userPoints ?? 0 }}</span>
              </div>

              @if(isset($userPoints) && $userPoints > 0)
                <?php 
                  // Calcula o desconto máximo (1% por cada 1000 pontos, limitado a 10%)
                  $maxPointsDiscount = min(floor($userPoints / 1000), 10);
                  $maxDiscount = $total * ($maxPointsDiscount / 100);
                  // Limita o desconto ao valor total
                  $maxDiscount = min($maxDiscount, $total);
                  // Calcula quantos pontos seriam necessários para o desconto máximo
                  $pointsNeededForMaxDiscount = min($maxPointsDiscount * 1000, $userPoints);
                ?>
                <div class="summary-item possible-discount">
                  <span>Desconto com Pontos (1% por cada 1000 pontos, máx. 10%)</span>
                  <span>-{{ number_format($maxDiscount, 2) }}€</span>
                </div>

                <div class="summary-item total-with-discount">
                  <span>Total com Desconto</span>
                  <span>{{ number_format($total - $maxDiscount, 2) }}€</span>
                </div>

                <div class="form-check use-points-check mt-3 mb-3">
                  <input class="form-check-input" type="checkbox" id="use-points" name="use_points" form="checkout-form">
                  <label class="form-check-label" for="use-points">
                    Usar pontos para desconto
                  </label>
                </div>

                <div class="points-selector mt-2" id="points-selector" style="display: none;">
                  <label class="form-label">Quantidade de pontos a usar:</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="points-input" min="1000" max="{{ $userPoints }}" step="1000" value="1000">
                    <span class="input-group-text">pontos</span>
                    <button type="button" class="btn btn-outline-primary" id="max-points-btn">Máximo</button>
                  </div>
                  <small class="text-muted">Você pode usar múltiplos de 1000 pontos (1% de desconto por cada 1000 pontos, limitado a 10%)</small>
                  
                  <div class="points-preview mt-2">
                    <div class="alert alert-info">
                      <span id="points-preview-text">Usando 1000 pontos, você receberá 1% de desconto ({{ number_format($total * 0.01, 2) }}€)</span>
                    </div>
                  </div>
                  
                  <div class="alert alert-warning mt-2">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span>Atenção: Ao usar pontos para desconto, você não receberá pontos por esta compra.</span>
                  </div>
                </div>
              @endif

              <div class="summary-item total">
                <span>TOTAL</span>
                <span>{{ $total }}€</span>
              </div>

              @if($originalTotal > $total)
              <div class="summary-item original-price">
                <span>Preço original</span>
                <span>{{ $originalTotal }}€</span>
              </div>
              @endif
              
              <!-- Informação sobre ganho de pontos -->
              <div class="loyalty-info mt-3" id="loyalty-info">
                <i class="fas fa-award text-primary me-2"></i>
                <span>Você ganhará aproximadamente {{ floor(($total / 10) * 5) }} pontos com esta compra!</span>
              </div>
            </div>

            <!-- Dados do destinatário -->
            <div class="checkout-form">
              <form action="{{url('comfirm_order')}}" method="POST" id="checkout-form">
                @csrf
                <!-- Campo oculto para os pontos -->
                <input type="hidden" id="points_to_use_hidden" name="points_to_use" value="">
                
                <div class="form-group">
                  <label class="form-label">Nome do Destinatário</label>
                  <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                </div>

                <div class="form-group">
                  <label class="form-label">Endereço de Entrega</label>
                  <textarea name="address" class="form-control" required>{{Auth::user()->address}}</textarea>
                </div>

                <div class="form-row">
                  <div class="form-col">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="city" value="{{Auth::user()->city}}" class="form-control" required>
                  </div>
                  <div class="form-col">
                    <label class="form-label">Código Postal</label>
                    <input type="text" name="zip_code" value="{{Auth::user()->zip_code}}" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">Telefone</label>
                  <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" required>
                </div>

                <div class="payment-options">
                  <button type="submit" class="btn-payment btn-cash">
                    <i class="fas fa-money-bill-wave"></i>
                    Pagar na Entrega
                  </button>
                  <a href="{{url('stripe', $total)}}" class="btn-payment btn-card" id="stripe-link">
                    <i class="fas fa-credit-card"></i>
                    Finalizar Compra
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!-- info section -->

  @include('home.footer')

  <script>
    function autoSubmitForm(formId) {
      document.getElementById(formId).submit();
    }

    function decreaseQuantity(button) {
      const form = button.closest('form');
      const input = form.querySelector('.quantity-input');
      if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
        form.submit();
      }
    }

    function increaseQuantity(button) {
      const form = button.closest('form');
      const input = form.querySelector('.quantity-input');
      const maxQuantity = parseInt(input.getAttribute('max'));
      const currentQuantity = parseInt(input.value);

      if (currentQuantity < maxQuantity) {
        input.value = currentQuantity + 1;
        form.submit();
      } else {
        toastr.warning('Quantidade máxima disponível em estoque atingida');
      }
    }

    // Sistema de pontos de fidelidade
    document.addEventListener('DOMContentLoaded', function() {
      const usePointsCheckbox = document.getElementById('use-points');
      const pointsSelector = document.getElementById('points-selector');
      const pointsInput = document.getElementById('points-input');
      const pointsHidden = document.getElementById('points_to_use_hidden');
      const maxPointsBtn = document.getElementById('max-points-btn');
      const loyaltyInfo = document.getElementById('loyalty-info');
      const totalValue = parseFloat('{{ $total }}');
      
      // Calcula o máximo de pontos que podem ser usados (10% do valor total)
      const maxPercentage = 10; // 10%
      const maxDiscountValue = totalValue * (maxPercentage / 100); // Valor máximo de desconto (10% do total)
      const pointsNeededForOnePercent = 1000; // 1000 pontos = 1%
      const maxDiscountPoints = Math.min(Math.floor(maxPercentage) * pointsNeededForOnePercent, {{ $userPoints }});
      
      console.log('Total do carrinho:', totalValue);
      console.log('Valor máximo de desconto (10%):', maxDiscountValue);
      console.log('Pontos máximos permitidos:', maxDiscountPoints);
      console.log('Pontos do usuário:', {{ $userPoints }});
      
      if (usePointsCheckbox) {
        usePointsCheckbox.addEventListener('change', function() {
          pointsSelector.style.display = this.checked ? 'block' : 'none';
          // Esconde ou mostra a informação de ganho de pontos
          loyaltyInfo.style.display = this.checked ? 'none' : 'block';
          
          // Garante que o input de pontos tenha um valor válido
          if (this.checked) {
            if (!pointsInput.value || pointsInput.value < 1000) {
              pointsInput.value = 1000;
            }
            // Atualiza o campo oculto
            pointsHidden.value = pointsInput.value;
          } else {
            // Se desmarcar, limpa o valor para não enviar
            pointsInput.value = '';
            pointsHidden.value = '';
          }
          
          updateTotal();
          
          // Log para debug
          console.log('Checkbox marcado:', this.checked);
          console.log('Valor atual dos pontos:', pointsInput.value);
          console.log('Valor do campo oculto:', pointsHidden.value);
        });

        if (pointsInput) {
          // Define o valor máximo baseado no menor entre os pontos do usuário e o máximo permitido
          pointsInput.max = maxDiscountPoints;
          pointsInput.value = Math.min(1000, maxDiscountPoints);
          
          pointsInput.addEventListener('change', function() {
            // Garante que o valor seja múltiplo de 1000
            const value = parseInt(this.value) || 0;
            this.value = Math.floor(value / 1000) * 1000;
            
            // Garante o valor mínimo de 1000 e máximo permitido
            if (this.value < 1000 && this.value > 0) this.value = 1000;
            if (this.value > maxDiscountPoints) this.value = maxDiscountPoints;
            
            // Atualiza o campo oculto
            pointsHidden.value = this.value;
            
            updateTotal();
            
            // Log para debug
            console.log('Valor dos pontos alterado para:', this.value);
            console.log('Valor do campo oculto:', pointsHidden.value);
          });
          
          pointsInput.addEventListener('input', function() {
            // Atualiza o campo oculto
            pointsHidden.value = this.value;
            updateTotal();
          });
        }
        
        if (maxPointsBtn) {
          maxPointsBtn.addEventListener('click', function() {
            // Define o valor máximo permitido
            pointsInput.value = maxDiscountPoints;
            // Atualiza o campo oculto
            pointsHidden.value = maxDiscountPoints;
            
            updateTotal();
            
            // Log para debug
            console.log('Botão máximo clicado, valor definido para:', maxDiscountPoints);
            console.log('Valor do campo oculto:', pointsHidden.value);
          });
        }
      }
      
      // Inicializa o estado
      if (usePointsCheckbox && !usePointsCheckbox.checked) {
        pointsSelector.style.display = 'none';
        loyaltyInfo.style.display = 'block';
        pointsHidden.value = '';
      }
      
      // Adiciona um evento ao formulário para garantir que os pontos sejam enviados corretamente
      document.getElementById('checkout-form').addEventListener('submit', function(e) {
        if (usePointsCheckbox.checked) {
          // Garante que o campo oculto tenha o valor correto
          pointsHidden.value = pointsInput.value;
          console.log('Formulário enviado com pontos:', pointsHidden.value);
        } else {
          // Limpa o campo oculto
          pointsHidden.value = '';
          console.log('Formulário enviado sem pontos');
        }
      });
    });

    function updateTotal() {
      const usePointsCheckbox = document.getElementById('use-points');
      const pointsInput = document.getElementById('points-input');
      const totalElement = document.querySelector('.summary-item.total span:last-child');
      const pointsPreviewText = document.getElementById('points-preview-text');
      const stripeLink = document.getElementById('stripe-link');
      
      if (usePointsCheckbox.checked && pointsInput) {
        const points = parseInt(pointsInput.value) || 0;
        console.log('Pontos selecionados:', points);
        
        // Limita o desconto a 10%
        const discountPercentage = Math.min(Math.floor(points / 1000), 10);
        console.log('Percentual de desconto:', discountPercentage + '%');
        
        const originalTotal = parseFloat('{{ $total }}');
        const discount = originalTotal * (discountPercentage / 100);
        console.log('Valor do desconto:', discount.toFixed(2) + '€');
        
        const finalTotal = originalTotal - discount;
        console.log('Total final:', finalTotal.toFixed(2) + '€');
        
        totalElement.textContent = finalTotal.toFixed(2) + '€';
        
        // Atualiza o texto de preview
        if (pointsPreviewText) {
          pointsPreviewText.textContent = `Usando ${points} pontos, você receberá ${discountPercentage}% de desconto (${discount.toFixed(2)}€)`;
        }
        
        // Atualiza o link do Stripe
        if (stripeLink) {
          stripeLink.href = "{{url('stripe', '')}}" + "/" + finalTotal.toFixed(2);
        }
      } else {
        totalElement.textContent = '{{ $total }}€';
        
        // Restaura o link do Stripe
        if (stripeLink) {
          stripeLink.href = "{{url('stripe', $total)}}";
        }
      }
    }
  </script>

</body>

</html>