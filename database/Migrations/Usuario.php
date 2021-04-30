<?php

namespace DataBase\Migrations;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Usuario extends Migration
{
    public function up(): void
    {
        Manager::schema()->create(
            'user',
            function (Blueprint $table) {
                $table->id();
                $table->enum(
                    'tipoIdentificacion',
                    [
                        'DNI',
                        'CARNET_DE_EXTRANJERIA'
                    ]
                );
                $table->integer('identificacion', false, true);
                $table->string('nombres', 50);
                $table->string('apellidoPaterno', 20);
                $table->string('apellidoMaterno', 20);
                $table->string('email', 100)->unique('usuario_email_unique');
                $table->string('password', 64);
                $table->timestamps();
                $table->charset   = 'utf8';
                $table->collation = 'utf8_general_ci';
            }
        );
    }
    
    public function down(): void
    {
        Manager::schema()->drop('user');
    }
    
    
}