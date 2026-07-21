<?php

require_once __DIR__ . "/../config/koneksi.php";

class AbsensiModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function getAll()
    {
        $sql = "SELECT a.id, a.id_pegawai, p.nama, p.email, a.tanggal, a.jam_masuk, a.jam_keluar, a.status, a.created_at FROM absensi a JOIN pegawai p ON a.id_pegawai = p.id ORDER BY a.id DESC";
        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM absensi WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getByPegawai($idPegawai)
    {
        $sql = "SELECT * FROM absensi WHERE id_pegawai = ? ORDER BY tanggal DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPegawai);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function sedangCuti($idPegawai, $tanggal)
    {
        $sql = "SELECT id FROM cuti WHERE id_pegawai = ? AND status = 'Disetujui' AND ? BETWEEN tanggal_mulai AND tanggal_selesai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $idPegawai, $tanggal);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }

    public function create($idPegawai, $tanggal, $jamMasuk, $jamKeluar, $status)
    {
        $sql = "INSERT INTO absensi (id_pegawai, tanggal, jam_masuk, jam_keluar, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "issss",
            $idPegawai,
            $tanggal,
            $jamMasuk,
            $jamKeluar,
            $status
        );

        return $stmt->execute();
    }

    public function update($id, $tanggal, $jamMasuk, $jamKeluar, $status)
    {
        $sql = "UPDATE absensi
            SET tanggal = ?,
                jam_masuk = ?,
                jam_keluar = ?,
                status = ?
            WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "ssssi",
            $tanggal,
            $jamMasuk,
            $jamKeluar,
            $status,
            $id
        );

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM absensi WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}