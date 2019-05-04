<?php
use App\Controller\HelloController;

$app->get('/hello/{name}', HelloController::class . ':index');
