<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 15/09/2018
 * Time: 15:44
 */

require_once __DIR__ . '/../../class/MySql.php';

class PeriodiFasce extends Controller {

    public function indexAction() {
        $conn = new MySql();

        $tables = array('periodi', get_class(), 'fasceorarie');
        $ids = array('id', 'id_periodo', 'id_fascia', 'id');

        $result = $conn->selectAllInnerJoin3Tables($tables, $ids);
        if($result) {
            $this->view(get_class(), 'index', $result);
        }

    }

    public function addAction(){
        $conn = new MySql();
        $result = $conn->selectAll('fasceorarie');

        $this->view(get_class(), 'add', $result);
    }

    public function addPostAction() {
        $conn = new MySql();
        $nome = $_POST['nome_periodo'];
        $periodo = ['nome_periodo' => $nome];

        $result = $conn->selectAllWhere('periodi', $periodo, '=');

        if($result->num_rows == 0) {
            $conn->insert('periodi', $periodo);
            $id_periodo = $conn->getConnection()->insert_id;

            for($id = 1; $id <= 6; $id++) {
                if($_POST[$id] != null || $_POST[$id] != '') {
                    $periodi_fasce = ['id_periodo' => $id_periodo, 'id_fascia' => $id, 'orario' => $_POST[$id]];
                    $conn->insert(get_class(), $periodi_fasce);
                }
            }
        }

        header("Location:". ROOT .'/'. get_class());
    }

    public function editAction($id){
        $conn = new MySql();
        $values = ['id_periodo' => $id];
        $tables = array('periodi', get_class(), 'fasceorarie');
        $ids = array('id', 'id_periodo', 'id_fascia', 'id');

        $result = $conn->selectAllInnerJoin3TablesWhere($tables, $ids, $values, '=');

        $this->view(get_class(), 'edit', $result);
    }
/*
    public function removeAction($id_gestione, $id_periodo) {
        $conn = new MySql();

        $gestione = ['id_gestione' => $id_gestione];
        $periodo = ['id' => $id_periodo];

        $conn->deleteWhereId(get_class(), $gestione);

        $conn->deleteWhereId('periodi', $periodo);

        header("Location: ". ROOT .'/'. get_class());
    }*/
}