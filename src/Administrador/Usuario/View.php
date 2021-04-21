<?php


namespace Escalafon\Administrador\Usuario;


use Escalafon\Access\Log\Controller;
use Escalafon\Access\Log\Privilegio;
use Escalafon\Config\HTML;

class View
{
    use HTML;
    
    public function __construct()
    {
        Controller::check_log(Privilegio::ADMINISTRADOR);
    }
    
    public function index()
    {
        self::active(self::$USUARIO, Method::usuarios);
        require __DIR__ . '/../../views/administrador/usuario/index.phtml';
    }
}