<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 15/09/2018
 * Time: 15:44
 */

require_once __DIR__ . '/../../class/MySql.php';

class Sale extends Controller {

    public function indexAction() {
        $conn = new MySql();

        $result = $conn->selectAll(get_class());

        if($result)
            $this->view(get_class(), 'index', $result);
    }

    public function editAction($id){
        $conn = new MySql();

        $result = $conn->findOneById(get_class(), $id);

        if($result)
            $this->view(get_class(), 'edit', $result);
    }

    public function addAction() {
        $this->view(get_class(), 'add', '');
    }

    public function addPostAction() {
        $conn = new MySql();
        $nome = $_POST['nome'];
        $array = ['nome_sala' => $nome];

        $result = $conn->selectAllWhere(get_class(), $array, '=');

        if($result ->num_rows == 0) {
            $conn->insert(get_class(), $array);
            header("Location: ".  ROOT. '/'. get_class());
        }
    }

    public function editPostAction($id) {
        $conn = new MySql();
        $new_nome = $_POST['nome'];

        $result = $conn->findOneById(get_class(), $id);

        $row = $result->fetch_assoc();
        $nome_sala = $row['nome_sala'];

        if($new_nome != $nome_sala) {
            echo 'salve';
            $result = $conn->selectAllWhere(get_class(), ['nome_sala' => $new_nome], '=');

            if($result->num_rows == 0) {
                $conn->updateWhereId(get_class(), ['nome_sala' => $new_nome], $id);
            }
        }

        header('Location: '. ROOT. '/'. get_class());
    }

    public function removeAction($id){
        $conn = new MySql();
        $value = ['id' => $id];
        $result = $conn->deleteWhereId(get_class(), $value);

        if($result)
            header("Location: ". ROOT . '/' . get_class());

    }
}