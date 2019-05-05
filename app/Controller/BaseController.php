<?php
namespace App\Controller;

use \Psr\Container\ContainerInterface;
use \Psr\Log\LoggerInterface;

abstract class BaseController
{
    /** @var LoggerInterface */
    protected $logger;

    public function __construct(ContainerInterface $c)
    {
        $this->logger = $c->get('logger');
    }
}
