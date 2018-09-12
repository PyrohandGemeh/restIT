<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 12/09/2018
 * Time: 14:33
 */

require_once __DIR__ . '/../class/MySql.php';

class Utenti extends Controller {

    public function loginPostAction() {
        $conn = new MySql();

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $array = array('username' => $username, 'password' => $password);

        $result = $conn->selectAllWhere("utenti", $array, "=");

        if($result->num_rows == 1) {
            //setcookie('admin', $username, time()+2592000);
            $this->view('post', ['result' => '']);
        }
        else
            $this->view('index', ['result' => 'errore']);
    }

    public function logoutPostAction() {
        //setcookie('admin', null, time()-1);
        header("Location: ../index");
    }
}