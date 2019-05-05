<?php
return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => getenv('APP_ENV') === 'production' ? false : true,

        // Renderer Settings
        'view' => [
            'template_path' => __DIR__ . '/../resources/views',
            'twig' => [
                'cache' => getenv('APP_ENV') === 'production' ? __DIR__ . '/../cache/view' : false,
            ],
        ],

        // Monolog Settings
        'logger' => [
            'name'  => getenv('APP_NAME') ?: 'sample',
            'path'  => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Cross Origin Sharing Settings
        'cors' => [
            'origin' => getenv('APP_URL') ?: 'www.example.com',
        ],

        // Database Settings
        'db' => [
            'use' => getenv('APP_ENV') === 'production' ? 'mysql' : 'sqlite',
            'mysql' => [
                'write' => [
                    'host' => ['localhost'],
                ],
                'read' => [
                    'host' => ['localhost'],
                ],
                'sticky'    => true,
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'DB',
                'username'  => 'root',
                'password'  => 'pass',
                'charset'   => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix'    => '',
                'strict'    => true,
                'engine'    => null,
            ],
            'sqlite' => [
                'driver'   => 'sqlite',
                'database' => __DIR__ . '/../app.sqlite',
                'prefix'   => '',
            ],
        ],
    ],
];
