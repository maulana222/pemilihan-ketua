<?php

class Auth {

    public $username;
    public $password;
    public $level;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function Login() {
        $username = $this->username;
        $pass = $this->password;
        $this->authentication($username, $pass);
    }
    
    private function authentication($username, $password) {

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $userId = $row['user_id'];
            $_SESSION['userId'] = $userId;
            
            if($row['password'] === $password){
                // dikarnakan ada beberapa user saya lebih baik menggunakan swicth
                    switch ($row['level']) {
                        case 'admin':
                           
                        header("Location: ../admin/index.php");
                        # code...
                            break;
                        case 'panitia':
            
                            header("Location: ../panitia/index.php");
                        # code...
                            break;
                        case 'pemilih':
                            $query = "SELECT * FROM pemilih WHERE user_id = " .  $userId ;
                            $result = $this->conn->query($query);
                            if ($result->num_rows > 0 ) {
                                header("Location: ../pemilih/index.php");
                            }else {
                                header("Location: ../pemilih/form-daftar-pemilih.php");
                            }
                                # code...
                            break;
                        case 'kandidat':
                            $query = "SELECT * FROM kandidat WHERE user_id = " .  $userId ;
                            $result = $this->conn->query($query);
                            if ($result->num_rows > 0 ) {
                                header("Location: ../kandidat/index.php");
                            }else {
                                header("Location: ../kandidat/form-daftar-kandidat.php");
                            }
                        # code...
                        break;                    
                    default:
                            echo "kamu bukan pengguna dari aplikasi ini  ";
                        break;
                }
            }
          
            
        }else{
        echo"<script>alert('user atau password salah')</script>";
        }
    }
    public function register() {
       
        $query = "INSERT INTO users (user_id, username, password, level) VALUES ('','$this->username', '$this->password', '$this->level')";
        $result =  $this->conn->query($query);
        if ($result) {
            $_SESSION['userId'] = $this->conn->insert_id;
           header("Location: login.php");
        } else {
            echo "Registrasi gagal. Silakan coba lagi.";
        }
    }

    public function logout() {
        session_unset();

        session_destroy();
        header("Location: ../auth/login.php");
    }
}