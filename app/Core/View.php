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

        if (!file_exists($directory)) {
            throw new Exception("Template {$name} não foi encontrado");
        }
        require $directory;
    }

    /**
     * @param string $layout
     * @return void
     * @throws Exception
     */
    public function load(string $layout): void
    {
        $directory = dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR
            . 'templates'
            . DIRECTORY_SEPARATOR
            . $layout
            . '.php';

        if (!file_exists($directory)) {
            throw new Exception("Layout {$layout} não foi encontrado");
        }
        include $directory;
    }

    /**
     * @param string $page
     * @return void
     */
    public function redirect(string $page = '/'): void
    {
        header('location:' . $page);
    }

    /**
     * @param string|null $key
     * @param string|null $message
     * @return void
     */
    public function alertMessage(
        string $key = null,
        string $message = null
    ): void
    {
        if ($key === 'success' && $message !== null) {
            $_SESSION[$key] = $message;
            echo '<div class="alert alert-success mt-3" id="success-alert" role="alert">';
            echo $_SESSION[$key];
            echo '</div>';
        } else if (!empty($_SESSION['success'])) {
            echo '<div class="alert alert-success mt-3" id="success-alert" role="alert">';
            echo $_SESSION['success'];
            echo '</div>';
        } else if (!empty($_SESSION['error'])) {
            echo '<div class="alert alert-error mt-3" id="error-alert" role="alert">';
            echo $_SESSION['error'];
            echo '</div>';
        }
    }
}