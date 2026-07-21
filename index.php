<?php

    session_start();

    require_once __DIR__ . '/backend/config/koneksi.php';
    require_once __DIR__ . '/backend/models/AuthModel.php';
    require_once __DIR__ . '/backend/controllers/AuthController.php';
    require_once __DIR__ . '/backend/middleware/AuthMiddleware.php';
    require_once __DIR__ . '/backend/controllers/DivisiController.php';

    $authController = new AuthController();
    $divisiController = new DivisiController();

    $page = $_GET['page'] ?? 'home';

    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $page)) {
        http_response_code(404);
        $title = "404";
        $content = __DIR__ . '/frontend/404.php';
        require __DIR__ . '/frontend/layout/template.php';
        exit;
    }

    switch ($page) {

        case 'home':
            $title = "Home";
            $content = __DIR__ . '/frontend/home.php';
            require __DIR__ . '/frontend/layout/template.php';
            break;

        case 'about':
            $title = "About";
            $content = __DIR__ . '/frontend/about.php';
            require __DIR__ . '/frontend/layout/template.php';
            break;

        case 'contact':
            $title = "Contact";
            $content = __DIR__ . '/frontend/contact.php';
            require __DIR__ . '/frontend/layout/template.php';
            break;

         case 'dashboard':
            AuthMiddleware::checkLogin();
            $title = "Dashboard";
            $content = __DIR__ . '/frontend/dashboard/pages/dashboard.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'pegawai':
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "Pegawai";
            $content = __DIR__ . '/frontend/dashboard/pages/pegawai.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'tambah_pegawai':
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "Tambah Pegawai";
            $content = __DIR__ . '/frontend/dashboard/pages/tambah_pegawai.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'pegawai_edit':
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "Edit Pegawai";
            $content = __DIR__ . '/frontend/dashboard/pages/pegawai_edit.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'divisi':
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "Divisi";
            $content = __DIR__ . '/frontend/dashboard/pages/divisi.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;


        case 'tambah_divisi':
            $title = "Tambah Divisi";
            $content = __DIR__ . '/frontend/dashboard/pages/tambah_divisi.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'simpan_divisi':
            $divisiController = new DivisiController();
            $divisiController->storeWeb();
            break;

        case "edit_divisi":
            $title = "Edit Divisi";
            $content = __DIR__ . "/frontend/dashboard/pages/edit_divisi.php";
            require __DIR__ . "/frontend/dashboard/dashboard_template.php";
            break;

        case "hapus_divisi":
            require_once __DIR__ . "/backend/controllers/DivisiController.php";
            $controller = new DivisiController();
            $controller->destroy($_GET['id']);
            header("Location: index.php?page=divisi");
            exit;
            break;

        case 'jabatan':
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "Jabatan";
            $content = __DIR__ . '/frontend/dashboard/pages/jabatan.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'absensi':
            $title = "Absensi";
            $content = __DIR__ . '/frontend/dashboard/pages/absensi.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'absensi':
            AuthMiddleware::checkLogin();
            $title = "Absensi";
            $content = __DIR__ . '/frontend/dashboard/pages/absensi.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'absensi-create':
            $title = "Tambah Absensi";
            $content = __DIR__ . '/frontend/dashboard/pages/absensi_create.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'cuti':
            AuthMiddleware::checkLogin();
            $title = "Cuti";
            $content = __DIR__ . '/frontend/dashboard/pages/cuti.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;

        case 'user':
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "User";
            $content = __DIR__ . '/frontend/dashboard/pages/user.php';
            require __DIR__ . '/frontend/dashboard/dashboard_template.php';
            break;


        case "register":
            require_once __DIR__ . "/../controllers/AuthController.php";
            $controller = new AuthController();
            $controller->register();
            break;

        case "edit_user":
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "Edit User";
            $content = __DIR__ . "/frontend/dashboard/pages/edit_user.php";
            require __DIR__ . "/frontend/dashboard/dashboard_template.php";
            break;

        case 'proses_edit_user':
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            require_once __DIR__ . '/backend/controllers/UserController.php';
            $controller = new UserController();
            $controller->prosesEdit();
            break;

        case "hapus_user":
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            require_once __DIR__ . "/backend/controllers/UserController.php";
            $controller = new UserController();
            $controller->prosesHapus();
            break;

        case "tambah_user":
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            $title = "Tambah User";
            $content = __DIR__ . "/frontend/dashboard/pages/tambah_user.php";
            require __DIR__ . "/frontend/dashboard/dashboard_template.php";
            break;

        case "proses_tambah_user":
            AuthMiddleware::checkLogin();
            AuthMiddleware::checkAdmin();
            require_once __DIR__ . "/backend/controllers/UserController.php";
            $controller = new UserController();
            $controller->prosesTambah();
            break;

        case "login":
            $title = "Login";
            $content = __DIR__ . "/frontend/login.php";
            require __DIR__ . "/frontend/layout/auth_template.php";
            break;

        case "proses_login":
            $authController->login();
            break;

        case "search":
            require_once __DIR__ . "/../controllers/SearchController.php";
            $controller = new SearchController();
            $controller->search();
            break;

    case "profile":
        session_start();

        echo json_encode([
            "status" => true,
            "test" => "SAYA BERHASIL MASUK",
            "data" => [
                "nama" => $_SESSION['nama'],
                "id_pegawai" => $_SESSION['id_pegawai'],
                "role" => $_SESSION['role'],
                "foto" => $_SESSION['foto'] ?? null
            ]
        ]);
        break;

        case 'logout':
            $authController->logout();
            break;

        default:
            http_response_code(404);
            $title = "404";
            $content = __DIR__ . '/frontend/dashboard/404.php';
            require __DIR__ . '/frontend/layout/template.php';
            break;
    }