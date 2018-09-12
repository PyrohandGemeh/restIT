<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:59
 */


class Controller {

    public function model($model) {
        require_once 'app/models/'. $model .'.php';
        return new $model();
    }

    public function view($view, $data =[]) {
        require_once 'app/views/'. $view .'.php';
    }
}