<?php
    class App{
        protected $con = ["Controller", "main"];
        protected $arg = [];

        public function __construct(string $url){
            $this->classify($this->route($url));
            call_user_func_array($this->con, $this->arg);
        }

        public function route(string $url){
            return array_map("strtolower", explode("/", filter_var(rtrim($url, "/"), FILTER_SANITIZE_URL)));
        }

        protected function classify(array $route){
            $recon = "C" . ((isset($route[0]) && $route[0])? "_" . ucfirst($route[0]) : "ontroller");
            if(class_exists($recon) && array_values(class_parents($recon)) == [$this->con[0]]){
                $this->con[0] = $recon;
                array_shift($route);
            }
            $this->con[1] = (!method_exists($this->con[0], $route[0] = (isset($route[0]) && $route[0]? : $this->con[1]))? (!method_exists($this->con[0] = "Controller", $route[0])? "lost": array_shift($route)): array_shift($route));
            $this->con[0] = new $this->con[0];
            $this->arg = $route;
        }
    }
?>