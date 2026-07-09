<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800"> Dashboard Admin </h1>
        <p class="mt-2 text-gray-600">
            Selamat datang di Sistem Informasi Kepegawaian. 
            Kelola data pegawai, jabatan, dan informasi kepegawaian dengan mudah melalui dashboard ini.
        </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm"> Total Pegawai </h3>
            <p id="totalPegawai" class="text-3xl font-bold text-blue-600 mt-2"> 0 </p>
            <p class="text-sm text-gray-500 mt-1"> Data pegawai terdaftar </p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm"> Departemen </h3>
            <p id="totalDepartemen" class="text-3xl font-bold text-green-600 mt-2"> 0 </p>
            <p class="text-sm text-gray-500 mt-1"> Unit kerja aktif </p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm"> Data Terbaru </h3>
            <p id="totalDataTerbaru" class="text-3xl font-bold text-purple-600 mt-2"> 0 </p>
            <p class="text-sm text-gray-500 mt-1"> Perubahan data terbaru </p>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800"> Informasi Sistem </h2>
        <p class="mt-3 text-gray-600 leading-relaxed">
            Sistem Informasi Kepegawaian digunakan untuk membantu administrator
            dalam mengelola data pegawai secara terstruktur, mulai dari data pribadi,
            jabatan, riwayat pekerjaan, hingga informasi pendukung lainnya.
        </p>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4"> Aktivitas Terbaru </h2>
        <div class="space-y-3">
            <div class="border-b pb-3">
                <p class="text-gray-700"> Data pegawai baru berhasil ditambahkan. </p>
                <span class="text-sm text-gray-500"> Hari ini </span>
            </div>
            <div class="border-b pb-3">
                <p class="text-gray-700"> Informasi jabatan berhasil diperbarui. </p>
                <span class="text-sm text-gray-500"> Kemarin </span>
            </div>
            <div>
                <p class="text-gray-700"> Sistem melakukan sinkronisasi data. </p>
                <span class="text-sm text-gray-500"> 3 hari yang lalu </span>
            </div>
        </div>
    </div>
</div>

<script src="frontend/assets/js/app.js"></script>
<script src="frontend/assets/js/dashboard.js"></script>