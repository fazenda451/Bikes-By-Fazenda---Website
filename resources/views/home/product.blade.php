<section class="products-section">
  <div class="container">
    <div class="row g-4">
      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="{{url('product_details',$products->id)}}" class="product-link">
          <div class="product-card">
            <div class="product-image">
              <div class="image-wrapper">
                <img src="products/{{$products->image}}" alt="{{$products->title}}" class="img-fluid">
              </div>
              <div class="product-overlay">
                <div class="view-details">
                  <i class="fas fa-search-plus"></i>
                  <span>View Details</span>
                </div>
              </div>
              @if($products->discount_price)
                <div class="product-tag">
                  <span>SALE</span>
                </div>
              @endif
            </div>
            <div class="product-info">
              <h3 class="product-title">{{$products->title}}</h3>
              <div class="product-price">
                <span class="price">€{{$products->price}}</span>
                @if($products->discount_price)
                  <span class="original-price">€{{$products->discount_price}}</span>
                @endif
              </div>
              <div class="product-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    
    <div class="text-center mt-5">
      <a href="{{ url('product-catalog') }}" class="view-all-btn">
        <span>View All Products</span>
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>

  <style>
    .products-section {
      padding: 4rem 0;
    }

    .product-link {
      text-decoration: none;
      color: inherit;
      display: block;
    }

    .product-card {
      background: #fff;
      transition: all 0.3s ease;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      position: relative;
      margin-bottom: 20px;
      border: 1px solid rgba(0, 0, 0, 0.05);
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .product-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(153, 53, 220, 0.15);
      border-color: rgba(153, 53, 220, 0.2);
    }

    .product-image {
      position: relative;
      overflow: hidden;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      background: #f8f9fa;
    }
    
    .image-wrapper {
      position: relative;
      padding-top: 75%; /* 4:3 Aspect Ratio */
      width: 100%;
      overflow: hidden;
    }

    .product-image img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit:contain;
      object-position: center;
      display: block;
      transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
      transform: scale(1.08);
    }
    
    .product-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(153, 53, 220, 0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .product-card:hover .product-overlay {
      opacity: 1;
    }
    
    .view-details {
      color: white;
      text-align: center;
      transform: translateY(20px);
      transition: transform 0.3s ease;
    }
    
    .product-card:hover .view-details {
      transform: translateY(0);
    }
    
    .view-details i {
      font-size: 2rem;
      margin-bottom: 10px;
      display: block;
    }
    
    .view-details span {
      display: block;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .product-info {
      padding: 1.5rem;
      text-align: center;
      border-bottom: 3px solid #9935dc;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 0.5rem;
      line-height: 1.4;
      height: 3em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .product-price {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      margin-bottom: 0.5rem;
    }

    .price {
      font-size: 1.2rem;
      font-weight: 600;
      color: #9935dc;
    }

    .original-price {
      font-size: 0.9rem;
      color: #999;
      text-decoration: line-through;
    }
    
    .product-rating {
      color: #ffc107;
      font-size: 0.9rem;
      margin-top: auto;
    }
    
    .product-tag {
      position: absolute;
      top: 15px;
      left: 15px;
      background: #e74c3c;
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
      z-index: 1;
    }
    
    .view-all-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #9935dc;
      color: white;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(153, 53, 220, 0.3);
      gap: 10px;
    }
    
    .view-all-btn:hover {
      background-color: #8024c0;
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(153, 53, 220, 0.4);
      color: white;
    }
    
    .view-all-btn i {
      transition: transform 0.3s ease;
    }
    
    .view-all-btn:hover i {
      transform: translateX(5px);
    }

    @media (max-width: 768px) {
      .products-section {
        padding: 2rem 0;
      }
      
      .product-title {
        font-size: 1rem;
      }
    }
  </style>
</section>