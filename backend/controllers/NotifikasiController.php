<?php

require_once __DIR__ . '/../models/NotifikasiModel.php';

class NotifikasiController
{
    private $model;

    public function __construct()
    {
        $this->model = new NotifikasiModel();
    }

    public function index()
    {
        $data = $this->model->getAll();

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    public function readAll()
    {
        $this->model->readAll();

        echo json_encode([
            "status" => true,
            "message" => "Semua notifikasi telah dibaca."
        ]);
    }

    public function destroy($id)
    {
        if(empty($id)){

            http_response_code(400);

            echo json_encode([
                "status"=>false,
                "message"=>"ID notifikasi tidak ditemukan"
            ]);

            return;
        }

        $this->model->delete($id);

        echo json_encode([
            "status"=>true,
            "message"=>"Notifikasi berhasil dihapus"
        ]);
    }
}