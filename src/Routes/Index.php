<?php

namespace Escalafon\Routes;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class Index
{
    public function __construct()
    {
        $app = AppFactory::create();
        
        new Config($app);
    
        new Access($app);
    
        new Administrador($app);
        
        $app->run();
    }
}