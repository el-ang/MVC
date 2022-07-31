<?php
    class Console{
        private $script;

        public function __construct(string $act = ""){
            $this->script = "<script>";
            $this->method("group", BASE_URL);
            if($act) call_user_func([$this, $act]);
        }

        public function __destruct(){
            echo $this->script .= "</script>";
        }

        private function method(string $method, ...$arg){
            $this->script .= "console.$method(" . (!isset($arg)? : ("'" . implode(", ", $arg) . "'")) . ");";
        }

        public function log(...$arg){
            $this->method("log", $arg);
        }

        public function warn(...$arg){
            $this->method("warn", $arg);
        }

        public function err(...$arg){
            $this->method("error", $arg);
        }

        public function info(...$arg){
            $this->method("info", $arg);
        }

        public function bug(...$arg){
            $this->method("groupEnd");
            $this->method("debug", $arg);
        }
    }
?>