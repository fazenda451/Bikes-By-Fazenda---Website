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
            <a class="nav-link" href="#">Accessories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Promotions</a>
          </li>
        </ul>

        <!-- Área do usuário -->
        <div class="user-area">
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
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar {
      padding: 15px 0;
    }

    .logo-text {
      font-size: 1.8rem;
      font-weight: 700;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .text-purple {
      color: #9935dc !important;
    }

    .nav-link {
      color: #333 !important;
      font-weight: 500;
      padding: 8px 15px !important;
      transition: color 0.3s;
    }

    .nav-link:hover, .nav-item.active .nav-link {
      color: #9935dc !important;
    }

    .dropdown-menu {
      border: none;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item:hover {
      background-color: #f8f9fa;
      color: #9935dc;
    }

    .user-area {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-area .btn-link {
      color: #333;
      text-decoration: none;
      padding: 5px;
    }

    .user-area .btn-link:hover {
      color: #9935dc;
    }

    .position-relative {
      position: relative;
    }
    
    .wishlist-indicator {
      position: absolute;
      width: 6px;
      height: 6px;
      background-color: #9935dc;
      border-radius: 50%;
      top: 0;
      right: 0;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .btn-link:hover .wishlist-indicator {
      opacity: 1;
    }

    /* Remover a seta padrão do dropdown-toggle */
    .dropdown-toggle::after {
      display: none;
    }

    @media (max-width: 991.98px) {
      .navbar-collapse {
        background-color: #fff;
        padding: 15px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 1000;
      }

      .user-area {
        margin-top: 15px;
        justify-content: center;
        flex-wrap: wrap;
      }
      
      .navbar-brand {
        max-width: 70%;
      }
      
      .logo-text {
        font-size: 1.5rem;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Inicializa os dropdowns do Bootstrap
      var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
      var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl)
      })
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