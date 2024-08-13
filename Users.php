<?php 
  class Users  {
    protected $conn;	
    public $username;	
    public $password;
    public $level;
    public $id_user;	

    public function __construct($db) {
        $this->conn = $db;

    }
    public function createUser() {
        $query = "INSERT INTO users (user_id, username, password, level) VALUES ('', '" . $this->username . "', '" . $this->password . "', '" . $this->level . "')";

        $result = $this->conn->query($query);
        return $result;
    }
    public function find() {
      $idUser = $_SESSION['userId'];
      if (isset($_SESSION['userId'])) {
        $query = "SELECT * FROM users WHERE user_id = $idUser";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();

              $this->id_user = $row['user_id'];
              $this->username = $row['username'];
              $this->password = $row['password'];
              $this->level = $row['level'];
    }
    }
    public function updateUser($id) {

            $query = "UPDATE  users  SET 
            username= '". $this->username ."',
            password= '". $this->password ."',
            level= '". $this->level ."'
            WHERE user_id = " . $id;
            $result = $this->conn->query($query);
            return $result;
    }
  }