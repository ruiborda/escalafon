<?php


namespace Escalafon\Config;


use Escalafon\Libraries\Header;

class DataTables
{
    use Header;
    public function config()
    {
        self::json();
        echo json_encode([
                             "sProcessing" => "Procesando...",
                             "sLengthMenu" => "Mostrar _MENU_ registros",
                             "sZeroRecords" => "No se encontraron resultados",
                             "sEmptyTable" => "Ningún dato disponible en esta tabla",
                             "sInfo" => "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                             "sInfoEmpty" => "Mostrando registros del 0 al 0 de un total de 0 registros",
                             "sInfoFiltered" => "(filtrado de un total de _MAX_ registros)",
                             "sInfoPostFix" => "",
                             "sSearch" => "Buscar:",
                             "sUrl" => "",
                             "sInfoThousands" => ",",
                             "sLoadingRecords" => "Cargando...",
                             "oPaginate" => [
                                 "sFirst" => "Primero",
                                 "sLast" => "Último",
                                 "sNext" => "<i class=\"fas fa-angle-right\"></i>",
                                 "sPrevious" => "<i class=\"fas fa-angle-left\"></i>"
                             ],
                             "oAria" => [
                                 "sSortAscending" => ": Activar para ordenar la columna de manera ascendente",
                                 "sSortDescending" => ": Activar para ordenar la columna de manera descendente"
                             ]
                         ]);
    }
}