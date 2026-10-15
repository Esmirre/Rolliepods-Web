/**
 * ROLLIEPODS - Main JavaScript (app.js)
 */

document.addEventListener('DOMContentLoaded', () => {
    initHeaderScroll();
    initMobileNav();
    initImageLightbox();
    initSmoothScroll();
});

/* ==========================================================================
   1. Sticky Header Scroll Effect
   Adds a shadow to the header when the user scrolls down
   ========================================================================== */
function initHeaderScroll() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
}

/* ==========================================================================
   2. Mobile Navigation Toggle
   Handles opening and closing the navbar on mobile devices
   ========================================================================== */
function initMobileNav() {
    const toggleBtn = document.querySelector('.mobile-nav-toggle');
    const navList = document.querySelector('.nav-list');

    if (!toggleBtn || !navList) return;

    toggleBtn.addEventListener('click', () => {
        const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
        toggleBtn.setAttribute('aria-expanded', !isExpanded);
        navList.classList.toggle('active');
        toggleBtn.classList.toggle('open');
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!toggleBtn.contains(e.target) && !navList.contains(e.target) && navList.classList.contains('active')) {
            navList.classList.remove('active');
            toggleBtn.setAttribute('aria-expanded', 'false');
            toggleBtn.classList.remove('open');
        }
    });
}

/* ==========================================================================
   3. Image Lightbox (Click to Enlarge Pod Images)
   Applies to .card-image elements on the About / Gallery pages
   ========================================================================== */
function initImageLightbox() {
    const cardImages = document.querySelectorAll('.card-image');
    if (cardImages.length === 0) return;

    // Create Modal Elements dynamically
    const modal = document.createElement('div');
    modal.className = 'img-modal';
    modal.innerHTML = `
        <div class="img-modal-overlay"></div>
        <div class="img-modal-content">
            <span class="img-modal-close">&times;</span>
            <img class="img-modal-src" src="" alt="Enlarged Image">
            <p class="img-modal-caption"></p>
        </div>
    `;
    document.body.appendChild(modal);

    const modalImg = modal.querySelector('.img-modal-src');
    const modalCaption = modal.querySelector('.img-modal-caption');
    const closeBtn = modal.querySelector('.img-modal-close');
    const overlay = modal.querySelector('.img-modal-overlay');

    // Attach click event to card images
    cardImages.forEach(img => {
        img.style.cursor = 'pointer';
        img.addEventListener('click', () => {
            modalImg.src = img.src;
            modalCaption.textContent = img.alt || '';
            modal.classList.add('open');
        });
    });

    // Close Modal Events
    const closeModal = () => modal.classList.remove('open');
    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('open')) {
            closeModal();
        }
    });
}

/* ==========================================================================
   4. Smooth Scrolling for Anchor Links
   ========================================================================== */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
}
