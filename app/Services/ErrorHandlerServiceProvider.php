<?php
namespace App\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use \Psr\Container\ContainerInterface;

class ErrorHandlerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['errorHandler'] = function (ContainerInterface $c) {
            return new App\Exceptions\ErrorHandler($c->get('settings')['displayErrorDetails']);
        };
    }
}
