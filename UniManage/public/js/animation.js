// Theme Toggle Functionality
document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;

    // Appliquer le thème sauvegardé
    const currentTheme = localStorage.getItem('theme') || 'light';
    if (currentTheme === 'dark') {
        htmlElement.classList.add('dark');
    }

    // Écouter le click sur le bouton
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            htmlElement.classList.toggle('dark');

            const isDark = htmlElement.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');

            themeToggle.style.transform = 'rotate(360deg)';
            setTimeout(() => {
                themeToggle.style.transform = 'rotate(0deg)';
            }, 300);
        });
    }
});

// Mobile Menu Toggle
const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.getElementById('sidebar');

if (menuToggle && sidebar) {
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');

        // Add backdrop on mobile
        if (!sidebar.classList.contains('-translate-x-full')) {
            const backdrop = document.createElement('div');
            backdrop.id = 'sidebar-backdrop';
            backdrop.className = 'fixed inset-0 bg-black/50 z-40 md:hidden transition-opacity';
            backdrop.onclick = () => {
                sidebar.classList.add('-translate-x-full');
                backdrop.remove();
            };
            document.body.appendChild(backdrop);

            // Fade in backdrop
            setTimeout(() => {
                backdrop.style.opacity = '1';
            }, 10);
        } else {
            const backdrop = document.getElementById('sidebar-backdrop');
            if (backdrop) {
                backdrop.style.opacity = '0';
                setTimeout(() => backdrop.remove(), 300);
            }
        }
    });
}

// Intersection Observer for Scroll Animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);






// Observe all cards and animated elements
document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.stat-card, .teacher-card, .activity-item, .quick-stat-item');
    animatedElements.forEach(el => {
        observer.observe(el);
    });
});

// Smooth Counter Animation
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }

        // Format number with commas
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
}

// Animate counters on page load
window.addEventListener('load', () => {
    const counters = document.querySelectorAll('.stat-card h3');
    counters.forEach(counter => {
        const text = counter.textContent.trim();
        const number = parseFloat(text.replace(/[^0-9.]/g, ''));

        if (!isNaN(number)) {
            counter.textContent = '0';
            setTimeout(() => {
                animateCounter(counter, number);
            }, 300);
        }
    });
});

// Progress Bar Animation
document.addEventListener('DOMContentLoaded', () => {
    const progressBars = document.querySelectorAll('.animate-progress');

    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const width = bar.style.width;
                bar.style.width = '0';

                setTimeout(() => {
                    bar.style.width = width;
                    bar.style.transition = 'width 1.5s ease-out';
                }, 100);

                progressObserver.unobserve(bar);
            }
        });
    }, { threshold: 0.5 });

    progressBars.forEach(bar => progressObserver.observe(bar));
});

// Search Input Focus Animation
const searchInputs = document.querySelectorAll('input[type="text"], input[type="search"]');
searchInputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateY(-2px)';
        this.parentElement.style.transition = 'transform 0.3s ease';
    });

    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateY(0)';
    });
});

// Card Hover Effects with 3D Transform
const cards = document.querySelectorAll('.stat-card, .teacher-card');
cards.forEach(card => {
    card.addEventListener('mouseenter', function(e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = (y - centerY) / 10;
        const rotateY = (centerX - x) / 10;

        this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
        this.style.transition = 'transform 0.1s ease';
    });

    card.addEventListener('mousemove', function(e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = (y - centerY) / 10;
        const rotateY = (centerX - x) / 10;

        this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
    });

    card.addEventListener('mouseleave', function() {
        this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
        this.style.transition = 'transform 0.3s ease';
    });
});


// Notification Animation
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-xl shadow-2xl flex items-center space-x-3 transform translate-x-full transition-transform duration-500 ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } text-white`;

    notification.innerHTML = `
        <span class="material-symbols-outlined">${type === 'success' ? 'check_circle' : 'error'}</span>
        <span class="font-sans font-semibold">${message}</span>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}

// Effet des boutons avec animation Ripple
document.addEventListener('click', function(e) {
    const button = e.target.closest('button, .btn');
    if (!button) return;

    const ripple = document.createElement('span');
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;

    ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        left: ${x}px;
        top: ${y}px;
        pointer-events: none;
        transform: scale(0);
        animation: ripple 0.6s ease-out;
    `;

    button.style.position = 'relative';
    button.style.overflow = 'hidden';
    button.appendChild(ripple);

    setTimeout(() => ripple.remove(), 600);
});

// Ajouter les styles pour l'animation Ripple
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Delai d'animation en cascade
function staggerAnimation(selector, delay = 100) {
    const elements = document.querySelectorAll(selector);
    elements.forEach((el, index) => {
        el.style.animationDelay = `${index * delay}ms`;
    });
}

// Appliquer l'animation en cascade aux éléments spécifiques
document.addEventListener('DOMContentLoaded', () => {
    staggerAnimation('.teacher-card', 150);
    staggerAnimation('.activity-item', 100);
    staggerAnimation('.nav-item', 50);
});

// Effet Parallax au scroll
let ticking = false;

window.addEventListener('scroll', () => {
    if (!ticking) {
        window.requestAnimationFrame(() => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax');

            parallaxElements.forEach(el => {
                const speed = el.dataset.speed || 0.5;
                el.style.transform = `translateY(${scrolled * speed}px)`;
            });

            ticking = false;
        });

        ticking = true;
    }
});

// Copier dans le presse-papiers avec notification
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        showNotification('Copié dans le presse-papiers!', 'success');
    });
}

// Exposer les fonctions globalement si nécessaire
window.showNotification = showNotification;
window.copyToClipboard = copyToClipboard;

console.log('👌Animation chargée avec succès!');
