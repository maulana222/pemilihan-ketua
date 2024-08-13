<?php

class Database
{
    private $hostname = "localhost"; // bisa menggunakan 127.0.0.1
    private $username = "root";
    private $password = "";
    private $db_name = "db_replikas";
    private $conn;
    // method buat membuka koneksi
    public function openConnection() {
         
        $mysqli = new mysqli($this->hostname, $this->username, $this->password,$this->db_name);
        if ($mysqli->connect_error) {
            die("connection error : " . $mysqli->connect_error);
        }
        return $this->conn = $mysqli;
    }
}
