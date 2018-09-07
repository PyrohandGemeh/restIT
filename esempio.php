<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 06/09/2018
 * Time: 17:41
 */

    include "Class/MySql.php";

    $conn = new MySql();

    /*--------PROVE SELECT---------*/
    /*
    $row = $conn->selectAll("utenti")->fetch_assoc();
    echo "SELECT ALL: ". $row["username"] ."<br>";

    $fields = array("username", "password");
    $row = $conn->select("utenti", $fields)->fetch_assoc();
    echo "SELECT: ". $row["username"] ."<br>";

    $values = [
        'username' => 'admin',
        'password' => md5("admin")
    ];

    $row = $conn->selectAllWhere("utenti", $values, "=")->fetch_assoc();
    echo "SELECT ALL WHERE: ". $row["username"] ."<br>";

    $row = $conn->findOneById(1, "utenti")->fetch_assoc();
    echo "FIND BY ID: ". $row["username"] ."<br>";
    */

    /*--------PROVE INSERT---------*/
    /*
    $values = [
        'username' => 'admin',
        'password' => md5("admin")
    ];

    echo "INSERT: ". $conn->insert("utenti", $values);
    */

    /*--------PROVE DELETE---------*/
    /*
    echo "DELETE ALL: ". $conn->deleteAll("utenti");
    echo "DELETE WHERE ID: ". $conn->deleteWhereId(14, "utenti");
    */


    $conn->disconnect();
?>