<?php
namespace Sample\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Sample\Model\HelloInterface;

use \Psr\Container\ContainerInterface;
use Sample\Model\Hello;

class HelloController
{
    #/** @var HelloInterface */
    private $hello;

    public function __constract(ContainerInterface $container)
    {
        #parent::__construct($container);
        $this->hello = $container->get('model.hello');
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        if (isset($this)) {
            echo ('<pre>');
            print_r($this);
            echo ('</pre>');
        };
        $hello = new Hello;
        $name = $args['name'];
        $response->getBody()->write($hello->withName($name) . "\n");
        return $response;
    }
}
