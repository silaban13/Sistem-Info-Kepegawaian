<?php

require_once "Router.php";

$router = new Router();
require_once "../controllers/AuthController.php";
require_once "../controllers/UserController.php";
require_once __DIR__ . "/../controllers/AbsensiController.php";
require_once __DIR__ . "/../controllers/DivisiController.php";
require_once __DIR__ . "/../controllers/JabatanController.php";
require_once __DIR__ . "/../controllers/PegawaiController.php";
require_once __DIR__ . "/../controllers/CutiController.php";
require_once __DIR__ . "/../controllers/DashboardController.php";

$router->post("login", [AuthController::class, "login"]);

$router->get("users", [UserController::class, "index"]);
$router->get("users/show", [UserController::class, "show"]);
$router->post("register", [UserController::class, "store"]);
$router->put("users", [UserController::class, "update"]);
$router->delete("users", [UserController::class, "destroy"]);


$router->get("absensi", [AbsensiController::class, "index"]);
$router->get("absensi/show", [AbsensiController::class, "show"]);
$router->post("absensi", [AbsensiController::class, "store"]);
$router->put("absensi", [AbsensiController::class, "update"]);
$router->delete("absensi", [AbsensiController::class, "destroy"]);

$router->get("divisi", [DivisiController::class, "index"]);
$router->get("divisi/show", [DivisiController::class, "show"]);
$router->post("divisi", [DivisiController::class, "store"]);
$router->put("divisi", [DivisiController::class, "update"]);
$router->delete("divisi", [DivisiController::class, "destroy"]);

$router->get("jabatan", [JabatanController::class, "index"]);
$router->get("jabatan/show", [JabatanController::class, "show"]);
$router->post("jabatan", [JabatanController::class, "store"]);
$router->put("jabatan", [JabatanController::class, "update"]);
$router->delete("jabatan", [JabatanController::class, "destroy"]);

$router->get("pegawai", [PegawaiController::class, "index"]);
$router->get("pegawai/show", [PegawaiController::class, "show"]);
$router->post("pegawai", [PegawaiController::class, "store"]);
$router->put("pegawai", [PegawaiController::class, "update"]);
$router->delete("pegawai", [PegawaiController::class, "destroy"]);

$router->get("cuti", [CutiController::class, "index"]);
$router->post("cuti", [CutiController::class, "store"]);
$router->put("cuti", [CutiController::class, "update"]);
$router->delete("cuti", [CutiController::class, "destroy"]);
$router->put("cuti/status", [CutiController::class, "updateStatus"]);

$router->get("dashboard", [DashboardController::class, "index"]);


$router->run();
