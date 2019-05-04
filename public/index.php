<?php
require '../vendor/autoload.php';

// Instantiate the app
$configs = require __DIR__ . '../src/configs.php';
$app = new \Slim\App($configs);

require __DIR__ . '/../src/containers.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();
