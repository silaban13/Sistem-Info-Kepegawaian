<?php

require_once __DIR__ . "/../config/koneksi.php";

class PegawaiModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function getAll()
    {
        $sql = "SELECT p.*, d.nama_divisi, j.nama_jabatan, u.username FROM pegawai p LEFT JOIN divisi d ON p.id_divisi = d.id LEFT JOIN jabatan j ON p.id_jabatan = j.id LEFT JOIN users u ON p.id_user = u.id ORDER BY p.id DESC";
        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT p.*, d.nama_divisi, j.nama_jabatan, u.username FROM pegawai p LEFT JOIN divisi d ON p.id_divisi = d.id LEFT JOIN jabatan j ON p.id_jabatan = j.id LEFT JOIN users u ON p.id_user = u.id WHERE p.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create( $nama, $jenisKelamin, $alamat, $email, $noHp, $foto, $status, $idDivisi, $idJabatan, $idUser) {
        $sql = "INSERT INTO pegawai ( nama, jenis_kelamin, alamat, email, no_hp, foto, status, id_divisi, id_jabatan, id_user ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param( "sssssssiii", $nama, $jenisKelamin, $alamat, $email, $noHp, $foto, $status, $idDivisi, $idJabatan, $idUser );
        try {
            $stmt->execute();
            return true;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                return "duplicate";
            }
            return false;
        }
    }

    public function update( $id, $nama, $jenisKelamin, $alamat, $email, $noHp, $foto, $status, $idDivisi, $idJabatan) {
        $sql = "UPDATE pegawai SET nama = ?, jenis_kelamin = ?, alamat = ?, email = ?, no_hp = ?, foto = ?, status = ?, id_divisi = ?, id_jabatan = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param( "sssssssiii", $nama, $jenisKelamin, $alamat, $email, $noHp, $foto, $status, $idDivisi, $idJabatan, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pegawai WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

   public function getPagination($limit,$offset)
{ 
    $sql="
        SELECT 
            p.*,
            d.nama_divisi,
            j.nama_jabatan,
            u.username
        FROM pegawai p
        LEFT JOIN divisi d 
            ON p.id_divisi = d.id
        LEFT JOIN jabatan j 
            ON p.id_jabatan = j.id
        LEFT JOIN users u 
            ON p.id_user = u.id
        ORDER BY p.id DESC
        LIMIT ? OFFSET ?
    ";

    $stmt=$this->conn->prepare($sql);

    $stmt->bind_param(
        "ii",
        $limit,
        $offset
    );

    $stmt->execute();

    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

    public function countPegawai(){
        $sql="SELECT COUNT(*) total FROM pegawai";
        $result=$this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

}