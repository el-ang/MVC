<?php
    class Conn{
        private $db;

        public function __construct(){
            $this->db = new mysqli("localhost", "root", "", "test");
        }

        public function __destruct(){
            $this->db->close();
        }

        public function query(string $query){
            return $this->db->query($query);
        }
    }
?>