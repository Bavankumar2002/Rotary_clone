<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?? SITENAME; ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/css/style.css">
</head>
<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top glass" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-white fw-bold fs-3" href="<?= URLROOT; ?>" style="font-family: 'Playfair Display', serif;">
                <span class="text-gold">Rotary</span> Madurai
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase px-3 fw-semibold" href="<?= URLROOT; ?>/#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase px-3 fw-semibold" href="<?= URLROOT; ?>/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase px-3 fw-semibold" href="<?= URLROOT; ?>/#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase px-3 fw-semibold" href="<?= URLROOT; ?>/#events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase px-3 fw-semibold" href="<?= URLROOT; ?>/#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase px-3 fw-semibold" href="<?= URLROOT; ?>/#contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
                    <a href="<?= URLROOT; ?>/#donate" class="btn btn-outline-warning rounded-pill px-4 fw-bold hero-btn">Donate Now</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <?php require_once '../app/views/' . $view . '.php'; ?>

    <!-- Premium Footer -->
    <footer class="premium-footer text-white">
        <div class="container pb-5">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <h3 class="mb-4 font-playfair text-gold">Rotary Club of Madurai</h3>
                    <p class="text-muted pe-4">Established in 1938, we are dedicated to community service, health, education, and international understanding.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="text-white fs-4"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="footer-link">About Us</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Our Projects</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Events</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Gallery</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Contact Info</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-3"><i class="fas fa-map-marker-alt me-2 text-gold"></i> 123 Rotary Avenue, Madurai, TN, India</li>
                        <li class="mb-3"><i class="fas fa-phone me-2 text-gold"></i> +91 1234567890</li>
                        <li class="mb-3"><i class="fas fa-envelope me-2 text-gold"></i> info@rotarymadurai.org</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Newsletter</h5>
                    <p class="text-muted">Subscribe to our newsletter to get latest updates.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control bg-dark border-secondary text-white" placeholder="Email Address">
                            <button class="btn btn-primary" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-black py-3 text-center text-muted">
            <div class="container">
                <small>&copy; <?= date('Y'); ?> Rotary Club of Madurai. All Rights Reserved. Designed with <i class="fas fa-heart text-danger"></i></small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="<?= URLROOT; ?>/assets/js/main.js"></script>
</body>
</html>
