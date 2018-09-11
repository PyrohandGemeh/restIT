<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:57
 */

class App {

    protected $controller = 'home';
    protected $method = 'indexAction';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            echo 'POST<br>';

        if(file_exists('../app/controllers/'. $url[0] .'.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/'. $this->controller .'.php';

        $this->controller = new $this->controller;

        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1]. 'Action')) {
                $this->method = $url[1]. 'Action';
                //echo $this->method;
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseUrl() {
        if(isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}