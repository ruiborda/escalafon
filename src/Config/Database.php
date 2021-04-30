<?php


namespace Escalafon\Config;


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
class Database
{
    
    public static function load()
    {
        $config     = parse_ini_file(realpath(__DIR__ . "/../../eloquent.ini"), true, INI_SCANNER_TYPED);
        $driver     = $config['DB']['DRIVER'];
        $host       = $config['DB']['HOST'];
        $database   = $config['DB']['DATABASE'];
        $username   = $config['DB']['USERNAME'];
        $password   = $config['DB']['PASSWORD'];
        $charset    = $config['DB']['CHARSERT'];
        $collaction = $config['DB']['COLLATION'];
        $prefix     = $config['DB']['PREFIX'];
        
        $capsule = new Capsule;
        
        $capsule->addConnection(
            [
                'driver'    => $driver,
                'host'      => $host,
                'database'  => $database,
                'username'  => $username,
                'password'  => $password,
                'charset'   => $charset,
                'collation' => $collaction,
                'prefix'    => $prefix,
            ]
        );
        
        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();
        
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
   
    }
}