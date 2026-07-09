<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/dist/style.css">
    
</head>

<body>

    <?php include __DIR__ . '/navbar_dashboard.php'; ?>

    <div class="flex">

        <?php include __DIR__ . '/sidebar_dashboard.php'; ?>

        <main class="flex-1 p-6">
            <?php include $content; ?>
        </main>

    </div>

    <?php include __DIR__ . '/footer_dashboard.php'; ?>

</body>
</html>