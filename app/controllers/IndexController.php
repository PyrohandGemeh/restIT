<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 15:13
 */

require_once __DIR__ . '/../class/MySql.php';

class Index extends Controller {

    public function indexAction($data = []) {
        $this->view(get_class(), '', ['result' => $data]);

    }
}