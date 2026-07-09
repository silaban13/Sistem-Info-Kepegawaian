<?php

require_once __DIR__ . '/../models/PegawaiModel.php';

class PegawaiController
{
    private $model;

    public function __construct()
    {
        $this->model = new PegawaiModel();
    }

    // Menampilkan semua pegawai
    public function index()
    {
        $result = $this->model->getAll();
        $pegawai = [];

        while ($row = $result->fetch_assoc()) {
            $pegawai[] = $row;
        }

        echo json_encode([
            "status" => true,
            "message" => "Data pegawai berhasil diambil",
            "data" => $pegawai
        ]);
    }

    // Menampilkan detail pegawai
    public function show($id)
    {
        $pegawai = $this->model->getById($id);

        if (!$pegawai) {
            http_response_code(404);

            echo json_encode([
                "status" => false,
                "message" => "Data pegawai tidak ditemukan"
            ]);

            return;
        }

        echo json_encode([
            "status" => true,
            "data" => $pegawai
        ]);
    }

    // Menambah pegawai
    public function store()
    {
        $nip            = $_POST['nip'] ?? '';
        $nama           = $_POST['nama'] ?? '';
        $jenisKelamin   = $_POST['jenis_kelamin'] ?? '';
        $tanggalLahir   = $_POST['tanggal_lahir'] ?? '';
        $alamat         = $_POST['alamat'] ?? '';
        $email          = $_POST['email'] ?? '';
        $noHp           = $_POST['no_hp'] ?? '';
        $foto           = $_POST['foto'] ?? '';
        $status         = $_POST['status'] ?? '';
        $idDivisi       = $_POST['id_divisi'] ?? '';
        $idJabatan      = $_POST['id_jabatan'] ?? '';
        $idUser         = $_POST['id_user'] ?? '';

        if (
            empty($nip) ||
            empty($nama) ||
            empty($jenisKelamin) ||
            empty($tanggalLahir) ||
            empty($status) ||
            empty($idDivisi) ||
            empty($idJabatan) ||
            empty($idUser)
        ) {
            http_response_code(400);

            echo json_encode([
                "status" => false,
                "message" => "Semua field wajib diisi."
            ]);

            return;
        }

        $result = $this->model->create(
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


if ($result === "duplicate") {

    http_response_code(400);

    echo json_encode([
        "status" => false,
        "message" => "NIP sudah terdaftar. Silakan gunakan NIP lain."
    ]);

    return;
}


if ($result === false) {

    http_response_code(500);

    echo json_encode([
        "status" => false,
        "message" => "Gagal menyimpan data pegawai."
    ]);

    return;
}


echo json_encode([
    "status" => true,
    "message" => "Data pegawai berhasil ditambahkan"
]);
    }

    // Update pegawai
    public function update()
    {
        parse_str(file_get_contents("php://input"), $put);

        $id             = $put['id'] ?? '';
        $nip            = $put['nip'] ?? '';
        $nama           = $put['nama'] ?? '';
        $jenisKelamin   = $put['jenis_kelamin'] ?? '';
        $tanggalLahir   = $put['tanggal_lahir'] ?? '';
        $alamat         = $put['alamat'] ?? '';
        $email          = $put['email'] ?? '';
        $noHp           = $put['no_hp'] ?? '';
        $foto           = $put['foto'] ?? '';
        $status         = $put['status'] ?? '';
        $idDivisi       = $put['id_divisi'] ?? '';
        $idJabatan      = $put['id_jabatan'] ?? '';

        if (empty($id)) {
            http_response_code(400);

            echo json_encode([
                "status" => false,
                "message" => "ID wajib diisi."
            ]);

            return;
        }

        $this->model->update(
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
        );

        echo json_encode([
            "status" => true,
            "message" => "Data pegawai berhasil diperbarui"
        ]);
    }

    public function destroy($id)
    {
        $this->model->delete($id);

        echo json_encode([
            "status" => true,
            "message" => "Data pegawai berhasil dihapus"
        ]);
    }
}