document.addEventListener('DOMContentLoaded', function() {
    const switchMode = document.getElementById('switch-mode');
    const darkIcon = document.getElementById('dark-icon');
    const lightIcon = document.getElementById('light-icon');
    const htmlElement = document.documentElement;

    if (!switchMode) return;

    // Vérifier et synchroniser l'état du switch avec le thème actuel
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark') {
        switchMode.checked = true;
        if (darkIcon && lightIcon) {
            darkIcon.style.display = 'none';
            lightIcon.style.display = 'inline';
        }
    }

    // Toggle mode sombre
    switchMode.addEventListener('change', function() {
        if (this.checked) {
            htmlElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            if (darkIcon && lightIcon) {
                darkIcon.style.display = 'none';
                lightIcon.style.display = 'inline';
            }
        } else {
            htmlElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            if (darkIcon && lightIcon) {
                darkIcon.style.display = 'inline';
                lightIcon.style.display = 'none';
            }
        }
    });
});
