<h2 class="text-xl font-bold mb-5"> Edit Pegawai </h2>
<form id="formEditPegawai">
    <input type="hidden" id="id">
    <div class="mb-3">
        <label>Nama</label>
        <input id="nama" class="border p-2 w-full">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input id="email" class="border p-2 w-full">
    </div>
    <div class="mb-3">
        <label>No HP</label>
        <input id="no_hp" class="border p-2 w-full">
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select id="status" class="border p-2 w-full">
            <option value="Aktif">Aktif</option>
            <option value="Nonaktif">Nonaktif</option>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="id_divisi" class="block mb-2 text-sm font-medium text-gray-700"> Divisi </label>
            <select id="id_divisi" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Pilih Divisi</option>
            </select>
        </div>
        <div>
            <label for="id_jabatan" class="block mb-2 text-sm font-medium text-gray-700"> Jabatan </label>
            <select id="id_jabatan" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                <option value="">Pilih Jabatan</option>
            </select>
        </div>
    </div>
    <div class="mt-6">
        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-700"> Jenis Kelamin </label>
        <select id="jenis_kelamin" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-blue-500">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="mt-6">
        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700"> Alamat </label>
        <textarea id="alamat" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan alamat pegawai..."></textarea>
    </div>
    <div class="flex gap-3 mt-6">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition"> Simpa </button>
        <button type="button" onclick="window.location.href='index.php?page=pegawai'" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition"> Batal </button>
    </div>
</form>
<div id="message"></div>
<script src="/Sistem-Info-Kepegawaian/frontend/assets/js/pegawai_edit.js"></script>