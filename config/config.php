<?php

use Monolog\Logger;

return [
    "database" =>
        [
            "connection" => "mysql:host=localhost;dbname=12-alex;charset=utf8",
            "username" => "alex",
            "password" => "1234",
            "options" => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true]
        ]
    ,
    "logfile" => "my_app.log",
    "loglevel" => Logger::DEBUG,
    "products_path" =>"images/products/",
    "partners_path" => "images/partners/",
    "posters_path" => "images/posters/",
    'mailer' => [
        'smtp_server' => "smtp.gmail.com",
        'smtp_port' => 587,
        'smtp_security' => 'tls',
        'username' => 'alexfar83@gmail.com',
        'password' => 'fakepassword',
        'email' => 'alexfar83@gmail.com',
        'name' => 'Alex'
    ],
    "security" => ["roles" =>
        [
            "ROLE_ADMIN" => 3,
            "ROLE_USER" => 2,
            "ROLE_ANONYMOUS" => 1
        ]
    ]
];
