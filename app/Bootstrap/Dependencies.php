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
        $this->container['errorHandler'] = function (ContainerInterface $c) {
            return new App\Exceptions\ErrorHandler($c->get('settings')['displayErrorDetails']);
        };

        // App Service Providers
        $this->container->register(new HelloServiceProvider());

        // View Renderer
        $this->container['view'] = function (ContainerInterface $c) {
            /** @var array */
            $config = $c->get('settings')['view'];

            $view = new \Slim\Views\Twig($config['template_path'], $config['twig']);
            return $view;
        };

        // Logger
        $this->container['logger'] = function (ContainerInterface $c) {
            $setting = $c->get('settings')['logger'];
            $logger = new \Monolog\Logger($setting['name']);
            $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
            $logger->pushHandler(new \Monolog\Handler\StreamHandler($setting['path'], $setting['level']));
            return $logger;
        };
    }
}
