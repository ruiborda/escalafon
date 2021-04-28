<?php


namespace Escalafon\Routes;


use Escalafon\Config\DataTables;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

class Config
{
    public function __construct(App &$app)
    {
        $app->get(
            '/datatables/config',
            function (Request $request, Response $response, $args) {
                $datables = new DataTables();
                $datables->config();
                return $response;
            }
        );
    }
}