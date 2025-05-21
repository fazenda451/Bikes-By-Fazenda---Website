<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <style>
    /* Estilos existentes */
    .text-primary {
      color: #9b59b6 !important;
    }

    .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 250px;
    height: 100vh;
    overflow-y: auto;
    background-color: #34495e;
    color: #ecf0f1;
    padding: 20px;
    transition: transform 0.3s ease-in-out;
    z-index: 999;
  }

  .content {
    margin-left: 250px; /* Espaço para a sidebar */
    transition: margin-left 0.3s ease-in-out;
  }
  
    #sidebar {
      background-color: #2c3e50; /* Cor de fundo um pouco mais escura */
      color: #ecf0f1;
      padding: 20px;
      width: 250px;
      min-height: 100vh;
      box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2); /* Sombra mais pronunciada */
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
    }
  
    #sidebar.hidden {
      width: 0;
      padding: 0;
      overflow: hidden;
    }
  
    ul.list-unstyled li.active a {
      color: #9b59b6 !important;
      background-color: #243342; /* Cor de fundo mais escura para itens ativos */
      border-left: 4px solid #9b59b6; /* Borda lateral para indicar item ativo */
    }
  
    ul.list-unstyled li.active i {
      color: #9b59b6 !important;
    }
  
    .list-unstyled li a {
      color: #ecf0f1;
      text-decoration: none;
      border-radius: 6px; /* Bordas mais arredondadas */
      transition: all 0.2s ease;
      padding: 12px 15px;
      display: flex;
      align-items: center;
      margin: 5px 0;
      border-left: 4px solid transparent; /* Borda transparente para todos os itens */
    }
  
    .list-unstyled li a:hover {
      background-color: #3d5066; /* Cor de hover mais suave */
      color: #9b59b6;
      transform: translateX(3px); /* Pequeno efeito de movimento */
    }
  
    ul.list-unstyled li a:hover i {
      color: #9b59b6 !important;
      transform: scale(1.1); /* Efeito de escala no ícone */
    }
  
    .list-unstyled i {
      width: 28px;
      margin-right: 10px;
      transition: all 0.2s ease;
    }
  
    .sidebar-header {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(236, 240, 241, 0.1); /* Separador sutil */
    }
  
    .sidebar-header .title {
      display: flex;
      align-items: center;
    }
  
    .sidebar-header .title i {
      margin-right: 15px;
      color: #9b59b6;
      font-size: 1.5rem;
    }
  
    .sidebar-header .title h1 {
      margin: 0;
      font-size: 1.5rem;
      color: #ecf0f1;
      font-weight: 600; /* Texto mais destacado */
    }
  
    .heading {
      color: #9b59b6; /* Cor destacada para os cabeçalhos */
      font-size: 0.85rem;
      text-transform: uppercase;
      margin: 20px 0 10px 0;
      letter-spacing: 1px;
      font-weight: 600;
      padding-left: 10px;
      border-left: 3px solid #9b59b6; /* Borda lateral para destacar */
    }
  
    .collapse li a {
      padding-left: 40px; /* Mais indentação para submenus */
      font-size: 0.95rem; /* Texto ligeiramente menor */
    }
  
    .fa-solid fa-user {
      font-size: 40px;
    }

    .text-primary {
      color: #9b59b6 !important;
    }

    /* Estilização da barra de rolagem */
    #sidebar::-webkit-scrollbar {
      width: 5px;
    }

    #sidebar::-webkit-scrollbar-track {
      background: #2c3e50;
    }

    #sidebar::-webkit-scrollbar-thumb {
      background: #9b59b6;
      border-radius: 10px;
    }

    /* Separadores entre seções principais */
    .list-unstyled > li:not(:last-child) {
      margin-bottom: 5px;
    }

    /* Estilo para submenus */
    .collapse.list-unstyled {
      padding-left: 5px;
      margin-top: 5px;
      border-left: 1px dashed rgba(155, 89, 182, 0.3);
    }
    
    /* Espaçador para empurrar o botão para o final da sidebar */
    .sidebar-spacer {
      flex-grow: 1;
    }
    
    /* Estilo para o botão de voltar à loja */
    .back-to-shop {
      margin-top: 20px;
      padding-top: 15px;
      border-top: 1px solid rgba(236, 240, 241, 0.1);
    }
    
    .back-to-shop a {
      background-color: #9b59b6 !important;
      border-color: #9b59b6 !important;
      color: white !important;
      font-weight: 600 !important;
      transition: all 0.3s ease;
      text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }
    
    .back-to-shop a:hover {
      background-color: #8e44ad !important;
      border-color: #8e44ad !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .back-to-shop i {
      color: white !important;
    }

  @media (max-width: 991.98px) {
    .sidebar {
      transform: translateX(-100%); /* Esconde a sidebar por padrão em telas pequenas */
    }

    .sidebar.show {
      transform: translateX(0); /* Mostra a sidebar quando a classe "show" é adicionada */
    }

    .content {
      margin-left: 0; /* Remove o espaço da sidebar em telas pequenas */
    }
  }

  @media (max-width: 991.98px) {
    .sidebar {
      width: 100%;
      transform: translateX(-100%);
    }

    .sidebar.show {
      transform: translateX(0);
    }

    .overlay.show {
      display: block;
    }

    .content {
      margin-left: 0;
    }
  }
    
  </style>
</head>
<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar" class="d-block d-lg-block">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <i class="fa-solid fa-user"></i>
            <h1 class="h5">{{ auth()->user()->name }}</h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="{{url('admin/dashboard')}}"> <i class="fa-solid fa-home"></i>Home </a></li>
                <li><a href="{{url('view_category')}}"> <i class="fa-solid fa-list"></i>Category </a></li>
                <li><a href="{{url('view_brand')}}"> <i class="fa-solid fa-star"></i>Brands </a></li>
              
              <li><a href="#SpecsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                <i class="fa-solid fa-gears"></i>Motorcycle Specs </a>
                <ul id="SpecsdropdownDropdown" class="collapse list-unstyled ">
                  <li>
                    <a href="{{url('view_lubrication')}}"><i class="fa fa-droplet"></i>Lubrication Systems </a>
                  </li>
                  <li>
                    <a href="{{url('view_clutch')}}"><i class="fas fa-wrench"></i>Clutch Type </a>
                  </li>
                  <li>
                    <a href="{{url('view_ignition')}}"><i class="fa-solid fa-bolt"></i>Ignition System</a>
                  </li>
                  <li>
                    <a href="{{url('view_starting')}}"><i class="fa-solid fa-power-off"></i>Starting System</a>
                  </li>
                  <li>
                    <a href="{{url('view_transmission')}}"><i class="fa-solid fa-link"></i>Transmission System</a>
                  </li>
                  <li>
                    <a href="{{url('view_suspensions')}}"><i class="fa-solid fa-screwdriver"></i>Suspensions Type</a>
                  </li>
                  </ul>
              </li>
        </ul>
        
        <span class="heading">Products</span>
        <ul class="list-unstyled">
              <li><a href="#MotorcyclesdropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                <i class="fa-solid fa-motorcycle"></i>Motorcycles </a>
                <ul id="MotorcyclesdropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_motorcycle')}}"><i class="fa-solid fa-plus"></i>Add Motorcycle</a></li>
                  <li><a href="{{url('view_motorcycle')}}"><i class="fa-solid fa-eye"></i>View Motorcycle</a></li>
                </ul>
              </li>

              <li><a href="#ProductdropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                <i class="fa-solid fa-box"></i>Products </a>
                <ul id="ProductdropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_product')}}"><i class="fa-solid fa-plus"></i>Add Product</a></li>
                  <li><a href="{{url('view_product')}}"><i class="fa-solid fa-eye"></i>View Product</a></li>
                </ul>
              </li>
        </ul>
        
        <span class="heading">Sales</span>
        <ul class="list-unstyled">
                <li>
                  <a href="{{url('view_orders')}}"> <i class="fa-solid fa-cart-shopping"></i>Orders</a>
                </li>
        </ul>
        
        <!-- Espaçador para empurrar o botão para o final -->
        <div class="sidebar-spacer"></div>
        
        <!-- Botão para voltar à loja -->
        <div class="back-to-shop">
          <a href="{{url('/')}}" target="_blank" class="btn w-100 d-flex align-items-center justify-content-center" style="background-color: #9b59b6; color: white; font-weight: bold;">
            <i class="fa-solid fa-store me-2" style="color: white;"></i>
            Back to Store
          </a>
        </div>
      </nav>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<!-- Bootstrap JS (opcional, se precisar de funcionalidades JS do Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Adiciona classe 'active' ao item de menu atual
  document.addEventListener('DOMContentLoaded', function() {
    const currentLocation = window.location.href;
    const menuItems = document.querySelectorAll('#sidebar ul li a');
    
    menuItems.forEach(item => {
      if (currentLocation.includes(item.getAttribute('href'))) {
        item.parentElement.classList.add('active');
        
        // Se for um submenu, expande o menu
        const parentCollapse = item.closest('.collapse');
        if (parentCollapse) {
          parentCollapse.classList.add('show');
          const parentToggle = document.querySelector(`[href="#${parentCollapse.id}"]`);
          if (parentToggle) {
            parentToggle.setAttribute('aria-expanded', 'true');
          }
        }
      }
    });
  });

  document.getElementById('sidebarToggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');

    if (window.innerWidth >= 992) {
      // No PC
      sidebar.classList.toggle('hidden');
      content.classList.toggle('hidden');
    } else {
      // No Mobile
      sidebar.classList.toggle('show');
    }
  });
</script>