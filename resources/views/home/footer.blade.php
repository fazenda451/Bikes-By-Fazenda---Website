<!-- Footer -->
<footer class="footer bg-dark text-white py-5">
    <div class="container">
        <div class="row g-4">
            <!-- About -->
            <div class="col-lg-4 col-md-6">
                <h5 class="mb-4 text-purple">Bikes By Fazenda</h5>
                <p class="mb-4">Your specialized store for motorcycles and high-quality accessories. We offer the best brands and personalized service for all motorcyclists.</p>
                <div class="social-links">
                    <a href="#" class="me-3 text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="me-3 text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="me-3 text-white"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h5 class="mb-4 text-purple">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" class="text-white text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="#motorcycles" class="text-white text-decoration-none">Motorcycles</a></li>
                    <li class="mb-2"><a href="#products" class="text-white text-decoration-none">Products</a></li>
                    <li class="mb-2"><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-purple">Contact</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2 text-purple"></i>
                        Gago Coutinho Street, 2, Alverca do Ribatejo
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone me-2 text-purple"></i>
                        +351 219 587 530
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2 text-purple"></i>
                        bikebyfazenda@gmail.com
                    </li>
                </ul>
            </div>

            <!-- Business Hours -->
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-purple">Business Hours</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">Monday - Friday: 9 AM to 7 PM</li>
                    <li class="mb-2">Saturday: 9 AM to 1 PM</li>
                    <li class="mb-2">Sunday: Closed</li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-top border-secondary mt-4 pt-4 text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Bikes By Fazenda. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
.footer {
    background-color: #1a1a1a !important;
}

.text-purple {
    color: #9935dc !important;
}

.social-links a {
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #9935dc !important;
}

.footer ul li a {
    transition: color 0.3s ease;
}

.footer ul li a:hover {
    color: #9935dc !important;
    text-decoration: none;
}

.footer ul li {
    transition: color 0.3s ease;
}

.footer ul li:hover {
    color: #9935dc;
}

.footer h5 {
    font-weight: 600;
    font-size: 1.2rem;
}

.footer p, .footer ul li {
    font-size: 0.95rem;
    color: #f8f9fa;
}
</style>

<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="{{asset('js/custom.js')}}"></script>

<!-- PHPFlasher para notificações -->
@flasher_render
