<nav class="bg-white/90 border-b border-gray-200 shadow-sm">
    <div class="flex items-center justify-between h-20 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3">
            <button id="sidebarButton" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div>
                <h2 class="text-lg sm:text-2xl font-bold text-gray-800"> Dashboard </h2>
                <p class="hidden sm:block text-xs sm:text-sm text-gray-500"> Sistem Informasi Kepegawaian </p>
            </div>
        </div>
        <div class="hidden md:block w-64 lg:w-80">
            <div class="relative">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/search-symbol.png" alt="Search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 opacity-50 pointer-events-none">
                <input id="searchInput" type="text" placeholder="Cari menu..." class="w-full h-10 pl-10 pr-3 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div id="searchResult" class="hidden absolute left-0 top-12 w-full bg-white rounded-xl shadow-xl border border-gray-200 z-50 overflow-hidden"></div>
            </div>
        </div>
        <div class="flex items-center gap-2 sm:gap-5">
            <div class="relative">
                <button id="notifBtn" class="relative p-2 rounded-full hover:bg-gray-100">
                    <span class="text-xl">🔔</span>
                    <span id="notifCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] sm:text-xs min-w-5 h-5 px-1 rounded-full flex items-center justify-center"> 0 </span>
                </button>
                <div id="notifMenu" class="hidden fixed sm:absolute top-20 left-1/2 -translate-x-1/2 sm:top-full sm:mt-3 sm:left-auto sm:right-0 sm:translate-x-0 w-[95vw] max-w-sm bg-white rounded-xl shadow-lg border border-gray-200 z-50 overflow-hidden">
                    <div class="p-4 border-b">
                        <h3 class="font-semibold text-gray-700">Notifikasi</h3>
                    </div>
                    <div id="notifList" class="max-h-80 overflow-y-auto"></div>
                </div>
            </div>
            <button class="flex items-center gap-3 hover:bg-gray-100 rounded-lg p-2">
                <img id="fotoUser" src="/Sistem-Info-Kepegawaian/frontend/assets/images/bank.png" class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover border border-gray-300">
                <div class="hidden md:block text-left">
                    <h3 id="roleUser" class="font-semibold text-sm lg:text-base"> Administrator </h3>
                    <p id="namaUser" class="text-xs text-gray-500"></p>
                </div>
            </button>
        </div>
    </div>
</nav>
<script src="/Sistem-Info-Kepegawaian/frontend/assets/js/navbar_dashboard.js"></script>
<script>
    const input = document.getElementById("searchInput");
    const result = document.getElementById("searchResult");

    const menus = [
        {
            nama: "Dashboard",
            icon: "🏠",
            url: "index.php?page=dashboard"
        },
        {
            nama: "Pegawai",
            icon: "👤",
            url: "index.php?page=pegawai"
        },
        {
            nama: "Divisi",
            icon: "🏢",
            url: "index.php?page=divisi"
        },
        {
            nama: "Jabatan",
            icon: "💼",
            url: "index.php?page=jabatan"
        },
        {
            nama: "Absensi",
            icon: "🕒",
            url: "index.php?page=absensi"
        },
        {
            nama: "Cuti",
            icon: "📄",
            url: "index.php?page=cuti"
        },
        {
            nama: "User",
            icon: "👥",
            url: "index.php?page=user"
        }
    ];

    input.addEventListener("input", function () {

        const keyword = this.value.toLowerCase().trim();
        if (keyword === "") {
            result.classList.add("hidden");
            result.innerHTML = "";
            return;
        }

        const hasil = menus.filter(menu =>
            menu.nama.toLowerCase().includes(keyword)
        );

        if (hasil.length === 0) {
            result.innerHTML = `
                <div class="p-3 text-gray-500">
                    Tidak ada menu ditemukan
                </div>
            `;

        } else {
            result.innerHTML = hasil.map(menu => `
                <a href="${menu.url}" class="flex items-center gap-3 p-3 hover:bg-blue-50 border-b last:border-b-0">
                    <span class="text-xl">${menu.icon}</span>
                    <div>
                        <div class="font-medium">${menu.nama}</div>
                        <div class="text-xs text-gray-500">
                            Buka halaman ${menu.nama}
                        </div>
                    </div>
                </a>
            `).join("");

        }

        result.classList.remove("hidden");
    });


    const notifAPI = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";

async function loadNotifikasi() {




const response = await fetch(notifAPI + "notifikasi");
const result = await response.json();


const notifList = document.getElementById("notifList");
const notifCount = document.getElementById("notifCount");


notifList.innerHTML = "";

notifCount.textContent = result.data.length;

if (result.data.length === 0) {

    notifCount.classList.add("hidden");

    notifList.innerHTML = `
        <div class="p-4 text-center text-gray-500">
            Belum ada notifikasi
        </div>
    `;

    return;
}

notifCount.classList.remove("hidden");

result.data.forEach(item => {

    notifList.innerHTML += `
<div class="px-4 py-3 border-b hover:bg-gray-50 flex justify-between">

    <div>

        <div class="font-semibold text-sm">
            ${item.judul}
        </div>

        <div class="text-sm text-gray-600 mt-1">
            ${item.isi}
        </div>

        <div class="text-xs text-gray-400 mt-2">
            ${item.created_at}
        </div>

    </div>

    <button
        onclick="hapusNotifikasi(${item.id})"
        class="text-red-500 hover:text-red-700 text-lg">

        &times;

    </button>

</div>
`;

});


}

loadNotifikasi();




</script>
