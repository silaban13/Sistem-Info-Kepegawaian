<?php

require_once __DIR__ . "/../config/koneksi.php";

class DivisiModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM divisi ORDER BY nama_divisi ASC";
        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM divisi WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function create($namaDivisi, $deskripsi)
    {
        $sql = "INSERT INTO divisi (nama_divisi, deskripsi) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $namaDivisi, $deskripsi);

        return $stmt->execute();
    }

    public function update($id, $namaDivisi, $deskripsi)
    {
        $sql = " UPDATE divisi SET nama_divisi = ?, deskripsi = ? WHERE id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $namaDivisi, $deskripsi, $id);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $check = "SELECT COUNT(*) AS total FROM pegawai WHERE id_divisi = ?";
        $stmt = $this->conn->prepare($check);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result['total'] > 0) {
            return false;
        }

        $sql = "DELETE FROM divisi WHERE id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function getPagination($limit, $offset)
    {
        $sql = "SELECT * FROM divisi ORDER BY id DESC LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function countDivisi()
    {
        $sql = "SELECT COUNT(*) total FROM divisi";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc()['total'];
    }

}