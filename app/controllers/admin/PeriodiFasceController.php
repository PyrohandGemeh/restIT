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


        if($result)
            $this->view(get_class(), 'index', $result);
    }

    public function addAction(){
        $this->view(get_class(), 'add', '');
    }

    public function editAction(){
        $conn = new MySql();



    }
}