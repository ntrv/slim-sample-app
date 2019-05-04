<?php
namespace App\Exceptions;

use \Slim\Handlers\Error;
use Slim\Handlers\NotFound;

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
        if ($exception instanceof \Exception) {
            return (new NotFound())($request, $response);
        }

        return parent::__invoke($request, $response, $exception);
    }
}
