<?php


namespace Escalafon\Access\Log;


class View
{
    public function login()
    {
        session_start();
        require __DIR__ . '/../../views/access/login.phtml';
    }
    
    public function login_error()
    {
        session_start();
        require __DIR__ . '/../../views/access/logout.phtml';
    }
}