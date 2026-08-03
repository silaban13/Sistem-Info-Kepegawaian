<?php

require_once __DIR__ . '/../config/koneksi.php';

class CutiModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function getAll($limit, $offset)
    {
        $sql = "SELECT cuti.*, pegawai.nama FROM cuti INNER JOIN pegawai ON cuti.id_pegawai = pegawai.id ORDER BY cuti.created_at DESC LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();

        return $stmt->get_result();
    }
    
    public function getTotalCuti()
    {
        $sql = "SELECT COUNT(*) AS total FROM cuti";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc()['total'];
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM cuti WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function create($id_pegawai, $tanggal_mulai, $tanggal_selesai, $alasan, $status)
    {
        $sql = "INSERT INTO cuti (id_pegawai, tanggal_mulai, tanggal_selesai, alasan, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "issss",
            $id_pegawai,
            $tanggal_mulai,
            $tanggal_selesai,
            $alasan,
            $status
        );

        return $stmt->execute();
    }

    public function update($id, $tanggal_mulai, $tanggal_selesai, $alasan, $status)
    {
        $sql = "UPDATE cuti SET tanggal_mulai = ?, tanggal_selesai = ?, alasan = ?, status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "ssssi",
            $tanggal_mulai,
            $tanggal_selesai,
            $alasan,
            $status,
            $id
        );

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM cuti WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function getByPegawai($id_pegawai)
    {
        $sql = "SELECT cuti.*, pegawai.nama FROM cuti INNER JOIN pegawai ON cuti.id_pegawai = pegawai.id WHERE cuti.id_pegawai = ? ORDER BY cuti.created_at DESC ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pegawai);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE cuti SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "si",
            $status,
            $id
        );

        return $stmt->execute();
    }

    public function cancel($id, $id_pegawai)
    {
        $sql = "UPDATE cuti SET status = 'Dibatalkan' WHERE id = ? AND id_pegawai = ? AND status = 'Pending'";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "ii",
            $id,
            $id_pegawai
        );

        return $stmt->execute();
    }

    public function getSummary()
    {
        $sql = "
            SELECT
                SUM(status='Pending') AS pending,
                SUM(status='Disetujui') AS approved,
                SUM(status='Ditolak') AS rejected
            FROM cuti
        ";

        return $this->conn->query($sql)->fetch_assoc();
    }

}