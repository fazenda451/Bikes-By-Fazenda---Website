@extends('layouts.app')

@section('content')
<div class="hero_area">
  <!-- header section starts -->
  @include('home.header')
  <!-- end header section -->
</div>

<div class="container py-5">
  <div class="row">
    <!-- Menu lateral -->
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="profile-header text-center mb-4">
            <div class="profile-avatar mb-3">
              <i class="fas fa-user-circle fa-4x text-primary"></i>
            </div>
            <h5 class="card-title fw-bold">{{ auth()->user()->name }}</h5>
            <p class="text-muted">{{ auth()->user()->email }}</p>
          </div>
          <div class="list-group list-group-flush">
            <a href="{{ route('profile') }}" class="list-group-item list-group-item-action d-flex align-items-center">
              <i class="fas fa-user me-2"></i> Meu Perfil
            </a>
            <a href="{{ url('/orders') }}" class="list-group-item list-group-item-action d-flex align-items-center">
              <i class="fas fa-shopping-bag me-2"></i> Meus Pedidos
            </a>
            <a href="{{ route('loyalty.points') }}" class="list-group-item list-group-item-action active d-flex align-items-center">
              <i class="fas fa-award me-2"></i> Pontos de Fidelidade
            </a>
            <a href="{{ url('/wishlist') }}" class="list-group-item list-group-item-action d-flex align-items-center">
              <i class="fas fa-heart me-2"></i> Lista de Desejos
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
              <i class="fas fa-map-marker-alt me-2"></i> Endereços
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
              <i class="fas fa-credit-card me-2"></i> Cartões
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
              <i class="fas fa-cog me-2"></i> Configurações
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Conteúdo principal -->
    <div class="col-md-9">
      <!-- Card de Pontos de Fidelidade -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-bold mb-0">Meus Pontos de Fidelidade</h5>
          </div>

          <div class="points-summary mb-4">
            <div class="row">
              <div class="col-md-4">
                <div class="points-card">
                  <div class="points-card-icon">
                    <i class="fas fa-award"></i>
                  </div>
                  <div class="points-card-content">
                    <h3 class="points-card-value">{{ $user->Points }}</h3>
                    <p class="points-card-label">Pontos Disponíveis</p>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="points-info">
                  <h6 class="points-info-title">Como funciona o programa de fidelidade?</h6>
                  <ul class="points-info-list">
                    <li><i class="fas fa-check-circle"></i> A cada 10€ em compras, você ganha 5 pontos</li>
                    <li><i class="fas fa-check-circle"></i> Seus pontos podem ser usados como desconto em compras futuras</li>
                    <li><i class="fas fa-check-circle"></i> A cada 1000 pontos, você recebe 1% de desconto no valor total da compra</li>
                    <li><i class="fas fa-check-circle"></i> Você pode escolher quantos pontos deseja usar (múltiplos de 1000)</li>
                    <li><i class="fas fa-check-circle"></i> Os pontos não expiram e podem ser acumulados</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <h6 class="history-title">Histórico de Pontos</h6>
          
          @if(count($pointsHistory) > 0)
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Pedido</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Pontos Ganhos</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pointsHistory as $history)
                    <tr>
                      <td>{{ $history['order_number'] }}</td>
                      <td>{{ date('d/m/Y H:i', strtotime($history['date'])) }}</td>
                      <td>{{ number_format($history['total'], 2, ',', '.') }}€</td>
                      <td>
                        <span class="badge bg-success">+{{ $history['points_earned'] }}</span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="empty-history">
              <i class="fas fa-history"></i>
              <p>Você ainda não tem histórico de pontos</p>
              <a href="{{ url('/product-catalog') }}" class="btn btn-primary">Comece a Comprar</a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
@include('home.footer')

<style>
  body {
    background-color: #f2f0f5;
  }

  .card {
    border: none;
    border-radius: 15px;
    background-color: rgba(128, 0, 128, 0.075);
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.05);
  }

  .profile-header {
    padding: 20px 0;
    border-bottom: 2px solid #f0f2f5;
    background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
    border-radius: 15px 15px 0 0;
  }

  .profile-avatar {
    color: #9935dc;
  }

  .list-group-item {
    border: none;
    padding: 12px 20px;
    margin-bottom: 5px;
    border-radius: 10px !important;
    transition: all 0.3s ease;
    color: #555;
    background-color: #f8f9fa;
  }

  .list-group-item:hover {
    background-color: #e9ecef;
    transform: translateX(5px);
    color: #9935dc;
  }

  .list-group-item.active {
    background-color: #9935dc;
    border-color: #9935dc;
    color: white;
    box-shadow: 0 2px 10px rgba(153, 53, 220, 0.3);
  }

  .points-summary {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
  }

  .points-card {
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #9935dc 0%, #7b2ab0 100%);
    padding: 20px;
    border-radius: 10px;
    color: white;
    height: 100%;
    box-shadow: 0 5px 15px rgba(153, 53, 220, 0.3);
  }

  .points-card-icon {
    font-size: 2.5rem;
    margin-right: 15px;
    opacity: 0.8;
  }

  .points-card-value {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0;
  }

  .points-card-label {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 0;
  }

  .points-info {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    height: 100%;
    border-left: 4px solid #9935dc;
  }

  .points-info-title {
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
  }

  .points-info-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .points-info-list li {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
  }

  .points-info-list li i {
    color: #28a745;
    margin-right: 10px;
  }

  .history-title {
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e9ecef;
  }

  .table {
    border-collapse: separate;
    border-spacing: 0 5px;
  }

  .table thead th {
    border-bottom: none;
    color: #555;
    font-weight: 600;
    padding: 12px 15px;
  }

  .table tbody tr {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    border-radius: 10px;
    background-color: white;
    transition: all 0.3s ease;
  }

  .table tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }

  .table tbody td {
    padding: 15px;
    vertical-align: middle;
    border-top: none;
  }

  .badge.bg-success {
    background-color: #28a745 !important;
    font-weight: 500;
    padding: 5px 10px;
    font-size: 0.9rem;
  }

  .empty-history {
    text-align: center;
    padding: 40px 0;
  }

  .empty-history i {
    font-size: 3rem;
    color: #9935dc;
    opacity: 0.5;
    margin-bottom: 15px;
  }

  .empty-history p {
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 20px;
  }

  .btn-primary {
    background-color: #9935dc;
    border-color: #9935dc;
    padding: 10px 25px;
    border-radius: 10px;
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #8024c0;
    border-color: #8024c0;
    transform: translateY(-2px);
  }

  .text-primary {
    color: #9935dc !important;
  }

  @media (max-width: 768px) {
    .points-summary .row {
      flex-direction: column;
    }
    
    .points-card, .points-info {
      margin-bottom: 20px;
    }
  }
</style>
@endsection 