<?php
declare(strict_types=1);

$local = [
    'database' => [
        'name' => '',
        'username' => '',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false //when using FETCH_CLASS return the correct variable types (when this value is true, on some systems mysql may (for example) only return string values instead of integers)
        ]
    ],
    'e-mail' => [
        'from' => 'do-not-reply@example.com',
        'to' => 'myemailaddress@example.edu'
    ]
];

$server = [
    'database' => [
        'name' => 'S1127680_',
        'username' => '',
        'password' => '?',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false //when using FETCH_CLASS return the correct variable types (when this value is true, on some systems mysql may (for example) only return string values instead of integers)
        ]
    ],
    'e-mail' => [
        'from' => 'do-not-reply@example.com',
        'to' => 'myemailaddress@example.edu'
    ]
];

return $_SERVER['HTTP_HOST'] === 'adsd.clow.nl' ? $server : $local;