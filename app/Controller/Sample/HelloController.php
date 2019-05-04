<?php
namespace App\Controller\Sample;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use App\Controller\BaseController;

use \Psr\Container\ContainerInterface;

use \Slim\Views\Twig;

use App\Model\HelloInterface;
use App\Model\Hello;

class HelloController extends BaseController
{
    /** @var HelloInterface */
    private $hello;

    /** @var Twig */
    private $view;

    public function __construct(ContainerInterface $c)
    {
        parent::__construct($c);
        $this->view = $this->container->get('view');
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $hello = new Hello;
        $name = $args['name'];
        return $this->view->render($response, 'hello.twig', [
            'message' => $hello->withName($name)
        ]);
    }

    public function text(Request $request, Response $response, array $args): Response
    {
        $hello = new Hello;
        $name = $args['name'];
        $response->getBody()->write($hello->withName($name) . "\n");
        return $response;
    }
}
