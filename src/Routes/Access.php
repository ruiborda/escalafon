<?php

declare(strict_types=1);

namespace Escalafon\Routes;

use Slim\App;

class Access
{
    public function __construct(App &$app)
    {
        $app->get(
            '/',
            \Escalafon\Access\View\LogIn::class
        );
        $app->get(
            '/login_error',
            \Escalafon\Access\View\LogInError::class
        );
        $app->get(
            '/logout',
            \Escalafon\Access\Controller\LogOut::class
        );
        $app->post(
            '/login',
            \Escalafon\Access\Controller\login::class
        );
    }
}