<?php


namespace Escalafon\Libraries;


trait Header
{
    public static function json()
    {
        header("Content-Type: application/json; charset=UTF-8");
    }
    
    public static function location(string $url)
    {
        header('Location:' . $url);
    }
}