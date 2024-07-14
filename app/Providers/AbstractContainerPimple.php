<?php

namespace App\Providers;

use App\Providers\Interfaces\ProviderContainerInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AbstractContainerPimple implements ServiceProviderInterface, ProviderContainerInterface
{
    /**
     * @var Container
     */
    protected static Container $provider;

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function get(string $name): mixed
    {
        return self::$provider->offsetGet($name);
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public static function set(string $key, string $value): void
    {
        if(self::$provider->offsetExists($key) !== false) {
            self::$provider->offsetSet($key, $value);
        }
    }
}
