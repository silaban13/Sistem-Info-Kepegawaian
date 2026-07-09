<?php

    $url = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai";
    $response = file_get_contents($url);
    $result = json_decode($response, true);
    $pegawai = $result['data'];

?>

<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800"> Data Pegawai </h1>
        <p class="mt-2 text-gray-600">
            Kelola informasi pegawai yang terdaftar pada Sistem Informasi Kepegawaian.
            Anda dapat melihat, menambah, mengubah, dan menghapus data pegawai.
        </p>
    </div>
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-700"> Daftar Pegawai </h2>
        <a href="?page=tambah_pegawai" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"> + Tambah Pegawai </a>

    </div>
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-gray-600">No</th>
                    <th class="px-6 py-3 text-gray-600">Nama Pegawai</th>
                    <th class="px-6 py-3 text-gray-600">Jabatan</th>
                    <th class="px-6 py-3 text-gray-600">Email</th>
                    <th class="px-6 py-3 text-gray-600">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pegawai as $row): ?>
                    <tr class="border-t">
                        <td class="px-6 py-4"> <?= $no++ ?> </td>
                        <td class="px-6 py-4"> <?= $row['nama'] ?> </td>
                        <td class="px-6 py-4"> <?= $row['id_jabatan'] ?> </td>
                        <td class="px-6 py-4"> <?= $row['email'] ?> </td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm"> <?= $row['status'] ?> </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>