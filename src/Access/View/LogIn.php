<?php

namespace Escalafon\Access\View;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogIn
{
    public function __construct()
    {
      
        // Otra forma de depurar/prueba es ver todas las cookies
        print_r($_COOKIE);
    }
    
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();
        require __DIR__ . '/../../views/access/login.phtml';
        return $response;
    }
    
}