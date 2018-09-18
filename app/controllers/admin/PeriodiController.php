<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 15/09/2018
 * Time: 15:44
 */

require_once __DIR__ . '/../../class/MySql.php';

class Periodi extends Controller {

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

        $nome = $_POST['nome'];
        $array = array('nome_periodo' => $nome);

        $result = $conn->selectAllWhere(get_class(), $array, "=");

        if($result->num_rows == 0){
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

    public function editPostAction($id){
        $conn = new MySql();

        $nome = $_POST['nome'];
        $array = array('nome_periodo' => $nome);

        $conn->updateWhereId(get_class(), $array, $id);

        header("Location: ". ROOT . '/' . get_class());
    }

    public function removeAction($id){
        $conn = new MySql();

        $conn->deleteWhereId(get_class(), $id);

        header("Location: ". ROOT . '/' . get_class());

    }
}