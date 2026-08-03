<?php

require_once __DIR__ . '/../config/koneksi.php';

class DashboardModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function totalPegawai()
    {
        $sql = "SELECT COUNT(*) AS total FROM pegawai";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function totalJabatan()
    {
        $sql = "SELECT COUNT(*) AS total FROM jabatan";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function totalDivisi()
    {
        $sql = "SELECT COUNT(*) AS total FROM divisi";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function totalCutiPending()
    {
        $sql = "SELECT COUNT(*) AS total FROM cuti WHERE status='Pending'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function tingkatKehadiran()
    {
        $sql = "SELECT ROUND( ( SUM(CASE WHEN status = 'Hadir' THEN 1 ELSE 0 END) / COUNT(*) ) * 100) AS total FROM absensi ";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'] ?? 0;
    }

}