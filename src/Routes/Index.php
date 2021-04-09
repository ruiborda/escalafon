<?php


namespace Escalafon\Routes;


use Escalafon\Access\Log;
use Light\Light;

class Index
{
    public function __construct()
    {
        $app = new Light();
        $app->get('/', [Log::class, 'login']);
        $app->start();
    }
}