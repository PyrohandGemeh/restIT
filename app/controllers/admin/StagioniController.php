<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 15/09/2018
 * Time: 15:44
 */

require_once __DIR__ . '/../../class/MySql.php';

class Stagioni extends Controller {

    public function indexAction() {
        $conn = new MySql();

        $values = ['inizio' => 'fine'];
        $result = $conn->selectAllWhereField(get_class(), $values, '<>');

        if($result)
            $this->view(get_class(), 'index', $result);
    }

    public function editAction($id){
        $conn = new MySql();

        $result = $conn->findOneById(get_class(), $id);

        if($result)
            $this->view(get_class(), 'edit', $result);
    }
}