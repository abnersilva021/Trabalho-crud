<?php
    class Database {
        private $host = "localhost";
        private $dbName = "bdCrud";
        private $username = "root";

        private $password = "";

        public $conn;

        public function getConnection(){
            $this -> conn = null;
            try {
                $this -> conn = new PDO("mysql:host = " . $this -> host . "; dbname ="
                . $this -> username, $this -> password);
            }catch(PDOException $exception){
                echo "erro de conexão: " . $exception -> getMessage();
            }
            return $this -> conn;
        }
        
    }