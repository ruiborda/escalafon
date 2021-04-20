<?php


namespace Escalafon\Administrador\Index;


use Escalafon\Access\Log\Controller;
use Escalafon\Access\Log\Privilegio;

class View
{
    public function __construct()
    {
        $access = new Controller();
        $access->check_log(Privilegio::ADMINISTRADOR);
    }
    
    public function index()
    {
        require __DIR__ . '/../../views/administrador/index.phtml';
    }
}