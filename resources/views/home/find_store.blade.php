@extends('layouts.app')

@include('home.header')

@section('content')
<div class="store-locator">
    <div class="container py-5">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">Find a Store</h1>
            <p class="lead text-muted">Discover your nearest Bikes by Fazenda store</p>
        </div>

        <div class="row">
            <!-- Lista de Lojas -->
            <div class="col-md-4">
                <div class="stores-list bg-white rounded-3 shadow-sm p-4" style="max-height: 600px; overflow-y: auto;">
                    <h3 class="h4 mb-4">Our Stores</h3>
                    
                    <!-- Lisboa -->
                    <div class="store-item mb-4 pb-3 border-bottom">
                        <h4 class="h5 mb-2">Bikes by Fazenda Lisbon</h4>
                        <p class="mb-1"><i class="fa-solid fa-location-dot me-2 text-primary"></i>Av. da Liberdade 110, Lisbon</p>
                        <p class="mb-1"><i class="fa-solid fa-phone me-2 text-primary"></i>21 123 4567</p>
                        <p class="mb-2"><i class="fa-regular fa-clock me-2 text-primary"></i>09:00 - 19:00 (Mon-Sat)</p>
                    </div>

                    <!-- Porto -->
                    <div class="store-item mb-4 pb-3 border-bottom">
                        <h4 class="h5 mb-2">Bikes by Fazenda Porto</h4>
                        <p class="mb-1"><i class="fa-solid fa-location-dot me-2 text-primary"></i>Rua de Santa Catarina 243, Porto</p>
                        <p class="mb-1"><i class="fa-solid fa-phone me-2 text-primary"></i>22 123 4567</p>
                        <p class="mb-2"><i class="fa-regular fa-clock me-2 text-primary"></i>09:00 - 19:00 (Mon-Sat)</p>
                    </div>

                    <!-- Faro -->
                    <div class="store-item mb-4 pb-3 border-bottom">
                        <h4 class="h5 mb-2">Bikes by Fazenda Algarve</h4>
                        <p class="mb-1"><i class="fa-solid fa-location-dot me-2 text-primary"></i>Rua de Santo António 45, Faro</p>
                        <p class="mb-1"><i class="fa-solid fa-phone me-2 text-primary"></i>289 123 456</p>
                        <p class="mb-2"><i class="fa-regular fa-clock me-2 text-primary"></i>09:00 - 19:00 (Mon-Sat)</p>
                    </div>

                    <!-- Coimbra -->
                    <div class="store-item mb-4 pb-3 border-bottom">
                        <h4 class="h5 mb-2">Bikes by Fazenda Coimbra</h4>
                        <p class="mb-1"><i class="fa-solid fa-location-dot me-2 text-primary"></i>Rua Ferreira Borges 123, Coimbra</p>
                        <p class="mb-1"><i class="fa-solid fa-phone me-2 text-primary"></i>239 123 456</p>
                        <p class="mb-2"><i class="fa-regular fa-clock me-2 text-primary"></i>09:00 - 19:00 (Mon-Sat)</p>
                    </div>

                    <!-- Braga -->
                    <div class="store-item mb-4 pb-3">
                        <h4 class="h5 mb-2">Bikes by Fazenda Braga</h4>
                        <p class="mb-1"><i class="fa-solid fa-location-dot me-2 text-primary"></i>Avenida Central 156, Braga</p>
                        <p class="mb-1"><i class="fa-solid fa-phone me-2 text-primary"></i>253 123 456</p>
                        <p class="mb-2"><i class="fa-regular fa-clock me-2 text-primary"></i>09:00 - 19:00 (Mon-Sat)</p>
                    </div>
                </div>
            </div>

            <!-- Informações e Serviços -->
            <div class="col-md-8">
                <div class="bg-white rounded-3 shadow-sm p-4">
                    <!-- Foto da Loja -->
                    <div class="store-photo mb-4">
                        <h3 class="h4 mb-3">Our Store</h3>
                        <div class="rounded-3 overflow-hidden">
                            <img src="{{ asset('images/bikesbyfazenda.png') }}" class="img-fluid w-100" alt="Our Store" style="height: 400px; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Serviços Disponíveis -->
                    <div class="services-section mb-4">
                        <h3 class="h4 mb-3">Available Services</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="service-item p-3 border rounded-3">
                                    <i class="fa-solid fa-wrench text-primary mb-2"></i>
                                    <h4 class="h6 mb-2">Maintenance & Repair</h4>
                                    <p class="small text-muted mb-0">Complete maintenance and repair services for your motorcycle</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item p-3 border rounded-3">
                                    <i class="fa-solid fa-motorcycle text-primary mb-2"></i>
                                    <h4 class="h6 mb-2">Test Ride</h4>
                                    <p class="small text-muted mb-0">Try our motorcycles before buying</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item p-3 border rounded-3">
                                    <i class="fa-solid fa-shirt text-primary mb-2"></i>
                                    <h4 class="h6 mb-2">Equipment</h4>
                                    <p class="small text-muted mb-0">Sale of equipment and accessories</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item p-3 border rounded-3">
                                    <i class="fa-solid fa-comments text-primary mb-2"></i>
                                    <h4 class="h6 mb-2">Consulting</h4>
                                    <p class="small text-muted mb-0">Expert advice for your purchase</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Horário de Funcionamento -->
                    <div class="hours-section mb-4">
                        <h3 class="h4 mb-3">Opening Hours</h3>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">Monday to Friday</td>
                                        <td>09:00 - 19:00</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Saturday</td>
                                        <td>09:00 - 19:00</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Sunday</td>
                                        <td>Closed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Informações Adicionais -->
                    <div class="info-section">
                        <h3 class="h4 mb-3">Additional Information</h3>
                        <div class="alert alert-info">
                            <i class="fa-solid fa-info-circle me-2"></i>
                            For test ride appointments or maintenance services, please contact your nearest store.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.store-locator {
    background-color: #f8f9fa;
}

.store-item:hover {
    background-color: #f8f9fa;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #9935dc;
    border-color: #9935dc;
}

.btn-primary:hover {
    background-color: #8024bd;
    border-color: #8024bd;
}

.btn-outline-primary {
    color: #9935dc;
    border-color: #9935dc;
}

.btn-outline-primary:hover {
    background-color: #9935dc;
    border-color: #9935dc;
    color: white;
}

.text-primary {
    color: #9935dc !important;
}

.stores-list::-webkit-scrollbar {
    width: 6px;
}

.stores-list::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.stores-list::-webkit-scrollbar-thumb {
    background: #9935dc;
    border-radius: 3px;
}

.stores-list::-webkit-scrollbar-thumb:hover {
    background: #8024bd;
}

.service-item {
    transition: all 0.3s ease;
}

.service-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.service-item i {
    font-size: 1.5rem;
    display: block;
}
</style>

<!-- Toastr Assets -->
@include('home.toastr_assets')

@endsection
