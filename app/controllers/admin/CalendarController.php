<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 17:22
 */

class Calendar extends Controller
{
    public function indexAction() {
        $data = $_POST['date'];
        $this->view('Index', '', $data);
    }
}