<?php

declare(strict_types=1);

namespace App\Core\Database;

use App\Global\Constants;
use App\Global\Messages;
use DateTime;
use Exception;
use PDO;
use Throwable;

abstract class Model
{
    /**
     * @var PDO
     */
    protected PDO $connection;


    private const DRIVERS = [
        'mysql' => PDOMysqlConnection::class,
        'sqlite' => PDOSqliteConnection::class,
    ];

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if(array_key_exists($_ENV['DB_DRIVER'], self::DRIVERS)) {
            $this->connection = self::DRIVERS[$_ENV['DB_DRIVER']]::connect();
        } else {
            $this->connection = PDOSqliteConnection::connect();
        }
    }

    /**
     * @return array|false
     */
    public function getAll(): bool|array
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
            return [
                'status' => Constants::ERROR_STATUS,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param mixed $id
     * @return mixed
     */
    public function findById(mixed $id): mixed
    {
        try {
            $this->connection->beginTransaction();
            $sql = 'select * from ' . $this->table . ' where id = :id';
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(':id', intval($id));
            $statement->execute();
            $this->connection->commit();
            return $statement->fetch();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            return [
                'status' => Constants::ERROR_STATUS,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param array $where
     * @return array|mixed
     */
    public function meetWhere(array $where): mixed
    {
        try {
            $whereValue = '';
            foreach ($where as $key => $value) {
                $whereValue .= $key . ' = :' . $key . ' and ';
            }
            $lenghtWhere = strlen($whereValue);
            $newWhere = substr($whereValue, 0, $lenghtWhere - 5);
            $this->connection->beginTransaction();
            $sql = 'select * from ' . $this->table . ' where ' . $newWhere;
            $statement = $this->connection->prepare($sql);
            $statement->execute($where);
            $this->connection->commit();
            return $statement->fetch();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            return [
                'status' => Constants::ERROR_STATUS,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param array $attributes
     * @return array|int
     */
    public function insert(array $attributes): array|int
    {
        try {
            $attributes['criado_em'] = (new DateTime())->format('Y-m-d H:i:s');
            $attributes['alterado_em'] = (new DateTime())->format('Y-m-d H:i:s');
            unset($attributes['id']);
            $this->connection->beginTransaction();
            $keys = implode(',', array_keys($attributes));
            $values = implode(',', array_keys($attributes));
            $values = ':' . str_replace(',', ', :', $keys);
            $sql = 'insert into ' . $this->table . ' (' . $keys . ') values (' . $values . ')';
            $statement = $this->connection->prepare($sql);
            $statement->execute($attributes);
            $this->connection->commit();
            return [
                'status' => Constants::SUCCESS_STATUS,
                'message' => Messages::CREATE_MESSAGE
            ];
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            return [
                'status' => Constants::ERROR_STATUS,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param array $attributes
     * @return array|int
     */
    public function update(array $attributes): array|int
    {
        try {
            $attributes['alterado_em'] = (new DateTime())->format('Y-m-d H:i:s');
            $this->connection->beginTransaction();
            $sets = '';
            foreach ($attributes as $key => $value) {
                $sets .= $key . "=:" . $key . ",";
            }
            $sql = 'update ' . $this->table . " set " . rtrim($sets, ',') . " where id = :id";

            $statement = $this->connection->prepare($sql);
            $statement->execute($attributes);
            $this->connection->commit();
            return [
                'status' => Constants::SUCCESS_STATUS,
                'message' => Messages::UPDATE_MESSAGE
            ];
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            return [
                'status' => Constants::ERROR_STATUS,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param $field
     * @param $value
     * @return array|int
     */
    public function delete($field, $value): array|int
    {
        try {
            $this->connection->beginTransaction();
            $sql = 'delete from ' . $this->table . ' where ' . $field . ' = ?';
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(1, $value);
            $statement->execute();
            $this->connection->commit();
            return [
                'status' => Constants::SUCCESS_STATUS,
                'message' => Messages::DELETE_MESSAGE
            ];
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            return [
                'status' => Constants::ERROR_STATUS,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function query(string $sql): bool|array
    {
        try {
            $this->connection->beginTransaction();
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $this->connection->commit();
            return $statement->fetchAll();
        } catch (Throwable $exception) {
            $this->connection->rollBack();
            return [
                'status' => Constants::ERROR_STATUS,
                'message' => $exception->getMessage()
            ];
        }
    }
}
