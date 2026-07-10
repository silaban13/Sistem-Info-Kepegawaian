<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/dist/style.css">
</head>

<body class="bg-gray-100">

<?php
if (isset($content) && file_exists($content)) {
    include $content;
} else {
    echo "Halaman tidak ditemukan";
}
?>

</body>
</html>