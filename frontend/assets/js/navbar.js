const menuButton = document.getElementById("menuButton");
const closeMenu = document.getElementById("closeMenu");
const offcanvas = document.getElementById("offcanvas");
const overlay = document.getElementById("overlay");


if(menuButton && closeMenu && offcanvas && overlay){

    menuButton.addEventListener("click", () => {

        offcanvas.classList.remove("translate-x-full");
        overlay.classList.remove("hidden");

    });


    closeMenu.addEventListener("click", closeOffcanvas);
    overlay.addEventListener("click", closeOffcanvas);


    function closeOffcanvas(){

        offcanvas.classList.add("translate-x-full");
        overlay.classList.add("hidden");

    }

}

document.addEventListener("DOMContentLoaded", () => {

    const sidebar = document.getElementById("sidebar");
    const sidebarButton = document.getElementById("sidebarButton");
    const closeSidebar = document.getElementById("closeSidebar");
    const sidebarOverlay = document.getElementById("sidebarOverlay");


    if(sidebar && sidebarButton && closeSidebar && sidebarOverlay){

        sidebarButton.addEventListener("click", () => {

            sidebar.classList.remove("-translate-x-full");
            sidebarOverlay.classList.remove("hidden");

        });


        function closeSide(){

            sidebar.classList.add("-translate-x-full");
            sidebarOverlay.classList.add("hidden");

        }


        closeSidebar.addEventListener("click", closeSide);
        sidebarOverlay.addEventListener("click", closeSide);

    }

});