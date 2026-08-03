<?php

    $p = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    $url = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=users&page=$p";

    $response = file_get_contents($url);
    $result = json_decode($response, true);
    $users = $result['data'];
    $totalUser  = $result['total'];
    $totalPage  = $result['total_page'];
    $currentPage = $result['page'];
    $admin = $result['total_admin'];
    $staff = $result['total_staff'];

?>

<div id="userLoading" class="flex justify-center items-center py-20">
    <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
        <p class="text-gray-500">Memuat data user...</p>
    </div>
</div>

<div id="userContent" class="hidden">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800"> Manajemen User </h1>
            <p class="mt-2 text-gray-600"> Kelola akun pengguna yang dapat mengakses Sistem Informasi Kepegawaian, termasuk pengaturan hak akses dan status pengguna. </p>
        </div>
        <?php if($_SESSION['role'] == 'admin'): ?>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-700"> Daftar User </h2>
                <a href="?page=tambah_user" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"> + Tambah User </a>
            </div>
        <?php endif; ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm"> Total User </p>
                <h3 class="text-3xl font-bold text-blue-600 mt-2"> <?= $totalUser ?> </h3>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm"> Admin Aktif </p>
                <h3 class="text-3xl font-bold text-green-600 mt-2"> <?= $admin ?> </h3>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm"> Staff </p>
                <h3 class="text-3xl font-bold text-red-600 mt-2"> <?= $staff ?> </h3>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full whitespace-nowrap text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">No</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Nama User</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Role</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Status</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 text-xs sm:text-sm text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = (($currentPage - 1) * 5) + 1; ?>
                        <?php foreach ($users as $user): ?>
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="px-3 sm:px-4 md:px-6 py-3 md:py-4 text-sm"> <?= $no++ ?> </td>
                                <td class="px-3 sm:px-4 md:px-6 py-3 md:py-4 font-medium text-gray-800 text-sm"> <?= htmlspecialchars($user['username']) ?> </td>
                                <td class="px-3 sm:px-4 md:px-6 py-3 md:py-4">
                                    <?php if ($user['role'] == "admin"): ?>
                                        <span class="bg-blue-100 text-blue-700 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm"> Admin </span>
                                    <?php else: ?>
                                        <span class="bg-gray-100 text-gray-700 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm"> Pegawai </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-3 sm:px-4 md:px-6 py-3 md:py-4">
                                    <span class="bg-green-100 text-green-700 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm"> Aktif </span>
                                </td>
                                <td class="px-3 sm:px-4 md:px-6 py-3 md:py-4">
                                    <?php if($_SESSION['role'] == 'admin'): ?>
                                        <div class="flex flex-col lg:flex-row gap-2">
                                            <a href="?page=edit_user&id=<?= $user['id'] ?>" class="inline-flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg text-xs sm:text-sm transition">
                                                <img src="frontend/assets/images/edit.png" class="w-4 h-4" alt="Edit">
                                                <span>Edit</span>
                                            </a>
                                            <a href="?page=hapus_user&id=<?= $user['id'] ?>" onclick="return confirm('Yakin ingin menghapus user ini?')" class="inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-xs sm:text-sm transition">
                                                <img src="frontend/assets/images/delet.png" class="w-4 h-4" alt="Hapus">
                                                <span>Hapus</span>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-gray-400 text-sm"> Read Only </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6 gap-2">
        <?php if ($currentPage > 1): ?>
            <a href="?page=user&p=<?= $currentPage - 1 ?>" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300"> Sebelumnya </a>
        <?php endif; ?>
        <?php for($i = 1; $i <= $totalPage; $i++): ?>
            <a href="?page=user&p=<?= $i ?>" class="px-4 py-2 rounded-lg <?= $i == $currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' ?>"> <?= $i ?> </a>
        <?php endfor; ?>
        <?php if ($currentPage < $totalPage): ?>
            <a href="?page=user&p=<?= $currentPage + 1 ?>" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300"> Selanjutnya </a>
        <?php endif; ?>
    </div>
</div>
<script>
    window.addEventListener("load", function () {
        document.getElementById("userLoading").classList.add("hidden");
        document.getElementById("userContent").classList.remove("hidden");
    });
</script>