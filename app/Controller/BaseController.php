<?php
namespace App\Controller;

use \Psr\Container\ContainerInterface;
use \Psr\Log\LoggerInterface;

abstract class BaseController
{
    /** @var ContainerInterface */
    protected $container;

    /** @var LoggerInterface */
    protected $logger;

    public function __construct(ContainerInterface $c)
    {
        $this->container = $c;
        $this->logger = $this->container->get('logger');
    }
}
