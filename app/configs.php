<?php
return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

        // Renderer Settings
        'view' => [
            'template_path' => __DIR__ . '/../resources/views',
            'twig' => [
                // 'cache' => __DIR__ . '/../cache/view'
            ],
        ],

        // Monolog Settings
        'logger' => [
            'name' => getenv('APP_NAME') ?: 'sample',
            'path'  => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Cross Origin Sharing Settings
        'cors' => [
            'origin' => 'www.example.com',
        ],
    ],
];
