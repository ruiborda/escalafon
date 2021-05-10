<?php


namespace Escalafon\Access\View;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogInError
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();
        require __DIR__ . '/../../views/access/logout.phtml';
        return $response;
    }
}