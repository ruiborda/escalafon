<?php


namespace Escalafon\Routes;


use Escalafon\Administrador\Index;
use Escalafon\Administrador\Usuario;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

class Administrador
{
    public function __construct(App &$app)
    {
        $app->get(
            '/administrador',
            function (Request $request, Response $response, $args) {
                (new Index\View())->index();
                return $response;
            }
        );
        $app->get(
            '/administrador/usuario',
            function (Request $request, Response $response, $args) {
                (new Usuario\View())->index();
                return $response;
            }
        );
        $app->get(
            '/administrador/usuario/dt_usuarios',
            function (Request $request, Response $response, $args) {
                (new Usuario\Controller())->dt_usuario();
                return $response;
            }
        );
        $app->get(
            '/administrador/usuario/create',
            function (Request $request, Response $response, $args) {
                (new Usuario\View())->create();
                return $response;
            }
        );
        $app->post(
            '/administrador/usuario/create',
            function (Request $request, Response $response, $args) {
                (new Usuario\Controller())->create();
                return $response;
            }
        );
    }
}