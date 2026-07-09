<?php

class AuthMiddleware
{
    public static function checkLogin()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
            header("Location: index.php?page=login");
            exit;
        }
    }

    public static function checkAdmin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?page=dashboard_pegawai");
            exit;
        }
    }
}