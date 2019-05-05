<?php
namespace App\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use \Psr\Container\ContainerInterface;

use App\Exceptions\ErrorHandler;

class ErrorHandlerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['errorHandler'] = function (ContainerInterface $c) {
            return new ErrorHandler($c->get('settings')['displayErrorDetails']);
        };
    }
}
