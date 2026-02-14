document.addEventListener("DOMContentLoaded", function () {
    const menuButtons = document.querySelectorAll(".menu-button");
    const deleteButtons = document.querySelectorAll(".delete-button");

    // Dropdown menu functionality
    menuButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.stopPropagation();
            const dropdown = this.nextElementSibling;

            // Fermeture des autres dropdowns
            document.querySelectorAll(".dropdown-menu").forEach((menu) => {
                if (menu !== dropdown) {
                    menu.classList.remove("active");
                }
            });

            // Toggle du dropdown courant
            dropdown.classList.toggle("active");
        });
    });

    // Fermer les dropdowns en cliquant en dehors
    document.addEventListener("click", function (e) {
        if (
            !e.target.closest(".menu-button") &&
            !e.target.closest(".dropdown-menu")
        ) {
            document.querySelectorAll(".dropdown-menu").forEach((menu) => {
                menu.classList.remove("active");
            });
        }
    });

    // Suppression avec modal de confirmation
    deleteButtons.forEach((button) => {
        button.addEventListener("click", async function () {
            const teacherName = this.getAttribute("data-teacher-name");
            const card = this.closest(".teacher-card");

            const confirmed = await modalConfirm.show(
                "Supprimer enseignant",
                `Cette action est irréversible. ${teacherName} sera définitivement supprimé.`,
                "danger"
            );

            if (confirmed) {
                // Animation de suppression
                card.style.transform = "scale(0.9)";
                card.style.opacity = "0";
                card.style.transition = "all 0.3s ease";

                setTimeout(() => {
                    card.remove();
                    toast.show(`${teacherName} a été supprimé avec succès`);
                }, 300);
            }
        });
    });
});
