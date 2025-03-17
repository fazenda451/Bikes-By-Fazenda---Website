<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admincss/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admincss/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('admincss/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admincss/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admincss/css/custom.css')}}">
    <!-- Favicon-->
  
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <style>
      .table_center {
        margin: 20px;
      }

      .order-table {
        width: 100%;
            border-collapse: collapse;
        }

      .order-table th {
        background-color: #2d3035;
            color: white;
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        border-bottom: 1px solid #3d4148;
      }

      .order-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #3d4148;
        vertical-align: middle;
      }

      .order-table tr:hover {
        background-color: #2d3035;
      }

      .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-block;
      }

      .status-in-progress {
        background-color: #ffc107;
        color: #212529;
      }

      .status-on-the-way {
        background-color: #17a2b8;
        color: #fff;
      }

      .status-delivered {
        background-color: #28a745;
        color: #fff;
      }

      .payment-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-block;
      }

      .payment-cash {
        background-color: #28a745;
        color: #fff;
      }

      .payment-card {
        background-color: #007bff;
        color: #fff;
      }

      .payment-pending {
        background-color: #dc3545;
        color: #fff;
      }

      .payment-paypal {
        background-color: #17a2b8;
        color: #fff;
      }

      .delivery-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 5px;
      }

      .delivery-home {
        background-color: #28a745;
        color: #fff;
      }

      .delivery-store {
        background-color: #07b9ff;
        color: #fff;
      }

      .btn-action {
        padding: 5px 10px;
        font-size: 0.8rem;
        margin-right: 5px;
      }

      .search-container {
        margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

      .search-input {
        background-color: #2d3035;
        border: 1px solid #3d4148;
        color: white;
        padding: 10px 15px;
        border-radius: 4px;
        width: 300px;
        margin-right: 10px;
      }

      .search-input:focus {
        outline: none;
        border-color: #9935dc;
      }

      .filter-container {
        display: flex;
        align-items: center;
        margin-left: 20px;
      }

      .filter-label {
        color: #adb5bd;
        margin-right: 10px;
      }

      .filter-select {
        background-color: #2d3035;
        border: 1px solid #3d4148;
        color: white;
        padding: 8px 15px;
        border-radius: 4px;
      }

      .filter-select:focus {
        outline: none;
        border-color: #9935dc;
      }

      .btn-view-details {
        background-color: #9935dc;
        color: white;
        border: none;
            padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
      }

      .btn-view-details:hover {
        background-color: #8024c0;
            color: white;
        }

      /* Modal Styles */
      .modal-content {
        background-color: #2d3035;
        color: #fff;
      }

      .modal-header {
        border-bottom: 1px solid #3d4148;
      }

      .modal-title {
        color: #fff;
      }

      .modal-footer {
        border-top: 1px solid #3d4148;
      }

      .close {
        color: #fff;
      }

      .close:hover {
        color: #adb5bd;
      }

      .product-table {
        width: 100%;
        margin-top: 20px;
      }

      .product-table th {
        background-color: #3d4148;
        color: #fff;
        padding: 10px;
        text-align: left;
      }

      .product-table td {
        padding: 10px;
        border-bottom: 1px solid #3d4148;
        vertical-align: middle;
      }

      .product-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
      }

      .order-summary {
        margin-top: 20px;
        text-align: right;
        font-size: 1.2rem;
        font-weight: 600;
        color: #9935dc;
      }

      .status-actions {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #3d4148;
      }

      .status-actions-title {
        font-size: 0.9rem;
        color: #adb5bd;
        margin-bottom: 10px;
      }

      .order-info {
        background-color: #343a40;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 10px;
      }

      .order-info-label {
        color: #adb5bd;
        font-size: 0.9rem;
        margin-bottom: 5px;
      }

      .order-info-value {
        color: #fff;
        font-size: 1rem;
        font-weight: 500;
      }

      .no-results {
        text-align: center;
        padding: 30px;
        color: #adb5bd;
        }
    </style>
  </head>
  <body class="order-page">
    @include('admin.header')
    
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Gerenciamento de Pedidos</h2>
        </div>
      </div>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="search-container">
                <input type="text" id="orderSearch" class="search-input" placeholder="Pesquisar pedido (número, cliente, etc.)">
                
                <div class="filter-container">
                  <span class="filter-label">Status:</span>
                  <select id="statusFilter" class="filter-select">
                    <option value="all">Todos</option>
                    <option value="in progress">Em Processamento</option>
                    <option value="On the way">Em Trânsito</option>
                    <option value="Delivered">Entregue</option>
                  </select>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Number</th>
                      <th>Date</th>
                      <th>Customer</th>
                      <th>Phone</th>
                      <th>Delivery</th>
                      <th>Items</th>
                      <th>Total</th>
                      <th>Status</th>
          
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="ordersTableBody">
                    @php
                      $groupedOrders = collect($data)->groupBy('order_number');
                    @endphp

                    @foreach($groupedOrders as $orderNumber => $orderItems)
                      @php
                        $firstItem = $orderItems->first();
                        $orderTotal = $orderItems->sum(function($item) {
                          if(isset($item->is_motorcycle) && $item->is_motorcycle) {
                            return $item->motorcycle->price;
                          } else {
                            return $item->product->price * $item->quantity;
                          }
                        });
                        $orderDate = date('d/m/Y H:i', strtotime($firstItem->created_at));
                        $statusColors = [
                          'in progress' => 'status-in-progress',
                          'On the way' => 'status-on-the-way',
                          'Delivered' => 'status-delivered'
                        ];
                        $mainStatus = $orderItems->pluck('status')->contains('in progress') ? 'in progress' : 
                                      ($orderItems->pluck('status')->contains('On the way') ? 'On the way' : 'Delivered');
                        $statusText = [
                          'in progress' => 'Em Processamento',
                          'On the way' => 'Em Trânsito',
                          'Delivered' => 'Entregue'
                        ];
                      @endphp
                      <tr class="order-row" data-order-number="{{ $orderNumber }}" data-status="{{ $mainStatus }}" data-client="{{ $firstItem->name }}" data-date="{{ $firstItem->created_at }}">
                        <td>{{ $orderNumber }}</td>
                        <td>{{ $orderDate }}</td>
                        <td>{{ $firstItem->name }}</td>
                        <td>{{ $firstItem->phone }}</td>
                        <td>
                          @if($firstItem->delivery_method == 'home')
                            <span class="delivery-badge delivery-home">
                              <i class="fa fa-home"></i> Home
                            </span>
                          @else
                            <span class="delivery-badge delivery-store">
                              <i class="fa fa-store"></i> Shop: {{ $firstItem->store_location }}
                            </span>
                          @endif
                        </td>
                        <td>{{ $orderItems->count() }} products</td>
                        <td>{{ $orderTotal }}€</td>
                        <td>
                          <span class="status-badge {{ str_replace(' ', '-', $statusColors[$mainStatus] ?? '') }}">
                            {{ $statusText[$mainStatus] ?? $mainStatus }}
                          </span>
                        </td>
                        
                        <td>
                          <div class="btn-group">
                            <button class="btn-view-details" data-toggle="modal" data-target="#orderModal-{{ $orderNumber }}">
                              <i class="fa fa-eye"></i> Details
                            </button>
                            </div>
                          </div>
                        </td>
               </tr>
                    @endforeach
                  </tbody>
                </table>
                <div id="noResults" class="no-results" style="display: none;">
                  <i class="fa fa-search fa-3x mb-3"></i>
                  <h4>No orders found</h4>
                  <p>Try adjusting the search criteria</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Modais de Detalhes -->
      @foreach($groupedOrders as $orderNumber => $orderItems)
        @php
          $firstItem = $orderItems->first();
          $orderTotal = $orderItems->sum(function($item) {
            if(isset($item->is_motorcycle) && $item->is_motorcycle) {
              return $item->motorcycle->price;
            } else {
              return $item->product->price * $item->quantity;
            }
          });
          $orderDate = date('d/m/Y H:i', strtotime($firstItem->created_at));
          $statusColors = [
            'in progress' => 'status-in-progress',
            'On the way' => 'status-on-the-way',
            'Delivered' => 'status-delivered'
          ];
          $statusText = [
            'in progress' => 'Em Processamento',
            'On the way' => 'Em Trânsito',
            'Delivered' => 'Entregue'
          ];
        @endphp
        <div class="modal fade" id="orderModal-{{ $orderNumber }}" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel-{{ $orderNumber }}" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel-{{ $orderNumber }}">Detalhes do Pedido #{{ $orderNumber }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="order-info">
                      <div class="order-info-label">Customer</div>
                      <div class="order-info-value">{{ $firstItem->name }}</div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="order-info">
                      <div class="order-info-label">Phone</div>
                      <div class="order-info-value">{{ $firstItem->phone }}</div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="order-info">
                      <div class="order-info-label">Date</div>
                      <div class="order-info-value">{{ $orderDate }}</div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="order-info">
                      <div class="order-info-label">Payment Method</div>
                      <div class="order-info-value">{{ $firstItem->payment_status }}</div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <div class="order-info">
                      <div class="order-info-label">Delivery Method</div>
                      <div class="order-info-value">
                        @if($firstItem->delivery_method == 'home')
                          <span class="delivery-badge delivery-home">
                            <i class="fa fa-home"></i> Home Delivery
                          </span>
                          <div class="mt-2">
                            <strong>Address:</strong><br>
                            {{ $firstItem->rec_address }}
                          </div>
                        @else
                          <span class="delivery-badge delivery-store">
                            <i class="fa fa-store"></i> Shop Delivery
                          </span>
                          <div class="mt-2">
                            <strong>Location:</strong><br>
                            {{ $firstItem->store_location }}
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="product-table">
                    <thead>
                      <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Qtd</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Imagem</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orderItems as $item)
                        <tr>
                          <td>
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                              {{ $item->motorcycle->name }} <small>(Moto)</small>
                            @else
                              {{ $item->product->title }}
                              @if($item->size)
                              <br><small class="text-muted">Tamanho: {{ $item->size }}</small>
                              @endif
                            @endif
                          </td>
                          <td>
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                              {{ $item->motorcycle->price }}€
                            @else
                              {{ $item->product->price }}€
                            @endif
                          </td>
                          <td>
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                              1
                            @else
                              {{ $item->quantity }}
                            @endif
                    </td>
                    <td>
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                              {{ $item->motorcycle->price }}€
                        @else
                              {{ $item->product->price * $item->quantity }}€
                        @endif
                    </td>
                    <td>
                            <span class="status-badge {{ str_replace(' ', '-', $statusColors[$item->status] ?? '') }}">
                              {{ $statusText[$item->status] ?? $item->status }}
                            </span>
                          </td>
                          <td>
                            @if(isset($item->is_motorcycle) && $item->is_motorcycle)
                              @if($item->motorcycle->photos && $item->motorcycle->photos->isNotEmpty())
                                <img src="{{ asset('motorcycles/' . $item->motorcycle->photos->first()->image) }}" class="product-image">
                              @else
                                <img src="{{ asset('images/no-image.jpg') }}" class="product-image">
                              @endif
                            @else
                              <img src="products/{{ $item->product->image }}" class="product-image">
                            @endif
                    </td>

                </tr>
                @endforeach
                    </tbody>
            </table>
                </div>

                <div class="order-summary">
                  Total do Pedido: {{ $orderTotal }}€
                </div>

                <div class="status-actions">
                  <div class="status-actions-title">Atualizar status de todos os itens:</div>
                  <a href="{{ url('update_all_status', ['order_number' => $orderNumber, 'status' => 'On the way']) }}" class="btn btn-info">
                    <i class="fa fa-truck"></i> Marcar Todos Em Trânsito
                  </a>
                  <a href="{{ url('update_all_status', ['order_number' => $orderNumber, 'status' => 'Delivered']) }}" class="btn btn-success">
                    <i class="fa fa-check"></i> Marcar Todos Entregues
                  </a>
                </div>
              </div>
              <div class="modal-footer">
                <a href="{{ url('print_pdf', $orderNumber) }}" class="btn btn-secondary">
                  <i class="fa fa-file-pdf-o"></i> Imprimir PDF
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>

    <script>
      $(document).ready(function() {
        // Pesquisa em tempo real
        $("#orderSearch").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          filterOrders();
        });

        // Filtro por status
        $("#statusFilter").on("change", function() {
          filterOrders();
        });

        function filterOrders() {
          var searchValue = $("#orderSearch").val().toLowerCase();
          var statusValue = $("#statusFilter").val();
          var visibleCount = 0;

          $(".order-row").each(function() {
            var orderNumber = $(this).data("order-number").toLowerCase();
            var clientName = $(this).data("client").toLowerCase();
            var status = $(this).data("status");
            var date = $(this).data("date");
            
            var matchesSearch = orderNumber.includes(searchValue) || 
                               clientName.includes(searchValue) ||
                               $(this).text().toLowerCase().includes(searchValue);
            
            var matchesStatus = statusValue === "all" || status === statusValue;

            if (matchesSearch && matchesStatus) {
              $(this).show();
              visibleCount++;
            } else {
              $(this).hide();
            }
          });

          // Mostrar mensagem se não houver resultados
          if (visibleCount === 0) {
            $("#noResults").show();
          } else {
            $("#noResults").hide();
          }
        }
      });
    </script>
  </body>
</html>
