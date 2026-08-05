<?php

require_once __DIR__ . '/../models/DivisiModel.php';

class DivisiController
{
    private $model;
    public function __construct()
    {
        $this->model = new DivisiModel();
    }

    public function index()
    {
        $page = $_GET['page'] ?? 1;
        $limit = $_GET['limit'] ?? 4;
        $offset = ($page - 1) * $limit;
        $divisi = $this->model->getPagination($limit, $offset);
        $total = $this->model->countDivisi();

        echo json_encode([
            "status"      => true,
            "message"     => "Data divisi berhasil diambil",
            "data"        => $divisi,
            "total"       => $total,
            "totalPage"   => ceil($total / $limit),
            "currentPage" => (int)$page
        ]);
    }

    public function show($id)
    {
        $divisi = $this->model->getById($id);
        if (!$divisi) {
            http_response_code(404);
            echo json_encode([
                "status"  => false,
                "message" => "Data divisi tidak ditemukan"
            ]);

            return;
        }

        echo json_encode([
            "status" => true,
            "data"   => $divisi
        ]);
    }

    public function store()
    {
        $namaDivisi = trim($_POST['nama_divisi'] ?? '');
        $deskripsi  = trim($_POST['deskripsi'] ?? '');
        if (empty($namaDivisi) || empty($deskripsi)) {
            http_response_code(400);
            echo json_encode([
                "status"  => false,
                "message" => "Nama divisi dan deskripsi wajib diisi."
            ]);

            return;
        }

        $this->model->create($namaDivisi, $deskripsi);
        echo json_encode([
            "status"  => true,
            "message" => "Data divisi berhasil ditambahkan"
        ]);
    }

    public function update()
    {
        parse_str(file_get_contents("php://input"), $put);
        $id         = $put['id'] ?? '';
        $namaDivisi = trim($put['nama_divisi'] ?? '');
        $deskripsi  = trim($put['deskripsi'] ?? '');

        if (empty($id) || empty($namaDivisi)) {
            http_response_code(400);
            echo json_encode([
                "status"  => false,
                "message" => "ID dan nama divisi wajib diisi."
            ]);

            return;
        }

        $this->model->update($id, $namaDivisi, $deskripsi);

        echo json_encode([
            "status"  => true,
            "message" => "Data divisi berhasil diperbarui"
        ]);
    }

    public function destroy($id)
    {
        $result = $this->model->delete($id);
        if(!$result){
            echo json_encode([
                "status" => false,
                "message" => "Divisi tidak bisa dihapus karena masih digunakan oleh pegawai"
            ]);
            return;
        }

        echo json_encode([
            "status" => true,
            "message" => "Data divisi berhasil dihapus"
        ]);
    }

    public function storeWeb()
    {
        $namaDivisi = trim($_POST['nama_divisi'] ?? '');
        $deskripsi  = trim($_POST['deskripsi'] ?? '');

        if (empty($namaDivisi)) {
            $_SESSION['error'] = "Nama divisi wajib diisi.";
            header("Location: index.php?page=tambah_divisi");
            exit;
        }

        $this->model->create($namaDivisi,$deskripsi);

        $_SESSION['success'] = "Data divisi berhasil ditambahkan.";
        header("Location: index.php?page=divisi");
        exit;
    }

    public function all()
    {
        $divisi = $this->model->getAll();

        echo json_encode([
            "status" => true,
            "message" => "Semua data divisi berhasil diambil",
            "data" => $divisi
        ]);
    }

}