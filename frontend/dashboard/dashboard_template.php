<!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/dist/style.css">
    </head>
    <body class="bg-gray-100">
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 hidden z-40 lg:hidden"></div>
        <div class="flex min-h-screen">
            <?php include __DIR__ . '/sidebar_dashboard.php'; ?>
            <div class="flex-1 min-w-0 flex flex-col">
                <?php include __DIR__ . '/navbar_dashboard.php'; ?>
                <main class="flex-1 min-w-0 p-4 md:p-6 overflow-x-hidden">
                    <?php include $content; ?>
                </main>
                <?php include __DIR__ . '/footer_dashboard.php'; ?>
            </div>
        </div>
        <script src="/Sistem-Info-Kepegawaian/frontend/assets/js/navbar.js"></script>
        <?php if ($title === "Tambah Pegawai"): ?>
            <script src="/Sistem-Info-Kepegawaian/frontend/assets/js/pegawai_create.js"></script>
        <?php endif; ?>
        <?php if ($title === "Dashboard"): ?>
            <script src="/Sistem-Info-Kepegawaian/frontend/assets/js/dashboard.js"></script>
        <?php endif; ?>
    </body>
</html>