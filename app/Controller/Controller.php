<?php
namespace App\Controller;

use \Psr\Container\ContainerInterface;

abstract class Controller
{
    /** @var Twig */
    protected $view;

    public function __construct(ContainerInterface $container)
    {
        $this->view = $container->get('view');
    }
}
