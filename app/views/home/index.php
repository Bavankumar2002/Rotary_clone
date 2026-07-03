<!-- HERO SECTION -->
<style>
    /* Coverflow Slider Styles */
    .banner-slider-container {
        position: relative;
        width: 100%;
        height: 105vh;
        min-height: 650px; /* Set min-height to ensure container doesn't squeeze slides on small screens */
        background: transparent; /* CSS handles the gradient now */
        overflow: hidden;
        cursor: none; /* Hide default cursor to use custom one */
        padding-top: 100px; /* Increased padding to move elements down and prevent overlapping with header */
        display: flex;
        align-items: flex-end; /* Align elements to the bottom to safeguard header space */
        justify-content: center;
        padding-bottom: 30px; /* Padding at bottom for spacing above scroll arrow */
    }
    
    .swiper-banner {
        width: 100%;
        max-width: 1400px; /* Restrict width to show exactly 3 cards elegantly */
        margin: 0 auto;
        padding-top: 20px;
        padding-bottom: 20px;
        overflow: visible !important; /* Allow slides to scale without clipping */
    }

    .swiper-banner .swiper-slide {
        width: 800px;
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
        width: 800px; /* Fixed width of the image card */
        height: 450px;
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
        width: 800px; /* Match the image container width */
        height: 450px;
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
            /* padding-top: 40px; */
            padding-bottom: 6px;
            cursor: auto;
        }
        .swiper-banner .swiper-slide {
            width: 320px;
            height: 380px;
        }
        .slide-image-container {
            width: 320px;
            height: 180px;
        }
        .swiper-banner .swiper-slide::after {
            width: 320px;
            height: 180px;
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
    
    <?php if(!empty($data['banners'])): ?>
        <div class="swiper swiper-banner" style="margin-top: 150px;">
            <div class="swiper-wrapper">
                <?php foreach($data['banners'] as $banner): ?>
                    <div class="swiper-slide">
                        <div class="slide-image-container">
                            <div class="slide-image" style="background-image: url('<?= $banner->image_url; ?>');"></div>
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
                rotate: 0,        
                stretch: 0,     
                depth: 150,       
                modifier: 1.5,
                slideShadows: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
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
<section id="about" class="page-section" style="background: linear-gradient(180deg, #FFFFFF 0%, #F8FAFC 100%);">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 gs-reveal">
                <div class="position-relative">
                    <img src="<?= $data['settings']['about_image'] ?? 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=2070&auto=format&fit=crop'; ?>" class="img-fluid rounded-4 shadow-lg" alt="About Rotary">
                    <div class="position-absolute bottom-0 end-0 bg-primary text-white p-4 rounded-4 shadow translate-middle-x mb-n4 me-n4 d-none d-lg-block">
                        <h3 class="fw-bold mb-0">Since 1938</h3>
                        <p class="mb-0 small">Serving Humanity</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5 gs-reveal">
                <h6 class="text-blue fw-bold text-uppercase mb-2">Introduction</h6>
                <h2 class="display-5 fw-bold mb-4"><?= $data['settings']['about_title'] ?? 'Service Above Self'; ?></h2>
                <p class="text-muted mb-4 fs-5">
                    <?= $data['settings']['about_mission'] ?? 'Our mission is to provide service to others, promote integrity, and advance world understanding...'; ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- TEAM LEADERS SECTION -->
<section id="team" class="page-section bg-white">
    <div class="text-center mb-5 gs-reveal">
        <h6 class="text-blue fw-bold text-uppercase mb-2">Our Leadership</h6>
        <h2 class="display-5 fw-bold">Team Leaders</h2>
        <div class="divider"></div>
    </div>
    
    <div class="container py-4">
        <div class="swiper swiper-team gs-reveal" style="padding-bottom: 50px;">
            <div class="swiper-wrapper">
                <?php if(!empty($data['team_leaders'])): ?>
                    <?php foreach($data['team_leaders'] as $leader): ?>
                        <?php if (!empty($leader->image_url)): ?>
                            <div class="swiper-slide">
                                <div class="card border-0 shadow-sm h-100 overflow-hidden mx-auto" style="background-color: transparent; max-width: 350px;">
                                    <img src="<?= $leader->image_url; ?>" class="img-fluid w-100" style="object-fit: contain;" alt="Team Leaders">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="swiper-slide text-center text-muted"><p>Team leaders image will appear here once added in the admin panel.</p></div>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination team-pagination"></div>
        </div>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(document.querySelector('.swiper-team')) {
                new Swiper('.swiper-team', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    grabCursor: true,
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.team-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: { slidesPerView: 1, spaceBetween: 20 },
                        768: { slidesPerView: 2, spaceBetween: 30 },
                        1024: { slidesPerView: 3, spaceBetween: 40 },
                    }
                });
            }
        });
        </script>
        <style>
        .swiper-team {
            padding: 20px 0 60px 0 !important;
        }
        .team-pagination {
            bottom: 0 !important;
        }
        .team-pagination .swiper-pagination-bullet {
            background: var(--rotary-blue, #0b3e82);
            opacity: 0.5;
            width: 10px;
            height: 10px;
        }
        .team-pagination .swiper-pagination-bullet-active {
            background: var(--rotary-gold, #f7a81b);
            opacity: 1;
        }
        </style>
    </div>
</section>

<!-- EVENTS SECTION -->
<section id="events" class="page-section" style="background: linear-gradient(180deg, #FFFFFF 0%, #F8FAFC 100%);">
    <div class="container py-5">
        <div class="text-center mb-5 gs-reveal">
            <h6 class="text-blue fw-bold text-uppercase mb-2">Our Activities</h6>
            <h2 class="display-5 fw-bold">Events</h2>
            <div class="divider"></div>
        </div>
        <div class="row g-4">
            <?php 
                // Default fallback items to maintain the 2x2 grid
                $displayEvents = [
                    (object)[
                        'title' => 'Community Service',
                        'description' => 'Making a difference through local development, education, and support programs.',
                        'image_url' => 'https://images.unsplash.com/photo-1593113565630-1e2ad96d5180?q=80&w=2000&auto=format&fit=crop'
                    ],
                    (object)[
                        'title' => 'Youth Programs',
                        'description' => 'Run by specialist doctors with strong academic and clinical backgrounds, delivering precise and personalized treatment you can rely on.',
                        'image_url' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=2070&auto=format&fit=crop'
                    ],
                    (object)[
                        'title' => 'Health Camps',
                        'description' => 'Promoting wellness with free medical checkups, awareness drives, and care access.',
                        'image_url' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=2070&auto=format&fit=crop'
                    ],
                    (object)[
                        'title' => 'Rotary Foundation Contributions',
                        'description' => 'Supporting global good through grants, scholarships, and sustainable impact projects.',
                        'image_url' => 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?q=80&w=2070&auto=format&fit=crop'
                    ]
                ];

                // Override fallbacks with actual events from the database
                if(!empty($data['events'])) {
                    foreach($data['events'] as $index => $dbEvent) {
                        if($index < 4) {
                            $displayEvents[$index] = $dbEvent;
                        }
                    }
                }
            ?>
            
            <?php foreach($displayEvents as $event): ?>
            <div class="col-md-6 gs-reveal">
                <div class="d-flex align-items-center bg-white p-3 h-100" style="border: 1px solid rgba(0,0,0,0.05);">
                    <div class="flex-shrink-0" style="width: 140px; height: 100px;">
                        <?php $evtImg = !empty($event->image_url) ? $event->image_url : 'https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop'; ?>
                        <img src="<?= $evtImg; ?>" class="w-100 h-100 object-fit-cover rounded-1" alt="<?= htmlspecialchars($event->title); ?>">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;"><?= $event->title; ?></h5>
                        <p class="text-muted small mb-0" style="font-size: 0.85rem;"><?= substr(strip_tags($event->description ?? ($event->content ?? '')), 0, 100); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects" class="page-section bg-white">
    <div class="container py-5">
        <div class="text-center mb-5 gs-reveal">
            <h6 class="text-blue fw-bold text-uppercase mb-2">Our Articles</h6>
            <h2 class="display-5 fw-bold">Featured Articles</h2>
            <div class="divider"></div>
        </div>
        <div class="swiper swiper-articles gs-reveal" style="padding-bottom: 50px;">
            <div class="swiper-wrapper">
                <?php if(!empty($data['projects'])): ?>
                    <?php foreach($data['projects'] as $project): ?>
                    <div class="swiper-slide">
                        <div class="card h-100 modern-card mx-auto" style="max-width: 400px;">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <?php $projImg = !empty($project->image_url) ? $project->image_url : 'https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1974&auto=format&fit=crop'; ?>
                                <img src="<?= $projImg; ?>" class="card-img-top w-100 h-100 object-fit-cover transition-transform" alt="<?= htmlspecialchars($project->title); ?>">
                                <div class="position-absolute top-0 end-0 m-3 badge" style="background-color: var(--primary-blue);"><?= $project->status; ?></div>
                            </div>
                            <div class="card-body p-4 text-start">
                                <h5 class="fw-bold mb-3"><?= $project->title; ?></h5>
                                <div style="height: 2px; width: 40px; background-color: var(--accent-gold); margin-bottom: 1rem;"></div>
                                <p class="text-muted small mb-0"><?= substr(strip_tags($project->content), 0, 100); ?>...</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="swiper-slide text-center text-muted"><p>No articles available right now. Check back later!</p></div>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination articles-pagination"></div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(document.querySelector('.swiper-articles')) {
                new Swiper('.swiper-articles', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    grabCursor: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.articles-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: { slidesPerView: 1, spaceBetween: 20 },
                        768: { slidesPerView: 2, spaceBetween: 30 },
                        1024: { slidesPerView: 3, spaceBetween: 40 },
                    }
                });
            }
        });
        </script>
        <style>
        .articles-pagination {
            bottom: 0 !important;
        }
        .articles-pagination .swiper-pagination-bullet {
            background: var(--rotary-blue, #0b3e82);
            opacity: 0.5;
            width: 10px;
            height: 10px;
        }
        .articles-pagination .swiper-pagination-bullet-active {
            background: var(--rotary-gold, #f7a81b);
            opacity: 1;
        }
        </style>
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

<section id="gallery" class="page-section" style="background: linear-gradient(180deg, #FFFFFF 0%, #F8FAFC 100%);">
    <div class="container py-5">
        <div class="text-center mb-5 gs-reveal">
            <h6 class="text-blue fw-bold text-uppercase mb-2">Our Moments</h6>
            <h2 class="display-5 fw-bold">Photo Gallery</h2>
            <div class="divider"></div>
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


<!-- CONTACT SECTION -->
<section id="contact" class="page-section bg-white">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="text-center mb-5 gs-reveal">
                    <h6 class="text-blue fw-bold text-uppercase mb-2">CONTACT US</h6>
                    <h2 class="display-5 fw-bold" style="line-height: 1.2;"><?= $data['settings']['contact_form_title'] ?? 'Have Questions?<br>Get In Touch!'; ?></h2>
                    <div class="divider"></div>
                </div>
                
                <div class="p-4 p-md-5 rounded-4 shadow-sm modern-card gs-reveal">
                    <style>
                        /* Force placeholder colors directly on the page to avoid caching issues */
                        .modern-card .form-control::placeholder { color: #000000 !important; opacity: 1 !important; }
                        .modern-card .form-control::-webkit-input-placeholder { color: #000000 !important; opacity: 1 !important; }
                        .modern-card .form-control::-moz-placeholder { color: #000000 !important; opacity: 1 !important; }
                        .modern-card .form-control:-ms-input-placeholder { color: #000000 !important; opacity: 1 !important; }
                        .modern-card .form-control::-ms-input-placeholder { color: #000000 !important; opacity: 1 !important; }
                    </style>
                    <?php if(isset($_SESSION['contact_success'])): ?>
                        <div class="alert alert-success bg-transparent text-success rounded-0 mb-4" style="border: 1px solid #198754;">
                            <i class="fas fa-check-circle me-2" style="color: #198754;"></i> <?= $_SESSION['contact_success']; ?>
                        </div>
                        <?php unset($_SESSION['contact_success']); ?>
                    <?php endif; ?>
                    <form action="<?= URLROOT; ?>/pages/submitContact" method="POST">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <input type="text" name="first_name" class="form-control bg-light text-dark shadow-none" placeholder="First Name" style="border: 1px solid var(--border-color); padding: 12px 15px;" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last_name" class="form-control bg-light text-dark shadow-none" placeholder="Last Name" style="border: 1px solid var(--border-color); padding: 12px 15px;">
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <input type="email" name="email" class="form-control bg-light text-dark shadow-none" placeholder="Email Address" style="border: 1px solid var(--border-color); padding: 12px 15px;" required>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 shadow-none" style="border: 1px solid var(--border-color);"><img src="https://flagcdn.com/w20/in.png" alt="IN" style="width: 20px;"></span>
                                    <input type="tel" name="phone" class="form-control bg-light text-dark border-start-0 shadow-none" placeholder="Phone Number" style="border: 1px solid var(--border-color); padding: 12px 15px;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <textarea name="message" class="form-control bg-light text-dark shadow-none" rows="5" placeholder="Your Message" style="border: 1px solid var(--border-color); padding: 12px 15px;" required></textarea>
                        </div>
                        
                        <div class="form-check mb-5">
                            <input class="form-check-input shadow-none" type="checkbox" id="privacyCheck" style="border: 1px solid var(--border-color);" required>
                            <label class="form-check-label text-muted" for="privacyCheck" style="font-size: 0.85rem;">
                                I agree with the site's privacy policy
                            </label>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


