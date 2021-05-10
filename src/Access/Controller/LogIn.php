<?php

namespace Escalafon\Access\Controller;

use Escalafon\Access\Privilegio;
use Escalafon\Model\User;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogIn
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        extract($_POST);
        $identificacion = (int)($identificacion ?? 0);
        $password       = (string)($password ?? null);
        $recuerdame     = (string)($recuerdame ?? null);
        
        $usuario = new User();
        
        $usuario->setIdentificacion($identificacion);
        
        $result = $usuario->getByIdentificacion();
        
        if (is_null($result)) {
            return $response->withHeader('Location', '/login_error')->withStatus(203);
        } else {
            if (hash_equals($result['password'], hash('sha256', $password))) {
                if ($recuerdame == "on") {
                    session_start(
                        [
                            'cookie_lifetime' => 86400,
                        ]
                    );
                } else {
                    session_start(
                        [
                            'cookie_lifetime' => 3600,
                        ]
                    );
                }
                $_SESSION['id']                 = $result['id'];
                $_SESSION['tipoIdentificacion'] = $result['tipoIdentificacion'];
                $_SESSION['identificacion']     = $result['identificacion'];
                $_SESSION['nombres']            = $result['nombres'];
                $_SESSION['apellidoPaterno']    = $result['apellidoPaterno'];
                $_SESSION['apellidoMaterno']    = $result['apellidoMaterno'];
                $_SESSION['email']              = $result['email'];
                $_SESSION['privilegio']         = Privilegio::ADMINISTRADOR;
                return $response->withHeader('Location', '/administrador')->withStatus(302);
            } else {
                return $response->withHeader('Location', '/login_error')->withStatus(302);
            }
        }
    }
}