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
        $url = $this->parseUrl();

        if(file_exists('app/controllers/'. $url[0] .'Controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'app/controllers/'. $this->controller .'Controller.php';
        $this->controller = new $this->controller;
        if(isset($url[1])) {
            $methodName = $url[1];
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                $methodName .= 'Post';
            //echo $methodName;
            if(method_exists($this->controller, $methodName. 'Action')) {
                $this->method = $methodName. 'Action';
                //echo $this->method;
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseUrl() {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

    }
}