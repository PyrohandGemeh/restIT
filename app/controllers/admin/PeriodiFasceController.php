<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 15/09/2018
 * Time: 15:44
 */

require_once __DIR__ . '/../../class/MySql.php';
require_once __DIR__ . '/PeriodiController.php';

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
        $this->view(get_class(), 'add', '');
    }

    public function editAction($id){
        $conn = new MySql();
        $values = ['id_gestione' => $id];
        $tables = array('periodi', get_class(), 'fasce_orarie');
        $ids = array('id', 'id_periodo', 'id_fascia', 'id');

        $result = $conn->selectAllInnerJoin3TablesWhere($tables, $ids, $values, '=');

        if($result->num_rows == 1) {
            $this->view(get_class(), 'edit', $result);
        }
    }

    public function removeAction($id_gestione, $id_periodo) {
        $conn = new MySql();

        $gestione = ['id_gestione' => $id_gestione];
        $periodo = ['id' => $id_periodo];

        $conn->deleteWhereId(get_class(), $gestione);

        $conn->deleteWhereId('periodi', $periodo);

        header("Location: ". ROOT .'/'. get_class());
    }
}