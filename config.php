<?php

return [
    'database' => [
        'name' => 'db_semana_da_computacao',
        'username' => 'root',
        'password' => 'ice+',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];