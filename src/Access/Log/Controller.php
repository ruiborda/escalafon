<?php


namespace Escalafon\Access\Log;


use Escalafon\Model\Usuario;

class Controller
{
    public function login()
    {
        extract($_POST);
        $usuario = new Usuario();
        $usuario->setIdentificacion(intval($identificacion ?? false));
        $usuario->setPassword(strval($password ?? null));
        if ($usuario->login()) {
            echo json_encode([true, $recuerdame ?? false]);
        } else {
            echo json_encode([false, $recuerdame ?? false]);
        }
    }
}