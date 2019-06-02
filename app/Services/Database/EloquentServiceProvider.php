<?php
namespace App\Services\Database;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use \Psr\Container\ContainerInterface;

use \Illuminate\Database\Capsule\Manager as Capsule;

class EloquentServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container[self::class] = function (ContainerInterface $c) {
            $config = $c->get('settings')['db'];

            $capsule = new Capsule;
            $capsule->addConnection($config[$config['use']]); // connection name is default

            // Make this Capsule instance available globally via static methods... (optional)
            $capsule->setAsGlobal();

            // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
            $capsule->bootEloquent();

            return $capsule;
        };
    }
}
