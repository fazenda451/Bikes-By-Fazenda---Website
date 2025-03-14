@extends('layouts.app')

@section('content')
<div class="hero_area">
    @include('home.header')
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
                        <a href="{{ route('profile') }}" class="list-group-item list-group-item-action active d-flex align-items-center">
                            <i class="fas fa-user me-2"></i> Meu Perfil
                        </a>
                        <a href="{{ url('/orders') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-shopping-bag me-2"></i> Meus Pedidos
                        </a>
                        <a href="{{ route('loyalty.points') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-award me-2"></i> Pontos de Fidelidade
                          </a>
                        <a href="{{url('wishlist')}}" class="list-group-item list-group-item-action d-flex align-items-center">
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
            <!-- Card de Informações Pessoais -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold mb-0">Informações Pessoais</h5>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="birth_date" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ auth()->user()->birth_date }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zip_code" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ auth()->user()->zip_code }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Card de Alteração de Senha -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold mb-0">Alterar Senha</h5>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Nova Senha</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key me-2"></i>Alterar Senha
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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



.form-control {
    border-radius: 10px;
    border: 1px solid #dee2e6;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #9935dc;
    box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
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

.form-label {
    font-weight: 500;
    color: #555;
}

/* Adiciona uma borda sutil aos cards */
.card-body {
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 15px;
}

.text-danger {
    color: #9935dc !important;
}



</style>
@endsection 