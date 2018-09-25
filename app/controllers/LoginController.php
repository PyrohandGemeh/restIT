<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 15:27
 */

require_once __DIR__ . '/../class/MySql.php';

class Login extends Controller {

    public function indexAction() {
        $this->view(get_class(), '', '');

    }

    public function loginPostAction() {
        $conn = new MySql();

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $array = array('username' => $username, 'password' => $password);

        $result = $conn->selectAllWhere("utenti", $array, "=");

        if($result->num_rows == 1) {
            setcookie('login', $username, time()+2592000, '/');
            //echo $_COOKIE['admin'];
            //$_SESSION['login'] = $username;

        }
        header("Location: ../");
    }

    public function logoutPostAction() {
        setcookie('login', null, time()-1, '/');
        //unset($_SESSION['login']);
        header("Location: ../");
    }
}