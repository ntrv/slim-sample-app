<?php
namespace App\Controller;

use \Psr\Container\ContainerInterface;

abstract class Controller
{
    /** @var Twig */
    protected $view;

    public function __construct(\Slim\Views\Twig $view)
    {
        $this->view = $view;
    }
}
