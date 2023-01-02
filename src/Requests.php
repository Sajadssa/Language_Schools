<?php

class Requests
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTable($pdo, $table_name, $fields)
    {
        // Start building the SQL query
        $query = "CREATE TABLE $table_name (\n";

        // Add each field to the query
        foreach ($fields as $field_name => $field_type) {
            $query .= "$field_name $field_type,\n";
        }

        // Remove the trailing comma and add the closing parenthesis
        $query = rtrim($query, ",\n") . "\n)";

        // Execute the query
        $pdo->exec($query);
    }
    public function createRelationship($table_name, $field_name, $related_table, $related_field)
    {
        $query = "ALTER TABLE $table_name ADD FOREIGN KEY ($field_name) REFERENCES $related_table($related_field)";
        $this->pdo->exec($query);
    }

    public function select($table, $fields, $where = "", $order_by = "", $limit = "")
    {
        $query = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        if ($where != "") {
            $query .= " WHERE " . $where;
        }
        if ($order_by != "") {
            $query .= " ORDER BY " . $order_by;
        }
        if ($limit != "") {
            $query .= " LIMIT " . $limit;
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $query = "INSERT INTO " . $table . " (" . implode(", ", array_keys($data)) . ") VALUES (:" . implode(", :", array_keys($data)) . ")";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($data);
    }

    public function update($table, $data, $where)
    {
        $query = "UPDATE " . $table . " SET ";
        $query_parts = array();
        foreach ($data as $field => $value) {
            $query_parts[] = $field . " = :" . $field;
        }
        $query .= implode(", ", $query_parts) . " WHERE " . $where;
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($data);
    }

    public function delete($table, $where)
    {
        $query = "DELETE FROM " . $table . " WHERE " . $where;
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute();
    }
}
