<?php
namespace App\Bootstrap;

use \Psr\Container\ContainerInterface;

use App\Services\Sample\HelloServiceProvider;
use App\Services\LoggerServiceProvider;
use App\Services\TwigServiceProvider;
use App\Services\ErrorHandlerServiceProvider;
use App\Services\Database\EloquentServiceProvider;

class Dependencies
{
    /** @var ContainerInterface */
    private $container;

    public function __construct(\Slim\App $app)
    {
        $this->container = $app->getContainer();
    }

    public function __invoke()
    {
        // Application Service Providers
        $this->registerServiceProviders([
            ErrorHandlerServiceProvider::class,
            HelloServiceProvider::class,
            LoggerServiceProvider::class,
            TwigServiceProvider::class,
            EloquentServiceProvider::class,
        ]);
    }

    private function registerServiceProviders(array $providers)
    {
        foreach ($providers as $provider) {
            $this->container->register(new $provider());
        }
    }
}
