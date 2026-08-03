<?php

require_once __DIR__ . "/../models/AuthModel.php";

class AuthMiddleware
{

    public static function checkLogin()
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            return;
        }

        if (isset($_COOKIE['remember_token'])) {
            $authModel = new AuthModel();
            $user = $authModel->getUserByRememberToken(
                $_COOKIE['remember_token']
            );

            if ($user) {
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['id_pegawai'] = $user['id_pegawai'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['foto'] = $user['foto'];

                return;
            }
        }

        header("Location: index.php?page=login");
        exit;
    }


    public static function checkAdmin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?page=dashboard_pegawai");
            exit;
        }
    }
}