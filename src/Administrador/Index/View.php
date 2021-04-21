<?php


namespace Escalafon\Administrador\Index;


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
        $this->title = 'Inicio';
        self::active(self::$DASHBOARD, Method::inicio);
        require __DIR__ . '/../../views/administrador/index.phtml';
    }
}