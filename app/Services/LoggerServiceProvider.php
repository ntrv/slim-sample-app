<?php
namespace App\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use \Psr\Container\ContainerInterface;

class LoggerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['logger'] = function (ContainerInterface $c) {
            $setting = $c->get('settings')['logger'];
            $logger = new \Monolog\Logger($setting['name']);
            $logger->pushProcessor(new \Monolog\Processor\WebProcessor());
            $logger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor());
            $logger->pushHandler(new \Monolog\Handler\StreamHandler($setting['path'], $setting['level']));
            return $logger;
        };
    }
}
