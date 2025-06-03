/**
 * DigiMarkt Homepage JavaScript
 * Handles interactive elements and initializations for the DigiMarkt homepage
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize Bootstrap popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Initialize Owl Carousel for announcements if jQuery is available
    if (typeof jQuery !== 'undefined' && typeof jQuery.fn.owlCarousel !== 'undefined') {
        jQuery(".announcement-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            },
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ]
        });
    }

    // Initialize Lightbox if available
    if (typeof lightbox !== 'undefined') {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true,
            'disableScrolling': true
        });
    }

    // Animate elements when they come into view
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementPosition < windowHeight - 50) {
                element.classList.add('animated');
            }
        });
    };

    // Run animation check on load and scroll
    animateOnScroll();
    window.addEventListener('scroll', animateOnScroll);

    // Handle modal triggers for work packages and partners
    document.querySelectorAll('[data-modal-target]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-target');
            const modal = new bootstrap.Modal(document.getElementById(modalId));
            modal.show();
        });
    });

    // Handle smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            
            if (targetId !== '#' && document.querySelector(targetId)) {
                e.preventDefault();
                
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
