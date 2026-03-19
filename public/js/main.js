// Sticky Navbar
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Language Dropdown Toggle
const langToggle = document.getElementById('langToggle');
const langDropdown = document.getElementById('langDropdown');

if (langToggle && langDropdown) {
    langToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        langDropdown.classList.toggle('show');
        // Close search if open
        const searchBox = document.getElementById('searchBox');
        if (searchBox) searchBox.classList.remove('show');
    });
}

// Search Toggle
const searchToggle = document.getElementById('searchToggle');
const searchBox = document.getElementById('searchBox');
const searchInput = document.getElementById('searchInput');

if (searchToggle && searchBox) {
    searchToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        searchBox.classList.toggle('show');
        if (searchBox.classList.contains('show')) {
            searchInput.focus();
        }
        // Close lang if open
        if (langDropdown) langDropdown.classList.remove('show');
    });
}

// Live Search Suggestions
if (searchInput) {
    let timeout = null;
    const suggestionBox = document.createElement('div');
    suggestionBox.className = 'search-suggestions';
    suggestionBox.style.display = 'none';
    searchBox.appendChild(suggestionBox);

    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim();
        clearTimeout(timeout);

        if (query.length < 2) {
            suggestionBox.style.display = 'none';
            return;
        }

        timeout = setTimeout(() => {
            fetch(`${URLROOT}/search/suggestions?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length > 0) {
                        suggestionBox.innerHTML = data.map(item => `
                            <a href="${URLROOT}/search?q=${encodeURIComponent(item.result_title)}" class="suggestion-item">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <span>${item.result_title}</span>
                                <small>${item.category === 'abstracts' ? 'Resumen' : 'Agenda'}</small>
                            </a>
                        `).join('');
                        suggestionBox.style.display = 'block';
                    } else {
                        suggestionBox.style.display = 'none';
                    }
                })
                .catch(() => suggestionBox.style.display = 'none');
        }, 300);
    });

    // Close suggestions on click outside
    document.addEventListener('click', () => {
        suggestionBox.style.display = 'none';
    });
}

// Close dropdowns when clicking outside
document.addEventListener('click', () => {
    if (langDropdown) langDropdown.classList.remove('show');
    if (searchBox) searchBox.classList.remove('show');
});

// Prevent closing when clicking inside dropdowns
if (langDropdown) {
    langDropdown.addEventListener('click', (e) => e.stopPropagation());
}
if (searchBox) {
    searchBox.addEventListener('click', (e) => e.stopPropagation());
}

// Mobile Menu Toggle
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.querySelector('.nav-links');
const navOverlay = document.getElementById('navOverlay');
const menuIcon = document.getElementById('menuIcon');

function closeMobileMenu() {
    if (!navLinks) return;
    navLinks.classList.remove('mobile-open');
    if (navOverlay) navOverlay.classList.remove('active');
    if (menuToggle) {
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Abrir menú');
    }
    if (menuIcon) {
        menuIcon.classList.remove('fa-xmark');
        menuIcon.classList.add('fa-bars');
    }
    document.body.style.overflow = '';
}

function openMobileMenu() {
    if (!navLinks) return;
    navLinks.classList.add('mobile-open');
    if (navOverlay) navOverlay.classList.add('active');
    if (menuToggle) {
        menuToggle.setAttribute('aria-expanded', 'true');
        menuToggle.setAttribute('aria-label', 'Cerrar menú');
    }
    if (menuIcon) {
        menuIcon.classList.remove('fa-bars');
        menuIcon.classList.add('fa-xmark');
    }
    document.body.style.overflow = 'hidden';
}

if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
        navLinks.classList.contains('mobile-open') ? closeMobileMenu() : openMobileMenu();
    });
}

if (navOverlay) {
    navOverlay.addEventListener('click', closeMobileMenu);
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const href = this.getAttribute('href');
        if (href === '#') return;
        const target = document.querySelector(href);
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
        // Close mobile menu if open
        if (navLinks && navLinks.classList.contains('mobile-open')) closeMobileMenu();
    });
});

// HERO CAROUSEL LOGIC
const slides = document.querySelectorAll('.carousel-slide');
const indicators = document.querySelectorAll('.indicator');
const prevBtn = document.getElementById('prevSlide');
const nextBtn = document.getElementById('nextSlide');

if (slides.length > 0) {
    let currentSlide = 0;
    let slideInterval;

    const showSlide = (index) => {
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(ind => ind.classList.remove('active'));
        
        slides[index].classList.add('active');
        indicators[index].classList.add('active');
        currentSlide = index;
    };

    const nextSlide = () => {
        let next = (currentSlide + 1) % slides.length;
        showSlide(next);
    };

    const prevSlide = () => {
        let prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    };

    // Auto Slide
    const startAutoSlide = () => {
        if (!slideInterval) {
            slideInterval = setInterval(nextSlide, 4000); // 4 seconds
        }
    };

    const stopAutoSlide = () => {
        if (slideInterval) {
            clearInterval(slideInterval);
            slideInterval = null;
        }
    };

    // Event Listeners
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });
    }

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            stopAutoSlide();
            showSlide(index);
            startAutoSlide();
        });
    });

    // Start
    startAutoSlide();
}

/**
 * SECCIÓN: ANIMACIÓN DE CONTADORES (STATS)
 * Se activa cuando el usuario llega a la sección usando Intersection Observer
 */
const statsCounters = document.querySelectorAll('.counter');
if (statsCounters.length > 0) {
    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-target'));
        const duration = 2000; // 2 segundos
        const stepTime = 10;
        const increment = target / (duration / stepTime);
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                el.innerText = target.toLocaleString();
                clearInterval(timer);
            } else {
                el.innerText = Math.floor(current).toLocaleString();
            }
        }, stepTime);
    };

    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                if (!el.classList.contains('animated')) {
                    el.classList.add('animated');
                    animateCounter(el);
                }
            }
        });
    }, { threshold: 0.5 });

    statsCounters.forEach(counter => statsObserver.observe(counter));
}

/**
 * SECCIÓN: GALERÍA LIGHTBOX (VER IMAGEN GRANDE)
 */
const galleryModal = document.getElementById('galleryModal');
const modalImg = document.getElementById('modalImage');
const modalCaption = document.getElementById('modalCaption');
const galleryItems = document.querySelectorAll('.gallery-item');
const closeModal = document.querySelector('.close-modal');

if (galleryModal && galleryItems.length > 0) {
    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            galleryModal.style.display = 'flex'; // Trigger display
            // Use setTimeout to allow browser to register display:flex before adding .show for transition
            setTimeout(() => {
                galleryModal.classList.add('show');
                modalImg.src = img.src;
                modalCaption.innerText = img.alt;
            }, 10);
            document.body.style.overflow = 'hidden'; // Prevent scroll
        });
    });

    const hideModal = () => {
        galleryModal.classList.remove('show');
        setTimeout(() => {
            galleryModal.style.display = 'none';
        }, 400); // Match transition duration
        document.body.style.overflow = 'auto';
    };

    closeModal.addEventListener('click', hideModal);
    
    // Close on click outside image
    galleryModal.addEventListener('click', (e) => {
        if (e.target === galleryModal) {
            hideModal();
        }
    });

    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && galleryModal.classList.contains('show')) {
            hideModal();
        }
    });
}

/**
 * SECCIÓN: MODAL DE CONTACTO
 */
const contactBtn = document.getElementById('contactBtn');
const contactModal = document.getElementById('contactModal');
const closeContactModal = document.querySelector('.close-contact-modal');

if (contactBtn && contactModal) {
    const showContactModal = () => {
        contactModal.style.display = 'flex';
        setTimeout(() => {
            contactModal.classList.add('show');
        }, 10);
        document.body.style.overflow = 'hidden';
    };

    const hideContactModal = () => {
        contactModal.classList.remove('show');
        setTimeout(() => {
            contactModal.style.display = 'none';
        }, 400);
        document.body.style.overflow = 'auto';
    };

    contactBtn.addEventListener('click', (e) => {
        e.preventDefault();
        showContactModal();
    });

    if (closeContactModal) {
        closeContactModal.addEventListener('click', hideContactModal);
    }

    contactModal.addEventListener('click', (e) => {
        if (e.target === contactModal) {
            hideContactModal();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && contactModal.classList.contains('show')) {
            hideContactModal();
        }
    });
}

/**
 * SECCIÓN: CUENTA REGRESIVA DEL EVENTO — TIEMPO REAL
 * Fecha objetivo: 9 de Noviembre 2026 08:00 AM (Puno, Perú UTC-5)
 */
const TARGET_DATE = new Date('2026-11-09T08:00:00-05:00');

function updateCountdown() {
    const daysEl    = document.getElementById('days');
    const hoursEl   = document.getElementById('hours');
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');
    if (!daysEl) return;

    const now  = new Date();
    const diff = TARGET_DATE - now;

    if (diff <= 0) {
        // El evento ya comenzó
        daysEl.innerText    = '0';
        hoursEl.innerText   = '0';
        minutesEl.innerText = '0';
        secondsEl.innerText = '0';
        return;
    }

    const days    = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours   = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    const pad = (n) => String(n).padStart(2, '0');

    daysEl.innerText    = pad(days);
    hoursEl.innerText   = pad(hours);
    minutesEl.innerText = pad(minutes);
    secondsEl.innerText = pad(seconds);
}

// Arrancar el contador y actualizarlo cada segundo
if (document.getElementById('days')) {
    updateCountdown();
    setInterval(updateCountdown, 1000);
}
