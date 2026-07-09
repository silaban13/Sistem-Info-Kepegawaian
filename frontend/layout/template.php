<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Kepegawaian</title>

    <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/dist/style.css">
</head>

<body>

<?php include __DIR__ . '/navbar.php'; ?>

<div style="display:flex;">
    <main style="flex:1; padding:20px;">
        <?php
            if (isset($content) && file_exists($content)) {
                include $content;
            } else {
                echo "Halaman tidak ditemukan";
            }
        ?>
    </main>
</div>

<?php include __DIR__ . '/footer.php'; ?>

<script src="/Sistem-Info-Kepegawaian/frontend/assets/js/navbar.js"></script>
</body>
</html>