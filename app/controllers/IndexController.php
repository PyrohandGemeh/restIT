<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:13
 */

require_once __DIR__ . '/../class/MySql.php';

class Index extends Controller {

    public function indexAction() {
        $result = 'Questa sarà la pagina principale che vede il cliente';
        $this->view('index', ['result' => $result]);

    }

    public function testAction($name = '') {
        /*$user = $this->model('User');
        $user->name = $name;*/

        $this->view('index', ['result' => '']);
    }

    public function esempioPostAction() {
        $this->view('post','');
    }
}