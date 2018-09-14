<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 12/09/2018
 * Time: 14:33
 */

require_once __DIR__ . '/../../class/MySql.php';

class Utenti extends Controller {

    public function indexAction() {
        $conn = new MySql();

        $result = $conn->selectAll("utenti");

        if ($result)
            $this->view('utenti', $result);
    }
}