<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:13
 */

require_once __DIR__ . '/../class/MySql.php';

class Home extends Controller {

    public function indexAction() {
        echo 'Questa sarà la pagina principale che vede il cliente';
    }

    public function testAction($name = '') {
        /*$user = $this->model('User');
        $user->name = $name;*/

        $this->view('index', '');
    }

    public function esempioPostAction() {
        $this->view('post','');
    }
}