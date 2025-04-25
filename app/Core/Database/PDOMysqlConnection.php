<?php

namespace App\Core\Database;

use App\Core\Interfaces\ConnectionInterface;
use Exception;
use PDO;
use PDOException;

class PDOMysqlConnection implements ConnectionInterface
{
    /**
     * @return PDO
     * @throws Exception
     */
    public static function connect(): PDO
    {
        try {
            $driver = require dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'config/database.php';

            $pdo = new PDO(
                $driver['database']['mysql']['dns'] . $_ENV['DB_HOST']
                . ';dbname=' . $driver['database']['mysql']['dbname'],
                $driver['database']['mysql']['username'],
                $driver['database']['mysql']['password'],
            );
            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $pdo->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_OBJ
            );
            return $pdo;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
