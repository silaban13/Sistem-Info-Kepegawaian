<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800"> Tambah Data Pegawai </h1>
        <p class="mt-2 text-gray-600"> Lengkapi seluruh data pegawai sebelum disimpan ke dalam sistem. </p>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form id="formPegawai" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block mb-2 font-medium text-gray-700"> NIP </label>
                    <div id="message"></div>
                    <input type="text" name="nip" class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Masukkan NIP">
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Nama Pegawai </label>
                    <input type="text" name="nama" class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Masukkan Nama">
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Jenis Kelamin </label>
                    <select name="jenis_kelamin" class="w-full border rounded-lg px-4 py-3">
                        <option value="">Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Tanggal Lahir </label>
                    <input type="date" name="tanggal_lahir" class="w-full border rounded-lg px-4 py-3">
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Email </label>
                    <input type="email" name="email" class="w-full border rounded-lg px-4 py-3" placeholder="pegawai@email.com">
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Nomor HP </label>
                    <input type="text" name="no_hp" class="w-full border rounded-lg px-4 py-3" placeholder="08xxxxxxxxxx">
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Divisi </label>
                     <select id="id_divisi" name="id_divisi" class="w-full border rounded-lg px-4 py-3"> 
                        <option value="">Pilih Divisi</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Jabatan </label>
                    <select id="id_jabatan" name="id_jabatan" class="w-full border rounded-lg px-4 py-3">
                        <option value="">Pilih Jabatan</option>
                    </select>


                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700"> Status </label>
                    <select name="status" class="w-full border rounded-lg px-4 py-3">
                        <option value="">Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>


            </div>
            <div class="mt-6">
                <label class="block mb-2 font-medium text-gray-700"> Alamat </label>
                <textarea name="alamat" rows="4" class="w-full border rounded-lg px-4 py-3 resize-none" placeholder="Masukkan alamat lengkap"></textarea>
            </div>
            <div class="mt-6">
                <label class="block mb-2 font-medium text-gray-700"> Foto Pegawai </label>
                <input type="file" name="foto" class="w-full border rounded-lg p-3">
            </div>
            <div class="mt-8 flex justify-end gap-4">
                <a href="?page=pegawai" class="px-6 py-3 rounded-lg bg-gray-300 hover:bg-gray-400"> Batal </a>
                <button type="submit" class="px-6 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700"> Simpan Data </button>
            </div>
        </form>
    </div>
</div>

<script src="frontend/assets/js/pegawai_create.js"></script>