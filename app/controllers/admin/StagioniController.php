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
        $result = $conn->selectAllWhereField('stagioni', $values, '<>');

        if($result)
            $this->view('stagioni', $result);
    }
}