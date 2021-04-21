<?php


namespace Escalafon\Config;


trait HTML
{
    public static $DASHBOARD = 0;
    public static $USUARIO   = 1;
    
    public        $nav
        = [
            [
                'name' => 'Dashboard',
                'icon' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
                'menu' => [
                    [
                        'name' => 'Inicio',
                        'link' => '/administrador'
                    ]
                ]
            ],
            [
                'name' => 'Usuario',
                'menu' => [
                    [
                        'name' => 'Usuarios',
                        'link' => '/administrador/usuario'
                    ]
                ]
            ]
        ];
    public string $title;
    public string $h1;
    public string $link;
    public string $class_name;
    
    public function active(int $menu, int $index)
    {
        $this->nav[$menu]['active']                 = 'active';
        $this->nav[$menu]['menu_open']              = 'menu-open';
        $this->nav[$menu]['menu'][$index]['active'] = 'active';
    }
}