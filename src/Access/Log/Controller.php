<?php


namespace Escalafon\Access\Log;

use Escalafon\Config\Database;
use Escalafon\Model\User;
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
        $identificacion = (int)($identificacion ?? false);
        
        Database::load();
        $usuario = User::where('identificacion', $identificacion)->first();
        
        if ($usuario === null) {
            return $res->withHeader('Location', '/login_error')->withStatus(302);
        } else {
            $password = (string)($password ?? null);
            $password = hash('sha256', $password);
            if (hash_equals($usuario->password, $password)) {
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
                $_SESSION['id']                 = $usuario->id;
                $_SESSION['tipoIdentificacion'] = $usuario->tipoIdentificacion;
                $_SESSION['identificacion']     = $usuario->identificacion;
                $_SESSION['nombres']            = $usuario->nombres;
                $_SESSION['apellidoPaterno']    = $usuario->apellidoPaterno;
                $_SESSION['apellidoMaterno']    = $usuario->apellidoMaterno;
                $_SESSION['email']              = $usuario->email;
                $_SESSION['privilegio']         = Privilegio::ADMINISTRADOR;
                return $res->withHeader('Location', '/administrador')->withStatus(302);
            } else {
                return $res->withHeader('Location', '/login_error')->withStatus(302);
            }
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