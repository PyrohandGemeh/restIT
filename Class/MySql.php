<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 06/09/2018
 * Time: 14:22
 */

class MySql {
    private $connection;

    public function __construct() {
        $this->connection = new mysqli("localhost","root", "", "restIT");
    }

    public function disconnect() {
        mysqli_close($this->connection);
    }

    /*
     * Precondizione: tableName è il nome della tabella del db (esempio: utenti)
     */
    public function selectAll($tableName) {
        $query = "SELECT * FROM ". $tableName;
        return  $this->connection->query($query);
    }

    /*
     * Precondizione: fields è un array di campi del db da selezionare nella select
     */
    public function select($tableName, $fields) {
        $query = "SELECT ";

        for($i = 0; $i < count($fields); $i++) {
            if($fields[$i] !== "") {
                $query .= $fields[$i];

                if($i + 1 != count($fields))
                    $query .= ", ";
                else
                    $query .= " ";
            }
        }

        $query .= "FROM ". $tableName;
        return  $this->connection->query($query);
    }

    /*
     * Precondizione: values è un array associativo (esempio: $values = ['a' => 'a','b' => 'b'];)
     *                operator è l'operatore per compare gli elementi (esempio: "=")
     */
    public function selectAllWhere($tableName, $values, $operator) {
        $query = 'SELECT * FROM '. $tableName .' WHERE ';

        $last = end($values);
        foreach ($values as $field => $value) {
                $query .= $field . ' ' . $operator . ' ';
                $query .= "'" . $value . "'";

                if($value !== $last)
                    $query .= " AND ";
        }

        return  $this->connection->query($query);
    }

    public function findOneById($id, $tableName) {
        $query = "SELECT * FROM ". $tableName ." WHERE id = ". $id;
        return  $this->connection->query($query);
    }
}