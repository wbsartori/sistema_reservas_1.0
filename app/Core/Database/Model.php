<?php

namespace App\Core\Database;

use App\Core\View;
use Exception;
use PDO;
use Throwable;

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

    /**
     * @return array|false|void
     */
    public function getAll()
    {
        try {
            $this->connection->beginTransaction();
            $sql = 'select * from ' . $this->table;
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $this->connection->commit();
            return $statement->fetchAll();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            View::make()->alertMessage('error', $exception->getMessage());
        }
    }

    public function findById(mixed $id): mixed
    {
        try {
            $this->connection->beginTransaction();
            $sql = 'select * from '. $this->table . ' where id = :id';
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(':id', intval($id));
            $statement->execute();
            return $statement->fetch();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            View::make()->alertMessage('error', $exception->getMessage());
        }
    }

    public function insert(array $attributes)
    {
        try {
            $this->connection->beginTransaction();
            $keys = implode(',', array_keys($attributes));
            $values = implode(',', array_keys($attributes));
            $values = ':'.str_replace(',', ', :', $keys);
            $sql = 'insert into ' . $this->table .' (' .$keys . ') values (' . $values . ')';
            $statement = $this->connection->prepare($sql);
            $statement->execute($attributes);
            $this->connection->commit();
            return $statement->rowCount();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            View::make()->alertMessage('error', $exception->getMessage());
        }
    }

    public function update(array $attributes): int
    {
        try {
            $this->connection->beginTransaction();
            $sets = '';
            foreach ($attributes as $key => $value) {
                $sets .= $key . "=:" . $key . ",";
            }
            $sql = 'update ' . $this->table . " set " . rtrim($sets, ',') . " where id = :id";

            $statement = $this->connection->prepare($sql);
            $statement->execute($attributes);
            $this->connection->commit();
            return $statement->rowCount();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            View::make()->alertMessage('error', $exception->getMessage());
        }
    }

    public function delete($field, $value)
    {
        try {
            $this->connection->beginTransaction();
            $sql = 'delete from ' . $this->table . ' where '. $field . ' = ?';
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(1, $value);
            $statement->execute();
            $this->connection->commit();
            return $statement->rowCount();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            View::make()->alertMessage('error', $exception->getMessage());
        }
    }
}