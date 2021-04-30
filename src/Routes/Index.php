<?php

namespace Escalafon\Routes;

use Slim\Factory\AppFactory;

class Index
{
    public function __construct()
    {
        $app = AppFactory::create();
        /*  //production mode
          $routeCollector = $app->getRouteCollector();
          $routeCollector->setCacheFile(__DIR__ . '/../../cache.php');*/
        new Config($app);
        
        new Access($app);
        
        new Administrador($app);
        
        $app->run();
    }
}