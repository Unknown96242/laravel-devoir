<div id="confirm-modal" class="fixed inset-0 z-50 flex items-center justify-center invisible opacity-0 transition-opacity duration-300">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40 dark:bg-black/60 backdrop-blur-sm"></div>

    <!-- Content -->
    <div id="confirm-modal-content" class="relative w-full max-w-md mx-4 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 scale-95 opacity-0 transition-all duration-300 ease-out">
        <!-- Icon -->
        <div id="confirm-modal-icon" class="flex justify-center -mt-7">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg">
                <span class="material-symbols-outlined text-white text-2xl" id="confirm-modal-icon-text">delete</span>
            </div>
        </div>

        <!-- Body -->
        <div class="px-6 pt-4 pb-6">
            <h3 id="confirm-modal-title" class="text-xl font-display font-bold text-center text-slate-900 dark:text-white mb-2">Titre</h3>
            <p id="confirm-modal-message" class="text-sm font-sans text-center text-slate-500 dark:text-slate-400 leading-relaxed">Message</p>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-center space-x-3 px-6 pb-6">
            <button id="confirm-modal-cancel" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-xl font-sans font-semibold text-sm transition-all duration-200">
                Annuler
            </button>
            <button id="confirm-modal-confirm" class="px-5 py-2.5 rounded-xl text-white font-sans font-semibold text-sm shadow-lg transition-all duration-200">
                Confirmer
            </button>
        </div>
    </div>
</div>

@once('modal-confirm-script')
<script>
class ModalConfirm {
    constructor() {
        this.modal = document.getElementById('confirm-modal');
        this.content = document.getElementById('confirm-modal-content');
        this.title = document.getElementById('confirm-modal-title');
        this.message = document.getElementById('confirm-modal-message');
        this.iconWrap = document.getElementById('confirm-modal-icon').firstElementChild;
        this.iconText = document.getElementById('confirm-modal-icon-text');
        this.cancelBtn = document.getElementById('confirm-modal-cancel');
        this.confirmBtn = document.getElementById('confirm-modal-confirm');
        this.resolvePromise = null;

        const styles = {
            danger:  { bg: 'bg-gradient-to-br from-red-500 to-red-700',    shadow: 'shadow-red-500/30',    btn: 'bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800',    icon: 'delete' },
            warning: { bg: 'bg-gradient-to-br from-amber-500 to-amber-700', shadow: 'shadow-amber-500/30', btn: 'bg-gradient-to-r from-amber-500 to-amber-700 hover:from-amber-600 hover:to-amber-800', icon: 'warning' },
            info:    { bg: 'bg-gradient-to-br from-academic-500 to-academic-700', shadow: 'shadow-academic-500/30', btn: 'bg-gradient-to-r from-academic-500 to-academic-700 hover:from-academic-600 hover:to-academic-800', icon: 'info' },
        };
        this.styles = styles;

        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) this.close(false);
        });

        this.cancelBtn.addEventListener('click', () => this.close(false));
        this.confirmBtn.addEventListener('click', () => this.close(true));
    }

    show(title, message, type = 'danger') {
        return new Promise((resolve) => {
            this.resolvePromise = resolve;
            const style = this.styles[type] || this.styles.danger;

            this.title.textContent = title;
            this.message.textContent = message;

            this.iconWrap.className = `w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg ${style.bg} ${style.shadow}`;
            this.iconText.textContent = style.icon;

            this.confirmBtn.className = `px-5 py-2.5 rounded-xl text-white font-sans font-semibold text-sm shadow-lg transition-all duration-200 ${style.btn}`;

            this.modal.classList.remove('invisible', 'opacity-0');
            this.modal.classList.add('visible', 'opacity-100');

            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    this.content.classList.remove('scale-95', 'opacity-0');
                    this.content.classList.add('scale-100', 'opacity-100');
                });
            });
        });
    }

    close(confirmed) {
        this.content.classList.remove('scale-100', 'opacity-100');
        this.content.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            this.modal.classList.remove('visible', 'opacity-100');
            this.modal.classList.add('invisible', 'opacity-0');

            if (this.resolvePromise) {
                this.resolvePromise(confirmed);
                this.resolvePromise = null;
            }
        }, 300);
    }
}

window.modalConfirm = new ModalConfirm();
</script>
@endonce
