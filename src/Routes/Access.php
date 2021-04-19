<?php


namespace Escalafon\Routes;

use Escalafon\Access\Log;
use Light\Light;

class Access
{
    public function __construct(Light &$app)
    {
        $app->get('/', [Log\View::class, 'login']);
        $app->get('/login_error', [Log\View::class, 'login_error']);
        $app->get('/logout', [Log\Controller::class, 'logout']);
        $app->post('/login', [Log\Controller::class, 'login']);
    }
}