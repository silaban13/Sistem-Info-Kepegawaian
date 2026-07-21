<div class="space-y-6">

    <h1 class="text-3xl font-bold text-gray-800">
        Data Absensi
    </h1>

    <a href="?page=absensi-create"
    class="bg-blue-600 text-white px-4 py-2 rounded-lg">
        + Tambah Absensi
    </a>

    <br>
    <br>


    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Pegawai</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Jam Masuk</th>
                    <th class="px-6 py-3">Jam Keluar</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>


            <tbody id="absensiData">

            </tbody>

        </table>

    </div>


</div>


<script src="/Sistem-Info-Kepegawaian/frontend/dashboard/js/absensi.js"></script>