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
      background-color: #34495e;
      color: #ecf0f1;
      padding: 20px;
      width: 250px;
      min-height: 100vh;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      transition: width 0.3s, padding 0.3s;
    }
  
    #sidebar.hidden {
      width: 0;
      padding: 0;
      overflow: hidden;
    }
  
  
    ul.list-unstyled li.active a {
      color: #9b59b6 !important;
      background-color: #2c3e50;
    }
  
    ul.list-unstyled li.active i {
      color: #9b59b6 !important;
    }
  
    .list-unstyled li a {
      color: #ecf0f1;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s, color 0.3s;
      padding: 10px 15px;
      display: block;
      margin: 5px 0;
    }
  
    .list-unstyled li a:hover {
      background-color: #502c2c;
      color: #9b59b6;
    }
  
    ul.list-unstyled li a:hover i {
      color: #9b59b6 !important;
    }
  
    .list-unstyled i {
      width: 28px;
    }
  
    .sidebar-header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
  
    .sidebar-header .title {
      display: flex;
      align-items: center;
    }
  
    .sidebar-header .title i {
      margin-right: 10px;
      color: #9b59b6;
    }
  
    .sidebar-header .title h1 {
      margin: 0;
      font-size: 1.5rem;
      color: #ecf0f1;
    }
  
    .heading {
      color: #bdc3c7;
      font-size: 0.9rem;
      text-transform: uppercase;
      margin: 15px 0;
    }
  
    .collapse li a {
      padding-left: 30px;
    }
  
    .fa-solid fa-user {
      font-size: 40px;
    }

    .text-primary {
    color: #9b59b6 !important;
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
            <h1 class="h5">{{ auth()->user()->name }}</h1><br>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="{{url('admin/dashboard')}}"> <i class="fa-solid fa-home"></i>Home </a></li>
                <li>
                  <a href="{{url('view_category')}}"> <i class="fa-solid fa-list"></i>Category 
                </a>

                <li>
                  <a href="{{url('view_brand')}}"> <i class="fa-solid fa-star"></i>Brands </a>
                </li>

              </li>
              <li><a href="#SpecsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                <i class="fa-solid fa-gears"></i>Motorcycle Specs </a>
                <ul id="SpecsdropdownDropdown" class="collapse list-unstyled ">
                  <li>
                    <a href="{{url('view_engine')}}"><i class="fa-solid fa-gear"></i>Engine </a>
                  </li>
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
              <li><a href="#MotorcyclesdropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                <i class="fa-solid fa-motorcycle"></i>Motorcycles </a>
                <ul id="MotorcyclesdropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_motorcycle')}}">Add Motorcycle</a></li>
                  <li><a href="{{url('view_motorcycle')}}">View Motorcycle</a></li>
                </ul>
              </li>


              </li>
                <li><a href="#ProductdropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                  <i class="fa-solid fa-box"></i>Products </a>
                  <ul id="ProductdropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_product')}}">Add Product</a></li>
                    <li><a href="{{url('view_product')}}">View Product</a></li>
                  </ul>
                </li>

                <li>

                  <a href="{{url('view_orders')}}"> <i class="fa-solid fa-cart-shopping"></i>Orders</a>

                </li>
        </ul>
      </nav>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Bootstrap JS (opcional, se precisar de funcionalidades JS do Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
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