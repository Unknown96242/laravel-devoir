<div class="modal-overlay" id="confirm-modal" style="display: none;">
    <div class="modal-container">
        <div class="modal-content">
            <!-- Icône dynamique -->
            <div class="modal-icon" id="modal-icon">
                <i class='bx bx-error-circle'></i>
            </div>

            <!-- Contenu -->
            <div class="modal-body">
                <h2 id="modal-title">Confirmer l'action</h2>
                <p id="modal-message">Êtes-vous sûr de vouloir continuer ?</p>
            </div>

            <!-- Actions -->
            <div class="modal-actions">
                <button type="button" class="btn-modal-cancel" id="modal-cancel">
                    <i class='bx bx-x'></i>
                    Annuler
                </button>
                <button type="button" class="btn-modal-confirm" id="modal-confirm">
                    <i class='bx bx-check'></i>
                    Confirmer
                </button>
            </div>
        </div>
    </div>
</div>

@once
    @push('styles')
        <style>
            /* Overlay */
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(4px);
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
            }

            .modal-overlay.show {
                opacity: 1;
                pointer-events: auto;
            }

            /* Container */
            .modal-container {
                transform: scale(0.9) translateY(20px);
                transition: transform 0.3s ease;
            }

            .modal-overlay.show .modal-container {
                transform: scale(1) translateY(0);
            }

            /* Content */
            .modal-content {
                background: var(--light);
                border-radius: 24px;
                padding: 40px;
                max-width: 480px;
                width: 90%;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                position: relative;
                overflow: hidden;
            }

            .modal-content::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--blue), var(--light-blue));
            }

            /* Icône */
            .modal-icon {
                width: 80px;
                height: 80px;
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 24px;
                font-size: 48px;
                color: white;
                position: relative;
                animation: iconPulse 2s ease-in-out infinite;
            }

            @keyframes iconPulse {
                0%, 100% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(1.05);
                }
            }

            .modal-icon.danger {
                background: linear-gradient(135deg, var(--red), #ef4444);
                box-shadow: 0 8px 24px rgba(219, 80, 74, 0.3);
            }

            .modal-icon.warning {
                background: linear-gradient(135deg, var(--yellow), var(--orange));
                box-shadow: 0 8px 24px rgba(253, 114, 56, 0.3);
            }

            .modal-icon.info {
                background: linear-gradient(135deg, var(--blue), var(--light-blue));
                box-shadow: 0 8px 24px rgba(60, 145, 230, 0.3);
            }

            .modal-icon.success {
                background: linear-gradient(135deg, #10b981, #34d399);
                box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
            }

            /* Body */
            .modal-body {
                text-align: center;
                margin-bottom: 32px;
            }

            .modal-body h2 {
                font-size: 24px;
                font-weight: 700;
                color: var(--dark);
                margin: 0 0 12px 0;
                font-family: var(--poppins);
            }

            .modal-body p {
                font-size: 15px;
                color: var(--dark-grey);
                margin: 0;
                line-height: 1.6;
            }

            /* Actions */
            .modal-actions {
                display: flex;
                gap: 12px;
                justify-content: center;
            }

            .btn-modal-cancel,
            .btn-modal-confirm {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 14px 24px;
                border-radius: 12px;
                font-weight: 600;
                font-size: 15px;
                border: none;
                cursor: pointer;
                transition: all 0.3s ease;
                font-family: var(--poppins);
            }

            .btn-modal-cancel {
                background: var(--grey);
                color: var(--dark);
            }

            .btn-modal-cancel:hover {
                background: var(--dark-grey);
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            }

            .btn-modal-confirm {
                background: var(--blue);
                color: white;
            }

            .btn-modal-confirm:hover {
                background: #2c7ac9;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(60, 145, 230, 0.4);
            }

            .btn-modal-confirm.danger {
                background: var(--red);
            }

            .btn-modal-confirm.danger:hover {
                background: #c23d38;
                box-shadow: 0 4px 12px rgba(219, 80, 74, 0.4);
            }

            /* Dark mode */
            html.dark .modal-overlay {
                background: rgba(0, 0, 0, 0.7);
            }

            html.dark .modal-content {
                background: var(--light);
            }

            html.dark .modal-body h2 {
                color: var(--dark);
            }

            html.dark .btn-modal-cancel {
                background: var(--grey);
                color: var(--dark);
            }

            /* Responsive */
            @media screen and (max-width: 576px) {
                .modal-content {
                    padding: 32px 24px;
                }

                .modal-actions {
                    flex-direction: column;
                }

                .btn-modal-cancel,
                .btn-modal-confirm {
                    width: 100%;
                }

                .modal-icon {
                    width: 64px;
                    height: 64px;
                    font-size: 36px;
                }

                .modal-body h2 {
                    font-size: 20px;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Fonction globale pour afficher la modal
            window.confirmModal = function(options) {
                return new Promise((resolve) => {
                    const modal = document.getElementById('confirm-modal');
                    const title = document.getElementById('modal-title');
                    const message = document.getElementById('modal-message');
                    const icon = document.getElementById('modal-icon');
                    const confirmBtn = document.getElementById('modal-confirm');
                    const cancelBtn = document.getElementById('modal-cancel');

                    // Configuration par défaut
                    const config = {
                        type: 'danger', // danger, warning, info, success
                        title: 'Confirmer l\'action',
                        message: 'Êtes-vous sûr de vouloir continuer ?',
                        confirmText: 'Confirmer',
                        cancelText: 'Annuler',
                        ...options
                    };

                    // Appliquer le type d'icône
                    icon.className = 'modal-icon ' + config.type;

                    // Icônes selon le type
                    const icons = {
                        danger: 'bx-error-circle',
                        warning: 'bx-error',
                        info: 'bx-info-circle',
                        success: 'bx-check-circle'
                    };
                    icon.querySelector('i').className = 'bx ' + icons[config.type];

                    // Appliquer le style du bouton confirmer
                    confirmBtn.className = 'btn-modal-confirm ' + (config.type === 'danger' ? 'danger' : '');

                    // Mettre à jour les textes
                    title.textContent = config.title;
                    message.textContent = config.message;
                    confirmBtn.innerHTML = `<i class='bx bx-check'></i>${config.confirmText}`;
                    cancelBtn.innerHTML = `<i class='bx bx-x'></i>${config.cancelText}`;

                    // Afficher la modal
                    modal.style.display = 'flex';
                    setTimeout(() => modal.classList.add('show'), 10);

                    // Fonction pour fermer
                    const close = (confirmed) => {
                        modal.classList.remove('show');
                        setTimeout(() => {
                            modal.style.display = 'none';
                            resolve(confirmed);
                        }, 300);
                    };

                    // Event listeners (nettoyage des anciens)
                    const handleConfirm = () => {
                        close(true);
                        confirmBtn.removeEventListener('click', handleConfirm);
                        cancelBtn.removeEventListener('click', handleCancel);
                        modal.removeEventListener('click', handleOverlay);
                    };

                    const handleCancel = () => {
                        close(false);
                        confirmBtn.removeEventListener('click', handleConfirm);
                        cancelBtn.removeEventListener('click', handleCancel);
                        modal.removeEventListener('click', handleOverlay);
                    };

                    const handleOverlay = (e) => {
                        if (e.target === modal) {
                            close(false);
                            confirmBtn.removeEventListener('click', handleConfirm);
                            cancelBtn.removeEventListener('click', handleCancel);
                            modal.removeEventListener('click', handleOverlay);
                        }
                    };

                    confirmBtn.addEventListener('click', handleConfirm);
                    cancelBtn.addEventListener('click', handleCancel);
                    modal.addEventListener('click', handleOverlay);

                    // ESC pour fermer
                    const handleEscape = (e) => {
                        if (e.key === 'Escape') {
                            close(false);
                            confirmBtn.removeEventListener('click', handleConfirm);
                            cancelBtn.removeEventListener('click', handleCancel);
                            modal.removeEventListener('click', handleOverlay);
                            document.removeEventListener('keydown', handleEscape);
                        }
                    };
                    document.addEventListener('keydown', handleEscape);
                });
            };
        </script>
    @endpush
@endonce
