<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 06/09/2018
 * Time: 17:41
 */

    include "../class/MySql.php";

    //if(isset($_POST["login"])) {
        $conn = new MySql();
        $username = /*$_POST["username"];*/ "admin";
        $password = /*$_POST["password"];*/ md5("admin");

        $findUser = $conn->selectAllWhere("utenti", array("username", "password"), array($username, $password), "=");
        if($findUser->num_rows == 1) {
            echo "ok";
            //setcookie('admin', $username, time()+2592000);
        }
        else {
            echo "errore";
        }
    //}

    /*if(isset($_POST["logout"])) {
        setcookie('admin', null, time()-1);
    }*/
?>