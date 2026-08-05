<?php

require_once __DIR__ . "/../config/koneksi.php";

class JabatanModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function getAll($limit, $offset)
    {
        $sql = "SELECT jabatan.*, COUNT(pegawai.id) AS jumlah_pegawai FROM jabatan LEFT JOIN pegawai ON pegawai.id_jabatan = jabatan.id GROUP BY jabatan.id ORDER BY jabatan.id DESC LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM jabatan ORDER BY nama_jabatan ASC";
        $result = $this->conn->query($sql);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getTotalJabatan()
    {
        $sql = "SELECT COUNT(*) AS total FROM jabatan";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc()['total'];
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM jabatan WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function create($namaJabatan, $gajiPokok)
    {
        $sql = "INSERT INTO jabatan (nama_jabatan, gaji_pokok) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sd", $namaJabatan, $gajiPokok);

        return $stmt->execute();
    }

    public function update($id, $namaJabatan, $gajiPokok)
    {
        $sql = "UPDATE jabatan SET nama_jabatan = ?, gaji_pokok = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdi", $namaJabatan, $gajiPokok, $id);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $cek = $this->conn->prepare("SELECT id FROM pegawai WHERE id_jabatan = ?");
        $cek->bind_param("i", $id);
        $cek->execute();

        $result = $cek->get_result();

        if($result->num_rows > 0){

            return "used";

        }

        $sql = "DELETE FROM jabatan WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$id);
        return $stmt->execute();

    }
}