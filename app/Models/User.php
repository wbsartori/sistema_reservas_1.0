<?php

namespace App\Models;

use App\Core\Database\Model;
use App\Global\Constants;
use Throwable;

class User extends Model
{
    protected string $table = 'usuarios';

    /**
     * @param string $email
     * @return mixed
     */
    public function findByEmail(string $email): mixed
    {
        try {
            $this->connection->beginTransaction();
            $sql = 'select email from ' . $this->table . ' where email = :email';
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':email', $email);
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
}
