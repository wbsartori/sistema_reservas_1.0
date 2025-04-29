<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Session\Session;
use App\Global\Constants;
use Exception;

class View
{

    private static $session = null;

    public static function make(): View
    {
        self::$session = Session::make();
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
            self::$session->setKeys($message);
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
            self::$session->setKeys($message);
        }
        header('location:' . $page);
    }

    /**
     * @return void
     */
    public function alertMessage(): void
    {
        if (self::$session->getValue('status') !== null && self::$session->getValue('status') === Constants::ERROR_STATUS) {
            echo '<div class="alert alert-danger mt-3" id="danger-alert" role="alert">';
            echo self::$session->getValue('message');
            echo '</div>';
            echo "<script>";
            echo "document.addEventListener('DOMContentLoaded', function() {";
            echo "setTimeout(function() {";
            echo "var alertDiv = document.getElementById('danger-alert');";
            echo "if (alertDiv) {";
            echo "alertDiv.style.display = 'none';";
            echo "}";
            echo "}, 3000); ";
            echo "});";
            echo "</script>";
        } else if (self::$session->getValue('status') !== null && self::$session->getValue('status') === Constants::SUCCESS_STATUS) {
            echo '<div class="alert alert-success mt-3" id="success-alert" role="alert">';
            echo self::$session->getValue('message');
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
        self::$session->removeKeys(['status', 'message']);
    }
}
