<?php

namespace App\db;
use \PDO;

class ConnectionFactory {

    private $host = "localhost";
    private $db = "login";
    private $user = "root";
    private $password = "D3v3l0pm3nt";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", 
                            $this->user, 
                            $this->password);
        } catch( PDOException $e ) {
            throw new Exception($e->getMessage() , $e->getCode());
        }
    }

}