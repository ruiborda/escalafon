<?php

namespace Escalafon\Access\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogOut
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();
        session_destroy();
        session_unset();
        session_write_close();
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}