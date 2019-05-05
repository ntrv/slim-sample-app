<?php
namespace App\Controller;

use \Psr\Container\ContainerInterface;
use \Psr\Log\LoggerInterface;

use App\Services\LoggerServiceProvider;
use App\Services\Database\EloquentServiceProvider;

use \Illuminate\Database\Capsule\Manager as Capsule;

abstract class BaseController
{
    /** @var LoggerInterface */
    protected $logger;

    /** @var Capsule */
    protected $db;

    public function __construct(ContainerInterface $c)
    {
        $this->logger = $c->get(LoggerServiceProvider::class);
        $this->db = $c->get(EloquentServiceProvider::class);
    }
}
