<?php
namespace App\Services\Sample;

use Pimple\ServiceProviderInterface;

use Psr\Container\ContainerInterface;

class HelloServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $c)
    {
        //
    }
}
