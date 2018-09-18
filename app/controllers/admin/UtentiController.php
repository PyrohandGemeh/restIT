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

        $result = $conn->selectAll(get_class());

        if($result)
            $this->view(get_class(), 'index', $result);
    }

    public function addAction(){
        $this->view(get_class(), 'add', '');
    }

    public function addPostAction(){
        $conn = new MySql();

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $array = array('username' => $username);

        $result = $conn->selectAllWhere(get_class(), $array, "=");

        if($result->num_rows == 0){
            $array = array('username' => $username, 'password' =>  $password);
            $conn->insert(get_class(), $array);
            header("Location: ". ROOT . '/' . get_class());
        }
    }

    public function editAction($id){
        $conn = new MySql();

        $result = $conn->findOneById(get_class(), $id);

        if($result)
            $this->view(get_class(), 'edit', $result);
    }

    public function removeAction($id){
        $conn = new MySql();

        $result = $conn->deleteWhereId(get_class(), $id);

        if($result)
            header("Location: ". ROOT . '/' . get_class());

    }
}