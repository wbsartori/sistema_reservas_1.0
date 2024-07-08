<?php

namespace App\Core;

use Exception;

class View
{

    public static function make(): View
    {
        return new self();
    }

    public function template(string $name, mixed $registers = null, array $message = null): void
    {
        $directory = dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR
            . 'templates'
            . DIRECTORY_SEPARATOR
            . $name
            . '.php';

        if(!file_exists($directory)) {
            throw new Exception("Template {$name} não foi encontrado");
        }
        require $directory;
    }

    /**
     * @param string $layout
     * @return void
     */
    public function load(string $layout): void
    {
        $directory = dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR
            . 'templates'
            . DIRECTORY_SEPARATOR
            . $layout
            . '.php';

        if(!file_exists($directory)) {
            throw new Exception("Layout {$layout} não foi encontrado");
        }
        include $directory;
    }
}