<?php
namespace App\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use \Psr\Container\ContainerInterface;

class TwigServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container[self::class] = function (ContainerInterface $c) {
            /** @var array */
            $config = $c->get('settings')['view'];

            $view = new \Slim\Views\Twig($config['template_path'], $config['twig']);
            return $view;
        };
    }
}
