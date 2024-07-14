<?php

namespace App\Providers;

use App\Models\Equipament;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use App\Models\Vehicle;
use Pimple\Container;

class SystemProvider extends AbstractContainerPimple
{
    /**
     *  Register classes
     */
    private const BIND = [
        'Equipament' => Equipament::class,
        'Reservation' => Reservation::class,
        'Room' => Room::class,
        'User' => User::class,
        'Vehicle' => Vehicle::class,
    ];

    public function register(Container $pimple): void
    {
        self::$provider = $pimple;
        foreach (self::BIND as $key => $value) {
            if(!self::$provider->offsetExists($key)) {
                self::$provider->offsetSet($key, new $value());
            }
        }
    }
}