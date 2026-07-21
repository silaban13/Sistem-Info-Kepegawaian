<div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-8">
    <h1 class="text-3xl font-bold mb-6"> Tambah Divisi </h1>
    <form action="?page=simpan_divisi" method="POST">
        <div class="mb-5">
            <label class="block mb-2 font-semibold"> Nama Divisi </label>
            <input type="text" name="nama_divisi" class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500" placeholder="Contoh : Divisi IT" required>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700"> Simpan </button>
            <a href="?page=divisi" class="bg-gray-300 px-6 py-3 rounded-lg hover:bg-gray-400"> Batal </a>
        </div>
    </form>
</div>