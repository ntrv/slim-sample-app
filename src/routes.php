<?php
namespace Sample;

use Sample\Controller\HelloController;

$app->get('/hello/{name}', HelloController::class . ':index');
