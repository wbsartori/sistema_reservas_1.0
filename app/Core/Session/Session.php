<?php

declare(strict_types=1);

namespace App\Core\Session;

use App\Core\View;

class Session
{
    /**
     * @var Session|null
     */
    private static ?Session $session = null;

    private static int $sessionTimeout = 120;

    public static function make(): Session
    {
        return new self();
    }

    public function startSession(): void
    {
        ini_set('session.gc_maxlifetime', self::$sessionTimeout);
        session_start();
    }

    public static function getSession(string $key = ''): array
    {
        if(isset($_SESSION[$key]) && $key !== '') {
            return [$key => $_SESSION[$key]];
        } else if(isset($_SESSION)) {
            return $_SESSION;
        }
        return [];
    }

    public static function verifySessionExists(): bool
    {
        if(isset($_SESSION) && $_SESSION !== []) {
            return true;
        }
        return false;
    }

    /**
     * @return Session
     */
    public static function init(): Session
    {
        if (isset($_SESSION['session_life']) && (time() - $_SESSION['session_life']) > self::$sessionTimeout) {
            self::destroy();
            View::make()->redirect('/');
        }
        $_SESSION['session_life'] = time();
        self::$session = new self();
        return self::$session;
    }

    /**
     * @param array|null $sessionData
     * @return void
     */
    public static function setKeys(array $sessionData = null): void
    {
        if ($sessionData !== null || $sessionData !== []) {
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
        return $_SESSION ?? [];
    }

    /**
     * @return void
     */
    public static function destroy(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
        header('location:' . '/');
    }

    public static function removeKeys(array $keys): void
    {
        foreach ($keys as $key) {
            unset($_SESSION[$key]);
        }
    }
}
