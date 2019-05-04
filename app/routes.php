<?php
use App\Controller\Sample\HelloController;
use App\Middleware\CORSMiddleware;

$app->group('/api', function (\Slim\App $app) {
    //
})->add(new CORSMiddleware('www.google.com'));

$app->get('/hello/{name}', HelloController::class . ':withHtml');
$app->get('/hello/{name}/json', HelloController::class . ':withJson');
