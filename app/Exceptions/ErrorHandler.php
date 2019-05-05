<?php
namespace App\Exceptions;

use \Slim\Handlers\Error;
use \Slim\Handlers\NotFound;
use \Slim\Exception\NotFoundException;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;

class ErrorHandler extends Error
{
    public function __construct(bool $displayErrorDetails)
    {
        parent::__construct($displayErrorDetails);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, \Exception $exception)
    {
        // Intercept Noop Exception
        if ($exception instanceof NotFoundException) {
            return (new NotFound())($request, $response);
        }

        return parent::__invoke($request, $response, $exception);
    }
}
