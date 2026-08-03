<?php

require_once __DIR__ . '/../models/CutiModel.php';

class CutiController
{
    private $model;
    public function __construct()
    {
        $this->model = new CutiModel();
    }

    public function index()
{
    $limit = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    if ($page < 1) {
        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    $result = $this->model->getAll($limit, $offset);
    $cuti = [];

    while ($row = $result->fetch_assoc()) {
        $cuti[] = $row;
    }

    $total = $this->model->getTotalCuti();

    // Ambil ringkasan
    $summary = $this->model->getSummary();

    echo json_encode([
        "status"      => true,
        "data"        => $cuti,
        "page"        => $page,
        "limit"       => $limit,
        "total"       => $total,
        "total_page"  => ceil($total / $limit),

        // Tambahkan ini
        "summary"     => $summary
    ]);
}

    public function store()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $id_pegawai = $input['id_pegawai'];
        $tanggal_mulai = $input['tanggal_mulai'];
        $tanggal_selesai = $input['tanggal_selesai'];
        $alasan = $input['alasan'];
        $status = trim($input['status'] ?? '');
        if ($status === '') {
            $status = 'Pending';
        }

        if ($alasan === '') {
            echo json_encode([
                "status" => false,
                "message" => "Alasan cuti wajib diisi."
            ]);
            return;
        }

        if (strlen($alasan) > 300) {
            echo json_encode([
                "status" => false,
                "message" => "Alasan maksimal 300 karakter."
            ]);
            exit;
        }

        $result = $this->model->create($id_pegawai, $tanggal_mulai, $tanggal_selesai, $alasan, $status);

        echo json_encode([
            "status" => $result,
            "message" => $result 
                ? "Cuti berhasil ditambahkan"
                : "Gagal menambahkan cuti"
        ]);

    }

    public function update()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'];
        $tanggal_mulai = $input['tanggal_mulai'];
        $tanggal_selesai = $input['tanggal_selesai'];
        $alasan = $input['alasan'];
        $status = $input['status'];

        $result = $this->model->update($id, $tanggal_mulai, $tanggal_selesai, $alasan, $status);

        echo json_encode([
            "status" => $result,
            "message" => $result
                ? "Cuti berhasil diupdate"
                : "Gagal update cuti"
        ]);
    }

    public function destroy()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'];
        $result = $this->model->delete($id);
        echo json_encode([
            "status" => $result,
            "message" => $result
                ? "Cuti berhasil dihapus"
                : "Gagal menghapus cuti"
        ]);
    }

    public function pegawai($id_pegawai)
    {
        $result = $this->model->getByPegawai($id_pegawai);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    public function updateStatus()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'];
        $status = $input['status'];

        if (!in_array($status, ["Disetujui", "Ditolak"])) {

            http_response_code(400);
            echo json_encode([
                "status" => false,
                "message" => "Status tidak valid"
            ]);

            return;
        }

        $result = $this->model->updateStatus($id, $status);
        echo json_encode([
            "status" => $result,
            "message" => $result
                ? "Status cuti berhasil diperbarui"
                : "Gagal memperbarui status"
        ]);
    }

    public function cancel()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input["id"];
        $id_pegawai = $_SESSION['id_pegawai'];
        $result = $this->model->cancel($id, $id_pegawai);

        echo json_encode([
            "status" => $result,
            "message" => $result
                ? "Pengajuan cuti berhasil dibatalkan"
                : "Gagal membatalkan pengajuan cuti"
        ]);
    }

}