<?php

namespace Escalafon\Routes;

use DI\Container;
use Escalafon\Config\Database;
use Escalafon\Model\User;
use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class Index
{
    public function __construct()
    {
        $container = new Container();
        
        // Set container to create App with on AppFactory.
        AppFactory::setContainer($container);
        
        $app = AppFactory::create();
        
        $container->set(
            'database',
            function () {
                return new Medoo(
                    [
                        'type'     => 'mysql',
                        'host'     => 'localhost',
                        'database' => 'escalafon',
                        'username' => 'root',
                        'password' => 'root'
                    ]
                );
            }
        );
        
        $app->get(
            '/test',
            function (Request $request, Response $response, $args) {
                $mysql = new User();
                
                return $response->write('hello worl');
            }
        );
        
        /*  //production mode
          $routeCollector = $app->getRouteCollector();
          $routeCollector->setCacheFile(__DIR__ . '/../../cache.php');*/
        new Config($app);
        
        new Access($app);
        
        new Administrador($app);
        
        $app->run();
    }
}