<?php

class ProfileController
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        echo json_encode([
            "status" => true,
            "data" => [
                "nama"       => $_SESSION['nama'] ?? $_SESSION['username'] ?? null,
                "id_pegawai" => $_SESSION['id_pegawai'] ?? null,
                "role"       => $_SESSION['role'] ?? null,
                "foto"       => $_SESSION['foto'] ?? null
            ]
        ]);
    }
}