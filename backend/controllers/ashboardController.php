<?php

require_once __DIR__ . '/../models/DashboardModel.php';

class DashboardController
{
    private $model;
    public function __construct()
    {
        $this->model = new DashboardModel();
    }

    public function index()
    {
        echo json_encode([
            "status"=>true,
            "data"=>[
                "pegawai" =>
                $this->model->totalPegawai(),
                "jabatan" =>
                $this->model->totalJabatan(),
                "divisi" =>
                $this->model->totalDivisi(),
                "cuti_pending" =>
                $this->model->totalCutiPending()
            ]

        ]);

    }

}