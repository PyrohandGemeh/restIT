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
        $this->connection = new mysqli("localhost", "root", "", "restIT");
    }

    public function disconnect() {
        mysqli_close($this->connection);
    }


    public function selectAll($tableName) {
        $query = "SELECT * FROM " . $tableName;
        return $this->connection->query($query);
    }

    /*
     * Precondizione: fields è un array di campi del db da selezionare nella select
     */
    public function select($tableName, $fields) {
        $query = "SELECT ";

        $last = end($fields);
        foreach ($fields as $field) {
            $query .= $field;

            if ($field !== $last)
                $query .= ", ";
            else
                $query .= " ";
        }

        $query .= "FROM " . $tableName;
        return $this->connection->query($query);
    }

    /*
     * Precondizione: values è un array associativo (esempio: $values = ['campo1' => 'a','campo2' => 'b'];)
     *                operator è l'operatore per compare gli elementi (esempio: "=")
     */
    public function selectAllWhere($tableName, $values, $operator) {
        $query = 'SELECT * FROM ' . $tableName . ' WHERE ';

        $last = end($values);
        foreach ($values as $field => $value) {
            $query .= $field . ' ' . $operator . ' ';
            $query .= "'" . $value . "'";

            if ($value !== $last)
                $query .= " AND ";
        }

        return $this->connection->query($query);
    }

    public function selectAllWhereField($tableName, $fields, $operator) {
        $query = 'SELECT * FROM ' . $tableName . ' WHERE ';

        $last = end($fields);
        foreach ($fields as $field1 => $field2) {
            $query .= $field1 . ' ' . $operator . ' ' . $field2 . ' ';

            if ($field2 !== $last)
                $query .= " AND ";
        }

        return $this->connection->query($query);
    }

    public function findOneById($tableName, $id) {
        $query = "SELECT * FROM " . $tableName . " WHERE id = " . $id;
        return $this->connection->query($query);
    }

    /*
     * Precondizione: $values è un array associativo
     */
    public function insert($tableName, $values) {
        $query = 'INSERT INTO ' . $tableName . ' (';

        $last = end($values);
        foreach ($values as $field => $value) {
            $query .= $field;

            if ($value !== $last)
                $query .= ', ';
            else
                $query .= ') VALUES (';
        }

        $last = end($values);
        foreach ($values as $field => $value) {
            $query .= "'" . $value . "'";

            if ($value !== $last)
                $query .= ', ';
            else
                $query .= ')';
        }

        $result = $this->connection->query($query);
        if ($result)
            return true;
        else
            return false;
    }

    public function deleteAll($tableName) {
        $query = 'DELETE FROM ' . $tableName;

        $result = $this->connection->query($query);
        if ($result)
            return true;
        else
            return false;
    }

    public function deleteWhereId($tableName, $id) {
        if ($this->findOneById($tableName, $id)->num_rows == 1) {
            $query = 'DELETE FROM ' . $tableName . ' WHERE id = ' . $id;

            $result = $this->connection->query($query);
            if ($result) {
                echo "ciao";
                return true;
            }

        }

        return false;
    }

    public function updateWhereId($tableName, $values, $id) {
        $query = 'UPDATE ' . $tableName . ' SET ';

        $last = end($values);
        foreach ($values as $field => $value) {
            $query .= $field . ' = ';
            $query .= "'" . $value . "'";

            if ($value !== $last)
                $query .= ", ";
            else
                $query .=" WHERE id = ". $id;
        }

        $result = $this->connection->query($query);
        if ($result)
            return true;
        else
            return false;

    }
}