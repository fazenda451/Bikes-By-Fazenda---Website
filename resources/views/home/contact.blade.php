<!-- Contact Section -->
<section id="contact" class="contact-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3">Get in Touch</h2>
            <p class="text-muted">We are here to help. Contact us!</p>
        </div>

        <div class="row g-4">
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="contact-info bg-white rounded-4 p-4 h-100 shadow-sm">
                    <div class="info-item mb-4">
                        <div class="icon-wrapper mb-3">
                            <i class="fas fa-map-marker-alt fa-2x text-purple"></i>
                        </div>
                        <h5>Our Address</h5>
                        <p class="text-muted mb-0">Rua Gago Coutinho, 2, Alverca do Ribatejo</p>
                    </div>

                    <div class="info-item mb-4">
                        <div class="icon-wrapper mb-3">
                            <i class="fas fa-phone-alt fa-2x text-purple"></i>
                        </div>
                        <h5>Phone</h5>
                        <p class="text-muted mb-0">+351 219 587 530</p>
                    </div>

                    <div class="info-item">
                        <div class="icon-wrapper mb-3">
                            <i class="fas fa-envelope fa-2x text-purple"></i>
                        </div>
                        <h5>Email</h5>
                        <p class="text-muted mb-0">bikebyfazenda@gmail.com</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form bg-white rounded-4 p-4 shadow-sm">
                    <form action="#" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" placeholder="Your Message" style="height: 150px" required></textarea>
                                    <label for="message">Your Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-purple btn-lg px-5">
                                    Send Message
                                    <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="map-container rounded-4 overflow-hidden shadow-sm">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3096.9074252752387!2d-9.040675323535611!3d38.89631804673961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19352c2c7cd2b1%3A0x4a0b1b2a3b2b3b4c!2sRua%20Gago%20Coutinho%2C%20Alverca%20do%20Ribatejo%2C%20Portugal!5e0!3m2!1sen!2spt!4v1620000000000!5m2!1sen!2spt"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.contact-section {
    background-color: #f8f9fa;
}

.text-purple {
    color: #9935dc;
}

.icon-wrapper {
    width: 60px;
    height: 60px;
    background-color: rgba(153, 53, 220, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    transition: transform 0.3s ease;
}

.info-item:hover .icon-wrapper {
    transform: translateY(-5px);
}

.contact-info, .contact-form {
    transition: transform 0.3s ease;
}

.contact-info:hover, .contact-form:hover {
    transform: translateY(-5px);
}

.form-control {
    border: 1px solid #dee2e6;
    padding: 0.75rem;
}

.form-control:focus {
    border-color: #9935dc;
    box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
}

.form-floating > label {
    padding: 0.75rem;
}

.btn-purple {
    background-color: #9935dc;
    border-color: #9935dc;
    color: white;
    transition: all 0.3s ease;
}

.btn-purple:hover {
    background-color: #8024c0;
    border-color: #8024c0;
    transform: translateY(-2px);
}

.map-container {
    position: relative;
    padding-bottom: 28.125%; /* 450/1600 = 0.28125 */
    height: 0;
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

@media (max-width: 768px) {
    .map-container {
        padding-bottom: 75%; /* Ajuste para telas menores */
    }
}
</style>

  <br><br><br>