<?php

declare(strict_types=1);

namespace App\Core\Session;

class Session
{
    /**
     * @var Session
     */
    private static Session $session;

    public static function make(): Session
    {
        return new self();
    }

    /**
     * @return Session
     */
    public function init(): Session
    {
        session_start();
        self::$session = new self();
        return self::$session;
    }

    /**
     * @param array|null $sessionData
     * @return void
     */
    public function setKeys(array $sessionData = null): void
    {
        if ($sessionData !== null || $sessionData !== []) {
            foreach ($sessionData as $key => $value) {
                $_SESSION[$key] = $value;
            }
        } else {
            $_SESSION = [];
        }
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setKey(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getValue(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $_SESSION ?? [];
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        self::setKeys([]);
        session_destroy();
    }

    public function removeKeys(array $keys): void
    {
        foreach ($keys as $key) {
            unset($_SESSION[$key]);
        }
    }
}
