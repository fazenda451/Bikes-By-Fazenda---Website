<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

  <style type="text/css">
    .product-details {
      padding: 60px 0;
      background-color: #f8f9fa;
    }

    .product-image-container {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .product-image {
      width: 100%;
      height: auto;
      object-fit: contain;
      border-radius: 4px;
    }

    .product-info {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    .product-title {
      font-size: 2rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
      border-bottom: 3px solid #9935dc;
      padding-bottom: 10px;
    }

    .product-price {
      font-size: 1.8rem;
      font-weight: 600;
      color: #9935dc;
      margin-bottom: 20px;
    }

    .product-meta {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .meta-item {
      background: #f8f9fa;
      padding: 15px;
      border-radius: 6px;
      text-align: center;
    }

    .meta-label {
      font-size: 0.9rem;
      color: #6c757d;
      margin-bottom: 5px;
    }

    .meta-value {
      font-size: 1.1rem;
      font-weight: 600;
      color: #333;
    }

    .product-description {
      font-size: 1.1rem;
      line-height: 1.6;
      color: #4a4a4a;
      margin-top: 30px;
      padding-top: 30px;
      border-top: 1px solid #dee2e6;
    }

    .add-to-cart {
      margin-top: 30px;
    }

    .btn-add-cart {
      background-color: #9935dc;
      color: white;
      padding: 12px 30px;
      border-radius: 4px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }

    .btn-add-cart:hover {
      background-color: #8024c0;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(153, 53, 220, 0.3);
      color: white;
      text-decoration: none;
    }

    @media (max-width: 768px) {
      .product-title {
        font-size: 1.5rem;
      }

      .product-price {
        font-size: 1.3rem;
      }

      .product-meta {
        grid-template-columns: 1fr;
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
  
    <!-- Products details start -->

    <section class="product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="product-image-container">
            <img src="/products/{{$data->image}}" alt="{{$data->title}}" class="product-image">
          </div>
        </div>

        <div class="col-md-6">
          <div class="product-info">
            <h1 class="product-title">{{$data->title}}</h1>
            <div class="product-price">{{$data->price}}€</div>

            <div class="product-meta">
              <div class="meta-item">
                <div class="meta-label">Categoria</div>
                <div class="meta-value">{{$data->category ? $data->category->category_name : 'Sem categoria'}}</div>
              </div>

              <div class="meta-item">
                <div class="meta-label">Quantidade Disponível</div>
                <div class="meta-value">{{$data->Quantity}}</div>
              </div>
            </div>

            <div class="product-description">
              {{$data->description}}
            </div>

            <div class="add-to-cart">
              @php
                $sizes = ['P', 'M', 'G', 'GG', 'XG'];
              @endphp
              
              <form action="{{ url('add_cart_with_size', $data->id) }}" method="POST" class="mb-3">
                @csrf
                <div class="form-group mb-3">
                  <label for="size" class="form-label">Selecione o Tamanho:</label>
                  <select name="size" id="size" class="form-control" style="width: 200px;">
                    @foreach($sizes as $size)
                      <option value="{{ $size }}">{{ $size }}</option>
                    @endforeach
                  </select>
                </div>
                
                <button type="submit" class="btn-add-cart">
                  <i class="fas fa-shopping-cart"></i>
                  Adicionar ao Carrinho
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


    <!-- end Products details -->


  <!-- info section -->

  @include('home.footer')

</body>

</html>