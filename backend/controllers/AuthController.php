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

        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: index.php?page=dashboard");
        } else {
            header("Location: index.php?page=dashboard");
        }

        exit;
    }

    public function logout()
    {
        session_destroy();

        header("Location: index.php?page=login");
        exit;
    }
}