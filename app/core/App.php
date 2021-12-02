<?php

class App
{

    // properti
    public $controller = "Home";
    public $method = "index";
    public $params = [];

    public static $page = 'Home';

    public function __construct()
    {
        $url = $this->parseURL();

        // cek controller

        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                // set nilai controller berdasarkan nilai url
                $this->controller = $url[0];
                self::$page = $this->controller;
                // menghapus nilai controller pada url
                unset($url[0]);
            }
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        } else {
            require_once '../app/controllers/Home.php';
            $this->controller = new $this->controller;
        }

        // cek method

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        // cek parameter

        if (!empty($url)) {
            $this->params = array_values($url);
            unset($url);
        }

        // memanggil controller/method/params

        call_user_func_array([$this->controller, $this->method], $this->params);

        // var_dump($url);
    }

    // mengambil data pada URL
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // mengambil url setelah index.php
            $url = rtrim($_GET['url'], '/');
            // menghapus simbol \
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // membuat array pada url setelah index.php
            $url = explode('/', $url);
            return $url;
        }
    }
}
