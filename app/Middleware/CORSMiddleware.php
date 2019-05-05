<?php
namespace App\Middleware;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class CORSMiddleware implements MiddlewareInterface
{
    /** @var string */
    protected $origin;

    /** @var array */
    private const ALLOW_METHODS = ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'];

    /** @var array */
    private const ALLOW_HEADERS = ['X-Requested-With', 'Content-Type', 'Accept', 'Origin', 'Authorization'];

    public function __construct(string $origin = null)
    {
        $this->origin = $origin;
    }

    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $response = $next($request, $response);

        if (isset($this->origin)) {
            return $response
                ->withHeader('Access-Control-Allow-Origin', $this->origin)
                ->withHeader('Access-Control-Allow-Headers', implode(',', self::ALLOW_HEADERS))
                ->withHeader('Access-Control-Allow-Methods', implode(',', self::ALLOW_METHODS));
        }
        return $response;
    }
}
