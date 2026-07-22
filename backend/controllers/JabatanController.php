<?php

require_once __DIR__ . '/../models/JabatanModel.php';

class JabatanController
{
    private $model;

    public function __construct()
    {
        $this->model = new JabatanModel();
    }

    public function index()
    {
        $result = $this->model->getAll();
        $jabatan = [];

        while ($row = $result->fetch_assoc()) {
            $jabatan[] = $row;
        }

        echo json_encode([
            "status"  => true,
            "message" => "Data jabatan berhasil diambil",
            "data"    => $jabatan
        ]);
    }

    public function show($id)
    {
        $jabatan = $this->model->getById($id);

        if (!$jabatan) {
            http_response_code(404);

            echo json_encode([
                "status"  => false,
                "message" => "Data jabatan tidak ditemukan"
            ]);

            return;
        }

        echo json_encode([
            "status" => true,
            "data"   => $jabatan
        ]);
    }

    public function store()
    {
        $namaJabatan = trim($_POST['nama_jabatan'] ?? '');
        $gajiPokok   = $_POST['gaji_pokok'] ?? '';

        if (empty($namaJabatan) || $gajiPokok === '') {
            http_response_code(400);
            echo json_encode([
                "status"  => false,
                "message" => "Nama jabatan dan gaji pokok wajib diisi."
            ]);

            return;
        }

        $this->model->create($namaJabatan, $gajiPokok);

        echo json_encode([
            "status"  => true,
            "message" => "Data jabatan berhasil ditambahkan"
        ]);
    }

    public function update()
    {
        parse_str(file_get_contents("php://input"), $put);
        $id           = $put['id'] ?? '';
        $namaJabatan  = trim($put['nama_jabatan'] ?? '');
        $gajiPokok    = $put['gaji_pokok'] ?? '';

        if (empty($id) || empty($namaJabatan) || $gajiPokok === '') {
            http_response_code(400);
            echo json_encode([
                "status"  => false,
                "message" => "ID, nama jabatan, dan gaji pokok wajib diisi."
            ]);

            return;
        }

        $this->model->update($id, $namaJabatan, $gajiPokok);

        echo json_encode([
            "status"  => true,
            "message" => "Data jabatan berhasil diperbarui"
        ]);
    }

    public function destroy($id)
    {

        $result = $this->model->delete($id);
        if($result === "used"){
            echo json_encode([
                "status"=>false,
                "message"=>"Jabatan tidak bisa dihapus karena masih digunakan pegawai"
            ]);

            return;

        }

        if(!$result){
            echo json_encode([
                "status"=>false,
                "message"=>"Gagal menghapus jabatan"
            ]);

            return;

        }

        echo json_encode([
            "status"=>true,
            "message"=>"Data jabatan berhasil dihapus"
        ]);

    }
}