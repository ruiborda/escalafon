<?php


namespace Escalafon\Routes;


use Escalafon\Administrador\Index;
use Light\Light;

class Administrador
{
    public function __construct(Light &$app)
    {
        $app->get('/administrador', [Index\View::class, 'index']);
    }
}