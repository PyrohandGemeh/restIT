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

        $result = $conn->selectAll(get_class());

        if($result)
            $this->view(get_class(), 'index', $result);
    }
}