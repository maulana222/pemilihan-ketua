<?php
require_once 'Users.php';

class Panitia extends Users {
    public $id_panitia;	
    public $nama_panitia;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllData() {
        $query = "SELECT panitia.*, users.level FROM panitia JOIN users ON panitia.user_id = users.user_id";
        
        $result = $this->conn->query($query);
        return $result;
    }
    public function findPanitia() {
        $query = "SELECT panitia.*, users.* FROM panitia JOIN users ON panitia.user_id = users.user_id WHERE id_panitia= " . $this->id_panitia;
        $result = $this->conn->query($query);
        $row = mysqli_fetch_assoc($result);
    
         $this->id_user = $row['user_id'];	
         $this->id_panitia = $row['id_panitia'];	
         $this->nama_panitia = $row['nama_panitia'];
         $this->username = $row['username'];	
         $this->password = $row['password'];
         $this->level = $row['level'];
    }
    public function create() {
        $userCreated = $this->createUser();
        if ($userCreated) {
            $user_id = $this->conn->insert_id;

            $query = "INSERT INTO panitia (id_panitia, nama_panitia, user_id) VALUES ('','". $this->nama_panitia ."', '". $user_id  ."')";
    
            $result = $this->conn->query($query);
            if ($result) {
                return header("Location: ../../admin/panitia/index.php");
            }else {
                echo"<script>alert('data tidak dapat di tambahkan')</script>";
            }
        }
    }
    public function destroy() {
        $query = "DELETE panitia.*, users.* FROM panitia JOIN users ON panitia.user_id = users.user_id WHERE id_panitia = "  . $this->id_panitia;
        
        $result = $this->conn->query($query);
        if ($result) {
            header("Location: ../../admin/panitia/index.php");
        }else {
            echo"<script>alert('data tidak dapat di tambahkan')</script>";
        }
    }
    public function update() {
        $this->find();
        $userCreated = $this->updateUser($this->id_user);
        if ($userCreated) {
            $user_id = $this->conn->insert_id;

            $query = "UPDATE panitia SET 
            nama_panitia= '". $this->nama_panitia ."' WHERE id_panitia = " . $this->id_panitia;
            
            $result = $this->conn->query($query);
            if ($result) {
                if ($this->level === "panitia") {
                    return header("Location: ../panitia/index.php");
                }else {
                    return header("Location: ../../admin/panitia/index.php");
                }
            }else {
                echo"<script>alert('data tidak dapat di tambahkan')</script>";
            }
        }
    }
}