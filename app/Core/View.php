<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Session\Session;
use App\Global\Constants;
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
        if ($message !== null) {
            Session::make()->setKeys($message);
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
     * @param $message
     * @return void
     */
    public function redirect(string $page = '/', $message = null): void
    {
        if ($message !== null) {
            Session::make()->setKeys($message);
        }
        header('location:' . $page);
    }

    /**
     * @return void
     */
    public function alertMessage(): void
    {
        if (Session::make()->getValue('status') !== null && Session::make()->getValue('status') === Constants::ERROR_STATUS) {
            echo '<div class="alert alert-success mt-3" id="success-alert" role="alert">';
            echo Session::make()->getValue('message');
            echo '</div>';
            echo "<script>";
            echo "document.addEventListener('DOMContentLoaded', function() {";
            echo "setTimeout(function() {";
            echo "var alertDiv = document.getElementById('success-alert');";
            echo "if (alertDiv) {";
            echo "alertDiv.style.display = 'none';";
            echo "}";
            echo "}, 3000); ";
            echo "});";
            echo "</script>";
        } else if (Session::make()->getValue('status') !== null && Session::make()->getValue('status') === Constants::SUCCESS_STATUS) {
            echo '<div class="alert alert-success mt-3" id="success-alert" role="alert">';
            echo Session::make()->getValue('message');
            echo '</div>';
            echo "<script>";
            echo "document.addEventListener('DOMContentLoaded', function() {";
            echo "setTimeout(function() {";
            echo "var alertDiv = document.getElementById('success-alert');";
            echo "if (alertDiv) {";
            echo "alertDiv.style.display = 'none';";
            echo "}";
            echo "}, 3000); ";
            echo "});";
            echo "</script>";
        }
        Session::make()->removeKeys(['status', 'message']);
    }
}
