<?php

require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    private $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        if ($page < 1) {
            $page = 1;
        }

        $totalAdmin = $this->model->getTotalAdmin();
        $totalStaff = $this->model->getTotalStaff();

        $offset = ($page - 1) * $limit;
        $result = $this->model->getAll($limit, $offset);
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        $total = $this->model->getTotalUsers();
        $totalPage = ceil($total / $limit);

        echo json_encode([
            "status"      => true,
            "message"     => "Data user berhasil diambil",
            "data"        => $users,
            "page"        => $page,
            "limit"       => $limit,
            "total"       => $total,
            "total_page"  => $totalPage,
            "total_admin" => $totalAdmin,
            "total_staff" => $totalStaff
        ]);

    }

    public function available()
    {
        $result = $this->model->getAvailableUsers();
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        echo json_encode([
            "status" => true,
            "data" => $users
        ]);
    }

    public function show($id)
    {
        $user = $this->model->getById($id);
        if (!$user) {
            http_response_code(404);
            echo json_encode([
                "status" => false,
                "message" => "User tidak ditemukan"
            ]);
            return;
        }

        echo json_encode([
            "status" => true,
            "data" => $user
        ]);
    }

    public function store()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $role     = $_POST['role'] ?? 'pegawai';

        if (empty($username) || empty($password)) {
            http_response_code(400);
            echo json_encode([
                "status" => false,
                "message" => "Username dan Password wajib diisi"
            ]);

            return;
        }

        $cek = $this->model->getByUsername($username);
        if ($cek) {
            http_response_code(409);
            echo json_encode([
                "status" => false,
                "message" => "Username sudah digunakan"
            ]);

            return;
        }

        $this->model->create($username, $password, $role);
        echo json_encode([
            "status" => true,
            "message" => "User berhasil ditambahkan"
        ]);
    }

    public function update()
    {
        parse_str(file_get_contents("php://input"), $put);
        $id       = $put['id'] ?? '';
        $username = trim($put['username'] ?? '');
        $role     = trim($put['role'] ?? '');
        $password = trim($put['password'] ?? '');
        if (empty($id) || empty($username) || empty($role)) {
            http_response_code(400);
            echo json_encode([
                "status" => false,
                "message" => "Semua field wajib diisi."
            ]);
            return;
        }

        if (empty($password)) {
            $password = null;
        }

        $this->model->update($id, $username, $role, $password);
        echo json_encode([
            "status" => true,
            "message" => "User berhasil diperbarui"
        ]);
    }

    public function prosesEdit()
    {
        $id       = $_POST['id'];
        $username = $_POST['username'];
        $role     = $_POST['role'];
        $password = $_POST['password'];

        $data = http_build_query([
            "id" => $id,
            "username" => $username,
            "role" => $role,
            "password" => $password
        ]);

        $ch = curl_init("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=users");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
        header("Location: index.php?page=user");
        exit;
    }

    public function prosesHapus()
    {
        $id = $_GET['id'];
        $ch = curl_init("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=users&id=$id");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        header("Location: index.php?page=user");
        exit;
    }

    public function updatePassword()
    {
        parse_str(file_get_contents("php://input"), $put);
        $id = $put['id'];
        $password = $put['password'];
        $this->model->updatePassword($id, $password);
        echo json_encode([
            "status" => true,
            "message" => "Password berhasil diperbarui"
        ]);
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        echo json_encode([
            "status" => true,
            "message" => "User berhasil dihapus"
        ]);
    }


    public function prosesTambah()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role     = $_POST['role'];

        $data = http_build_query([
            "username" => $username,
            "password" => $password,
            "role"     => $role
        ]);

        $ch = curl_init("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=register");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
        curl_close($ch);
        header("Location: index.php?page=user");
        exit;
    }

}