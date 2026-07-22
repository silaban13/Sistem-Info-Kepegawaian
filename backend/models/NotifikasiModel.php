<?php

require_once __DIR__ . "/../config/koneksi.php";

class NotifikasiModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM notifikasi ORDER BY created_at DESC";

        return $this->conn
            ->query($sql)
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function create($judul, $isi)
    {
        $sql = "INSERT INTO notifikasi (judul, isi) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $judul, $isi);

        return $stmt->execute();
    }

    public function readAll()
    {
        $sql = "UPDATE notifikasi SET status = 'dibaca' WHERE status = 'belum'";
        return $this->conn->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM notifikasi WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "i",
            $id
        );

        return $stmt->execute();
    }


}


