<header class="header">
  <style>
      .logout input[type="submit"] {
          background-color: #6a1b9a; /* Roxo escuro */
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          cursor: pointer;
          transition: background-color 0.3s ease;
      }

      .logout input[type="submit"]:hover {
          background-color: #9c4dcc; /* Roxo mais claro */
      }

      /* Estilo para as dropdowns */
      .dropdown-menu.custom-dropdown {
          background-color: #343a40; /* Fundo escuro */
          border: none;
          color: #f8f9fa; /* Texto cinza claro */
      }

      .dropdown-menu.custom-dropdown .dropdown-item {
          color: #f8f9fa; /* Texto cinza claro */
      }

      .dropdown-menu.custom-dropdown .dropdown-item:hover {
          background-color: #495057; /* Cor de fundo ao passar o mouse */
      }

      .dropdown-menu.custom-dropdown .dropdown-divider {
          border-color: #495057; /* Cor do divisor */
      }

      .dropdown-menu.custom-dropdown .dropdown-item small {
          color: #adb5bd; /* Cor do texto pequeno (tempo) */
      }

      /* Alinhar notificações e perfil lado a lado */
      .navbar-nav {
          display: flex;
          align-items: center;
          gap: 10px; /* Espaço entre os itens */
      }
  </style>
 <header class="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="navbar-header">
        <a href="/admin/dashboard" class="navbar-brand">
          <div class="brand-text brand-big visible text-uppercase">
            <strong class="text-primary">BBF</strong><strong>Admin</strong>
          </div>
          <div class="brand-text brand-sm">
            <strong class="text-primary">B</strong><strong>A</strong>
          </div>
        </a>
      <!-- Sidebar Toggle Btn-->
      <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
    </div>

          <!-- Dropdown de Notificações e Perfil -->
          <div class="navbar-nav">
              <!-- Notificações -->
              <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                      <i class="fa fa-bell me-lg-2"></i>
                      <span class="d-none d-lg-inline-flex">Notifications</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end custom-dropdown">
                      <a href="#" class="dropdown-item">
                          <h6 class="fw-normal mb-0">New motorcycle listing: Yamaha MT-07</h6>
                          <small>10 minutes ago</small>
                      </a>
                      <hr class="dropdown-divider">
                      <a href="#" class="dropdown-item">
                          <h6 class="fw-normal mb-0">Your offer on Honda CBR600RR was accepted</h6>
                          <small>30 hours ago</small>
                      </a>
                      <hr class="dropdown-divider">
                      <a href="#" class="dropdown-item">
                          <h6 class="fw-normal mb-0">New message from a seller</h6>
                          <small>1 day ago</small>
                      </a>
                      <hr class="dropdown-divider">
                      <a href="#" class="dropdown-item text-center">See all notifications</a>
                  </div>
              </div>

              <!-- Perfil -->
              <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                      <i class="fa fa-user me-lg-2"></i> <!-- Ícone no lugar da foto -->
                      <span class="d-none d-lg-inline-flex">Profile</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end custom-dropdown">
                    <a href="#" class="dropdown-item">My Profile</a>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>
                </div>
                
                  </div>
              </div>
          </div>
      </div>
  </nav>
</header>

<script>
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hidden');
  });
</script>