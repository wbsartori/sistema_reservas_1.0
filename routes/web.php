<?php

declare(strict_types=1);

return [
    '/' => ['controller' => \App\Controllers\HomeController::class, 'method' => 'index'],

    '/equipaments' => ['controller' => \App\Controllers\EquipamentController::class, 'method' => 'index'],
    '/equipaments/add' => ['controller' => \App\Controllers\EquipamentController::class, 'method' => 'add'],
    '/equipaments/create' => ['controller' => \App\Controllers\EquipamentController::class, 'method' => 'create'],
    '/equipaments/update' => ['controller' => \App\Controllers\EquipamentController::class, 'method' => 'update'],
    '/equipaments/edit' => ['controller' => \App\Controllers\EquipamentController::class, 'method' => 'edit'],
    '/equipaments/delete' => ['controller' => \App\Controllers\EquipamentController::class, 'method' => 'delete'],

    '/vehicles' => ['controller' => \App\Controllers\VehicleController::class, 'method' => 'index'],
    '/vehicles/add' => ['controller' => \App\Controllers\VehicleController::class, 'method' => 'add'],
    '/vehicles/create' => ['controller' => \App\Controllers\VehicleController::class, 'method' => 'create'],
    '/vehicles/update' => ['controller' => \App\Controllers\VehicleController::class, 'method' => 'update'],
    '/vehicles/edit' => ['controller' => \App\Controllers\VehicleController::class, 'method' => 'edit'],
    '/vehicles/delete' => ['controller' => \App\Controllers\VehicleController::class, 'method' => 'delete'],

    '/rooms' => ['controller' => \App\Controllers\RoomController::class, 'method' => 'index'],
    '/rooms/add' => ['controller' => \App\Controllers\RoomController::class, 'method' => 'add'],
    '/rooms/create' => ['controller' => \App\Controllers\RoomController::class, 'method' => 'create'],
    '/rooms/update' => ['controller' => \App\Controllers\RoomController::class, 'method' => 'update'],
    '/rooms/edit' => ['controller' => \App\Controllers\RoomController::class, 'method' => 'edit'],
    '/rooms/delete' => ['controller' => \App\Controllers\RoomController::class, 'method' => 'delete'],

    '/users' => ['controller' => \App\Controllers\UserController::class, 'method' => 'index'],
    '/users/add' => ['controller' => \App\Controllers\UserController::class, 'method' => 'add'],
    '/users/create' => ['controller' => \App\Controllers\UserController::class, 'method' => 'create'],
    '/users/update' => ['controller' => \App\Controllers\UserController::class, 'method' => 'update'],
    '/users/edit' => ['controller' => \App\Controllers\UserController::class, 'method' => 'edit'],
    '/users/delete' => ['controller' => \App\Controllers\UserController::class, 'method' => 'delete'],

    '/reservations/equipament' => ['controller' => \App\Controllers\ReservationController::class, 'method' => 'addEquipament'],
    '/reservations/room' => ['controller' => \App\Controllers\ReservationController::class, 'method' => 'addRoom'],
    '/reservations/vehicle' => ['controller' => \App\Controllers\ReservationController::class, 'method' => 'addVehicle'],

    '/login' => ['controller' => \App\Controllers\LoginController::class, 'method' => 'index'],
    '/login/authenticate' => ['controller' => \App\Controllers\AuthenticateController::class, 'method' => 'authenticate'],
    '/login/logout' => ['controller' => \App\Controllers\AuthenticateController::class, 'method' => 'logout'],
];