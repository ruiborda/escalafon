<?php


namespace Escalafon\Access\Log;

use Escalafon\Model\Usuario;

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
    
    public function login()
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
            header('Location: /administrador');
        } else {
            header('Location:/login_error');
        }
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        session_unset();
        session_write_close();
        header("Location: /");
    }
}