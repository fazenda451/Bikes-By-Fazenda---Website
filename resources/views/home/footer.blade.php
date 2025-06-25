<!-- Footer -->
<footer class="footer_section">
    <div class="container">
        <div class="footer-content">
            <!-- Seção principal do footer -->
            <div class="footer-main">
                <div class="footer-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/BikesByFazenda.png') }}" alt="Bikes By Fazenda" class="footer-logo-img">
                    </a>
                    <p class="footer-description">
                        Your trusted partner for premium motorcycles and accessories. Quality, performance, and passion in every ride.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-links">
                    <div class="footer-column">
                        <h4 class="footer-heading">Quick Links</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('motorcycle.catalog') }}">Motorcycles</a></li>
                            <li><a href="{{ route('product.catalog') }}">Products</a></li>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-heading">Categories</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Sport Bikes</a></li>
                            <li><a href="#">Cruiser</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Helmets</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-heading">Customer Service</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Size Guide</a></li>
                            <li><a href="#">Track Order</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-heading">Account</h4>
                        <ul class="footer-menu">
                            @auth
                                <li><a href="{{ route('profile') }}">My Profile</a></li>
                                <li><a href="{{ url('/orders') }}">My Orders</a></li>
                                <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                                <li><a href="{{ route('loyalty.points') }}">Loyalty Points</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                            <li><a href="#" id="cookie-settings-link">Cookie Settings</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="footer-newsletter">
                <div class="newsletter-content">
                    <h4 class="newsletter-heading">Stay Updated</h4>
                    <p class="newsletter-description">Get the latest news about new arrivals and special offers</p>
                    <form class="newsletter-form" action="#" method="POST">
                        @csrf
                        <div class="newsletter-input-group">
                            <input type="email" name="email" placeholder="Enter your email address" class="newsletter-input" required>
                            <button type="submit" class="newsletter-btn">
                                <i class="fas fa-paper-plane"></i>
                                <span class="btn-text">Subscribe</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="footer-copyright">
                        <p>&copy; {{ date('Y') }} Bikes By Fazenda. All rights reserved.</p>
                    </div>
                    <div class="footer-legal">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.footer_section {
    background: linear-gradient(135deg, #2d3035 0%, #1a1d22 100%);
    color: #e9ecef;
    padding: 3rem 0 1rem;
    margin-top: 2rem;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
}

.footer-main {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 3rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #3d4148;
}

.footer-logo-img {
    height: 60px;
    width: auto;
    margin-bottom: 1rem;
}

.footer-description {
    color: #adb5bd;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    max-width: 300px;
}

.footer-social {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 40px;
    height: 40px;
    background: rgba(153, 53, 220, 0.1);
    border: 1px solid rgba(153, 53, 220, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9935dc;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-link:hover {
    background: #9935dc;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(153, 53, 220, 0.3);
}

.footer-links {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
}

.footer-heading {
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.footer-heading::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 2px;
    background: #9935dc;
}

.footer-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-menu li {
    margin-bottom: 0.5rem;
}

.footer-menu a {
    color: #adb5bd;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: block;
    padding: 0.25rem 0;
}

.footer-menu a:hover {
    color: #9935dc;
    transform: translateX(5px);
}

.footer-newsletter {
    background: rgba(153, 53, 220, 0.05);
    border: 1px solid rgba(153, 53, 220, 0.1);
    border-radius: 12px;
    padding: 2rem;
    margin-bottom: 2rem;
    text-align: center;
}

.newsletter-heading {
    color: white;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.newsletter-description {
    color: #adb5bd;
    margin-bottom: 1.5rem;
}

.newsletter-form {
    max-width: 400px;
    margin: 0 auto;
}

.newsletter-input-group {
    display: flex;
    border-radius: 8px;
    overflow: hidden;
    background: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.newsletter-input {
    flex: 1;
    padding: 0.75rem 1rem;
    border: none;
    outline: none;
    font-size: 0.9rem;
}

.newsletter-btn {
    background: #9935dc;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
}

.newsletter-btn:hover {
    background: #8024c0;
}

.footer-bottom {
    border-top: 1px solid #3d4148;
    padding-top: 1.5rem;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-copyright p {
    margin: 0;
    color: #6c757d;
    font-size: 0.85rem;
}

.footer-legal {
    display: flex;
    gap: 1.5rem;
}

.footer-legal a {
    color: #6c757d;
    text-decoration: none;
    font-size: 0.85rem;
    transition: color 0.3s ease;
}

.footer-legal a:hover {
    color: #9935dc;
}

/* Responsividade Mobile Completa */
@media (max-width: 768px) {
    .footer_section {
        padding: 2rem 0 1rem;
        margin-top: 1rem;
    }

    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    /* Layout principal mobile */
    .footer-main {
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .footer-logo {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .footer-logo-img {
        height: 50px;
    }

    .footer-description {
        max-width: none;
        text-align: center;
        margin: 0 auto 1.5rem;
    }

    .footer-social {
        justify-content: center;
    }

    .social-link {
        width: 45px;
        height: 45px;
    }

    /* Links em grid mobile */
    .footer-links {
        grid-template-columns: 1fr 1fr;
        gap: 2rem 1rem;
    }

    .footer-column {
        text-align: center;
    }

    .footer-heading {
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .footer-heading::after {
        left: 50%;
        transform: translateX(-50%);
    }

    .footer-menu a {
        font-size: 0.85rem;
        padding: 0.4rem 0;
    }

    .footer-menu a:hover {
        transform: none;
        color: #9935dc;
    }

    /* Newsletter mobile */
    .footer-newsletter {
        padding: 1.5rem 1rem;
        margin-bottom: 1.5rem;
    }

    .newsletter-heading {
        font-size: 1.1rem;
    }

    .newsletter-description {
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .newsletter-input-group {
        flex-direction: column;
        border-radius: 8px;
    }

    .newsletter-input {
        padding: 1rem;
        font-size: 1rem;
        border-bottom: 1px solid #eee;
    }

    .newsletter-btn {
        padding: 1rem;
        justify-content: center;
        font-size: 0.95rem;
    }

    /* Footer bottom mobile */
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .footer-legal {
        justify-content: center;
        gap: 1rem;
    }

    .footer-legal a {
        font-size: 0.8rem;
    }
}

@media (max-width: 576px) {
    .footer_section {
        padding: 1.5rem 0 0.75rem;
    }

    .container {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .footer-main {
        gap: 1.5rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
    }

    .footer-logo-img {
        height: 40px;
    }

    .footer-description {
        font-size: 0.85rem;
        line-height: 1.5;
    }

    .social-link {
        width: 40px;
        height: 40px;
    }

    /* Links em coluna única para mobile pequeno */
    .footer-links {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .footer-heading {
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
    }

    .footer-menu a {
        font-size: 0.8rem;
        padding: 0.3rem 0;
    }

    .footer-newsletter {
        padding: 1rem 0.75rem;
    }

    .newsletter-heading {
        font-size: 1rem;
    }

    .newsletter-description {
        font-size: 0.85rem;
    }

    .newsletter-input,
    .newsletter-btn {
        padding: 0.875rem;
        font-size: 0.9rem;
    }

    .footer-bottom {
        padding-top: 1rem;
    }

    .footer-copyright p {
        font-size: 0.8rem;
    }

    .footer-legal {
        flex-direction: column;
        gap: 0.5rem;
    }

    .footer-legal a {
        font-size: 0.75rem;
    }
}

/* Melhorias para touch devices */
@media (hover: none) {
    .social-link:hover {
        transform: none;
        background: rgba(153, 53, 220, 0.1);
        color: #9935dc;
    }

    .footer-menu a:hover {
        transform: none;
    }

    .newsletter-btn:hover {
        background: #9935dc;
    }
}

/* Ajustes para orientação landscape em mobile */
@media (max-width: 896px) and (orientation: landscape) {
    .footer-main {
        grid-template-columns: 1fr 2fr;
        gap: 2rem;
    }

    .footer-links {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .footer-logo {
        text-align: left;
    }

    .footer-description {
        text-align: left;
        margin: 0 0 1.5rem 0;
    }

    .footer-social {
        justify-content: flex-start;
    }

    .footer-column {
        text-align: left;
    }

    .footer-heading::after {
        left: 0;
        transform: none;
    }
}

/* Ajustes específicos para iOS */
@media only screen and (max-width: 414px) {
    .newsletter-input {
        -webkit-appearance: none;
        appearance: none;
    }

    .newsletter-btn {
        -webkit-appearance: none;
        appearance: none;
    }
}

/* Acessibilidade para leitores de tela */
@media (prefers-reduced-motion: reduce) {
    .social-link,
    .footer-menu a,
    .newsletter-btn {
        transition: none;
    }
}
</style>

<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="{{asset('js/custom.js')}}"></script>
