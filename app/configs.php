<?php
return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'view' => [
            'template_path' => __DIR__ . '/../resources/views',
            'twig' => [
                // 'cache' => __DIR__ . '/../cache/view'
            ],
        ],
    ],
];
