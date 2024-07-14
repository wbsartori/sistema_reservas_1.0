<?php

namespace App\Providers\Interfaces;

interface ProviderContainerInterface
{
    /**
     * @param string $name
     * @return mixed
     */
    public static function get(string $name): mixed;

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public static function set(string $key, string $value): void;
}