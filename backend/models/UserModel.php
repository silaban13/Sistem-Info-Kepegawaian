<?php

require_once __DIR__ . "/../config/koneksi.php";

class UserModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function getAll($limit, $offset)
    {
        $sql = "SELECT id, username, role, created_at, updated_at FROM users ORDER BY id DESC LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getTotalUsers()
    {
        $sql = "SELECT COUNT(*) AS total FROM users";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc()['total'];
    }

    public function getAvailableUsers()
    {
        $sql = "SELECT id, username FROM users WHERE role = 'pegawai' AND id NOT IN ( SELECT id_user FROM pegawai WHERE id_user IS NOT NULL ) ORDER BY username ASC";
        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT id, username, role, created_at, updated_at FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($username, $password, $role)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashPassword, $role);

        return $stmt->execute();
    }

    public function update($id, $username, $role, $password = null)
    {
        if (!empty($password)) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET username = ?, role = ?, password = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssi", $username, $role, $hashPassword, $id);
        } else {
            $sql = "UPDATE users SET username = ?, role = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssi", $username, $role, $id);
        }

        return $stmt->execute();
    }

    public function updatePassword($id, $password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "si",
            $hashPassword,
            $id
        );

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getTotalAdmin()
    {
        $sql = "SELECT COUNT(*) AS total FROM users WHERE role='admin'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function getTotalStaff()
    {
        $sql = "SELECT COUNT(*) AS total FROM users WHERE role='pegawai'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

}