<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:57
 */

class App {
    protected $controller = 'index';
    protected $method = 'indexAction';
    protected $params = [];
    public function __construct()
    {
        session_start();

        $url = $this->parseUrl();

        $path = '../app/controllers/';

        if(isset($_SESSION['login']) && $url[0] !== 'login') {
            $path .= 'admin/';/*
            if(isset($url[1])) {
                $url[0] = $url[1];
            }*/
        }

        //echo $path . $url[0] .'Controller.php';

        //controlli sul controller
        if(file_exists($path . $url[0] .'Controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        else {
            $path = '../app/controllers/';
            $this->controller = 'errore';
        }

        //echo $path . $this->controller .'Controller.php';
        require_once $path . $this->controller .'Controller.php';
        $this->controller = new $this->controller;

        //controlli sul metodo
        if(isset($url[1])) {
            $methodName = $url[1];

            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                $methodName .= 'Post';

            if(method_exists($this->controller, $methodName. 'Action')) {
                $this->method = $methodName. 'Action';
                //echo $this->method;
                unset($url[1]);
            }
            else{
                $this->controller = 'errore';
                $path = '../app/controllers/';
                require_once $path . $this->controller .'Controller.php';
                $this->controller = new $this->controller;
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if(isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        else
            return $url = array('index');
    }
}