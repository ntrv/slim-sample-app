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
                'cache' => getenv('APP_ENV') === 'production' ? __DIR__ . '/../cache/view' : false,
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
            'origin' => getenv('APP_URL') ?: 'www.example.com',
        ],
    ],
];
