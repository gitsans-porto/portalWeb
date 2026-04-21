import './bootstrap';

/* ============================================
   SMKN 1 Limboto Portal — Interactions
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {

    // — Navbar scroll effect —
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        const handleScroll = () => {
            navbar.classList.toggle('scrolled', window.scrollY > 40);
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    }

    // — Mobile menu toggle —
    const menuBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('mobile-menu-close');
    const menu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('mobile-menu-overlay');

    function openMenu() {
        menu?.classList.add('active');
        overlay?.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeMenu() {
        menu?.classList.remove('active');
        overlay?.classList.remove('active');
        document.body.style.overflow = '';
    }

    menuBtn?.addEventListener('click', openMenu);
    closeBtn?.addEventListener('click', closeMenu);
    overlay?.addEventListener('click', closeMenu);

    // Close mobile menu on nav link click
    menu?.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // — Mobile dropdown toggle —
    const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');

    mobileDropdownBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const submenu = btn.nextElementSibling;
            btn.classList.toggle('active');
            submenu?.classList.toggle('active');
        });
    });

    // — Scroll Reveal (Intersection Observer) —
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        reveals.forEach(el => observer.observe(el));
    }

    // — Smooth scroll for anchor links —
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                const navHeight = navbar?.offsetHeight || 0;
                const top = target.getBoundingClientRect().top + window.scrollY - navHeight - 16;
                window.scrollTo({ top, behavior: 'smooth' });
            }
        });
    });

    // — Counter Animation —
    const counters = document.querySelectorAll('[data-counter]');
    if (counters.length) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.counter, 10);
                    const suffix = el.dataset.suffix || '';
                    const duration = 2000;
                    const start = performance.now();

                    function animate(now) {
                        const elapsed = now - start;
                        const progress = Math.min(elapsed / duration, 1);
                        // Ease out cubic
                        const eased = 1 - Math.pow(1 - progress, 3);
                        el.textContent = Math.round(eased * target) + suffix;
                        if (progress < 1) requestAnimationFrame(animate);
                    }
                    requestAnimationFrame(animate);
                    counterObserver.unobserve(el);
                }
            });
        }, { threshold: 0.3 });

        counters.forEach(el => counterObserver.observe(el));
    }
    // — Login Modal —
    const loginModalBtn = document.getElementById('login-modal-btn');
    const loginModalClose = document.getElementById('login-modal-close');
    const loginModalOverlay = document.getElementById('login-modal-overlay');

    function openLoginModal() {
        loginModalOverlay?.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeLoginModal() {
        loginModalOverlay?.classList.remove('active');
        document.body.style.overflow = '';
    }

    loginModalBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        openLoginModal();
    });
    loginModalClose?.addEventListener('click', closeLoginModal);
    loginModalOverlay?.addEventListener('click', (e) => {
        if (e.target === loginModalOverlay) closeLoginModal();
    });
});
