const menuButton = document.getElementById("menuButton");
const closeMenu = document.getElementById("closeMenu");
const offcanvas = document.getElementById("offcanvas");
const overlay = document.getElementById("overlay");

menuButton.addEventListener("click", () => {
    offcanvas.classList.remove("translate-x-full");
    overlay.classList.remove("hidden");
});

closeMenu.addEventListener("click", closeOffcanvas);
overlay.addEventListener("click", closeOffcanvas);

function closeOffcanvas() {
    offcanvas.classList.add("translate-x-full");
    overlay.classList.add("hidden");
}