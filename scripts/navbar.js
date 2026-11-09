/* js document - Navbar */
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById('menu-toggle');
    const menuOverlay = document.getElementById('menu-overlay');
    const menu = document.querySelector('.menu');

    if (menuToggle != null && menuOverlay != null && menu != null) {
        menuToggle.addEventListener('click', function () {
            if (menuToggle.checked) {
                menuOverlay.style.display = 'block';
                menu.style.display = 'block';
            } else {
                menuOverlay.style.display = 'none';
                menu.style.display = 'none';
            }
        });

        menuOverlay.addEventListener('click', function () {
            menuToggle.checked = false;
            menuOverlay.style.display = 'none';
            menu.style.display = 'none';
        });
    }
});





