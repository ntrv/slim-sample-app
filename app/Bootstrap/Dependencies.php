<?php
namespace App\Bootstrap;

use \Psr\Container\ContainerInterface;

use App\Services\Sample\HelloServiceProvider;

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
        // Custom Error Handler
        $this->registerCustomErrorHandler();

        // App Service Providers
        $this->registerServiceProviders([
            new HelloServiceProvider(),
        ]);

        // View Renderer
        $this->registerTwig();

        // Logger
        $this->registerLogger();
    }

    private function registerCustomErrorHandler()
    {
        $this->container['errorHandler'] = function (ContainerInterface $c) {
            return new App\Exceptions\ErrorHandler($c->get('settings')['displayErrorDetails']);
        };
    }

    private function registerServiceProviders(array $providers)
    {
        foreach ($providers as $provider) {
            $this->container->register($provider);
        }
    }

    private function registerTwig()
    {
        $this->container['view'] = function (ContainerInterface $c) {
            /** @var array */
            $config = $c->get('settings')['view'];

            $view = new \Slim\Views\Twig($config['template_path'], $config['twig']);
            return $view;
        };
    }

    private function registerLogger()
    {
        $this->container['logger'] = function (ContainerInterface $c) {
            $setting = $c->get('settings')['logger'];
            $logger = new \Monolog\Logger($setting['name']);
            $logger->pushProcessor(new \Monolog\Processor\WebProcessor());
            $logger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor());
            $logger->pushHandler(new \Monolog\Handler\StreamHandler($setting['path'], $setting['level']));
            return $logger;
        };
    }
}
