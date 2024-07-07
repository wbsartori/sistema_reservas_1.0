<?php

declare(strict_types=1);

namespace App\Core;

class Uri
{
    /**
     * @return false|array|int|string|null
     */
    public static function load(): false|array|int|string|null
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
