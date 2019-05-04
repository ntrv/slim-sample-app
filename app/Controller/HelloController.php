<?php
namespace App\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use App\Model\HelloInterface;

use \Psr\Container\ContainerInterface;
use App\Model\Hello;

class HelloController extends Controller
{
    /** @var HelloInterface */
    private $hello;

    public function __constract(ContainerInterface $container)
    {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $hello = new Hello;
        $name = $args['name'];
        $response->getBody()->write($hello->withName($name) . "\n");
        return $response;
    }
}
