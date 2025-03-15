<section class="motorcycles-section">
  <div class="container">
    <div class="row g-4">
      @foreach($motorcycles as $motorcycle)
      <div class="col-sm-6 col-md-4">
        <a href="{{url('motorcycle_details',$motorcycle->id)}}" class="motorcycle-link">
          <div class="motorcycle-card">
            <div class="motorcycle-image">
              <div class="image-wrapper">
                @if($motorcycle->photos && $motorcycle->photos->isNotEmpty())
                  <img src="{{ asset('motorcycles/' . $motorcycle->photos->first()->image) }}" alt="{{$motorcycle->model}}" class="img-fluid">
                @else
                  <img src="{{ asset('images/no-image.jpg') }}" alt="No image available" class="img-fluid">
                @endif
                @if($motorcycle->licenseType)
                  <div class="license-badge">{{ $motorcycle->licenseType->name }}</div>
                @endif
              </div>
              <div class="motorcycle-overlay">
                <div class="view-details">
                  <i class="fas fa-search-plus"></i>
                  <span>Ver Detalhes</span>
                </div>
              </div>
            </div>
            <div class="motorcycle-info">
              <h3 class="motorcycle-title">{{$motorcycle->model}}</h3>
              <div class="motorcycle-subtitle">{{$motorcycle->brand->name}}</div>
              <div class="motorcycle-price">
                <span class="price">€{{number_format($motorcycle->price, 2)}}</span>
              </div>
            </div>
            <div class="motorcycle-badge">
              <span>NOVA</span>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    
    <div class="text-center mt-5">
      <a href="{{ url('motorcycle-catalog') }}" class="view-all-btn">
        <span>Ver Todas as Motos</span>
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>

  <style>
    .motorcycles-section {
      padding: 4rem 0;
    }

    .motorcycle-link {
      text-decoration: none;
      color: inherit;
      display: block;
    }

    .motorcycle-card {
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

    .motorcycle-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(153, 53, 220, 0.15);
      border-color: rgba(153, 53, 220, 0.2);
    }

    .motorcycle-image {
      background: #f8f9fa;
      text-align: center;
      position: relative;
      overflow: hidden;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }
    
    .image-wrapper {
      position: relative;
      padding-top: 75%; /* 4:3 Aspect Ratio */
      width: 100%;
      overflow: hidden;
    }

    .motorcycle-image img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      display: block;
      transition: transform 0.5s ease;
    }

    .motorcycle-card:hover .motorcycle-image img {
      transform: scale(1.08);
    }
    
    .motorcycle-overlay {
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
    
    .motorcycle-card:hover .motorcycle-overlay {
      opacity: 1;
    }
    
    .view-details {
      color: white;
      text-align: center;
      transform: translateY(20px);
      transition: transform 0.3s ease;
    }
    
    .motorcycle-card:hover .view-details {
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

    .motorcycle-info {
      padding: 1.5rem;
      text-align: center;
      border-bottom: 3px solid #9935dc;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .motorcycle-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 0.25rem;
      line-height: 1.4;
      height: 2.8em;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .motorcycle-subtitle {
      font-size: 1rem;
      color: #666;
      margin-bottom: 0.5rem;
    }

    .motorcycle-price {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: auto;
    }

    .price {
      font-size: 1.2rem;
      font-weight: 600;
      color: #9935dc;
    }
    
    .motorcycle-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      background: #9935dc;
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 3px 10px rgba(153, 53, 220, 0.3);
      z-index: 1;
    }

    .license-badge {
      position: absolute;
      top: 15px;
      left: 15px;
      background: rgba(153, 53, 220, 0.85);
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
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
      .motorcycles-section {
        padding: 2rem 0;
      }

      .motorcycle-title {
        font-size: 1.1rem;
      }
    }
  </style>
</section>