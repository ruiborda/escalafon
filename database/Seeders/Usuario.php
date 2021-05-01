<?php


namespace DataBase\Seeders;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Usuario extends Seeder
{
    public function run()
    {
        Manager::table('usuario')->insert(
            [
                'id'                 => 1,
                'tipoIdentificacion' => 1,
                'identificacion'     => 12345678,
                'nombres'            => Str::random(10),
                'apellidoPaterno'    => Str::random(10),
                'apellidoMaterno'    => Str::random(10),
                'email'              => Str::random(10) . '@gmail.com',
                'password'           => hash('sha256', 'admin'),
            ]
        );
    }
}