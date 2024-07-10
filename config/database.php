<?php

return [
    'database' => [
        'dns' => 'sqlite:',
        'dbname' => 'database.sqlite',
        'username' => '',
        'password' => '',
        'local' => 'database',
        'options' => [
            'charset' => 'utf8'
        ],
        'className' => \App\Core\Database\PDOSqliteConnection::class,
    ]
];