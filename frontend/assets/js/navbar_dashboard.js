const notifBtn = document.getElementById("notifBtn");
const notifMenu = document.getElementById("notifMenu");

notifBtn.addEventListener("click", function () {
    notifMenu.classList.toggle("hidden");
});

document.addEventListener("click", function (e) {

    if (!notifBtn.contains(e.target) && !notifMenu.contains(e.target)) {
        notifMenu.classList.add("hidden");
    }

});

