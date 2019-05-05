<?php
require __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$configs = require __DIR__ . '/../app/configs.php';
$app = new \Slim\App($configs);

session_start();

// Create DI Container
(new App\Bootstrap\Dependencies($app))();

// Register routes
(new App\Bootstrap\Routes($app))();

// Run app
$app->run();
