<?php
namespace App\Controller;

use \Psr\Container\ContainerInterface;
use \Slim\Views\Twig;

use App\Services\TwigServiceProvider;

abstract class HtmlController extends BaseController
{
    /** @var Twig */
    protected $view;

    public function __construct(ContainerInterface $c)
    {
        parent::__construct($c);
        $this->view = $c->get(TwigServiceProvider::class);
    }
}
