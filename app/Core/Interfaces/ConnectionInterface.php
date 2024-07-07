<?php

namespace App\Core\Interfaces;

use PDO;

interface ConnectionInterface
{
    public static function connect(): PDO;
}
