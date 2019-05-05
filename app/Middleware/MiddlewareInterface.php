<?php
namespace App\Middleware;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Also can use Middleware
interface MiddlewareInterface
{
    public function __invoke(Request $request, Response $response, callable $next): Response;
}
