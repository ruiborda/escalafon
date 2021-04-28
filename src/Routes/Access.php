<?php


namespace Escalafon\Routes;

use Escalafon\Access\Log;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

class Access
{
    public function __construct(App &$app)
    {
        $app->get(
            '/',
            function (Request $request, Response $response, $args) {
                (new Log\View())->login();
                return $response;
            }
        );
        $app->get(
            '/login_error',
            function (Request $request, Response $response, $args) {
                (new Log\View())->login_error();
                return $response;
            }
        );
        $app->get(
            '/logout',
            function (Request $request, Response $response, $args) {
                (new Log\Controller())->logout();
                return $response;
            }
        );
        $app->post(
            '/login',
            function (Request $request, Response $response, $args) {
                (new Log\Controller())->login();
                return $response;
            }
        );
    }
}