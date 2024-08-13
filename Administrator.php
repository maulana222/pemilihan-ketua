<?php

class Administrator {
    public $id_admin;
    public $nama_admin;	
    
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function find() {
        
    }
}