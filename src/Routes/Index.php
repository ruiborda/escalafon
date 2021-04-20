<?php


namespace Escalafon\Routes;


use Light\Light;

class Index
{
    public function __construct()
    {
        $app = new Light();
        
        new Access($app);
        
        new Administrador($app);
        
        $app->start();
    }
}