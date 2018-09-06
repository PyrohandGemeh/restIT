<?php
include "class/MySql.php";
    $conn = new MySql();

    $row = $conn->selectAll("utenti")->fetch_assoc();
    echo "SELECT ALL: ". $row["username"] ."<br>";

    $fields = array("username", "password");
    $row = $conn->select("utenti", $fields)->fetch_assoc();
    echo "SELECT: ". $row["username"] ."<br>";

    $fields = array("username", "password");
    $values = array("ale", "ale");

    $row = $conn->selectAllWhere("utenti", $fields, $values, "=")->fetch_assoc();
    echo "SELECT ALL WHERE: ". $row["username"] ."<br>";

    $conn->disconnect();
?>