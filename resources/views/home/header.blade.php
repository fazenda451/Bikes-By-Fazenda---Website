<header class="header_section">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{url('/')}}">
        <span class="logo-text">Bikes<span class="text-purple">BY</span>Fazenda</span>
      </a>

      <!-- Botão de toggle para menu mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu principal -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/motorcycle-catalog')}}">Motorcycles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/product-catalog')}}">Equipment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/deals')}}">
              <span style="color: #e74c3c; font-weight: 700;">🔥 Deals</span>
            </a>
          </li>
        </ul>

        <!-- Área do usuário -->
        <div class="user-area">
          <a href="{{url('/find-store')}}" class="btn btn-link">
            <i class="fa-solid fa-location-dot"></i>
            <span class="ms-2">Find a store</span>
          </a>
          @if (Route::has('login'))
            @auth
              <div class="dropdown">
                <a class="btn btn-link" href="#" role="button" onclick="toggleUserDropdown(event)">
                  <i class="fa-solid fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end" id="userDropdownMenu">
                  <a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('orders')}}">My Orders</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('loyalty-points')}}">Loyalty Points</a>
                  <div class="dropdown-divider"></div>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </div>
              </div>
              <a href="{{url('mycart')}}" class="btn btn-link position-relative">
                <i class="fa-solid fa-cart-shopping"></i>
                @if(isset($count) && $count > 0)
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{$count}}
                  </span>
                @endif
              </a>
              <a href="{{url('wishlist')}}" class="btn btn-link position-relative">
                <i class="fa-solid fa-heart"></i>
                <span class="wishlist-indicator"></span>
              </a>
            @else
              <a href="{{url('/login')}}" class="btn btn-link">
                <i class="fa-solid fa-right-to-bracket"></i>
              </a>
              <a href="{{url('/register')}}" class="btn btn-link">
                <i class="fa-solid fa-user-plus"></i>
              </a>
            @endauth
          @endif
        </div>
      </div>
    </div>
  </nav>

  <style>
    .header_section {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
    }

    .navbar {
      padding: 15px 0 !important;
    }

    .logo-text {
      font-size: 3rem;
      font-weight: 700;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 3px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    
    .text-purple {
      color: #9935dc !important;
    }

    .nav-link {
      color: #333 !important;
      font-weight: 500 !important;
      padding: 8px 15px !important;
      transition: color 0.3s !important;
    }

    .nav-link:hover, .nav-item.active .nav-link {
      color: #9935dc !important;
    }

    .dropdown-menu {
      border: none !important;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1) !important;
    }

    .dropdown-item:hover {
      background-color: #f8f9fa !important;
      color: #9935dc !important;
    }

    .user-area {
      display: flex !important;
      align-items: center !important;
      gap: 10px !important;
    }

    .user-area .btn-link {
      color: #333 !important;
      text-decoration: none !important;
      padding: 5px !important;
    }

    .user-area .btn-link:hover {
      color: #9935dc !important;
    }

    .position-relative {
      position: relative !important;
    }
    
    .wishlist-indicator {
      position: absolute !important;
      width: 6px !important;
      height: 6px !important;
      background-color: #9935dc !important;
      border-radius: 50% !important;
      top: 0 !important;
      right: 0 !important;
      opacity: 0 !important;
      transition: opacity 0.3s ease !important;
    }
    
    .btn-link:hover .wishlist-indicator {
      opacity: 1 !important;
    }

    /* Remover a seta padrão do dropdown-toggle */
    .dropdown-toggle::after {
      display: none !important;
    }

    /* RESPONSIVE FIXES - Apenas corrigir bugs mobile mantendo design original */
    @media (max-width: 991.98px) {
      .navbar-collapse {
        background-color: #fff !important;
        padding: 20px !important;
        margin-top: 10px !important;
        border-radius: 8px !important;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1) !important;
        border: 1px solid #e9ecef !important;
      }

      .navbar-nav {
        margin-bottom: 15px !important;
      }

      .user-area {
        justify-content: center !important;
        flex-wrap: wrap !important;
        gap: 15px !important;
        padding-top: 15px !important;
        border-top: 1px solid #e9ecef !important;
      }
      
      .user-area .btn-link {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 8px 12px !important;
        border-radius: 5px !important;
        border: 1px solid #e9ecef !important;
        background: #f8f9fa !important;
        min-width: 80px !important;
        justify-content: center !important;
      }

      .user-area .btn-link:hover {
        border-color: #9935dc !important;
        background: rgba(153, 53, 220, 0.1) !important;
      }
      
      .logo-text {
        font-size: 2.2rem !important;
        letter-spacing: 2px !important;
      }
    }

    @media (max-width: 576px) {
      .logo-text {
        font-size: 1.8rem !important;
        letter-spacing: 1px !important;
      }

      .navbar {
        padding: 10px 0 !important;
      }

      .navbar-collapse {
        padding: 15px !important;
        margin-top: 8px !important;
      }

      .user-area {
        gap: 10px !important;
      }

      .user-area .btn-link {
        min-width: 70px !important;
        padding: 6px 8px !important;
        font-size: 0.9rem !important;
      }

      .user-area .btn-link .ms-2 {
        display: none !important;
      }
    }

    @media (max-width: 400px) {
      .logo-text {
        font-size: 1.5rem !important;
        letter-spacing: 0.5px !important;
      }

      .container {
        padding-left: 10px !important;
        padding-right: 10px !important;
      }
    }
  </style>

  <style>
    /* Fix dropdown positioning on mobile */
    @media (max-width: 991.98px) {
      .dropdown-menu {
        position: static !important;
        float: none !important;
        box-shadow: none !important;
        border: 1px solid #e9ecef !important;
        border-radius: 5px !important;
        margin-top: 5px !important;
      }

      .dropdown.show .dropdown-menu {
        display: block !important;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Melhorar comportamento mobile do menu
      const navbarToggler = document.querySelector('.navbar-toggler');
      const navbarCollapse = document.querySelector('.navbar-collapse');
      
      // Fechar menu quando clicar em links (mobile)
      if (window.innerWidth <= 991) {
        document.querySelectorAll('.nav-link').forEach(link => {
          link.addEventListener('click', () => {
            navbarCollapse.classList.remove('show');
            navbarToggler.classList.add('collapsed');
            navbarToggler.setAttribute('aria-expanded', 'false');
          });
        });
      }
    });
  </script>

  <script>
    function toggleUserDropdown(event) {
      event.preventDefault();
      var dropdownMenu = document.getElementById('userDropdownMenu');
      
      if (dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
      } else {
        dropdownMenu.classList.add('show');
      }
      
      // Fechar o dropdown quando clicar fora dele
      document.addEventListener('click', function closeDropdown(e) {
        if (!e.target.closest('.dropdown')) {
          dropdownMenu.classList.remove('show');
          document.removeEventListener('click', closeDropdown);
        }
      });
      
      // Impedir que o clique no dropdown feche ele mesmo
      event.stopPropagation();
    }
  </script>
</header>