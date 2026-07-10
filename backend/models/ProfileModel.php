<?php

require_once __DIR__."/../config/koneksi.php";


class ProfileModel
{

    private $conn;


    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }


    public function getProfile($id_user)
    {

        $sql="
        SELECT 
            pegawai.id,
            pegawai.nama

        FROM pegawai

        WHERE pegawai.id_user = ?
        ";


        $stmt=$this->conn->prepare($sql);

        $stmt->bind_param(
            "i",
            $id_user
        );


        $stmt->execute();


        return $stmt
        ->get_result()
        ->fetch_assoc();

    }

}