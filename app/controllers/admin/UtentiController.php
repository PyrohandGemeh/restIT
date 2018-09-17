<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 12/09/2018
 * Time: 14:33
 */

require_once __DIR__ . '/../../class/MySql.php';

class Utenti extends Controller {

    public function indexAction() {
        $conn = new MySql();

        $result = $conn->selectAll("utenti");

        if($result)
            $this->view('utenti', 'index', $result);
    }

    public function addAction(){
        $this->view('utenti', 'add', '');
    }

    public function addPostAction(){
        $conn = new MySql();

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $array = array('username' => $username);

        $result = $conn->selectAllWhere("utenti", $array, "=");

        if($result->num_rows == 0){
            $array = array('username' => $username, 'password' =>  $password);
            $conn->insert("utenti", $array);
            header("Location: ". ROOT . '/utenti');
        }
    }

    public function editAction($id){
        $conn = new MySql();

        $result = $conn->findOneById("utenti", $id);

        if($result)
            $this->view('utenti', 'edit', $result);
    }

    public function removeAction($id){
        $conn = new MySql();

        $result = $conn->deleteWhereId("utenti", $id);

        if($result)
            header("Location: ". ROOT . '/utenti');

    }
}