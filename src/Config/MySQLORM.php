<?php

namespace Escalafon\Config;

use Medoo\Medoo;
use PDO;

class MySQLORM extends Medoo
{
    public function __construct()
    {
        $config = parse_ini_file(realpath(__DIR__ . "/../../config.ini"), true, INI_SCANNER_TYPED);
        parent::__construct(
            [
                // [required]
                'type'      => $config['DB']['TYPE'],
                'host'      => $config['DB']['HOST'],
                'database'  => $config['DB']['DATABASE'],
                'username'  => $config['DB']['USERNAME'],
                'password'  => $config['DB']['PASSWORD'],
                
                // [optional]
                'charset'   => $config['DB']['CHARSET'],
                'collation' => $config['DB']['COLLATION'],
                'port'      => $config['DB']['PORT'],
                
                // [optional] Table prefix, all table names will be prefixed as PREFIX_table.
                ///'prefix'    => 'escalafon_',
                
                // [optional] Enable logging, it is disabled by default for better performance.
                //'logging'   => true,
                
                // [optional]
                // Error mode
                // Error handling strategies when error is occurred.
                // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
                // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
                ///ya se declaró en linea 44 "option"/'error'     => PDO::ERRMODE_SILENT,
                
                // [optional]
                // The driver_option for connection.
                // Read more from http://www.php.net/manual/en/pdo.setattribute.php.
                'option'    => [
                    PDO::ATTR_ERRMODE    => PDO::ERRMODE_SILENT,
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_CASE       => PDO::CASE_NATURAL
                ],
                
                // [optional] Medoo will execute those commands after connected to the database.
                /* 'command'   => [
                     'SET SQL_MODE=ANSI_QUOTES'
                 ]*/
            ]
        );
    }
}