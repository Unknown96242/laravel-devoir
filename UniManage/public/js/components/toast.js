class Toast {
    constructor() {
        this.container = document.getElementById('toast-container');
    }

    show(message, type = 'success', duration = 3000) {
        const toast = document.createElement('div');

        const icons = { success: 'check_circle', error: 'error_circle', warning: 'warning', info: 'info' };
        const colors = {
            success: 'bg-green-500/90 dark:bg-green-600/90',
            error:   'bg-red-500/90 dark:bg-red-600/90',
            warning: 'bg-amber-500/90 dark:bg-amber-600/90',
            info:    'bg-academic-500/90 dark:bg-academic-600/90',
        };

        toast.className = `
            pointer-events-auto
            flex items-center space-x-3
            ${colors[type] || colors.info}
            text-white
            px-5 py-3.5 rounded-xl
            shadow-lg backdrop-blur-sm
            border border-white/10
            translate-x-full opacity-0
            transition-all duration-300 ease-out
            max-w-sm w-full
        `;

        toast.innerHTML = `
            <span class="material-symbols-outlined text-xl flex-shrink-0">${icons[type] || icons.info}</span>
            <span class="font-sans text-sm font-medium flex-1">${message}</span>
            <button class="toast-close opacity-60 hover:opacity-100 transition-opacity flex-shrink-0">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        `;

        this.container.appendChild(toast);

        // Entrée
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            });
        });

        // Sortie auto
        const timer = setTimeout(() => this.remove(toast), duration);

        // Sortie manuelle via le bouton close
        toast.querySelector('.toast-close').addEventListener('click', () => {
            clearTimeout(timer);
            this.remove(toast);
        });
    }

    remove(toast) {
        toast.classList.remove('translate-x-0', 'opacity-100');
        toast.classList.add('translate-x-full', 'opacity-0');

        toast.addEventListener('transitionend', () => {
            if (toast.parentNode) toast.remove();
        });
    }
}

window.toast = new Toast();
