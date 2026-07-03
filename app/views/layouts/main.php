<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?? SITENAME; ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/css/style.css?v=1.2">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="<?= URLROOT; ?>/assets/images/logo.png" alt="Loading...">
    </div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top glass" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?= URLROOT; ?>">
                <img src="<?= URLROOT; ?>/assets/images/logo.png" alt="Rotary Club Logo" style="height: 95px; width: auto; max-width: 100%;">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= URLROOT; ?>/#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= URLROOT; ?>/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= URLROOT; ?>/#projects">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= URLROOT; ?>/#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="<?= URLROOT; ?>/#contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex ms-lg-3 mt-3 mt-lg-0 justify-content-center">
                    <a href="<?= URLROOT; ?>/#contact" class="btn btn-primary rounded-pill px-4 shadow-sm" style="font-family: 'Manrope', sans-serif; font-size: 15px;">Join Rotary</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <?php require_once '../app/views/' . $view . '.php'; ?>

    <!-- Premium Footer -->
    <footer class="py-5" style="background-color: #000; border-top: 1px solid rgba(255,255,255,0.05);">
        <div class="container">
            <div class="row align-items-center">
                
                <!-- Left Column: Logo & Socials -->
                <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4" style="color: #c9a050; font-family: 'Inter', sans-serif; letter-spacing: 2px; font-weight: 500; font-size: 1rem;">
                        Rotary Club of Madurai
                    </h5>
                    
                    <div class="mb-4">
                        <div style="background: #fff; padding: 15px; display: inline-block; border-radius: 4px;">
                            <img src="<?= URLROOT; ?>/assets/images/logo.png" alt="Rotary Club Logo" style="height: 120px; width: auto; max-width: 100%;">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center justify-content-md-start gap-4">
                        <a href="#" class="text-decoration-none" style="color: #c9a050; font-size: 0.85rem;"><i class="fab fa-facebook-square me-1"></i> Facebook</a>
                        <a href="#" class="text-decoration-none" style="color: #c9a050; font-size: 0.85rem;"><i class="fab fa-twitter-square me-1"></i> Twitter</a>
                        <a href="#" class="text-decoration-none" style="color: #c9a050; font-size: 0.85rem;"><i class="fab fa-linkedin me-1"></i> LinkedIn</a>
                    </div>
                </div>

                <!-- Center Column: Links (Line by line) -->
                <div class="col-md-4 mb-4 mb-md-0 d-flex text-center text-md-start flex-column justify-content-end">
                    <div class="d-flex flex-column gap-3">
                        <a href="<?= URLROOT; ?>/#home" class="text-decoration-none" style="color: #c9a050; font-size: 0.95rem;">Home</a>
                        <a href="<?= URLROOT; ?>/#about" class="text-decoration-none" style="color: #c9a050; font-size: 0.95rem;">Introduction</a>
                        <a href="<?= URLROOT; ?>/#leadership" class="text-decoration-none" style="color: #c9a050; font-size: 0.95rem;">Leadership</a>
                    </div>
                </div>
                
                <!-- Right Column: Bottom aligned links -->
                <div class="col-md-4 mb-4 mb-md-0 d-flex flex-column text-center text-md-start justify-content-end">
                    <div class="d-flex flex-column gap-3">
                        <a href="<?= URLROOT; ?>/#projects" class="text-decoration-none" style="color: #c9a050; font-size: 0.95rem;">Articles</a>
                        <a href="<?= URLROOT; ?>/#events" class="text-decoration-none" style="color: #c9a050; font-size: 0.95rem;">Events</a>
                        <a href="<?= URLROOT; ?>/#contact" class="text-decoration-none" style="color: #c9a050; font-size: 0.95rem;">Contact Us</a>
                    </div>
                </div>
            </div>

            <hr class="border-secondary opacity-25 my-4 mx-auto" style="max-width: 100%;">

            <!-- Copyright -->
            <div class="text-center mt-4">
                <marquee class="mb-0" style="color: #c9a050; font-size: 0.8rem;" behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
                    SHREETECH INNOVATIVE IT R&D  &copy; 2026. All rights reserved.
                </marquee>
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
