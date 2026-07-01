<!-- HERO SECTION -->
<style>
    /* Coverflow Slider Styles */
    .banner-slider-container {
        position: relative;
        width: 100%;
        height: 100vh;
        background: #000; /* Dark background to make images pop */
        overflow: hidden;
        cursor: none; /* Hide default cursor to use custom one */
        padding-top: 80px; /* Space for navbar */
        display: flex;
        align-items: center;
    }
    
    .swiper-banner {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .swiper-banner .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 60%;
        height: 60vh;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 15px 35px rgba(0,0,0,0.5);
    }
    
    /* Make active slide normal brightness, inactive slides darker */
    .swiper-banner .swiper-slide::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.6);
        transition: background 0.3s ease;
    }
    .swiper-banner .swiper-slide-active::after {
        background: rgba(0,0,0,0.2);
    }

    .slide-content {
        position: absolute;
        bottom: 40px;
        left: 40px;
        right: 40px;
        color: #fff;
        z-index: 10;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease;
    }
    .swiper-slide-active .slide-content {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.3s;
    }

    /* Custom Cursor */
    .custom-cursor {
        position: absolute;
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.9);
        color: #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
        pointer-events: none; /* So it doesn't block clicks */
        z-index: 9999;
        transform: translate(-50%, -50%) scale(0);
        transition: transform 0.2s ease-out;
        mix-blend-mode: difference;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .custom-cursor.active {
        transform: translate(-50%, -50%) scale(1);
    }

    @media (max-width: 768px) {
        .swiper-banner .swiper-slide { width: 85%; height: 50vh; }
        .slide-content { left: 20px; right: 20px; bottom: 20px; }
        .banner-slider-container { cursor: auto; }
        .custom-cursor { display: none; }
    }
</style>

<section id="home" class="banner-slider-container">
    <div class="custom-cursor" id="customCursor">Drag</div>
    
    <?php if(!empty($data['banners'])): ?>
        <div class="swiper swiper-banner">
            <div class="swiper-wrapper">
                <?php foreach($data['banners'] as $banner): ?>
                    <div class="swiper-slide" style="background-image: url('<?= $banner->image_url; ?>');">
                        <div class="slide-content">
                            <?php if(!empty($banner->title)): ?>
                                <h1 class="display-4 fw-bold mb-2" style="font-family: 'Playfair Display', serif;"><?= $banner->title; ?></h1>
                            <?php endif; ?>
                            <?php if(!empty($banner->subtitle)): ?>
                                <p class="lead mb-3"><?= $banner->subtitle; ?></p>
                            <?php endif; ?>
                            <?php if(!empty($banner->link_url)): ?>
                                <a href="<?= $banner->link_url; ?>" class="btn btn-warning rounded-pill px-4 py-2 text-uppercase fw-bold">Explore</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Pagination (optional) -->
            <div class="swiper-pagination"></div>
        </div>
    <?php else: ?>
        <!-- Fallback if no banners are added -->
        <div class="container position-relative z-index-1 text-center text-white w-100">
            <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
                <?= $data['settings']['hero_title'] ?? 'Rotary Club of Madurai'; ?>
            </h1>
            <p class="lead mb-5 mx-auto" style="max-width: 700px;">
                <?= $data['settings']['hero_subtitle'] ?? 'Join us in making a difference in our community and around the world.'; ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4 pb-3 z-index-1">
        <a href="#about" class="text-white text-decoration-none">
            <i class="fas fa-chevron-down fs-3 bounce-animation"></i>
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper Coverflow
    if(document.querySelector('.swiper-banner')) {
        const swiper = new Swiper('.swiper-banner', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: 30, // Angle of adjacent slides
                stretch: 0,
                depth: 100, // Z-index depth
                modifier: 1,
                slideShadows: true, // Swiper's built-in shadows
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // Custom Cursor Logic
    const bannerContainer = document.querySelector('.banner-slider-container');
    const customCursor = document.getElementById('customCursor');

    if(bannerContainer && customCursor) {
        bannerContainer.addEventListener('mousemove', (e) => {
            // Calculate relative position within the container
            const rect = bannerContainer.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            customCursor.style.left = `${x}px`;
            customCursor.style.top = `${y}px`;
        });

        bannerContainer.addEventListener('mouseenter', () => {
            customCursor.classList.add('active');
        });

        bannerContainer.addEventListener('mouseleave', () => {
            customCursor.classList.remove('active');
        });
    }
});
</script>

<!-- ABOUT SECTION -->
<section id="about" class="py-5 bg-light">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 gs-reveal">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=2070&auto=format&fit=crop" class="img-fluid rounded-4 shadow-lg" alt="About Rotary">
                    <div class="position-absolute bottom-0 end-0 bg-primary text-white p-4 rounded-4 shadow translate-middle-x mb-n4 me-n4 d-none d-lg-block">
                        <h3 class="fw-bold mb-0">Since 1938</h3>
                        <p class="mb-0 small">Serving Humanity</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5 gs-reveal">
                <h6 class="text-primary fw-bold text-uppercase mb-2">About Us</h6>
                <h2 class="display-5 fw-bold mb-4" style="font-family: 'Playfair Display', serif;">Service Above Self</h2>
                <p class="text-muted mb-4 fs-5">
                    <?= $data['settings']['about_mission'] ?? 'Our mission is to provide service to others, promote integrity, and advance world understanding...'; ?>
                </p>
                <div class="row g-4 mt-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary">
                                <i class="fas fa-users fs-4"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0"><span class="counter-val" data-target="<?= $data['settings']['stat_members'] ?? '150'; ?>">0</span>+</h3>
                                <p class="text-muted small mb-0">Active Members</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3 text-warning">
                                <i class="fas fa-project-diagram fs-4"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0"><span class="counter-val" data-target="<?= $data['settings']['stat_projects'] ?? '50'; ?>">0</span>+</h3>
                                <p class="text-muted small mb-0">Projects Completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects" class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5 gs-reveal">
            <h6 class="text-primary fw-bold text-uppercase mb-2">Our Impact</h6>
            <h2 class="display-5 fw-bold" style="font-family: 'Playfair Display', serif;">Recent Projects</h2>
            <div class="mx-auto bg-primary mt-3" style="width: 60px; height: 3px;"></div>
        </div>
        <div class="row g-4">
            <?php if(!empty($data['projects'])): ?>
                <?php foreach(array_slice($data['projects'], 0, 3) as $project): ?>
                <div class="col-md-4 gs-reveal">
                    <div class="card h-100 border-0 shadow-sm project-card overflow-hidden">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop" class="card-img-top w-100 h-100 object-fit-cover transition-transform" alt="Project">
                            <div class="position-absolute top-0 end-0 m-3 badge bg-primary"><?= $project->status; ?></div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3"><?= $project->title; ?></h5>
                            <p class="text-muted small mb-0"><?= substr(strip_tags($project->content), 0, 100); ?>...</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted"><p>No projects available right now. Check back later!</p></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- EVENTS SECTION -->
<section id="events" class="py-5 bg-dark text-white position-relative" style="background: url('https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2069&auto=format&fit=crop') center/cover fixed;">
    <div class="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85);"></div>
    <div class="container py-5 position-relative z-index-1">
        <div class="text-center mb-5 gs-reveal">
            <h6 class="text-warning fw-bold text-uppercase mb-2">Join Us</h6>
            <h2 class="display-5 fw-bold" style="font-family: 'Playfair Display', serif;">Upcoming Events</h2>
            <div class="mx-auto bg-warning mt-3" style="width: 60px; height: 3px;"></div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if(!empty($data['events'])): ?>
                    <?php foreach($data['events'] as $event): ?>
                    <div class="card bg-transparent border-light border-opacity-25 mb-4 gs-reveal hover-bg-light transition-all">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="text-center me-4 pe-4 border-end border-light border-opacity-25">
                                <h3 class="fw-bold text-warning mb-0"><?= date('d', strtotime($event->event_date)); ?></h3>
                                <span class="text-uppercase small"><?= date('M', strtotime($event->event_date)); ?></span>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fw-bold mb-1"><?= $event->title; ?></h5>
                                <p class="text-white-50 small mb-0"><i class="fas fa-map-marker-alt me-2"></i><?= $event->location ?? 'TBD'; ?></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-light rounded-pill px-4">Register</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center"><p class="text-white-50">Stay tuned for upcoming events.</p></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT & DONATE -->
<section id="contact" class="py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 gs-reveal">
                <h6 class="text-primary fw-bold text-uppercase mb-2">Get In Touch</h6>
                <h2 class="display-5 fw-bold mb-4" style="font-family: 'Playfair Display', serif;">Contact Us</h2>
                <div class="mb-4 d-flex">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow" style="width: 50px; height: 50px;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Email Us</h6>
                        <p class="text-muted mb-0"><?= $data['settings']['contact_email'] ?? 'info@rotary.org'; ?></p>
                    </div>
                </div>
                <div class="mb-5 d-flex">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow" style="width: 50px; height: 50px;">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Call Us</h6>
                        <p class="text-muted mb-0"><?= $data['settings']['contact_phone'] ?? '+1 234 567 890'; ?></p>
                    </div>
                </div>
                
                <h4 class="fw-bold mb-3 mt-5" id="donate">Make a Donation</h4>
                <p class="text-muted">Your contribution helps us fund critical projects in health, education, and community development.</p>
                <form action="#" method="POST" class="mt-4">
                    <div class="input-group mb-3 shadow-sm rounded-pill overflow-hidden">
                        <span class="input-group-text bg-white border-0 ps-4 text-muted">$</span>
                        <input type="number" class="form-control border-0 py-3" placeholder="Amount">
                        <button class="btn btn-primary px-4 fw-bold" type="submit">Donate</button>
                    </div>
                </form>
            </div>
            
            <div class="col-lg-6 gs-reveal">
                <div class="card border-0 shadow-lg p-4 rounded-4 bg-white glass">
                    <h4 class="fw-bold mb-4">Send a Message</h4>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control bg-light border-0 py-3" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control bg-light border-0 py-3" placeholder="Your Email">
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control bg-light border-0 py-3" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <button class="btn btn-primary w-100 py-3 rounded-pill fw-bold">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white py-4 border-top border-secondary">
    <div class="container text-center">
        <p class="mb-0 text-white-50 small">&copy; <?= date('Y'); ?> <?= $data['settings']['site_name'] ?? 'Rotary Club'; ?>. All Rights Reserved.</p>
    </div>
</footer>
