<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/Sistem-Info-Kepegawaian/dist/style.css">
</head>

<body class="bg-gray-100">
<div class="flex min-h-screen">
    <aside class="hidden md:block">
        <?php include __DIR__ . '/sidebar_dashboard.php'; ?>
    </aside>
    <div id="mobileSidebar" class="fixed top-0 left-0 w-64 h-full bg-white z-50 transform -translate-x-full transition duration-300 md:hidden">
        <?php include __DIR__ . '/sidebar_dashboard.php'; ?>
    </div>
    <div id="overlay"
        class="hidden fixed inset-0 bg-black bg-opacity-40 z-40 md:hidden">
    </div>



    <div class="flex-1 flex flex-col">


        <!-- Navbar -->
        <?php include __DIR__ . '/navbar_dashboard.php'; ?>


        <!-- Content -->
        <main class="flex-1 p-4 md:p-6 overflow-x-auto">

            <?php include $content; ?>

        </main>

            <!-- Overlay Mobile -->
<div 
id="sidebarOverlay"
class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden">
</div>



    </div>

</div>


<?php include __DIR__ . '/footer_dashboard.php'; ?>


<script src="/Sistem-Info-Kepegawaian/frontend/assets/js/navbar.js"></script>

</body>
</html>