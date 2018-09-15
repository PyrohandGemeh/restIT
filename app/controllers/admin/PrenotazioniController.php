<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 15/09/2018
 * Time: 15:44
 */

require_once __DIR__ . '/../../class/MySql.php';

class Prenotazioni extends Controller {

    public function indexAction() {
        $conn = new MySql();

        $result = $conn->selectAll("prenotazioni");

        if($result)
            $this->view('prenotazioni', $result);
    }
}