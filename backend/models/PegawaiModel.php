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
        $sql = "SELECT
                    p.*,
                    d.nama_divisi,
                    j.nama_jabatan,
                    u.username
                FROM pegawai p
                LEFT JOIN divisi d ON p.id_divisi = d.id
                LEFT JOIN jabatan j ON p.id_jabatan = j.id
                LEFT JOIN users u ON p.id_user = u.id
                ORDER BY p.id DESC";

        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT
                    p.*,
                    d.nama_divisi,
                    j.nama_jabatan,
                    u.username
                FROM pegawai p
                LEFT JOIN divisi d ON p.id_divisi = d.id
                LEFT JOIN jabatan j ON p.id_jabatan = j.id
                LEFT JOIN users u ON p.id_user = u.id
                WHERE p.id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

   public function create(
    $nip,
    $nama,
    $jenisKelamin,
    $tanggalLahir,
    $alamat,
    $email,
    $noHp,
    $foto,
    $status,
    $idDivisi,
    $idJabatan,
    $idUser
) {

    $sql = "INSERT INTO pegawai
            (
                nip,
                nama,
                jenis_kelamin,
                tanggal_lahir,
                alamat,
                email,
                no_hp,
                foto,
                status,
                id_divisi,
                id_jabatan,
                id_user
            )
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);

    $stmt->bind_param(
        "sssssssssiii",
        $nip,
        $nama,
        $jenisKelamin,
        $tanggalLahir,
        $alamat,
        $email,
        $noHp,
        $foto,
        $status,
        $idDivisi,
        $idJabatan,
        $idUser
    );


    try {

        $stmt->execute();

        return true;

    } catch (mysqli_sql_exception $e) {

        // Duplicate entry (NIP sudah ada)
        if ($e->getCode() == 1062) {
            return "duplicate";
        }

        return false;
    }
}

    public function update(
        $id,
        $nip,
        $nama,
        $jenisKelamin,
        $tanggalLahir,
        $alamat,
        $email,
        $noHp,
        $foto,
        $status,
        $idDivisi,
        $idJabatan
    ) {

        $sql = "UPDATE pegawai SET
                    nip = ?,
                    nama = ?,
                    jenis_kelamin = ?,
                    tanggal_lahir = ?,
                    alamat = ?,
                    email = ?,
                    no_hp = ?,
                    foto = ?,
                    status = ?,
                    id_divisi = ?,
                    id_jabatan = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "sssssssssiii",
            $nip,
            $nama,
            $jenisKelamin,
            $tanggalLahir,
            $alamat,
            $email,
            $noHp,
            $foto,
            $status,
            $idDivisi,
            $idJabatan,
            $id
        );

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pegawai WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}