<?php
require_once 'Users.php';

class Pemilih extends Users { 
    public $id_pemilih;
    public $nis;
    public $nama_siswa;
    public $kelas;
    public $keterangan;
    public $user_id;

    private $table = "pemilih";

    public function getAllData() {
        $query = "SELECT users.* , pemilih.* FROM users JOIN pemilih ON users.user_id = pemilih.user_id";
    
        $result = $this->conn->query($query);
        return $result;
    }
    
        public function editpemilih() {
            $query = "SELECT pemilih.*,  users.* FROM pemilih JOIN users ON pemilih.user_id = users.user_id WHERE id_pemilih = " . $this->id_pemilih;
            $result = $this->conn->query($query);
            $row = mysqli_fetch_assoc($result);

            $this->id_pemilih  = $row['id_pemilih'];    
            $this->nama_siswa    = $row['nama_siswa'];
            $this->nis =  $row['nis'];    
            $this->kelas   = $row['kelas'];
            $this->keterangan  = $row['keterangan'];
            $this->user_id = $row['user_id'];
        }

    public function createpemilih() {
    
        $userCreated = $this->createUser();
        $user_id = $this->conn->insert_id;
        if ($userCreated) {

            $query = "INSERT INTO " . $this->table . " (nis, nama_siswa, kelas, keterangan, user_id) VALUES (
                '" . $this->nis . "',
                '" . $this->nama_siswa . "',
                '" . $this->kelas . "',
                '" . $this->keterangan . "',
                '" . $user_id . "'
            )";
            $result = $this->conn->query($query);
            if ($result) {
                if ($this->level === "admin") {
                    header("Location: ../../admin/pemilih/index.php");
                }elseif ($this->level === "pemilih") {
                    header("Location: ../pemilih/index.php");
                }
            }else {
                echo"<script>alert('data tidak dapat di tambahkan')</script>";
            }
        }
    }

    public function destroyPemilih() {
        $query = "DELETE pemilih.* , users.* FROM  pemilih JOIN users ON pemilih.user_id = users.user_id WHERE id_pemilih =  " . $this->id_pemilih;
        $result =  $this->conn->query($query);

        if ($result) {
            header("Location: ../../admin/pemilih/index.php");
        }else {
            echo"<script>alert('data tidak dapat di tambahkan')</script>";
        }
    }

    public function updatePemilih() {
        $resultUpdateUser = $this->updateUser( $this->user_id);
        $query = "UPDATE " . $this->table . " SET 
            nis = '" . $this->nis . "',
            nama_siswa = '" . $this->nama_siswa . "',
            kelas = '" . $this->kelas . "',
            keterangan = '" . $this->keterangan . "'
            WHERE id_pemilih = " . $this->id_pemilih;
    
        $result = $this->conn->query($query);
    
        if ($result) {
            if ($this->level === "admin") {
                header("Location: ../../admin/pemilih/index.php");
            }elseif ($this->level === "pemilih") {
                header("Location: ../pemilih/index.php");
            }
        } else {
            echo "<script>alert('Data tidak dapat diperbarui')</script>";
        }
    }
    
    public function pilihKandidat($id_kandidat) {
            $this->find();
            // hanya panitia yang tidak dapat memilih
            if ($this->level === "panitia") {
               echo "anda seorang " . $this->level . ", tidak dapat memilih";
            }else {
                // penengecekan pemilih di tabel pilihan_pemilih 
                $query1 = "SELECT * FROM pilihan_pemilih WHERE user_id = ". $this->id_user;
                $result1 = $this->conn->query($query1);
                $row2 = $result1->fetch_assoc();
                // jika tidak ada/ belum memilih maka akan buat pemilihan
                if ($result1->num_rows < 1) {
                    $query2 = "INSERT INTO pilihan_pemilih VALUES ('','$this->id_user', '$id_kandidat')";
                    $result2 = $this->conn->query($query2);
                    if ($result2) {
                        $update_query = "UPDATE kandidat SET jumlah_suara = jumlah_suara + 1 WHERE id_kandidat = '$id_kandidat'";
                        $update_result = $this->conn->query($update_query);
                    }
                    // jika pemilih merubah pihannya maka update datanya 
                }elseif ($row2['id_kandidat'] !== $id_kandidat) { //intinya kalo pemilih ganti kandidat 
    
                    $kandidat_sebelum = $row2['id_kandidat'];
                    // kurangi dulu jumlah suaranya
                    $query3 = "UPDATE kandidat SET jumlah_suara = jumlah_suara - 1 WHERE id_kandidat = '$kandidat_sebelum'";
                    $result3 = $this->conn->query($query3);
                    
                    if ($result3) {
                        // tambahin suara ke kandidat yang dipilh
                        $pilihanbaru = "UPDATE kandidat SET jumlah_suara = jumlah_suara + 1 WHERE id_kandidat = '$id_kandidat'";
                        $result4 = $this->conn->query($pilihanbaru);
                        
                        if ($result4) {
                            // ubah id kandidatnya
                            $updatPilihan= "UPDATE pilihan_pemilih SET id_kandidat = '$id_kandidat' WHERE user_id = '$this->id_user'";
                            $result5 = $this->conn->query($updatPilihan);
                            
                            if ($result5) {
                                // lempar ke pilih.php
                                header("Location: index.php");
                            } else {
                                echo "Gagal memperbarui pilihan pemilih.";
                            }
                        } else {
                            echo "Gagal menambahkan suara ke kandidat baru.";
                        }
                    } else {
                        echo "Gagal mengurangi suara dari kandidat sebelumnya.";
                    }
                }else {
                    echo "<script>alert('anda sudah memilih kandidat ini')</script>";
                }
            }
        }   
    public function findPemilih() {
        $this->find();
        $query = "SELECT * FROM pemilih  WHERE user_id = " . $this->id_user;
    
        $result = $this->conn->query($query);
        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            }
        }else {
           return false;
        }
    }
}