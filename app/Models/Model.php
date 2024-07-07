<?php

namespace App\Models;

use App\Core\Database\PDOSqliteConnection;
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

    public function insert($field, $value)
    {
        $sql = 'insert into ' . $this->table . $field . ' = ?';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $value);
        $statement->execute();
        return $statement->rowCount();
    }

    public function update($field, $value)
    {
        $sql = 'update ' . $this->table . 'set '. $field . ' = ?';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $value);
        $statement->execute();
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