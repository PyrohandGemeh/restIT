<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:13
 */

class Home extends Controller {

    public function index() {
        echo 'home/index';
    }

    public function test($name = '') {
        $user = $this->model('User');
        $user->name = $name;
        $this->view('index', ['name' => $user->name]);
    }
}