<nav class="w-full bg-gray-500 rounded-xl shadow-md border border-gray-200">
    <div class="max-w-7xl mx-auto flex items-center justify-between h-20 px-6 lg:px-16">
        <div class="flex items-center gap-4">
            <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/logo_web.png" alt="Logo" class="w-10 h-10 rounded-lg object-cover">
            <div class="leading-tight">
                <h1 class="text-lg font-bold text-gray-100"> Sistem Informasi Kepegawaian </h1>
                <p class="text-xs text-gray-100"> Human Resource Management System </p>
            </div>
        </div>
       <ul class="hidden lg:flex items-center gap-8 text-sm font-medium">
            <li>
                <a href="/Sistem-Info-Kepegawaian/index.php?page=home" class="relative inline-block py-1 text-gray-100 hover:text-blue-300 transition-colors duration-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-full after:bg-blue-300 after:origin-center after:scale-x-0 after:transition-transform after:duration-300 after:ease-out hover:after:scale-x-100"> Home </a>
            </li>
            <li>
                <a href="/Sistem-Info-Kepegawaian/index.php?page=about" class="relative inline-block py-1 text-gray-100 hover:text-blue-300 transition-colors duration-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-full after:bg-blue-300 after:origin-center after:scale-x-0 after:transition-transform after:duration-300 after:ease-out hover:after:scale-x-100"> About </a>
            </li>
            <li>
                <a href="/Sistem-Info-Kepegawaian/index.php?page=contact" class="relative inline-block py-1 text-gray-100 hover:text-blue-300 transition-colors duration-300 after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-full after:bg-blue-300 after:origin-center after:scale-x-0 after:transition-transform after:duration-300 after:ease-out hover:after:scale-x-100"> Contact </a>
            </li>
        </ul>

        <div class="relative">

        <div class="hidden lg:flex items-center gap-4">

<input 
id="searchInput"
type="text"
placeholder="Cari informasi..."
class="w-64 px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">

<img src="/Sistem-Info-Kepegawaian/frontend/assets/images/search-symbol.png" alt="Search" class="w-8 h-8 object-contain cursor-pointer hover:scale-110 transition-transform duration-300">
</div>

<div 
id="searchResult"
class="absolute top-12 left-0 w-full bg-white rounded-lg shadow-lg hidden z-50">
</div>


</div>


        <button id="menuButton" class="lg:hidden text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</nav>

<div id="overlay" class="fixed inset-0 bg-black/60 hidden z-40"></div>
<div id="offcanvas" class="fixed top-0 right-0 h-screen w-80 bg-white shadow-2xl translate-x-full transition-all duration-300 ease-in-out z-50 flex flex-col">
    <div class="flex items-center justify-between p-6 border-b">
        <div class="flex items-center gap-3">
            <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/logo_web.png" alt="Logo" class="w-10 h-10 rounded-lg object-cover">
            <div>
                <h2 class="font-bold text-gray-800"> Menu </h2>
                <p class="text-xs text-gray-500"> Sistem Kepegawaian </p>
            </div>
        </div>
        <button id="closeMenu" class="w-9 h-9 rounded-full hover:bg-gray-100 text-2xl"> &times; </button>
    </div>
    <div class="p-5">
        <input type="text" placeholder="Cari Pegawai..." class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
    <div class="flex-1 px-4 space-y-2">
        <a href="/Sistem-Info-Kepegawaian/index.php?page=home" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:text-blue-600 transition">
            <span>Home</span>
        </a>
        <a href="/Sistem-Info-Kepegawaian/index.php?page=about" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:text-blue-600 transition">
            <span>About</span>
        </a>
        <a href="/Sistem-Info-Kepegawaian/index.php?page=contact" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:text-blue-600 transition">
            <span>Contact</span>
        </a>
    </div>
</div>

<script src="/Sistem-Info-Kepegawaian/frontend/assets/js/search.js"></script>