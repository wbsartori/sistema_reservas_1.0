<?php

namespace App\Core;

use Exception;

class App
{
    public static function run(): void
    {
        try {
            Routes::load();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
