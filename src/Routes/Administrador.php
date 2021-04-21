<?php


namespace Escalafon\Routes;


use Escalafon\Administrador\Index;
use Escalafon\Administrador\Usuario;
use Light\Light;

class Administrador
{
    public function __construct(Light &$app)
    {
        $app->get('/administrador', [Index\View::class, 'index']);
        
        // usuario
        $app->get('/administrador/usuario', [Usuario\View::class, 'index']);
        $app->get('/administrador/usuario/dt_usuarios', [Usuario\Controller::class, 'dt_usuario']);
        $app->get('/administrador/usuario/create', [Usuario\View::class, 'create']);
        $app->post('/administrador/usuario/create', [Usuario\Controller::class, 'create']);
    }
}