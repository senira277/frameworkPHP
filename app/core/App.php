<?php

class App
{
    //initial vals for controller
    private $controller = 'Home';
    private $method = 'index';
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode('/', $URL);
        return $URL;
    }

    private function loadController()
    {
        $URL = $this->splitURL();

        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }
        $controller = new $this->controller;
        //call back
       
        call_user_func_array([$controller, $this->method], []);
    }
    public function run()
    {
        $this->loadController();
    }


}