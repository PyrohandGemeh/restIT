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
     * Precondizione: fieldsName è un array dei nomi dei campi
     *                filedsValue è un array di valori
     *                operator è l'operatore per compare gli elementi (esempio: "=")
     */
    public function selectAllWhere($tableName, $fieldsName, $fieldsValue, $operator) {
        $fieldsName = array_filter($fieldsName);
        $fieldsValue = array_filter($fieldsValue);

        $query = 'SELECT * FROM '. $tableName .' WHERE ';

        if(count($fieldsName) == count($fieldsValue)) {
            for($i = 0; $i < count($fieldsName); $i++) {
                if($fieldsValue[$i] != null && $fieldsName[$i] != null) {
                    $query .= $fieldsName[$i] .' '. $operator .' ';
                    $query .= "'". $fieldsValue[$i] ."'";

                    if($i + 1 != count($fieldsName))
                        $query .= " AND ";
                    else
                        $query .= " ";
                }
            }
            //echo $query;
            return  $this->connection->query($query);
        }
        else
            echo "errore";
    }
}