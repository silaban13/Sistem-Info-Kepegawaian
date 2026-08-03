<div id="dashboardLoading" class="flex justify-center items-center py-20">
    <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
        <p class="text-gray-500">Memuat dashboard...</p>
    </div>
</div>
<div id="dashboardContent" class="hidden">

    <div class="space-y-8">
        <div> 
            <h1 id="welcomeUser" class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mt-2"> Memuat...</h1>
            <p id="dashboardTitle" class=" text-gray-600"> Dashboard </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm"> Total Pegawai </p>
                        <h2 id="totalPegawai" class="text-3xl font-bold text-blue-600 mt-2"> 0 </h2>
                        <p class="text-sm text-gray-500 mt-2"> Pegawai Terdaftar </p>
                    </div>
                    <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a8.97 8.97 0 0 0-6-2.22 8.97 8.97 0 0 0-6 2.22m12 0a9 9 0 1 0-12 0m12 0A9 9 0 0 1 12 21a9 9 0 0 1-6-2.28M15 9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm"> Departemen </p>
                        <h2 id="totalDepartemen" class="text-3xl font-bold text-green-600 mt-2"> 0 </h2>
                        <p class="text-sm text-gray-500 mt-2"> Unit Kerja Aktif </p>
                    </div>
                    <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M5.25 21V6.75A.75.75 0 0 1 6 6h4.5a.75.75 0 0 1 .75.75V21m0-9h6.75a.75.75 0 0 1 .75.75V21M9 9h.008v.008H9V9Zm0 3h.008v.008H9V12Zm0 3h.008v.008H9V15Zm3-6h.008v.008H12V9Zm0 3h.008v.008H12V12Zm0 3h.008v.008H12V15Z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm"> Data Terbaru </p>
                        <h2 id="totalDataTerbaru" class="text-3xl font-bold text-purple-600 mt-2">  0 </h2>
                        <p class="text-sm text-gray-500 mt-2">  Update Sistem </p>
                    </div>
                    <div class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-purple-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 1-5.714 0M18 8a6 6 0 1 0-12 0c0 7-3 9-3 9h18s-3-2-3-9Zm-4 13a2 2 0 1 1-4 0"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4"> Informasi Sistem </h2>
                <p class="text-gray-600 leading-8 text-justify">
                    Sistem Informasi Kepegawaian membantu administrator dalam
                    mengelola data pegawai secara terstruktur mulai dari data
                    pribadi, jabatan, divisi, absensi, hingga pengajuan cuti.
                    Seluruh data tersimpan secara terintegrasi sehingga proses
                    administrasi menjadi lebih cepat dan efisien.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-5"> Aktivitas Terbaru </h2>
                <div class="space-y-5">
                    <div class="flex gap-4">
                        <div class="w-3 h-3 rounded-full bg-blue-500 mt-2 shrink-0"></div>
                        <div>
                            <p class="font-medium text-gray-700">  Data pegawai baru berhasil ditambahkan.  </p>
                            <span class="text-sm text-gray-500">  Hari ini  </span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-3 h-3 rounded-full bg-green-500 mt-2 shrink-0"></div>
                        <div>
                            <p class="font-medium text-gray-700"> Informasi jabatan berhasil diperbarui. </p>
                            <span class="text-sm text-gray-500"> Kemarin </span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-3 h-3 rounded-full bg-purple-500 mt-2 shrink-0"></div>
                        <div>
                            <p class="font-medium text-gray-700"> Sistem melakukan sinkronisasi data. </p>
                            <span class="text-sm text-gray-500">  3 hari yang lalu </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

