<?php

namespace App\Core\Database;

use Exception;
use PDO;

abstract class Model
{
    protected PDO $connection;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->connection = PDOSqliteConnection::connect();
    }

    public function getAll(): false|array
    {
        $sql = 'select * from ' . $this->table;
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function findById(mixed $id): mixed
    {
        $sql = 'select * from '. $this->table . ' where id = :id';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(':id', intval($id));
        $statement->execute();
        return $statement->fetch();
    }

    public function insert(array $attributes)
    {
        $keys = implode(',', array_keys($attributes));
        $values = implode(',', array_keys($attributes));
        $values = ':'.str_replace(',', ', :', $keys);
        $sql = 'insert into ' . $this->table .' (' .$keys . ') values (' . $values . ')';
        $statement = $this->connection->prepare($sql);
        $statement->execute($attributes);
        return $statement->rowCount();
    }

    public function update(array $attributes): int
    {
        $sets = '';
        foreach ($attributes as $key => $value) {
            $sets .= $key . "=:" . $key . ",";
        }
        $sql = 'update ' . $this->table . " set " . rtrim($sets, ',') . " where id = :id";
 
        $statement = $this->connection->prepare($sql);
        $statement->execute($attributes);
        return $statement->rowCount();
    }

    public function delete($field, $value)
    {
        $sql = 'delete from ' . $this->table . ' where '. $field . ' = ?';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $value);
        $statement->execute();
        return $statement->rowCount();
    }
}