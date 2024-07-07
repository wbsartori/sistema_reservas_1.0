<?php

namespace App\Core\Database;

use App\Core\Interfaces\ConnectionInterface;
use Exception;
use PDO;
use PDOException;

class PDOSqliteConnection implements ConnectionInterface
{
    /**
     * @return PDO
     * @throws Exception
     */
    public static function connect(): PDO
    {
        try {
            $driver = require dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'config.php';
            $pdo = new PDO(
                $driver['database']['dns']
                . dirname(__DIR__, 3)
                . DIRECTORY_SEPARATOR . $driver['database']['local']
                . DIRECTORY_SEPARATOR . $driver['database']['dbname'],
                $driver['database']['username'],
                $driver['database']['password'],
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
