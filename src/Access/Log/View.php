<?php


namespace Escalafon\Access\Log;


class View
{
    public function login()
    {
        require __DIR__ . '/../../views/access/login.phtml';
    }
    
    public function login_error()
    {
        require __DIR__ . '/../../views/access/logout.phtml';
    }
}