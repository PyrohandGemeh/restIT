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

        $result = $conn->selectAll("sale");

        if($result)
            $this->view('sale', 'index', $result);
    }

    public function editAction($id){
        $conn = new MySql();

        $result = $conn->findOneById("sale", $id);

        if($result)
            $this->view('sale', 'edit', $result);
    }
}