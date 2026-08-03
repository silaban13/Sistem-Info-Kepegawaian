<?php
    $page = $_GET['halaman'] ?? 1;
    $json = file_get_contents("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=divisi&page=$page&limit=4");
    $result = json_decode($json, true);
    $divisi = $result['data'];
    $totalPage = $result['totalPage'];
    $currentPage = $result['currentPage'];
?>

<div id="divisiLoading" class="flex justify-center items-center py-20">
    <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
        <p class="text-gray-500">Memuat data divisi...</p>
    </div>
</div>

<div id="divisiContent" class="hidden">
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
                    <p class="mt-2 text-gray-600"> <?= htmlspecialchars($row['deskripsi'] ?? 'Belum ada deskripsi.') ?></p>
                    <div class="mt-4 text-sm text-gray-500"> ID Divisi : <?= $row['id'] ?> </div>
                    <div class="mt-6 flex gap-3">
                        <a href="?page=edit_divisi&id=<?= $row['id'] ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600"> Edit </a>
                        <a href="?page=hapus_divisi&id=<?= $row['id'] ?>" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700" onclick="return confirm('Yakin ingin menghapus divisi ini?')"> Hapus </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-center gap-2 mt-8">
            <?php if($currentPage > 1): ?>
                <a href="?page=divisi&halaman=<?= $currentPage-1 ?>" class="px-4 py-2 bg-gray-200 rounded"> ← Prev</a>
            <?php endif; ?>
            <?php for($i=1;$i<=$totalPage;$i++): ?>
                <a href="?page=divisi&halaman=<?= $i ?>" class="px-4 py-2 rounded <?= $i==$currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200' ?>"> <?= $i ?> </a>
            <?php endfor; ?>
            <?php if($currentPage < $totalPage): ?>
                <a href="?page=divisi&halaman=<?= $currentPage+1 ?>" class="px-4 py-2 bg-gray-200 rounded"> Next → </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", function () {
        document.getElementById("divisiLoading").classList.add("hidden");
        document.getElementById("divisiContent").classList.remove("hidden");
    });
</script>