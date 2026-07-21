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
                <input type="text" placeholder="Cari data..." class="w-full h-10 pl-10 pr-3 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="flex items-center gap-2 sm:gap-5">
            <div class="relative">
                <button id="notifBtn" class="relative p-2 rounded-full hover:bg-gray-100">
                    <span class="text-xl">🔔</span>
                    <span id="notifCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">
                        3
                    </span>
                </button>
                <div id="notifMenu" class="hidden absolute right-0 mt-3 w-80 bg-white rounded-xl shadow-lg border border-gray-200 z-50">
                    <div class="p-4 border-b">
                        <h3 class="font-semibold">Notifikasi</h3>
                    </div>
                    <div id="notifList">
                        <div class="px-4 py-3 hover:bg-gray-50 border-b"> Pegawai baru berhasil ditambahkan </div>
                        <div class="px-4 py-3 hover:bg-gray-50 border-b"> Pengajuan cuti menunggu persetujuan </div>
                        <div class="px-4 py-3 hover:bg-gray-50"> Absensi hari ini telah dibuka </div>
                    </div>
                </div>
            </div>

            <button class="flex items-center gap-3 hover:bg-gray-100 rounded-lg p-2">

    <img
    id="fotoUser"
    src="/Sistem-Info-Kepegawaian/frontend/assets/images/bank.png"
    class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover border border-gray-300">

    <div class="hidden md:block text-left">
        <h3 id="roleUser" class="font-semibold text-sm lg:text-base">
            Administrator
        </h3>

        <p id="namaUser" class="text-xs text-gray-500"></p>
    </div>

</button>

        </div>
    </div>
</nav>
<script>

 </script>
 
<script src="/Sistem-Info-Kepegawaian/frontend/assets/js/navbar_dashboard.js"></script>
