<div id="absensiLoading" class="flex justify-center items-center py-20">
    <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
        <p class="text-gray-500">Memuat data absensi...</p>
    </div>
</div>

<div id="absensiContent" class="hidden">

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800"> Data Absensi </h1>
            <a href="?page=absensi-create" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition"> + Tambah Absensi </a>
        </div>
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full whitespace-nowrap text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">No</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Nama Pegawai</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Tanggal</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Jam Masuk</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Jam Keluar</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody id="absensiData"></tbody>
                </table>
            </div>
        </div>
        <div id="pagination" class="flex justify-center gap-2 p-4"></div>
    </div>
</div>

<script src="/Sistem-Info-Kepegawaian/frontend/dashboard/js/absensi.js"></script>