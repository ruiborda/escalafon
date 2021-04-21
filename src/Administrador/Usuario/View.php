<?php


namespace Escalafon\Administrador\Usuario;


use Escalafon\Access\Log\Controller;
use Escalafon\Access\Log\Privilegio;

class View
{
    public function __construct()
    {
        Controller::check_log(Privilegio::ADMINISTRADOR);
    }
    
    public function index()
    {
        require __DIR__ . '/../../views/administrador/usuario/index.phtml';
    }
}