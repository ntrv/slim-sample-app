<?php
require __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$configs = require __DIR__ . '/../app/configs.php';
$app = new \Slim\App($configs);

// Create DI Container
require __DIR__ . '/../app/dependencies.php';

// Register routes
require __DIR__ . '/../app/routes.php';

// Run app
$app->run();
