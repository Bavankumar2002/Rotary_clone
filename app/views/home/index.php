<!-- HERO SECTION -->
<style>
    /* Coverflow Slider Styles */
    .banner-slider-container {
        position: relative;
        width: 100%;
        /* height: 85vh; */
        min-height: 650px; /* Set min-height to ensure container doesn't squeeze slides on small screens */
        background: linear-gradient(135deg, #081a33 0%, #030a14 100%); /* Premium dark blue-black gradient */
        overflow: hidden;
        cursor: none; /* Hide default cursor to use custom one */
        padding-top: 180px; /* Increased padding to move elements down and prevent overlapping with header */
        display: flex;
        align-items: flex-end; /* Align elements to the bottom to safeguard header space */
        justify-content: center;
        padding-bottom: 30px; /* Padding at bottom for spacing above scroll arrow */
    }
    
    .swiper-banner {
        width: 100%;
        max-width: 1100px; /* Restrict width to show exactly 3 cards elegantly */
        margin: 0 auto;
        padding-top: 20px;
        padding-bottom: 20px;
        overflow: visible !important; /* Allow slides to scale without clipping */
    }

    .swiper-banner .swiper-slide {
        background: transparent;
        height: 520px;
        border-radius: 0;
        overflow: visible;
        position: relative;
        box-shadow: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .slide-image-container {
        width: 300px; /* Fixed width of the image card */
        height: 360px;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        position: relative;
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    .slide-image {
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        transition: transform 0.5s ease;
    }

    /* Make inactive slides darker */
    .swiper-banner .swiper-slide::after {
        content: '';
        position: absolute;
        top: 0; left: 50%;
        transform: translateX(-50%);
        width: 300px; /* Match the image container width */
        height: 360px;
        border-radius: 24px;
        background: rgba(0,0,0,0.5);
        transition: background 0.3s ease;
        pointer-events: none;
        z-index: 2;
    }
    .swiper-banner .swiper-slide-active::after {
        background: rgba(0,0,0,0);
    }

    .slide-content {
        width: 100%;
        margin-top: 20px;
        color: #fff;
        text-align: center;
        z-index: 10;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        pointer-events: none;
    }
    
    .swiper-slide-active .slide-content {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.2s;
        pointer-events: auto;
    }

    .slide-content h1 {
        font-size: 1.8rem !important;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .slide-content p {
        font-size: 0.95rem !important;
        color: rgba(255, 255, 255, 0.7);
        max-width: 90%;
        margin: 0 auto 15px auto;
    }

    .slide-content .btn {
        font-size: 0.8rem !important;
        padding: 8px 24px !important;
        transition: all 0.3s ease;
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
        z-index: 999; /* Stay below navigation header */
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

    #mainNav {
        z-index: 10000 !important; /* Ensure navigation bar has highest visibility priority */
    }

    /* Wave Pagination Style */
    .swiper-pagination {
        position: relative !important;
        bottom: 0 !important;
        margin-top: 10px;
        display: flex !important;
        justify-content: center;
        align-items: center;
        height: 40px;
        gap: 6px;
    }
    
    .swiper-pagination-bullet {
        width: 3px !important;
        height: 8px; /* Dynamic height applied by JS */
        background: #fff !important;
        opacity: 0.3 !important;
        border-radius: 4px !important;
        margin: 0 !important;
        transition: height 0.4s ease, opacity 0.4s ease, background-color 0.4s ease !important;
    }
    
    .swiper-pagination-bullet-active {
        opacity: 1 !important;
        background: var(--rotary-gold, #f7a81b) !important;
    }

    @media (max-width: 768px) {
        .banner-slider-container {
            height: auto;
            min-height: 0;
            padding-top: 100px;
            padding-bottom: 40px;
            cursor: auto;
        }
        .swiper-banner .swiper-slide {
            width: 240px;
            height: 450px;
        }
        .slide-image-container {
            height: 300px;
        }
        .swiper-banner .swiper-slide::after {
            height: 300px;
        }
        .slide-content {
            margin-top: 15px;
        }
        .slide-content h1 {
            font-size: 1.4rem !important;
        }
        .slide-content p {
            font-size: 0.85rem !important;
        }
        .slide-content .btn {
            font-size: 0.75rem !important;
            padding: 6px 16px !important;
        }
        .custom-cursor {
            display: none;
        }
    }
</style>

<section id="home" class="banner-slider-container">
    <div class="custom-cursor" id="customCursor">Drag</div>
    
    <!-- Always show Hero Text -->
    <div class="position-absolute w-100 text-center text-white" style="top: 150px; z-index: 10;">
        <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
            <?= $data['settings']['hero_title'] ?? 'Rotary Club of Madurai'; ?>
        </h1>
        <p class="lead mb-5 mx-auto" style="max-width: 700px;">
            <?= $data['settings']['hero_subtitle'] ?? 'Join us in making a difference in our community and around the world.'; ?>
        </p>
    </div>
    
    <?php if(!empty($data['banners'])): ?>
        <div class="swiper swiper-banner" style="margin-top: 150px;">
            <div class="swiper-wrapper">
                <?php foreach($data['banners'] as $banner): ?>
                    <div class="swiper-slide">
                        <div class="slide-image-container">
                            <div class="slide-image" style="background-image: url('<?= $banner->image_url; ?>');"></div>
                        </div>
                        <div class="slide-content">
                            <?php if(!empty($banner->title)): ?>
                                <h1 class="fw-bold mb-2"><?= $banner->title; ?></h1>
                            <?php endif; ?>
                            <?php if(!empty($banner->subtitle)): ?>
                                <p class="mb-3"><?= $banner->subtitle; ?></p>
                            <?php endif; ?>
                            <?php if(!empty($banner->link_url)): ?>
                                <a href="<?= $banner->link_url; ?>" class="btn btn-warning rounded-pill text-uppercase fw-bold">Explore</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Pagination (dynamic wave) -->
            <div class="swiper-pagination"></div>
        </div>
    <?php endif; ?>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper Coverflow
    if(document.querySelector('.swiper-banner')) {
        const swiper = new Swiper('.swiper-banner', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            loopAdditionalSlides: 3,
            speed: 600,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: 0,        // Flat style like reference image
                stretch: -30,     // Spacing between cards (negative pulls them closer)
                depth: 120,       // Scale and Z-index depth for adjacent slides (lower value makes them visible)
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
                0: {
                    slidesPerView: 1,
                }
            },
            on: {
                init: function () {
                    updatePaginationWave(this);
                },
                slideChange: function () {
                    updatePaginationWave(this);
                }
            }
        });

        // Dynamic wave heights for pagination bullets
        function updatePaginationWave(swiperInstance) {
            const activeIndex = swiperInstance.realIndex;
            const bullets = document.querySelectorAll('.swiper-pagination-bullet');
            if (!bullets.length) return;
            
            const total = bullets.length;
            bullets.forEach((bullet, index) => {
                let distance = Math.abs(index - activeIndex);
                if (distance > total / 2) {
                    distance = total - distance; // Handle loop wrap-around
                }
                
                let height = 8;
                let opacity = 0.3;
                
                if (distance === 0) {
                    height = 30; // Active slide bullet
                    opacity = 1;
                } else if (distance === 1) {
                    height = 18; // Adjacent bullets
                    opacity = 0.6;
                } else if (distance === 2) {
                    height = 12; // Farther bullets
                    opacity = 0.4;
                }
                
                bullet.style.height = `${height}px`;
                bullet.style.opacity = opacity;
            });
        }
    }

    // Custom Cursor Logic
    const bannerContainer = document.querySelector('.banner-slider-container');
    const customCursor = document.getElementById('customCursor');

    if(bannerContainer && customCursor) {
        bannerContainer.addEventListener('mousemove', (e) => {
            const rect = bannerContainer.getBoundingClientRect();
            const x = e.clientX - rect.left;
            
            // Clamp viewport Y to stay below the fixed navigation header (120px height)
            const headerHeight = 120;
            const clampedClientY = Math.max(headerHeight, e.clientY);
            const y = clampedClientY - rect.top;
            
            customCursor.style.left = `${x}px`;
            customCursor.style.top = `${y}px`;
        });

        // Show custom cursor ONLY when mouse is over the slide images (not in the empty space)
        const slideImages = document.querySelectorAll('.slide-image-container');
        slideImages.forEach(image => {
            image.addEventListener('mouseenter', () => {
                customCursor.classList.add('active');
            });
            image.addEventListener('mouseleave', () => {
                customCursor.classList.remove('active');
            });
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
                <h2 class="display-5 fw-bold mb-4 text-dark" style="font-family: 'Playfair Display', serif;">Service Above Self</h2>
                <p class="text-muted mb-4 fs-5">
                    <?= $data['settings']['about_mission'] ?? 'Our mission is to provide service to others, promote integrity, and advance world understanding...'; ?>
                </p>
                <div class="row g-4 mt-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary">
                                <i class="fas fa-award fs-4"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0 text-dark"><span class="counter-val" data-target="<?= $data['settings']['stat_years'] ?? '85'; ?>">0</span>+</h3>
                                <p class="text-muted small mb-0">Years of Service</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3 text-warning">
                                <i class="fas fa-project-diagram fs-4"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0 text-dark"><span class="counter-val" data-target="<?= $data['settings']['stat_projects'] ?? '50'; ?>">0</span>+</h3>
                                <p class="text-muted small mb-0">Projects Completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TEAM LEADERS SECTION -->
<section id="team" class="py-5 bg-light">
    <div class="text-center mb-5 gs-reveal">
        <h6 class="text-primary fw-bold text-uppercase mb-2">Our Leadership</h6>
        <h2 class="display-5 fw-bold text-dark" style="font-family: 'Playfair Display', serif;">Team Leaders</h2>
        <div class="mx-auto bg-primary mt-3" style="width: 60px; height: 3px;"></div>
    </div>
    
    <div class="container py-4">
        <div class="row g-4 justify-content-center">
            <?php if(!empty($data['team_leaders'])): ?>
                <?php foreach($data['team_leaders'] as $leader): ?>
                    <?php if (!empty($leader->image_url)): ?>
                        <div class="col-md-4 gs-reveal">
                            <div class="card border-0 shadow-sm h-100 overflow-hidden" style="background-color: transparent;">
                                <img src="<?= $leader->image_url; ?>" class="img-fluid w-100" style="object-fit: contain;" alt="Team Leaders">
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted"><p>Team leaders image will appear here once added in the admin panel.</p></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects" class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5 gs-reveal">
            <h6 class="text-primary fw-bold text-uppercase mb-2">Our Impact</h6>
            <h2 class="display-5 fw-bold" style="font-family: 'Playfair Display', serif;">Recent Articles</h2>
            <div class="mx-auto bg-primary mt-3" style="width: 60px; height: 3px;"></div>
        </div>
        <div class="row g-4">
            <?php if(!empty($data['projects'])): ?>
                <?php foreach(array_slice($data['projects'], 0, 3) as $project): ?>
                <div class="col-md-4 gs-reveal">
                    <div class="card h-100 border-0 shadow-sm project-card overflow-hidden">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <?php $projImg = !empty($project->image_url) ? $project->image_url : 'https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop'; ?>
                            <img src="<?= $projImg; ?>" class="card-img-top w-100 h-100 object-fit-cover transition-transform" alt="<?= htmlspecialchars($project->title); ?>">
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

<!-- GALLERY SECTION -->
<style>
.gallery-item-card:hover .gallery-img {
    transform: scale(1.08);
}
.gallery-item-card:hover .gallery-overlay {
    opacity: 1 !important;
}
.gallery-img {
    transition: transform 0.5s ease;
}
.gallery-overlay {
    backdrop-filter: blur(1px);
}
#lightboxImg {
    max-height: 80vh;
    width: 100%;
    object-fit: contain;
    display: block;
}
.lightbox-img-container {
    background-color: #0b0f17 !important;
}
</style>

<section id="gallery" class="py-5 bg-dark text-white position-relative" style="background: linear-gradient(135deg, #121824 0%, #0a0e17 100%);">
    <div class="container py-5">
        <div class="text-center mb-5 gs-reveal">
            <h6 class="text-warning fw-bold text-uppercase mb-2">Our Moments</h6>
            <h2 class="display-5 fw-bold" style="font-family: 'Playfair Display', serif;">Photo Gallery</h2>
            <div class="mx-auto bg-warning mt-3" style="width: 60px; height: 3px;"></div>
        </div>
        
        <div class="row g-4">
            <?php if(!empty($data['gallery'])): ?>
                <?php foreach($data['gallery'] as $item): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 gs-reveal">
                    <div class="gallery-item-card overflow-hidden rounded-4 position-relative shadow-sm hover-shadow-lg" style="height: 250px; cursor: pointer;" onclick="openLightbox('<?= $item->image_url; ?>', '<?= addslashes($item->title); ?>', '<?= addslashes($item->category); ?>')">
                        <img src="<?= $item->image_url; ?>" class="w-100 h-100 object-fit-cover gallery-img" alt="<?= $item->title; ?>">
                        <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-3" style="background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%); opacity: 0; transition: opacity 0.4s ease;">
                            <?php if(!empty($item->category)): ?>
                                <span class="badge bg-warning text-dark align-self-start mb-2 px-2 py-1 small rounded-pill"><?= $item->category; ?></span>
                            <?php endif; ?>
                            <h5 class="fw-bold mb-0 text-white"><?= $item->title; ?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-white-50"><p>No gallery images uploaded yet. Check back later!</p></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div class="modal fade" id="galleryLightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-end position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow-lg" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1055; filter: drop-shadow(0 2px 5px rgba(0,0,0,0.7));"></button>
                <div class="lightbox-img-container rounded-4 overflow-hidden shadow-lg bg-black">
                    <img id="lightboxImg" src="" class="img-fluid" alt="Full view">
                    <div class="p-3 bg-dark text-white text-start">
                        <span id="lightboxCategory" class="badge bg-warning text-dark mb-2 px-2 py-1 small rounded-pill"></span>
                        <h4 id="lightboxTitle" class="fw-bold mb-0 font-playfair"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openLightbox(url, title, category) {
    const lightboxModal = new bootstrap.Modal(document.getElementById('galleryLightbox'));
    document.getElementById('lightboxImg').src = url;
    document.getElementById('lightboxTitle').textContent = title || '';
    const catBadge = document.getElementById('lightboxCategory');
    if (category) {
        catBadge.textContent = category;
        catBadge.style.display = 'inline-block';
    } else {
        catBadge.style.display = 'none';
    }
    lightboxModal.show();
}
</script>

<!-- CALL TO ACTION BANNER -->
<section class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-lg-6 d-flex align-items-center justify-content-center text-center text-lg-start" style="background-color: #1a1a1a; min-height: 200px; padding: 3rem;">
            <div>
                <p class="text-uppercase mb-2 text-white-50 fw-bold" style="font-size: 0.75rem; letter-spacing: 1.5px;"><?= htmlspecialchars($data['settings']['contact_banner_subtitle'] ?? 'JOIN WITH US'); ?></p>
                <h2 class="text-white fw-bold mb-0" style="font-size: 2rem;"><?= htmlspecialchars($data['settings']['contact_banner_title'] ?? 'Connect. Serve. Lead. Become a Rotarian today.'); ?></h2>
            </div>
        </div>
        <div class="col-lg-6" style="background-image: url('<?= htmlspecialchars($data['settings']['contact_banner_image'] ?? 'https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'); ?>'); background-size: cover; background-position: center; min-height: 200px;">
        </div>
    </div>
</section>

<!-- CONTACT SECTION -->
<style>
    #contact .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6) !important;
    }
</style>
<section id="contact" class="container-fluid p-0">
    <div class="row g-0">
        <!-- Left Image Half -->
        <div class="col-lg-6" style="background-image: url('<?= htmlspecialchars($data['settings']['contact_section_image'] ?? 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'); ?>'); background-size: cover; background-position: center; min-height: 500px;">
        </div>
        
        <!-- Right Form Half -->
        <div class="col-lg-6 d-flex align-items-center" style="background-color: #222222; padding: 5rem;">
            <div class="w-100" style="max-width: 600px; margin: 0 auto;">
                <p class="text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 1px; color: #fff; font-weight: 500;">CONTACT US</p>
                <h2 class="fw-bold mb-5" style="color: #fff; line-height: 1.2; font-size: 2.5rem;"><?= $data['settings']['contact_form_title'] ?? 'Have Questions?<br>Get In Touch!'; ?></h2>
                
                <form>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <input type="text" class="form-control rounded-0 bg-transparent text-white shadow-none" placeholder="Name" style="border: 1px solid rgba(255,255,255,0.2); padding: 12px 15px;">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control rounded-0 bg-transparent text-white shadow-none" placeholder="Last Name" style="border: 1px solid rgba(255,255,255,0.2); padding: 12px 15px;">
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <input type="email" class="form-control rounded-0 bg-transparent text-white shadow-none" placeholder="Email" style="border: 1px solid rgba(255,255,255,0.2); padding: 12px 15px;">
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text rounded-0 bg-transparent border-end-0 shadow-none" style="border: 1px solid rgba(255,255,255,0.2); color: #fff;"><img src="https://flagcdn.com/w20/in.png" alt="IN" style="width: 20px;"></span>
                                <input type="tel" class="form-control rounded-0 bg-transparent text-white border-start-0 shadow-none" placeholder="Phone" style="border: 1px solid rgba(255,255,255,0.2); padding: 12px 15px;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <textarea class="form-control rounded-0 bg-transparent text-white shadow-none" rows="4" placeholder="Message" style="border: 1px solid rgba(255,255,255,0.2); padding: 12px 15px;"></textarea>
                    </div>
                    
                    <div class="form-check mb-4">
                        <input class="form-check-input rounded-0 shadow-none" type="checkbox" id="privacyCheck" style="border: 1px solid rgba(255,255,255,0.2); background-color: transparent;">
                        <label class="form-check-label text-white" for="privacyCheck" style="font-size: 0.85rem; font-weight: 500;">
                            I agree with the site's privacy policy
                        </label>
                    </div>
                    
                    <button type="submit" class="btn fw-bold px-4 py-2 rounded-0 shadow-none" style="background-color: #c9a050; color: #fff;">Get In Touch</button>
                </form>
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
