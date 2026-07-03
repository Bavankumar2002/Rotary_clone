document.addEventListener("DOMContentLoaded", function () {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    // Navbar hide/show on scroll
    let lastScrollTop = 0;
    const mainNav = document.body.querySelector('#mainNav');
    
    if (mainNav) {
        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Add scrolled class when not at the top
            if (scrollTop === 0) {
                mainNav.classList.remove('navbar-scrolled');
                mainNav.classList.remove('navbar-hidden');
            } else {
                mainNav.classList.add('navbar-scrolled');
                
                // Standard behavior: Hide on scroll DOWN, Show on scroll UP
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling DOWN the page -> hide navbar
                    mainNav.classList.add('navbar-hidden');
                } else {
                    // Scrolling UP the page -> show navbar
                    mainNav.classList.remove('navbar-hidden');
                }
            }
            lastScrollTop = scrollTop;
        });
    }

    // GSAP Animations
    gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray(".gs-reveal").forEach(function (elem) {
        gsap.fromTo(elem,
            { autoAlpha: 0, y: 50 },
            {
                duration: 1,
                autoAlpha: 1,
                y: 0,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: elem,
                    start: "top 80%", // when the top of the trigger hits 80% from the top of the viewport
                    toggleActions: "play none none reverse"
                }
            }
        );
    });

    // Smooth Scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            let targetId = this.getAttribute('href');
            if (targetId === '#') return;

            let targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - 70, // Adjust for fixed navbar
                    behavior: 'smooth'
                });
                // Close mobile menu if open
                const navbarToggler = document.querySelector('.navbar-toggler');
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            }
        });
    });

    // Counter Animation
    const counters = document.querySelectorAll('.counter-val');
    let hasCounted = false;

    window.addEventListener('scroll', () => {
        const statsSection = document.getElementById('about'); // or wherever stats are
        if (!statsSection) return;

        const sectionPos = statsSection.getBoundingClientRect().top;
        const screenPos = window.innerHeight;

        if (sectionPos < screenPos && !hasCounted) {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000; // ms
                const increment = target / (duration / 16); // 60fps

                let current = 0;
                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCounter();
            });
            hasCounted = true;
        }
    });

});
