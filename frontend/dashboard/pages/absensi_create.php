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
        <button class="bg-blue-600 text-white px-5 py-3 rounded"> Simpan </button>
    </form>
</div>

<script src="/Sistem-Info-Kepegawaian/frontend/dashboard/js/absensi_create.js"></script>