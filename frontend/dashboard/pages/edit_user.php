<?php

$id = $_GET['id'];

$response = file_get_contents("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=users/show&id=$id");
$result = json_decode($response, true);
$user = $result['data'];

?>

<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800"> Edit User </h1>
        <p class="mt-2 text-gray-600"> Ubah informasi akun pengguna yang terdaftar pada Sistem Informasi Kepegawaian. </p>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="?page=proses_edit_user" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700"> Username </label>
                <input type="text" name="username" value="<?= $user['username'] ?>" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

    <div class="mb-6">
        <label class="block mb-2 font-semibold text-gray-700">
            Password Baru
        </label>

        <div class="relative">
            <input type="password" id="password" name="password" placeholder="Masukkan password baru" class="w-full border border-gray-300 rounded-lg px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button id="toggleBtn" type="button" onclick="togglePassword()" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700"> 👁 </button>
        </div>
        <p class="text-sm text-gray-500 mt-2">
            Kosongkan jika password tidak ingin diubah.
        </p>
    </div>



            <div class="mb-8">
                <label class="block mb-2 font-semibold text-gray-700"> Role </label>
                <select name="role" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="admin" <?= $user['role'] == "admin" ? "selected" : "" ?>> Admin </option>
                    <option value="pegawai" <?= $user['role'] == "pegawai" ? "selected" : "" ?>> Pegawai </option>
                </select>
            </div>
            <div class="flex justify-end gap-3">
                <a href="?page=user" class="px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-100 transition"> Batal </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"> Simpan Perubahan </button>
            </div>
        </form>
    </div>
</div>

<script>

function togglePassword() {
    const input = document.getElementById("password");
    const btn = document.getElementById("toggleBtn");

    if (input.type === "password") {
        input.type = "text";
        btn.textContent = "🙈";
    } else {
        input.type = "password";
        btn.textContent = "👁";
    }
}


</script>