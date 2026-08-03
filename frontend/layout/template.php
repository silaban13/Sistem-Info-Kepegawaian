<!DOCTYPE html>
    <html lang="id" class="bg-white dark:bg-gray-950">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Kepegawaian</title>
        <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/dist/style.css">
        <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/frontend/assets/css/aos.css">
        <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/frontend/assets/css/tom-select.css">
    </head>
    <body class="min-h-screen bg-white dark:bg-gray-950 text-gray-900 dark:text-white transition-colors duration-300">

        <?php include __DIR__ . '/navbar.php'; ?>

            <div style="display:flex;">
                <main id="content" style="flex:1; padding:10px;">
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

        <a href="https://wa.me/6281375208486" target="_blank" class="fixed bottom-6 right-6 z-50">
            <div class="relative">
                <span class="absolute inset-0 rounded-full bg-green-500 animate-ping opacity-30"></span>
                <div class="relative w-14 h-14 rounded-full bg-green-500 flex items-center justify-center shadow-2xl hover:scale-110 transition">
                    <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/whatsapp.png" class="w-9 h-9">
                </div>
            </div>
        </a>

        <script src="/Sistem-Info-Kepegawaian/frontend/assets/js/navbar.js"></script>
        <script src="/Sistem-Info-Kepegawaian/frontend/assets/js/aos.js"></script>
        <script src="/Sistem-Info-Kepegawaian/frontend/assets/js/darkmode.js"></script>
        <script>
            AOS.init({
                duration: 800,
                easing: "ease-out-cubic",
                once: true
            });
        </script>

    </body>
</html>