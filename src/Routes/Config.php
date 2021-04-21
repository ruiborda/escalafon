<?php


namespace Escalafon\Routes;


use Escalafon\Config\DataTables;
use Light\Light;

class Config
{
    public function __construct(Light &$app)
    {
        $app->get('/datatables/config', [DataTables::class, 'config']);
    }
}