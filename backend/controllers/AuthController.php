<?php

require_once __DIR__ . '/../models/AuthModel.php';

class AuthController
{
    private $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $title = "Login";
        require_once __DIR__ . "/../../frontend/login.php";
    }

    public function login()
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Username dan Password wajib diisi.";
            header("Location: index.php?page=login");
            exit;
        }

        $user = $this->authModel->loginUser($username);

        if (!$user) {
            $_SESSION['error'] = "Username tidak ditemukan.";
            header("Location: index.php?page=login");
            exit;
        }

        if (!password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Password salah.";
            header("Location: index.php?page=login");
            exit;
        }

        if ($user['role'] == 'pegawai' && empty($user['id_pegawai'])) {
            $_SESSION['error'] = "Akun ini belum terhubung dengan data pegawai. Hubungi administrator.";
            header("Location: index.php?page=login");
            exit;
        }

        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['id_pegawai'] = $user['id_pegawai'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['foto'] = $user['foto'];

        if (isset($_POST['remember'])) {

            $token = bin2hex(random_bytes(32));
            $this->authModel->saveRememberToken($user['id'], $token);
            setcookie("remember_token", $token, time() + (60 * 60 * 24 * 30), "/", "", false, true);

        }

        if ($user['role'] == 'admin') {
            header("Location: index.php?page=dashboard");
        } else {
            header("Location: index.php?page=dashboard");
        }

        exit;

    }

    public function register()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = $this->authModel->registerUser($username, $hashPassword, $role);

        if($result){
            echo json_encode([
                "status"=>true,
                "message"=>"User berhasil dibuat"
            ]);
        }else{
            echo json_encode([
                "status"=>false,
                "message"=>"Gagal membuat user"
            ]);

        }
    }

    public function logout()
    {
        if (isset($_SESSION['id_user'])) {
            $this->authModel->clearRememberToken($_SESSION['id_user']);
        }

        setcookie("remember_token", "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }

}