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

<<<<<<< HEAD
        
=======
        $tables = array('periodi', get_class(), 'fasce_orarie');
        $ids = array('id', 'id_periodo', 'id_fascia', 'id');
>>>>>>> 56dd671e3c21d6cb95b68feaca9024123057fb74

        $result = $conn->selectAllInnerJoin3Tables($tables, $ids);
        if($result)
            $this->view(get_class(), 'index', $result);
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

    public function removeAction($id) {
        $conn = new MySql();
        $values = ['id_gestione' => $id];

        $result = $conn->selectAllWhere(get_class(), $values, '=');

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $id_periodo = ['id' => $row['id_periodo']];
        }

        $conn->deleteWhereId(get_class(), $values);
        $conn->deleteWhereId('periodi', $id_periodo);

        header("Location: ". ROOT .'/'. get_class());
    }
}