<?php
    $json = file_get_contents("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=divisi");
    $result = json_decode($json, true);
    $divisi = $result['data'] ?? [];
?>

<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800"> Data Divisi </h1>
        <p class="mt-2 text-gray-600"> Kelola informasi divisi atau unit kerja yang terdapat dalam perusahaan. Setiap pegawai dapat dikelompokkan berdasarkan divisi masing-masing.</p>
    </div>
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-700"> Daftar Divisi </h2>
        <a href="?page=tambah_divisi" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"> + Tambah Divisi </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach($divisi as $row): ?>
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold text-gray-800"> <?= htmlspecialchars($row['nama_divisi']) ?> </h3>
                <p class="mt-2 text-gray-600"> Divisi <?= htmlspecialchars($row['nama_divisi']) ?> merupakan salah satu unit kerja yang ada pada perusahaan.</p>
                <div class="mt-4 text-sm text-gray-500"> ID Divisi : <?= $row['id'] ?> </div>
                <div class="mt-6 flex gap-3">
                    <a href="?page=edit_divisi&id=<?= $row['id'] ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600"> Edit </a>
                    <a href="?page=hapus_divisi&id=<?= $row['id'] ?>" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700" onclick="return confirm('Yakin ingin menghapus divisi ini?')"> Hapus </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>