<?php

namespace Escalafon\Routes;

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