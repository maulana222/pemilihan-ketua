<?php
require_once 'Users.php';

class Kandidat extends Users { 
    public $id_kandidat;
    public $nis;
    public $nama_calon;
    public $kelas;
    public $foto = [];
    public $visi;
    public $misi;
    public $id_kk;
    public $nama_kk;
    public $user_id;
    public $foto_name;

    private $table = "Kandidat";

    
    public function getAllData() {
        $query = "SELECT kandidat.*,  konsentrasi_keahlian.* FROM kandidat JOIN konsentrasi_keahlian ON kandidat.id_kk = konsentrasi_keahlian.id_kk";

        $result = $this->conn->query($query);
        return $result;
    }
        public function findKandidat() {
            $query = "SELECT kandidat.*,  konsentrasi_keahlian.* FROM kandidat JOIN konsentrasi_keahlian ON kandidat.id_kk = konsentrasi_keahlian.id_kk JOIN users ON kandidat.user_id = users.user_id WHERE id_kandidat = " . $this->id_kandidat;
            $result = $this->conn->query($query);
            $row = mysqli_fetch_assoc($result);

            $this->id_kandidat  = $row['id_kandidat'];    
            $this->nama_calon    = $row['nama_calon'];
            $this->nis =  $row['nis'];
            $this->kelas   = $row['kelas'];
            $this->foto     = $row['foto'];
            $this->visi = $row['visi'];
            $this->misi = $row['misi'];
            $this->id_kk = $row['id_kk'];
            $this->user_id = $row['user_id'];
            $this->nama_kk  = $row['nama_kk'];
        }

    public function createKK () {
        $query = "INSERT INTO konsentrasi_keahlian (id_kk, nama_kk) VALUES (
            '',
            '". $this->nama_kk ."'
        )";
        $result = $this->conn->query($query);
        return $result;
    }
    public function createKandidat() {
        
        $userCreated = $this->createUser();
        $user_id = $this->conn->insert_id;
        if ($userCreated) {
            $nama_poto =  $this->foto['name'];
            $tmp = $this->foto['tmp_name'];
    
            $alokasi = "../../assets/poto_kandidat/" . basename($nama_poto);
    
            move_uploaded_file($tmp, $alokasi);
            $konsentrasi_keahlian = $this->createKK();
            $id_kk = $this->conn->insert_id;
    
            $query = "INSERT INTO ". $this->table ." (id_kandidat, nis, nama_calon,	kelas, foto, visi, misi, id_kk, user_id) VALUES (
                '',
                 '". $this->nis . "',
                 '". $this->nama_calon . "',
                 '". $this->kelas . "',
                 '". $nama_poto . "',
                 '". $this->visi . "',
                 '". $this->misi . "',
                 '". $id_kk . "',
                 '". $user_id ."'
            )";
            $result = $this->conn->query($query);
            if ($result) {
                if ($this->level === 'admin') {
                    header("Location: ../../admin/kandidat/index.php");
                }else {
                    header("Location: ../../panitia/kandidat/index.php");
                }
            }else {
                echo"<script>alert('data tidak dapat di tambahkan')</script>";
            }
        }
        
    }
    public function destroyKandidat() {
        $query = "DELETE kandidat.* , konsentrasi_keahlian.* FROM  kandidat JOIN konsentrasi_keahlian ON kandidat.id_kk = konsentrasi_keahlian.id_kk WHERE id_kandidat =  " . $this->id_kandidat;
        $result =  $this->conn->query($query);


        if ($result) {
            if ($this->level == 'admin') {
                header("Location: ../../admin/kandidat/index.php");
            }else {
                header("Location: ../../panitia/kandidat/index.php");   
            }
        }else {
            echo"<script>alert('data tidak dapat di tambahkan')</script>";
        }
    }
    public function updateKandidat() {
        $this->find();
       
       $resultUpdateUser = $this->updateUser($this->user_id);


        if ($resultUpdateUser) { 
            if (!empty($this->foto['name'])){
                $nama_poto =  $this->foto['name'];
                $tmp = $this->foto['tmp_name'];
                $alokasi = "../../assets/poto_kandidat/" . basename($nama_poto);
                move_uploaded_file($tmp, $alokasi);
    
    
            } else {
                
                $query_select_foto = "SELECT foto FROM " . $this->table . " WHERE id_kandidat = " . $this->id_kandidat;
                $result_select_foto = $this->conn->query($query_select_foto);
                $row = mysqli_fetch_assoc($result_select_foto);
                $nama_poto = $row['foto'];
            }
        
            
            $query = "UPDATE " . $this->table . " SET nis = '". $this->nis ."',
                        nama_calon = '". $this->nama_calon ."',
                        kelas = '". $this->kelas ."',
                        foto = '". $nama_poto ."',
                        visi = '". $this->visi ."',
                        misi = '". $this->misi ."'
                        WHERE id_kandidat = ". $this->id_kandidat;
            
            $result = $this->conn->query($query);
           
            $query_konsentrasi = "UPDATE konsentrasi_keahlian SET nama_kk= '" . $this->nama_kk . "' WHERE id_kk = " . $this->id_kk;
            $result_konsentrasi = $this->conn->query($query_konsentrasi);
            if ($result) {
                if ($this->level === 'panitia') {
                    header("Location: ../../panitia/kandidat/index.php");
                }else {
                    header("Location: ../../admin/kandidat/index.php");
                }
            } else {
                echo "<script>alert('Data tidak dapat diperbarui')</script>";
            }
        }

    }
    public function checkData($id) {
        $query = "SELECT * FROM kandidat WHERE user_id = " .  $id ;
        $result = $this->conn->query($query);
        if (!($result->num_rows > 0 )) {
           header("Location: ../kandidat/form-daftar-kandidat.php?check=$id");
        }
    }
    public function daftar_kandidat() {
        $nama_poto =  $this->foto['name'];
        $tmp = $this->foto['tmp_name'];

        $alokasi = "../../assets/poto_kandidat/" . basename($nama_poto);

        move_uploaded_file($tmp, $alokasi);
        $this->createKK();
        $id_kk = $this->conn->insert_id;

        $query = "INSERT INTO ". $this->table ." (id_kandidat, nis, nama_calon,	kelas, foto, visi, misi, id_kk, user_id) VALUES (
            '',
             '". $this->nis . "',
             '". $this->nama_calon . "',
             '". $this->kelas . "',
             '". $nama_poto . "',
             '". $this->visi . "',
             '". $this->misi . "',
             '". $id_kk . "',
             '". $this->id_user ."'
        )";
        $result = $this->conn->query($query);
        if ($result) {
                header("Location: ../kandidat/index.php");
        } else {
            echo "<script>alert('Data tidak dapat diperbarui')</script>";
        }
    }
    public function getKandidat() {
        $this->find();
        $query = "SELECT * FROM kandidat WHERE user_id =" . $this->id_user;

        $result= $this->conn->query($query);

        $row = $result->fetch_assoc();

        $this->id_kandidat = $row['id_kandidat'];
        $this->nis = $row['nis'];
        $this->nama_calon = $row['nama_calon'];
        $this->kelas = $row['kelas'];
        $this->foto_name = $row['foto'];
        $this->visi = $row['visi'];
        $this->misi = $row['misi'];
        $this->id_kk = $row['id_kk'];
        $this->user_id = $row['user_id'];
    }
}