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

    public function view($view, $action, $data =[]) {

        if($view === 'errore') {
            require_once '../app/views/default/' . $view . '.php';
        }
        else {
            if (isset($_COOKIE['login'])) {
                if($view == 'Index')
                    require_once '../app/views/admin/' . $view . '.php';
                else
                    require_once '../app/views/admin/' . $view . '/' . $action . '.php';
            }
            else {
                if($view == 'Index' || $view == 'Login')
                    require_once '../app/views/default/' . $view . '.php';
                else
                    require_once '../app/views/' . $view . '/' . $action . '.php';
            }

        }

    }
}