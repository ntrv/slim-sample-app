<?php
namespace App\Controller;

use \Psr\Container\ContainerInterface;

abstract class BaseController
{
    /** @var ContainerInterface */
    protected $container;

    public function __construct(ContainerInterface $c)
    {
        $this->container = $c;
    }
}
