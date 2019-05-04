<?php
use App\Controller\HelloController;
use App\Middleware\CORSMiddleware;


$app->add(new CORSMiddleware('www.google.com'));

$app->get('/hello/{name}', HelloController::class . ':index');
