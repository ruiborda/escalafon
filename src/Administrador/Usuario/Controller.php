<?php


namespace Escalafon\Administrador\Usuario;


use Escalafon\Libraries\Header;
use Escalafon\Libraries\MySQL;
use Escalafon\Libraries\SSP;

class Controller
{
    use Header;
    
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
                'db' => 'tipo_identificacion',
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
                    return "<a class='btn btn-sm btn-warning' href='/administrador/usuario/edit/${id}' ><i class='fas fa-edit'></i></a>"
                        . "<a class='btn btn-sm btn-danger' href='/administrador/usuario/delete/${id}' ><i class='fas fa-user-minus'></i></a>";
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
}