const notifBtn = document.getElementById("notifBtn");
const notifMenu = document.getElementById("notifMenu");

notifBtn.addEventListener("click", function () {

    notifMenu.classList.toggle("hidden");

    if (!notifMenu.classList.contains("hidden")) {
        loadNotifikasi();
    }

});

document.addEventListener("click", function (e) {

    if (!notifBtn.contains(e.target) && !notifMenu.contains(e.target)) {
        notifMenu.classList.add("hidden");
    }

});

async function hapusNotifikasi(id){

    await fetch(
        notifAPI + "notifikasi&id=" + id,
        {
            method:"DELETE"
        }
    );

    loadNotifikasi();

}