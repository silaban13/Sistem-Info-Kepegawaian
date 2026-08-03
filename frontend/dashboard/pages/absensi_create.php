<div class="space-y-6">
    <h1 class="text-3xl font-bold"> Tambah Absensi </h1>
    <form id="formAbsensi" class="bg-white p-6 rounded-xl shadow space-y-4">
        <select id="id_pegawai" name="id_pegawai" class="border p-3 w-full rounded" required>
            <option value=""> Pilih Pegawai </option>
        </select>
        <input type="date" name="tanggal" class="border p-3 w-full rounded">
        <input type="time" name="jam_masuk" class="border p-3 w-full rounded">
        <input type="time" name="jam_keluar" class="border p-3 w-full rounded">
        <select name="status" class="border p-3 w-full rounded">
            <option value="Hadir"> Hadir </option>
            <option value="Izin"> Izin </option>
            <option value="Sakit"> Sakit </option>
        </select>
        <div class="flex justify-end gap-3 pt-2">
            <a href="?page=absensi" class="px-5 py-3 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800 transition"> Batal </a>
            <button type="submit" class="px-5 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition"> Simpan </button>
        </div>
    </form>
</div>

<script src="frontend/assets/js/tom-select.complete.min.js"></script>
<script src="/Sistem-Info-Kepegawaian/frontend/dashboard/js/absensi_create.js"></script>
