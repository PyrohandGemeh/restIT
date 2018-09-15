<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:59
 */


class Controller {

    public function model($model) {
        require_once '../app/models/'. $model .'.php';
        return new $model();
    }

    public function view($view, $data =[]) {
        if($view === 'errore') {
                require_once '../app/views/' . $view . '.php';

        }
        else {
            if (isset($_COOKIE['login'])) {
                require_once '../app/views/admin/' . $view . '.php';
            } else
                require_once '../app/views/' . $view . '.php';
        }

    }
}