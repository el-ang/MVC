<?php
    class Controller{
        protected $user;

        protected function modal($query){
            return Conn()->query($query);
        }

        protected function view(...$dat){
            if(is_array($dat["req"])){

            }
        }

        public function __construct(){
            session_start();
            $this->user = $_COOKIE["user"] ?? ($_SESSION["user"] ?? NULL);
        }

        public function main(){
            echo "Hello World!";
        }

        public function lost(){
            echo "Lost!";
        }
    }
    
    class C_Foo extends Controller{
        public function main(){
            echo "Foo!";
        }
    }

    class C_Bar extends Controller{
        public function main(){
            echo "Bar!";
        }
    }
?>