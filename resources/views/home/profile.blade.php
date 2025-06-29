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
                            <i class="fas fa-user me-2"></i> My Profile
                        </a>
                        <a href="{{ url('/orders') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-shopping-bag me-2"></i> My Orders
                        </a>
                        <a href="{{ route('loyalty.points') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-award me-2"></i> Loyalty Points
                          </a>
                        <a href="{{url('wishlist')}}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-heart me-2"></i> Wishlist
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-map-marker-alt me-2"></i> Addresses
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-credit-card me-2"></i> Payment Methods
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-cog me-2"></i> Settings
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
                        <h5 class="card-title fw-bold mb-0">Personal Information</h5>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ auth()->user()->birth_date }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zip_code" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ auth()->user()->zip_code }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Card de Alteração de Senha -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold mb-0">Change Password</h5>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" id="passwordForm">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                           id="current_password" name="current_password" required>
                                    <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" required minlength="8">
                                    <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Password must be at least 8 characters long.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation" required minlength="8">
                                    <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="form-text">Please confirm your new password.</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="passwordSubmitBtn">
                                <i class="fas fa-key me-2"></i>Change Password
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

/* Responsividade Mobile Completa */
@media (max-width: 768px) {
    .container {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .py-5 {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
    }

    /* Menu lateral responsivo */
    .profile-sidebar {
        margin-bottom: 1.5rem;
    }

    .profile-header {
        padding: 15px 0;
    }

    .profile-avatar i {
        font-size: 2.5rem !important;
    }

    .card-title {
        font-size: 1.1rem;
    }

    .list-group-item {
        padding: 10px 15px;
        margin-bottom: 3px;
        font-size: 0.9rem;
        justify-content: center;
    }

    .list-group-item i {
        margin-right: 0.5rem !important;
    }

    /* Cards de conteúdo */
    .card {
        margin-bottom: 1.5rem;
        border-radius: 12px;
    }

    .card-body {
        padding: 1rem;
        border-radius: 12px;
    }

    /* Formulários responsivos */
    .row {
        margin-left: 0;
        margin-right: 0;
    }

    .col-md-6,
    .col-md-12 {
        padding-left: 0;
        padding-right: 0;
        margin-bottom: 1rem;
    }

    .form-control {
        width: 100%;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .form-label {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .btn-primary {
        width: 100%;
        padding: 12px 20px;
        font-size: 1rem;
        border-radius: 8px;
        margin-top: 1rem;
    }

    /* Header dos cards */
    .d-flex.justify-content-between {
        flex-direction: column;
        align-items: center !important;
        text-align: center;
        margin-bottom: 2rem !important;
    }

    .card-title {
        margin-bottom: 0.5rem !important;
        text-align: center;
        width: 100%;
    }

    /* Melhorias para campos de formulário */
    .mb-3 {
        margin-bottom: 1.5rem !important;
    }

    /* Validação de erros */
    .text-danger {
        font-size: 0.85rem;
        margin-top: 0.25rem;
        display: block;
    }

    /* Ajustes para botões */
    .d-flex.justify-content-end {
        justify-content: center !important;
        margin-top: 1.5rem;
    }
}

@media (max-width: 576px) {
    .container {
        padding-left: 0.25rem;
        padding-right: 0.25rem;
    }

    .py-5 {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
    }

    .card {
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .card-body {
        padding: 0.75rem;
        border-radius: 8px;
    }

    .profile-header {
        padding: 10px 0;
    }

    .profile-avatar i {
        font-size: 2rem !important;
    }

    .card-title {
        font-size: 1rem;
    }

    .list-group-item {
        padding: 8px 12px;
        font-size: 0.8rem;
    }

    .form-control {
        padding: 10px 12px;
        font-size: 0.9rem;
    }

    .form-label {
        font-size: 0.85rem;
    }

    .btn-primary {
        padding: 10px 15px;
        font-size: 0.9rem;
    }

    .col-md-6,
    .col-md-12 {
        margin-bottom: 1rem;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .text-danger {
        font-size: 0.8rem;
    }
}

/* Melhorias para focus e acessibilidade */
@media (max-width: 768px) {
    .form-control:focus {
        border-color: #9935dc;
        box-shadow: 0 0 0 3px rgba(153, 53, 220, 0.15);
        outline: none;
    }

    /* Estados de hover para touch devices */
    .btn-primary:active {
        transform: scale(0.98);
    }

    .list-group-item:active {
        background-color: #9935dc;
        color: white;
    }
}

/* Ajustes para orientação landscape em tablets */
@media (max-width: 1024px) and (orientation: landscape) {
    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .col-md-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

/* Melhorias para devices com touch */
@media (hover: none) {
    .list-group-item:hover {
        transform: none;
        background-color: #f8f9fa;
        color: #555;
    }

    .list-group-item.active:hover {
        background-color: #9935dc;
        color: white;
    }

    .btn-primary:hover {
        transform: none;
        background-color: #9935dc;
    }
}

/* Ajustes específicos para iPhones */
@media only screen and (max-width: 414px) {
    .form-control {
        -webkit-appearance: none;
        appearance: none;
    }

    input[type="date"] {
        -webkit-appearance: none;
        appearance: none;
        background-color: white;
    }
}

/* Melhorias para formulários em mobile */
@media (max-width: 768px) {
    /* Espaçamento entre seções */
    .card:not(:last-child) {
        margin-bottom: 2rem;
    }

    /* Melhor espaçamento para labels */
    .form-label {
        display: block;
        margin-bottom: 0.75rem;
        color: #333;
    }

    /* Inputs mais touch-friendly */
    .form-control {
        min-height: 48px;
        line-height: 1.5;
    }

    /* Botões mais touch-friendly */
    .btn {
        min-height: 48px;
        touch-action: manipulation;
    }

    /* Espaçamento melhorado */
    .mb-4 {
        margin-bottom: 2rem !important;
    }
}

/* Password toggle button styles */
.input-group {
    position: relative;
}

.input-group-text {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-right: none;
    color: #9935dc;
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 10px 0 0 10px;
}

.input-group .form-control {
    border-left: none;
    border-radius: 0 10px 10px 0;
}

.input-group .form-control:focus {
    border-left: none;
    box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
}

.toggle-password {
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    border: 1px solid #dee2e6;
    border-left: none;
    background-color: #f8f9fa;
    color: #9935dc;
    border-radius: 0 10px 10px 0;
    padding: 0 15px;
    transition: all 0.3s ease;
    z-index: 10;
}

.toggle-password:hover {
    background-color: #9935dc;
    color: white;
    border-color: #9935dc;
}

.toggle-password:focus {
    box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
}
</style>

<script>
// Auto-hide alerts after 5 seconds
setTimeout(function() {
    $('.alert').fadeOut('slow', function() {
        $(this).remove();
    });
}, 5000);
</script>

<script>
// Função para testar notificações (pode ser chamada no console)
function testarNotificacoes() {
    console.log('🧪 Testing all notifications...');
    
    if (typeof toastr !== 'undefined') {
        toastr.success('Test success notification!');
        setTimeout(() => toastr.error('Test error notification!'), 1000);
        setTimeout(() => toastr.warning('Test warning notification!'), 2000);
        setTimeout(() => toastr.info('Test info notification!'), 3000);
    } else {
        console.error('Toastr not available!');
    }
}
</script>

<script>
// Validação do formulário de password
$(document).ready(function() {
    // Password toggle functionality
    $('.toggle-password').on('click', function() {
        const button = $(this);
        const input = button.closest('.input-group').find('input');
        const icon = button.find('i');
        
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    $('#passwordForm').on('submit', function(e) {
        var password = $('#password').val();
        var passwordConfirmation = $('#password_confirmation').val();
        var currentPassword = $('#current_password').val();
        
        // Limpar erros anteriores
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        
        var hasErrors = false;
        
        // Validar password atual
        if (!currentPassword) {
            $('#current_password').addClass('is-invalid');
            $('#current_password').after('<div class="invalid-feedback">Current password is required.</div>');
            hasErrors = true;
        }
        
        // Validar nova password
        if (!password) {
            $('#password').addClass('is-invalid');
            $('#password').after('<div class="invalid-feedback">New password is required.</div>');
            hasErrors = true;
        } else if (password.length < 8) {
            $('#password').addClass('is-invalid');
            $('#password').after('<div class="invalid-feedback">Password must be at least 8 characters long.</div>');
            hasErrors = true;
        }
        
        // Validar confirmação de password
        if (!passwordConfirmation) {
            $('#password_confirmation').addClass('is-invalid');
            $('#password_confirmation').after('<div class="invalid-feedback">Password confirmation is required.</div>');
            hasErrors = true;
        } else if (password !== passwordConfirmation) {
            $('#password_confirmation').addClass('is-invalid');
            $('#password_confirmation').after('<div class="invalid-feedback">Passwords do not match.</div>');
            hasErrors = true;
        }
        
        if (hasErrors) {
            e.preventDefault();
            return false;
        }
        
        // Mostrar loading state
        $('#passwordSubmitBtn').prop('disabled', true);
        $('#passwordSubmitBtn').html('<i class="fas fa-spinner fa-spin me-2"></i>Changing Password...');
    });
    
    // Validar confirmação de password em tempo real
    $('#password_confirmation').on('input', function() {
        var password = $('#password').val();
        var passwordConfirmation = $(this).val();
        
        if (passwordConfirmation && password !== passwordConfirmation) {
            $(this).addClass('is-invalid');
            if (!$(this).next('.invalid-feedback').length) {
                $(this).after('<div class="invalid-feedback">Passwords do not match.</div>');
            }
        } else {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        }
    });
    
    // Validar password em tempo real
    $('#password').on('input', function() {
        var password = $(this).val();
        var passwordConfirmation = $('#password_confirmation').val();
        
        if (password && password.length < 8) {
            $(this).addClass('is-invalid');
            if (!$(this).next('.invalid-feedback').length) {
                $(this).after('<div class="invalid-feedback">Password must be at least 8 characters long.</div>');
            }
        } else {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        }
        
        // Revalidar confirmação se existir
        if (passwordConfirmation) {
            $('#password_confirmation').trigger('input');
        }
    });
});
</script>

@endsection 