// Attendre que le DOM soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // ACTIVE MENU
    const allSideMenu = document.querySelectorAll(
        "#sidebar .side-menu.top li a",
    );

    if (allSideMenu.length > 0) {
        allSideMenu.forEach((item) => {
            const li = item.parentElement;

            item.addEventListener("click", function () {
                allSideMenu.forEach((i) => {
                    i.parentElement.classList.remove("active");
                });
                li.classList.add("active");
            });
        });
    }

    // TOGGLE SIDEBAR
    const menuBar = document.querySelector("#content nav .bx.bx-menu");
    // const menuBar = document.querySelector('.toggle-sidebar');
    const sidebar = document.getElementById("sidebar");

    if (menuBar && sidebar) {
        menuBar.addEventListener("click", function () {
            sidebar.classList.toggle("hide");
        });
    }

    // SEARCH FORM
    const searchButton = document.querySelector(
        "#content nav form .form-input button",
    );
    const searchButtonIcon = document.querySelector(
        "#content nav form .form-input button .bx",
    );
    const searchForm = document.querySelector("#content nav form");

    searchButton.addEventListener("click", function (e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            searchForm.classList.toggle("show");
            if (searchForm.classList.contains("show")) {
                searchButtonIcon.classList.replace("bx-search", "bx-x");
            } else {
                searchButtonIcon.classList.replace("bx-x", "bx-search");
            }
        }
    });

    // Cacher la sidebar sur mobile au chargement
    if (window.innerWidth < 768) {
        if (sidebar) {
            sidebar.classList.add("hide");
        }
    }

    // RESPONSIVE
    window.addEventListener("resize", function () {
        if (window.innerWidth < 768) {
            if (sidebar) {
                sidebar.classList.add("hide");
            }
        } else {
            if (sidebar) {
                sidebar.classList.remove("hide");
            }
        }
    });

    const switchMode = document.getElementById("switch-mode");

    switchMode.addEventListener("change", function () {
        if (this.checked) {
            document.body.classList.add("dark");
        } else {
            document.body.classList.remove("dark");
        }
    });
});
