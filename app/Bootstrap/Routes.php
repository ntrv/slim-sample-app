<?php
namespace App\Bootstrap;

use App\Controller\Sample\HelloController;
use App\Middleware\CORSMiddleware;

class Routes
{
    /** @var \Slim\App */
    private $app;

    public function __construct(\Slim\App $app)
    {
        $this->app = $app;
    }

    public function __invoke()
    {
        $this->app->group('/api', function (\Slim\App $app) {
            //
        })->add(new CORSMiddleware('www.google.com'));

        $this->app->get('/hello/{name}', HelloController::class . ':withHtml');
        $this->app->get('/hello/{name}/json', HelloController::class . ':withJson');
    }
}
