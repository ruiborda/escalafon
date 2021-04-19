<?php


namespace Escalafon\Routes;

use Escalafon\Access\Log;
use Light\Light;

class Access
{
    public function __construct(Light &$app)
    {
        $app->get('/', [Log\View::class, 'login']);
        $app->post('/login', [Log\Controller::class, 'login']);
    }
}