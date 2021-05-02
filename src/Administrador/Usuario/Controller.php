<?php


namespace Escalafon\Administrador\Usuario;


use Escalafon\Access\Log;
use Escalafon\Access\Log\Privilegio;
use Escalafon\Config\Database;
use Escalafon\Libraries\Header;
use Escalafon\Libraries\MySQL;
use Escalafon\Libraries\SSP;
use Escalafon\Model\User;
use Escalafon\Model\Usuario;

class Controller
{
    use Header;
    
    public function __construct()
    {
        Log\Controller::check_log(Privilegio::ADMINISTRADOR);
    }
    
    public function dt_usuario()
    {
        $table = 'usuario';
        
        $primaryKey = 'id';
        
        $columns = [
            [
                'db' => 'id',
                'dt' => 0
            ],
            [
                'db' => 'tipoIdentificacion',
                'dt' => 1
            ],
            [
                'db' => 'identificacion',
                'dt' => 2
            ],
            [
                'db' => 'nombres',
                'dt' => 3
            ],
            [
                'db' => 'apellidoPaterno',
                'dt' => 4
            ],
            [
                'db' => 'apellidoMaterno',
                'dt' => 5
            ],
            [
                'db'        => 'id',
                'dt'        => 6,
                'formatter' => function ($id, $row) {
                    return "<a class='btn btn-sm btn-warning' href='/administrador/usuario/editar/${id}' ><i class='fas fa-edit'></i></a>"
                        . "<a class='btn btn-sm btn-danger' href='/administrador/usuario/eliminar/${id}' ><i class='fas fa-user-minus'></i></a>";
                }
            ]
        ];
        self::json();
        echo json_encode(
            SSP::simple(
                $_GET,
                (new MySQL())->getDbh(),
                $table,
                $primaryKey,
                $columns
            )
        );
    }
    
    public function create()
    {
        extract($_POST);
        $usuario = new Usuario();
        $usuario->setTipoIdentificacion(intval($tipo_identificacion ?? 1));
        $usuario->setIdentificacion(intval($identificacion ?? false));
        $usuario->setNombres($nombres ?? null);
        $usuario->setApellidoPaterno($apellidoPaterno ?? null);
        $usuario->setApellidoMaterno($apellidoMaterno ?? null);
        $usuario->setEmail($email ?? null);
        $usuario->setPassword($password ?? null);
        if ($usuario->create()) {
            $stmt = $usuario->getDbh();
            self::location('/administrador/usuario/edit/' . $stmt->lastInsertId());
        } else {
            echo "ocurrio un error";
        }
    }
    
    public function editar()
    {
        extract($_POST);
        Database::load();
        $user = new User;
        $user->insert(
            [
                'tipoIdentificacion' => 'DNI',
                'identificacion'     => '73514923',
                'nombres'            => 'JOSE',
                'apellidoPaterno'    => 'BORDA',
                'apellidoMaterno'    => 'HURTADO',
                'email'              => 'BORDARUI@GMAIL.COM',
                'password'           => 'admin'
            ]
        );
    }
}