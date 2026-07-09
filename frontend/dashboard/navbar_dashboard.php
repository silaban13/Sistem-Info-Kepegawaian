<nav class="bg-red-300 border-b border-gray-200 shadow-sm">

    <div class="flex items-center justify-between h-16 px-6">

        <!-- Kiri -->
        <div class="flex items-center gap-4">

            <!-- Tombol Sidebar -->
            <button id="sidebarButton"
                class="lg:hidden p-2 rounded-lg hover:bg-gray-100">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

            </button>

            <div>

                <h2 class="text-xl font-bold text-gray-800">
                    Dashboard
                </h2>

                <p class="text-sm text-gray-500">
                    Sistem Informasi Kepegawaian
                </p>

            </div>

        </div>

        <!-- Tengah -->
        <div class="hidden md:block w-96">

            <input
                type="text"
                placeholder="Cari data..."
                class="w-full px-4 py-2 rounded-lg border border-gray-300
                       focus:ring-2 focus:ring-blue-500 focus:outline-none">

        </div>

        <!-- Kanan -->
        <div class="flex items-center gap-5">

            <!-- Notifikasi -->
            <button class="relative p-2 rounded-full hover:bg-gray-100">

                🔔

                <span class="absolute -top-1 -right-1
                             bg-red-500 text-white text-xs
                             w-5 h-5 rounded-full
                             flex items-center justify-center">

                    3

                </span>

            </button>

            <!-- User -->
            <button class="flex items-center gap-3 hover:bg-gray-100 rounded-lg p-2">

                <img
                    src="/Sistem-Info-Kepegawaian/frontend/assets/images/logo_html.png"
                    class="w-10 h-10 rounded-full object-cover border">

                <div class="hidden md:block text-left">

                    <h3 class="font-semibold">
                        Administrator
                    </h3>

                    <p class="text-xs text-gray-500">
                        Admin
                    </p>

                </div>

            </button>

        </div>

    </div>

</nav>
