<nav class="sticky top-0 z-50 w-full bg-white dark:bg-gray-900 backdrop-blur-md shadow-md border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto flex items-center justify-between h-20 px-6 lg:px-16">
        <div class="flex items-center gap-4">
            <div class="flex items-center justify-center w-16 h-17 bg-blue-100 rounded-xl">
                 <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/bank.png" alt="Logo" class="w-10 h-10 rounded-lg object-cover">
            </div>
            <div class="leading-tight">
                <h1 class="text-lg font-bold text-blue-800 dark:text-blue-400"> Sistem Informasi Kepegawaian </h1>
                <p class="text-xs text-gray-900 dark:text-gray-400"> Human Resource Management System </p>
            </div>
        </div>
        <ul class="hidden lg:flex items-center gap-8 text-sm font-medium">
            <li>
                <a href="/Sistem-Info-Kepegawaian/index.php?page=home" class="relative inline-block py-1 text-gray-900 dark:text-gray-100 hover:text-blue-500 dark:hover:text-blue-400 transition-colors duration-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-full after:bg-blue-500 dark:after:bg-blue-400 after:origin-center after:scale-x-0 after:transition-transform after:duration-300 after:ease-out hover:after:scale-x-100"> Home </a>
            </li>
            <li>
                <a href="/Sistem-Info-Kepegawaian/index.php?page=about" class="relative inline-block py-1 text-gray-900 dark:text-gray-100 hover:text-blue-500 dark:hover:text-blue-400 transition-colors duration-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-full after:bg-blue-500 dark:after:bg-blue-400 after:origin-center after:scale-x-0 after:transition-transform after:duration-300 after:ease-out hover:after:scale-x-100"> About </a>
            </li>
            <li>
                <a href="/Sistem-Info-Kepegawaian/index.php?page=contact" class="relative inline-block py-1 text-gray-900 dark:text-gray-100 hover:text-blue-500 dark:hover:text-blue-400 transition-colors duration-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-full after:bg-blue-500 dark:after:bg-blue-400 after:origin-center after:scale-x-0 after:transition-transform after:duration-300 after:ease-out hover:after:scale-x-100"> Contact </a>
            </li>
        </ul>
        <div class="relative">
            <div class="hidden lg:block relative">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/search-symbol.png" alt="Search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 opacity-60 pointer-events-none">
                <input id="searchInput" type="text" placeholder="Cari informasi..." class="w-72 pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>
            <div id="searchResult" class="absolute top-12 left-0 w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg hidden z-50"></div>
        </div>
        <div class="hidden lg:flex items-center bg-gray-100 rounded-full p-1 shadow-sm w-fit">
            <button id="theme-system" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white transition">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/monitor.png" alt="System" class="w-5 h-5">
            </button>
            <button id="theme-light" class="w-8 h-8 flex items-center justify-center rounded-full bg-white shadow transition">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/darker.png" alt="Light" class="w-5 h-5">
            </button>
            <button id="theme-dark" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white transition">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/night-mode.png" alt="Dark" class="w-5 h-5">
            </button>
        </div>
        <button id="menuButton" class="lg:hidden text-gray-900 dark:text-white transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</nav>
<div id="overlay" class="fixed inset-0 bg-black/60 hidden z-40"></div>
<div id="offcanvas" class="fixed top-0 right-0 h-screen w-80 bg-white dark:bg-gray-900 shadow-2xl translate-x-full transition-all duration-300 ease-in-out z-50 flex flex-col">
    <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-3">
            <div class="flex items-center justify-center w-16 h-17 bg-blue-100 rounded-xl">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/bank.png" alt="Logo" class="w-10 h-10 rounded-lg object-cover">
            </div>
            <div>
                <h2 class="font-bold text-gray-800 dark:text-white"> Menu </h2>
                <p class="text-xs text-gray-500 dark:text-gray-100"> Sistem Kepegawaian </p>
            </div>
        </div>
        <button id="closeMenu" class="w-9 h-9 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 text-2xl text-gray-700 dark:text-white"> &times; </button>
    </div>
    <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">
        <p class="text-sm font-semibold text-gray-500 mb-3"> Tema </p>
        <div class="flex items-center bg-gray-100 rounded-full p-1 shadow-sm w-fit">
            <button id="theme-system-mobile" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white transition">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/monitor.png" class="w-5 h-5">
            </button>
            <button id="theme-light-mobile" class="w-8 h-8 flex items-center justify-center rounded-full bg-white shadow transition">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/darker.png" class="w-5 h-5">
            </button>
            <button id="theme-dark-mobile" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white transition">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/night-mode.png" class="w-5 h-5">
            </button>
        </div>
    </div>
    <div class="p-5">
        <div class="relative">
            <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/search-symbol.png" alt="Search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 opacity-60 pointer-events-none">
            <input id="searchInputMobile" type="text" placeholder="Cari Pegawai..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div id="searchResultMobile" class="mt-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg hidden"> </div>
    </div>
    <div class="flex-1 px-4 space-y-2">
        <a href="/Sistem-Info-Kepegawaian/index.php?page=home" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-800 hover:text-blue-600 transition">
            <span>Home</span>
        </a>
        <a href="/Sistem-Info-Kepegawaian/index.php?page=about" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-800 hover:text-blue-600 transition">
            <span>About</span>
        </a>
        <a href="/Sistem-Info-Kepegawaian/index.php?page=contact" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-800 hover:text-blue-600 transition">
            <span>Contact</span>
        </a>
    </div>
</div>
<script src="/Sistem-Info-Kepegawaian/frontend/assets/js/search.js"></script>

