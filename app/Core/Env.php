<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;

class Env
{

    private static int $directoryLevel = 2;

    private static string $filename = '.env';

    public static function make(string $filename = '.env', int $directoryLevel = 2): Env
    {
        self::$directoryLevel = $directoryLevel;
        self::$filename = $filename;
        (Dotenv::createImmutable(
            dirname(
                __DIR__,
                self::$directoryLevel
            ),
            self::$filename
        ))->load();
        return new self();
    }
}