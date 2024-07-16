<?php

namespace App\Core\Session;

class Session
{
    /**
     * @var Session
     */
    private static Session $session;

    /**
     * @return Session
     */
    public static function init(): Session
    {
        session_start();
        self::$session = new self();
        return self::$session;
    }

    public static function session(): Session
    {
        return self::$session;
    }

    /**
     * @param array|null $sessionData
     * @return void
     */
    public function setKeys(array $sessionData = null): void
    {
        if ($sessionData !== null) {
            foreach ($sessionData as $key => $value) {
                $_SESSION[$key] = $value;
            }
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
        return $_SESSION;
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        session_destroy();
    }
}
