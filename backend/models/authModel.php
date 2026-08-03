<?php

require_once __DIR__ . "/../config/koneksi.php";

class AuthModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function loginUser($username)
    {
        $sql = "SELECT users.*, pegawai.id AS id_pegawai, pegawai.nama, pegawai.foto FROM users LEFT JOIN pegawai ON pegawai.id_user = users.id WHERE users.username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function cekUsername($username)
    {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }

    public function registerUser($username, $password, $role)
    {
        $sql = "INSERT INTO users(username,password,role) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $role);

        return $stmt->execute();
    }

    public function saveRememberToken($id, $token)
    {
        $sql = "UPDATE users SET remember_token = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $token, $id);

        return $stmt->execute();
    }

    public function getUserByRememberToken($token)
    {
        $sql = "SELECT users.*, pegawai.id AS id_pegawai, pegawai.nama, pegawai.foto FROM users LEFT JOIN pegawai ON pegawai.id_user = users.id WHERE remember_token = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc();
    }

    public function clearRememberToken($id)
    {
        $sql = "UPDATE users SET remember_token = NULL WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }


}