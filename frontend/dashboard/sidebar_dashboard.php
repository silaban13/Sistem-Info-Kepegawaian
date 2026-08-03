<aside id="sidebar" class="fixed top-0 left-0 z-50 w-72 h-screen bg-slate-900 text-white shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 lg:shadow-none lg:h-auto lg:min-h-screen">
    <div class="p-6 border-b border-slate-700">
        <h2 class="text-2xl font-bold"> Dashboard </h2>
        <p class="text-sm text-slate-400"> Sistem Informasi Kepegawaian </p>
        <button id="closeSidebar" class="lg:hidden text-2xl mt-4"> ✕ </button>
    </div>
    <nav class="mt-6">
        <ul class="space-y-2 px-4">
            <li>
                <a href="?page=dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10.5L12 3l9 7.5v9a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5V10.5z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php if($_SESSION['role'] == 'admin'): ?>
                <li>
                    <a href="?page=pegawai" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 1 1 0 7.75M10 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                        </svg>
                        <span>Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="?page=divisi" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10-2h6m-6 4h6m-6 4h6"/>
                        </svg>
                        <span>Divisi</span>
                    </a>
                </li>
                <li>
                    <a href="?page=jabatan" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7h-4V5a4 4 0 10-8 0v2H4a1 1 0 00-1 1v11a1 1 0 001 1h16a1 1 0 001-1V8a1 1 0 00-1-1zM10 5a2 2 0 114 0v2h-4V5z"/>
                        </svg>
                        <span>Jabatan</span>
                    </a>
                </li>
                <li>
                    <a href="?page=absensi" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                        </svg>
                        <span>Absensi</span>
                    </a>
                </li>
                <li>
                    <a href="?page=user" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4 4 0 100-8 4 4 0 000 8zm-7 9a7 7 0 0114 0"/>
                        </svg>
                        <span>User</span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="?page=cuti" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 7H6a2 2 0 01-2-2V5a2 2 0 012-2h8l6 6v10a2 2 0 01-2 2z"/>
                    </svg>
                    <span>Cuti</span>
                </a>
            </li>
        </ul>
        <hr class="my-6 border-slate-700">
        <ul class="px-4">
            <li>
                <a href="?page=logout" class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-red-600 hover:text-white transition">
                    <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/logout.png" alt="Logout" class="w-5 h-5 ">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>