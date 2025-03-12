<div class="hero-slider">
  <div class="container">
    <div class="row align-items-center">
      <!-- Conteúdo no lado esquerdo -->
      <div class="col-lg-6 hero-content">
        <div class="logo-container">
          <div class="logo">
            <span class="logo-text">Bikes<span class="highlight">BY</span>Fazenda</span>
                    </div>
                  </div>
        <h1 class="hero-title">Premium Motorcycles & Equipment</h1>
        <p class="hero-subtitle">Discover the thrill of the ride with our exclusive collection</p>
        <div class="hero-buttons">
          <a href="#motorcycles" class="btn btn-primary">Explore Motorcycles</a>
          <a href="#products" class="btn btn-outline">View Equipment</a>
                    </div>
                  </div>
      
      <!-- Imagem no lado direito -->
      <div class="col-lg-6 hero-image-container">
        <img src="{{ asset('images/v4.jpg') }}" alt="Motorcycle" class="hero-image">
                </div>
              </div>
            </div>
            
  <!-- Overlay de fundo -->
  <div class="hero-background">
    <div class="overlay"></div>
          </div>
          
  <style>
    .hero-slider {
      position: relative;
      padding: 80px 0;
      min-height: 600px;
      overflow: hidden;
      display: flex;
      align-items: center;
    }
    
    .hero-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background-color: #1a1a1a;
    }
    
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, 
        rgba(25, 25, 25, 0.95) 0%, 
        rgba(75, 20, 120, 0.85) 50%, 
        rgba(153, 53, 220, 0.75) 100%);
    }
    
    .hero-content {
      color: white;
      padding-right: 30px;
      animation: fadeInLeft 1.2s ease-out;
    }
    
    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    
    .logo-container {
      margin-bottom: 30px;
    }
    
    .logo {
      display: inline-block;
      animation: pulsate 3s infinite;
    }
    
    @keyframes pulsate {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
      100% {
        transform: scale(1);
      }
    }
    
    .logo-text {
      font-size: 3rem;
      font-weight: 700;
      color: white;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    
    .highlight {
      color: #9935dc;
      margin: 0 5px;
    }
    
    .hero-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    
    .hero-subtitle {
      font-size: 1.2rem;
      margin-bottom: 30px;
      line-height: 1.6;
      text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    
    .hero-buttons {
      display: flex;
      gap: 15px;
    }
    
    .hero-image-container {
      text-align: center;
      animation: fadeInRight 1.2s ease-out;
      position: relative;
      z-index: 1;
    }
    
    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    
    .hero-image {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      transition: transform 0.5s ease;
      border: 3px solid rgba(153, 53, 220, 0.3);
    }
    
    .hero-image:hover {
      transform: scale(1.03);
      border-color: rgba(153, 53, 220, 0.6);
    }
    
    .btn {
      padding: 12px 25px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 30px;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
    }
    
    .btn-primary {
      background-color: #9935dc;
      color: white;
      border: 2px solid #9935dc;
    }
    
    .btn-primary:hover {
      background-color: #7928a9;
      border-color: #7928a9;
    }
    
    .btn-outline {
      background-color: transparent;
      color: white;
      border: 2px solid white;
    }
    
    .btn-outline:hover {
      background-color: white;
      color: #333;
    }
    
    /* Responsive styles */
    @media (max-width: 991px) {
      .hero-content {
        padding-right: 0;
        margin-bottom: 40px;
        text-align: center;
      }
      
      .hero-buttons {
        justify-content: center;
      }
      
      .hero-image {
        max-width: 80%;
      }
    }
    
    @media (max-width: 768px) {
      .hero-slider {
        padding: 60px 0;
      }
      
      .logo-text {
        font-size: 2.5rem;
      }
      
      .hero-title {
        font-size: 2rem;
      }
      
      .hero-subtitle {
        font-size: 1rem;
      }
      
      .hero-image {
        max-width: 100%;
      }
    }
    
    @media (max-width: 576px) {
      .hero-buttons {
        flex-direction: column;
      }
      
      .btn {
        width: 100%;
        margin-bottom: 10px;
      }
    }
  </style>
      </div>