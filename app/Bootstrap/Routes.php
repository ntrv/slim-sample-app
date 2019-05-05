<?php
namespace App\Bootstrap;

use App\Controller\Sample\HelloController;
use App\Middleware\CORSMiddleware;

class Routes
{
    /** @var \Slim\App */
    private $app;

    /** @var array */
    private $configs;

    public function __construct(\Slim\App $app)
    {
        $this->app = $app;
        $this->configs = $app->getContainer()->get('settings');
    }

    public function __invoke()
    {
        $this->app->group('/api', function (\Slim\App $app) {
            $app->get('/hello/{name}', HelloController::class . ':withJson');
        })->add(new CORSMiddleware($this->configs['cors']['origin']));

        $this->app->get('/hello/{name}', HelloController::class . ':withHtml');
    }
}
