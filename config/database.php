<?php

return [
    'database' => [
        'sqlite' => [
            'dns' => 'sqlite:',
            'dbname' => $_ENV['DB_DATABASE'] . '.sqlite',
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'local' => $_ENV['DB_DATABASE'] . '.sqlite',
            'options' => [
                'charset' => 'utf8'
            ],
            'className' => \App\Core\Database\PDOSqliteConnection::class,
        ],
        'mysql' => [
            'dns' => 'mysql:host=',
            'dbname' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'local' => $_ENV['DB_DATABASE'],
            'options' => [
                'charset' => $_ENV['DB_CHARSET']
            ],
            'className' => \App\Core\Database\PDOMysqlConnection::class,
        ]
    ]
];