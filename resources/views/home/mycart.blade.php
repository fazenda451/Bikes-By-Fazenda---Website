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
    }

    .cart-total {
      font-size: 1.5rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 2rem;
      text-align: right;
    }

    .checkout-form {
      background: white;
      border-radius: 8px;
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
        <div class="cart-container">
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
              @foreach ($cart as $item)
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      @if($item->is_motorcycle)
                        <img src="{{ $item->motorcycle->photos->first() ? asset('motorcycles/' . $item->motorcycle->photos->first()->image) : asset('images/no-image.jpg') }}" alt="{{$item->motorcycle->name}}" class="product-image me-3">
                        <div>
                          <div class="product-title">{{$item->motorcycle->name}}</div>
                          <small class="text-muted">Moto</small>
                        </div>
                      @else
                        <img src="/products/{{$item->product->image}}" alt="{{$item->product->title}}" class="product-image me-3">
                        <div>
                          <div class="product-title">{{$item->product->title}}</div>
                          <small class="text-muted">Disponível: {{$item->product->Quantity}} unidades</small>
                          @if($item->size)
                          <div><small class="text-muted">Tamanho: {{$item->size}}</small></div>
                          @endif
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
                      1
                    @else
                      <form action="{{ url('update_quantity') }}" method="POST" class="quantity-controls">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{$item->id}}">
                        <input type="number" name="quantity" value="{{$item->quantity}}" min="1" max="{{$item->product->Quantity}}" class="quantity-input">
                        <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                      </form>
                      
                      @if($item->size)
                      <form action="{{ url('update_size') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{$item->id}}">
                        <div class="d-flex">
                          <select name="size" class="form-control form-control-sm" style="width: auto;">
                            @foreach(['P', 'M', 'G', 'GG', 'XG'] as $size)
                              <option value="{{ $size }}" {{ $item->size == $size ? 'selected' : '' }}>{{ $size }}</option>
                            @endforeach
                          </select>
                          <button type="submit" class="btn btn-sm btn-secondary ms-1">Alterar</button>
                        </div>
                      </form>
                      @endif
                    @endif
                  </td>
                  <td>
                    @if($item->is_motorcycle)
                      {{$item->motorcycle->price}}€
                      <?php $total += $item->motorcycle->price; ?>
                    @else
                      {{$item->product->price * $item->quantity}}€
                      <?php $total += $item->product->price * $item->quantity; ?>
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

        <div class="row">
          <div class="col-md-8">
            <div class="checkout-form">
              <form action="{{url('comfirm_order')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label class="form-label">Nome do Destinatário</label>
                  <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Endereço de Entrega</label>
                  <textarea name="address" class="form-control">{{Auth::user()->address}}</textarea>
                </div>

                <div class="form-group">
                  <label class="form-label">Telefone</label>
                  <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn-payment btn-cash">Pagar na Entrega</button>
                  <a href="{{url('stripe', $total)}}" class="btn-payment btn-card">
                    <i class="fas fa-credit-card me-2"></i>Pagar com Cartão
                  </a>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-4">
            <div class="cart-summary">
              <div class="cart-total">
                Total: {{$total}}€
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!-- info section -->

  @include('home.footer')

  <script>
    function updateQuantity(form) {
      const input = form.querySelector('.quantity-input');
      const maxQuantity = parseInt(input.getAttribute('max'));
      const currentQuantity = parseInt(input.value);

      if (currentQuantity > maxQuantity) {
        input.value = maxQuantity;
        toastr.warning('Quantidade ajustada para o máximo disponível em estoque');
      }

      form.submit();
    }

    function decreaseQuantity(button) {
      const input = button.parentElement.querySelector('.quantity-input');
      if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
        updateQuantity(button.parentElement);
      }
    }

    function increaseQuantity(button) {
      const input = button.parentElement.querySelector('.quantity-input');
      const maxQuantity = parseInt(input.getAttribute('max'));
      const currentQuantity = parseInt(input.value);

      if (currentQuantity < maxQuantity) {
        input.value = currentQuantity + 1;
        updateQuantity(button.parentElement);
      } else {
        toastr.warning('Quantidade máxima disponível em estoque atingida');
      }
    }
  </script>

</body>

</html>