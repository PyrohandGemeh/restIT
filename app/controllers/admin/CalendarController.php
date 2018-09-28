<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 17:22
 */

class Index extends Controller
{
    public function indexAction() {
        $this->view(get_class(), '', '');
    }

    public function calendarPostAction() {
        $data = $_POST['date'];
        $this->view(get_class(), '', ['result' => $data]);
    }
}