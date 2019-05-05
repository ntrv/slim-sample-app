<?php
namespace App\Bootstrap;

use \Psr\Container\ContainerInterface;

use App\Services\Sample\HelloServiceProvider;
use App\Services\LoggerServiceProvider;
use App\Services\TwigServiceProvider;
use App\Services\ErrorHandlerServiceProvider;

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
        // App Service Providers
        $this->registerServiceProviders([
            new ErrorHandlerServiceProvider(),
            new HelloServiceProvider(),
            new LoggerServiceProvider(),
            new TwigServiceProvider(),
        ]);
    }

    private function registerServiceProviders(array $providers)
    {
        foreach ($providers as $provider) {
            $this->container->register($provider);
        }
    }
}
