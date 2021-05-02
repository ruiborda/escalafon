<?php

declare(strict_types=1);

namespace Escalafon\Administrador\Usuario;


use Escalafon\Access\Log\Controller;
use Escalafon\Access\Log\Privilegio;
use Escalafon\Config\Database;
use Escalafon\Config\HTML;
use Escalafon\Model\User;

class View
{
    use HTML;
    
    public function __construct()
    {
        Controller::check_log(Privilegio::ADMINISTRADOR);
    }
    
    public function index()
    {
        $this->title = 'Usuarios';
        self::addButton(
            'Nuevo Usuario',
            'btn-primary btn-sm',
            '/administrador/usuario/create',
            '<i class="fas fa-plus"></i>'
        );
        self::active(self::$USUARIO, Method::usuarios);
        require __DIR__ . '/../../views/administrador/usuario/index.phtml';
    }
    
    public function create()
    {
        $this->title = 'Nuevo Usuario';
        self::active(self::$USUARIO, Method::create);
        require __DIR__ . '/../../views/administrador/usuario/create.phtml';
    }
    
    public function editar(int $id)
    {
        Database::load();
        $usuario = User::find($id);
        $this->title = 'Nuevo Usuario';
        self::active(self::$USUARIO, Method::create);
        require __DIR__ . '/../../views/administrador/usuario/editar.phtml';
    }
}