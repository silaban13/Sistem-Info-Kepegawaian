<?php

require_once __DIR__ . '/../models/PegawaiModel.php';
require_once __DIR__ . "/../models/NotifikasiModel.php";

class PegawaiController
{
    private $model;
    public function __construct()
    {
        $this->model = new PegawaiModel();
    }

    public function index()
    {
        $page = $_GET['page'] ?? 1;
        $limit = $_GET['limit'] ?? 5;
        $offset = ($page - 1) * $limit;
        $pegawai = $this->model->getPagination($limit, $offset);

        $total = $this->model->countPegawai();
        echo json_encode([
            "status" => true,
            "message" => "Data pegawai berhasil diambil",
            "data" => $pegawai,
            "total" => $total,
            "totalPage" => ceil($total / $limit),
            "currentPage" => (int)$page
        ]);
    }

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

    public function store()
    {
        $nama           = $_POST['nama'] ?? '';
        $jenisKelamin   = $_POST['jenis_kelamin'] ?? '';
        $alamat         = $_POST['alamat'] ?? '';
        $email          = $_POST['email'] ?? '';
        $noHp           = $_POST['no_hp'] ?? '';
        $status         = $_POST['status'] ?? '';
        $idDivisi       = $_POST['id_divisi'] ?? '';
        $idJabatan      = $_POST['id_jabatan'] ?? '';
        $idUser    = $_POST['id_user'] ?? null;

        if (
            empty($nama) ||
            empty($jenisKelamin) ||
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

        $foto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            if ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
                http_response_code(400);
                echo json_encode([
                    "status" => false,
                    "message" => "Ukuran foto maksimal 2 MB."
                ]);
                return;
            }

            $allowedMime = ["image/jpeg","image/png","image/webp"];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['foto']['tmp_name']);
            finfo_close($finfo);
            if (!in_array($mime, $allowedMime)) {
                http_response_code(400);
                echo json_encode([
                    "status" => false,
                    "message" => "Format foto harus JPG, PNG, atau WEBP."
                ]);
                return;
            }

            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
            $namaFoto = bin2hex(random_bytes(16)) . "." . $ext;
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                __DIR__ . "/../../frontend/assets/uploads/" . $namaFoto
            );

            $foto = $namaFoto;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                "status" => false,
                "message" => "Format email tidak valid."
            ]);
            return;
        }

        if (!preg_match('/^08[0-9]{8,11}$/', $noHp)) {
            http_response_code(400);
            echo json_encode([
                "status" => false,
                "message" => "Nomor HP tidak valid."
            ]);
            return;
        }

        $result = $this->model->create($nama, $jenisKelamin, $alamat, $email, $noHp, $foto, $status, $idDivisi, $idJabatan, $idUser);

        if ($result === "duplicate") {
            http_response_code(400);
            echo json_encode([
                "status" => false,
                "message" => "Data pegawai sudah terdaftar."
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


        if ($result) {

            $notif = new NotifikasiModel();
            $notif->create(
                "Pegawai Baru",
                "Pegawai {$nama} berhasil ditambahkan."
            );

            echo json_encode([
                "status" => true,
                "message" => "Data pegawai berhasil ditambahkan"
            ]);

            return;
        }


    }

    public function update()
    {
        $id = $_POST['id'] ?? '';
        $nama = $_POST['nama'] ?? '';
        $jenisKelamin = $_POST['jenis_kelamin'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $email = $_POST['email'] ?? '';
        $noHp = $_POST['no_hp'] ?? '';
        $status = $_POST['status'] ?? '';
        $idDivisi = $_POST['id_divisi'] ?? '';
        $idJabatan = $_POST['id_jabatan'] ?? '';

        if (empty($id)) {
            http_response_code(400);
            echo json_encode([
                "status"=>false,
                "message"=>"ID wajib diisi."
            ]);

            return;
        }

        $pegawai = $this->model->getFoto($id);
        $foto = $pegawai['foto'];
        if(isset($_FILES['foto']) && $_FILES['foto']['error']==0){
            $ext = strtolower(
                pathinfo(
                    $_FILES['foto']['name'],
                    PATHINFO_EXTENSION
                )
            );

            $namaFoto = bin2hex(random_bytes(16)).".".$ext;
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                __DIR__."/../../frontend/assets/uploads/".$namaFoto
            );

            if(
                !empty($foto) &&
                file_exists(
                    __DIR__."/../../frontend/assets/uploads/".$foto
                )
            ){
                unlink(
                    __DIR__."/../../frontend/assets/uploads/".$foto
                );
            }

            $foto = $namaFoto;
        }

        $this->model->update($id, $nama, $jenisKelamin, $alamat, $email, noHp, $foto, $status, $idDivisi, $idJabatan);

        echo json_encode([
            "status"=>true,
            "message"=>"Data pegawai berhasil diperbarui"
        ]);
    }

    public function destroy($id)
    {
        $pegawai = $this->model->getFoto($id);
        if ($pegawai && !empty($pegawai['foto'])) {
            $path = __DIR__ . "/../../frontend/assets/uploads/" . $pegawai['foto'];
            if (file_exists($path)) {
                unlink($path); 
            }
        }

        $this->model->delete($id);

        echo json_encode([
            "status" => true,
            "message" => "Data pegawai berhasil dihapus"
        ]);
    }

}