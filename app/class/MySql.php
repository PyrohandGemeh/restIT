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
            $value = $this->connection->real_escape_string($value);
            $query .= "'" . $value . "'";

            if ($value !== $last)
                $query .= " AND ";
        }
        //echo $query;
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
        $id = $this->connection->real_escape_string($id);
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
            $value = $this->connection->real_escape_string($value);
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
        $query = 'DELETE FROM ' . $tableName . ' WHERE ';

        $last = end($id);
        foreach ($id as $field => $value) {
            $value = $this->connection->real_escape_string($value);
            $query .= $field . ' = '. $value;

            if ($value !== $last)
                $query .= " AND ";
        }
        echo $query;
        $result = $this->connection->query($query);
        if ($result) {
            return true;
        }


        return false;
    }

    public function updateWhereId($tableName, $values, $id) {
        $query = 'UPDATE ' . $tableName . ' SET ';

        $last = end($values);
        foreach ($values as $field => $value) {
            $query .= $field . ' = ';
            $value = $this->connection->real_escape_string($value);
            $query .= "'" . $value . "'";

            if ($value !== $last)
                $query .= ", ";
            else
                $query .=" WHERE id = ". $this->connection->real_escape_string($id);
        }

        $result = $this->connection->query($query);
        if ($result)
            return true;
        else
            return false;

    }

    /*
     * Precondizione: $tables[1] è la tabella che contiene le chiavi esterne di $tables[0] e $tables[2]
     */
    public function selectAllInnerJoin3Tables($tables, $ids) {
        if(count($tables) == 3) {
            $query = 'SELECT * FROM '. $tables[0];
            $j = 0;

            for($i = 0; $i < 2; $i++) {
                $query .= ' INNER JOIN '. $tables[$i+1] .' ON ';
                $query .= $tables[$i] .'.'.$ids[$j] . ' = ' . $tables[$i+1] .'.'.$ids[$j+1];
                $j = $j + 2;
            }
            return $this->connection->query($query);
        }
    }

    public function selectAllInnerJoin3TablesWhere($tables, $ids, $values, $operator) {
        if(count($tables) == 3) {
            $query = 'SELECT * FROM '. $tables[0];
            $j = 0;

            for($i = 0; $i < 2; $i++) {
                $query .= ' INNER JOIN '. $tables[$i+1] .' ON ';
                $query .= $tables[$i] .'.'.$ids[$j] . ' = ' . $tables[$i+1] .'.'.$ids[$j+1];
                $j = $j + 2;
            }

            $query .= ' WHERE ';
            $last = end($values);
            foreach ($values as $field => $value) {
                $value = $this->connection->real_escape_string($value);
                $query .= $field . ' ' . $operator . ' '. $value;

                if ($value !== $last)
                    $query .= " AND ";
            }

            return $this->connection->query($query);
        }
    }

    /*
     * Precondizione: tables e ids devono essere simmetrici
     */
    public function selectAllInnerJoin2TablesWhere($tables, $ids, $values, $operator) {
        if(count($tables) == 2) {
            $query = 'SELECT * FROM '. $tables[0] .' INNER JOIN '. $tables[1] .' ON '. $tables[0] .'.'.$ids[0] . ' = ' . $tables[1] .'.'.$ids[1];
            $query .= ' WHERE ';

            $last = end($values);
            foreach ($values as $field => $value) {
                $value = $this->connection->real_escape_string($value);
                $query .= $field . ' ' . $operator . ' '. $value;

                if ($value !== $last)
                    $query .= " AND ";
            }

            return $this->connection->query($query);
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}