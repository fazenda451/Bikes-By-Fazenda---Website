<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

  <style type="text/css">
    .product-details {
      padding: 60px 0;
      background-color: #f8f9fa;
    }

    .product-container {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin-bottom: 30px;
    }

    .product-image-container {
      position: relative;
      margin-bottom: 20px;
    }

    .product-image {
      width: 100%;
      height: auto;
      object-fit: contain;
      border-radius: 4px;
    }

    .product-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 15px;
      border-bottom: 2px solid #9935dc;
      padding-bottom: 10px;
    }

    .product-ref {
      font-size: 0.9rem;
      color: #6c757d;
      margin-bottom: 20px;
    }

    .product-price-container {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .product-price {
      font-size: 2rem;
      font-weight: 700;
      color: #9935dc;
    }

    .product-tax {
      font-size: 0.9rem;
      color: #6c757d;
      margin-left: 10px;
    }

    .product-availability {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      padding: 10px 15px;
      background-color: #e8f5e9;
      border-radius: 4px;
    }

    .availability-icon {
      color: #4caf50;
      margin-right: 10px;
      font-size: 1.2rem;
    }

    .availability-text {
      color: #2e7d32;
      font-weight: 600;
    }

    .product-options {
      margin-bottom: 30px;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 8px;
    }

    .option-title {
      font-weight: 600;
      color: #333;
      margin-bottom: 15px;
    }

    .size-options {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 20px;
    }

    .size-option {
      display: none;
    }

    .size-label {
      display: inline-block;
      padding: 10px 20px;
      background-color: white;
      border: 2px solid #dee2e6;
      border-radius: 4px;
      font-weight: 600;
      color: #495057;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .size-option:checked + .size-label {
      background-color: #9935dc;
      border-color: #9935dc;
      color: white;
    }

    .size-label:hover {
      border-color: #9935dc;
    }

    .size-guide {
      display: inline-block;
      margin-left: 15px;
      color: #9935dc;
      font-size: 0.9rem;
      text-decoration: underline;
      cursor: pointer;
    }

    .quantity-selector {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .quantity-label {
      margin-right: 15px;
      font-weight: 600;
      color: #495057;
    }

    .quantity-controls {
      display: flex;
      align-items: center;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      overflow: hidden;
    }

    .quantity-btn {
      background-color: #f8f9fa;
      border: none;
      color: #495057;
      width: 40px;
      height: 40px;
      font-size: 1.2rem;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .quantity-btn:hover {
      background-color: #e9ecef;
    }

    .quantity-input {
      width: 60px;
      height: 40px;
      border: none;
      border-left: 1px solid #dee2e6;
      border-right: 1px solid #dee2e6;
      text-align: center;
      font-weight: 600;
    }

    .quantity-input:focus {
      outline: none;
    }

    .btn-add-cart {
      width: 100%;
      background-color: #9935dc;
      color: white;
      padding: 15px 30px;
      border-radius: 4px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      border: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font-size: 1.1rem;
    }

    .btn-add-cart:hover {
      background-color: #8024c0;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(153, 53, 220, 0.3);
      color: white;
      text-decoration: none;
    }

    .btn-wishlist {
      display: block;
      width: 100%;
      padding: 12px 20px;
      background-color: #fff;
      color: #333;
      border: 1px solid #ced4da;
      border-radius: 4px;
      font-weight: 500;
      text-align: center;
      text-decoration: none;
      transition: all 0.25s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font-size: 1rem;
      margin-top: 10px;
    }

    .btn-wishlist:hover {
      background-color: #f8f9fa;
      color: #9935dc;
      border-color: #9935dc;
      text-decoration: none;
    }

    .btn-wishlist i {
      color: #9935dc;
      transition: transform 0.3s ease;
    }
    
    .btn-wishlist:hover i {
      transform: scale(1.2);
    }

    .product-features {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
    }

    .feature-item {
      flex: 1 1 calc(33.333% - 15px);
      min-width: 200px;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 15px;
      background-color: #f8f9fa;
      border-radius: 8px;
    }

    .feature-icon {
      width: 40px;
      height: 40px;
      background-color: rgba(153, 53, 220, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #9935dc;
      font-size: 1.2rem;
    }

    .feature-text {
      font-size: 0.9rem;
      color: #6c757d;
    }

    .product-description-container {
      margin-top: 30px;
    }

    .description-title {
      font-size: 1.4rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #dee2e6;
    }

    .product-description {
      font-size: 1rem;
      line-height: 1.6;
      color: #4a4a4a;
    }

    .product-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #dee2e6;
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .meta-label {
      font-size: 0.9rem;
      color: #6c757d;
    }

    .meta-value {
      font-size: 0.9rem;
      font-weight: 600;
      color: #333;
    }

    @media (max-width: 768px) {
      .product-title {
        font-size: 1.5rem;
      }

      .product-price {
        font-size: 1.5rem;
      }

      .feature-item {
        flex: 1 1 100%;
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
      <div class="product-container">
        <div class="row">
          <div class="col-md-6">
            <div class="product-image-container">
              <img src="/products/{{$data->image}}" alt="{{$data->title}}" class="product-image">
            </div>
          </div>

          <div class="col-md-6">
            <h1 class="product-title">{{$data->title}}</h1>
            <div class="product-ref">Ref: PROD-{{$data->id}}</div>
            
            <div class="product-price-container">
              <div class="product-price">{{$data->price}}€</div>
              <div class="product-tax">Impostos incluídos</div>
            </div>
            
            @if($data->Quantity > 0)
              <div class="product-availability">
                <i class="fas fa-check-circle availability-icon"></i>
                <span class="availability-text">In stock - {{$data->Quantity}} units available</span>
              </div>
            @else
              <div class="product-availability" style="background-color: #ffebee;">
                <i class="fas fa-times-circle availability-icon" style="color: #f44336;"></i>
                <span class="availability-text" style="color: #c62828;">Out of stock</span>
              </div>
            @endif
            
            <form action="{{ url('add_cart_with_size', $data->id) }}" method="POST">
              @csrf
              
              <div class="product-options">
                @if($data->size)
                  <div class="option-title">Select Size:</div>
                  <div class="size-options">
                    @php
                      $availableSizes = explode(',', $data->size);
                    @endphp
                    
                    @foreach($availableSizes as $index => $size)
                      <input type="radio" name="size" id="size-{{$index}}" value="{{ trim($size) }}" class="size-option" {{ $index === 0 ? 'checked' : '' }}>
                      <label for="size-{{$index}}" class="size-label">{{ trim($size) }}</label>
                    @endforeach
                  </div>
                  
                  <div class="text-end">
                    <span class="size-guide" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
                      <i class="fas fa-ruler"></i> Size Guide
                    </span>
                  </div>
                @else
                  <input type="hidden" name="size" value="Único">
                @endif
                
                <div class="option-title mt-4">Quantity:</div>
                <div class="quantity-selector">
                  <div class="quantity-controls">
                    <button type="button" class="quantity-btn" onclick="decrementQuantity()">-</button>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{$data->Quantity}}" class="quantity-input">
                    <button type="button" class="quantity-btn" onclick="incrementQuantity()">+</button>
                  </div>
                </div>
              </div>
              
              <button type="submit" class="btn-add-cart" {{ $data->Quantity <= 0 ? 'disabled' : '' }}>
                <i class="fas fa-shopping-cart"></i>
                Add to Cart
              </button>
            </form>
            
            <a href="{{ route('add.to.wishlist', $data->id) }}" class="btn-wishlist mt-3">
              <i class="fas fa-heart"></i>
              Add to Wishlist
            </a>
            
            <div class="product-features">
              <div class="feature-item">
                <div class="feature-icon">
                  <i class="fas fa-truck"></i>
                </div>
                <div class="feature-text">
                  <strong>Fast Delivery</strong><br>
                  2-4 business days
                </div>
              </div>
              
              <div class="feature-item">
                <div class="feature-icon">
                  <i class="fas fa-undo"></i>
                </div>
                <div class="feature-text">
                  <strong>Free Returns</strong><br>
                  Up to 30 days
                </div>
              </div>
              
              <div class="feature-item">
                <div class="feature-icon">
                  <i class="fas fa-shield-alt"></i>
                </div>
                <div class="feature-text">
                  <strong>Quality Guarantee</strong><br>
                  Certified products
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="product-description-container">
          <h2 class="description-title">Product Description</h2>
          <div class="product-description">
            {{$data->description}}
          </div>
          
          <div class="product-meta">
            <div class="meta-item">
              <div class="meta-label">Category:</div>
              <div class="meta-value">{{$data->category ? $data->category->category_name : 'No category'}}</div>
            </div>
            
            @if($data->size)
            <div class="meta-item">
              <div class="meta-label">Available Sizes:</div>
              <div class="meta-value">{{$data->size}}</div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Size Guide Modal -->
  <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sizeGuideModalLabel">Size Guide</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>European Size</th>
                  <th>Brazilian Size</th>
                  <th>Foot Length (cm)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>38</td>
                  <td>36</td>
                  <td>24.5</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>37</td>
                  <td>25.0</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>38</td>
                  <td>25.5</td>
                </tr>
                <tr>
                  <td>41</td>
                  <td>39</td>
                  <td>26.0</td>
                </tr>
                <tr>
                  <td>42</td>
                  <td>40</td>
                  <td>26.5</td>
                </tr>
                <tr>
                  <td>43</td>
                  <td>41</td>
                  <td>27.0</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td>42</td>
                  <td>27.5</td>
                </tr>
                <tr>
                  <td>45</td>
                  <td>43</td>
                  <td>28.0</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- end Products details -->

  <!-- info section -->
  @include('home.footer')
  
  <script>
    function incrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      const maxQuantity = parseInt(quantityInput.getAttribute('max'));
      let currentValue = parseInt(quantityInput.value);
      
      if (currentValue < maxQuantity) {
        quantityInput.value = currentValue + 1;
      }
    }
    
    function decrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      let currentValue = parseInt(quantityInput.value);
      
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    }
  </script>
</body>

</html>