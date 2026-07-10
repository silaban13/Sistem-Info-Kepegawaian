<div class="space-y-8">

    <!-- Header -->
    <div>

       <h1 id="dashboardTitle" class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800">
    Dashboard
</h1>

<p id="welcomeUser" class="text-gray-600 mt-2">
    Memuat...
</p>

        <p class="mt-3 text-sm sm:text-base text-gray-600 leading-7 max-w-3xl">
            Selamat datang di <span class="font-semibold">Sistem Informasi Kepegawaian</span>.
            Kelola data pegawai, jabatan, divisi, absensi, dan informasi lainnya
            dengan mudah melalui dashboard ini.
        </p>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-gray-500 text-sm">
                        Total Pegawai
                    </p>

                    <h2 id="totalPegawai" class="text-3xl font-bold text-blue-600 mt-2">
                        0
                    </h2>

                    <p class="text-sm text-gray-500 mt-2">
                        Pegawai Terdaftar
                    </p>
                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-2xl">
                    👨‍💼
                </div>

            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Departemen
                    </p>

                    <h2 id="totalDepartemen" class="text-3xl font-bold text-green-600 mt-2">
                        0
                    </h2>

                    <p class="text-sm text-gray-500 mt-2">
                        Unit Kerja Aktif
                    </p>

                </div>

                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-2xl">
                    🏢
                </div>

            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 text-sm">
                        Data Terbaru
                    </p>

                    <h2 id="totalDataTerbaru" class="text-3xl font-bold text-purple-600 mt-2">
                        0
                    </h2>

                    <p class="text-sm text-gray-500 mt-2">
                        Update Sistem
                    </p>

                </div>

                <div class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center text-2xl">
                    📈
                </div>

            </div>
        </div>

    </div>

    <!-- Informasi + Aktivitas -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        <!-- Informasi -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-4">
                Informasi Sistem
            </h2>

            <p class="text-gray-600 leading-8 text-justify">
                Sistem Informasi Kepegawaian membantu administrator dalam
                mengelola data pegawai secara terstruktur mulai dari data
                pribadi, jabatan, divisi, absensi, hingga pengajuan cuti.
                Seluruh data tersimpan secara terintegrasi sehingga proses
                administrasi menjadi lebih cepat dan efisien.
            </p>

        </div>

        <!-- Aktivitas -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-5">
                Aktivitas Terbaru
            </h2>

            <div class="space-y-5">

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-blue-500 mt-2 shrink-0"></div>

                    <div>

                        <p class="font-medium text-gray-700">
                            Data pegawai baru berhasil ditambahkan.
                        </p>

                        <span class="text-sm text-gray-500">
                            Hari ini
                        </span>

                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-green-500 mt-2 shrink-0"></div>

                    <div>

                        <p class="font-medium text-gray-700">
                            Informasi jabatan berhasil diperbarui.
                        </p>

                        <span class="text-sm text-gray-500">
                            Kemarin
                        </span>

                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-purple-500 mt-2 shrink-0"></div>

                    <div>

                        <p class="font-medium text-gray-700">
                            Sistem melakukan sinkronisasi data.
                        </p>

                        <span class="text-sm text-gray-500">
                            3 hari yang lalu
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="frontend/assets/js/app.js"></script>
<script src="frontend/assets/js/dashboard.js"></script>