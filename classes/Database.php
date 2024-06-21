<?php
    class Database {
        private $host = "127.0.0.1";
        private $dbname = "bdcrud";
        private $username = "root";

        private $password = "";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
            }catch(PDOException $exception){
                echo "erro de conexão: " . $exception->getMessage();
            }
            return $this->conn;
        }
        
    }