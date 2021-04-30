<?php


namespace Escalafon\Access\Log;

use Escalafon\Model\Usuario;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller
{
    public static function check_log(int $privilegio)
    {
        session_start();
        if (($_SESSION["privilegio"] ?? 0) === $privilegio) {
            return;
        } else {
            header('Location: /');
            exit('Unauthorized');
        }
    }
    
    public static function login(Request &$req, Response &$res): Response
    {
        extract($_POST);
        $usuario = new Usuario();
        $usuario->setIdentificacion(intval($identificacion ?? false));
        $usuario->setPassword(strval($password ?? null));
        $login = $usuario->login();
        if (is_object($login)) {
            if (($recuerdame ?? null) == "on") {
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
            $_SESSION['id']                  = $login->id;
            $_SESSION['tipo_identificacion'] = $login->tipo_identificacion;
            $_SESSION['identificacion']      = $login->identificacion;
            $_SESSION['nombres']             = $login->nombres;
            $_SESSION['apellidoPaterno']     = $login->apellidoPaterno;
            $_SESSION['apellidoMaterno']     = $login->apellidoMaterno;
            $_SESSION['email']               = $login->email;
            $_SESSION['privilegio']          = Privilegio::ADMINISTRADOR;
            return $res->withHeader('Location', '/administrador')->withStatus(302);
        } else {
            return $res->withHeader('Location', '/login_error')->withStatus(302);
        }
    }
    
    public static function logout(Request &$req, Response &$res): Response
    {
        session_start();
        session_destroy();
        session_unset();
        session_write_close();
        return $res->withHeader('Location', '/')->withStatus(302);
    }
}