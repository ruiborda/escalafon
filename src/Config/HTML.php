<?php


namespace Escalafon\Config;


trait HTML
{
    public static $DASHBOARD = 0;
    public static $USUARIO   = 1;
    
    public static $dafault_link_icon = '<i class="far fa-circle nav-icon"></i>';
    
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
    
    public array $buttons = [];
    
    public function active(int $menu, int $index)
    {
        $this->nav[$menu]['active']                 = 'active';
        $this->nav[$menu]['menu_open']              = 'menu-open';
        $this->nav[$menu]['menu'][$index]['active'] = 'active';
    }
    
    public function addButton(string $name, string $class, string $link, string $icon = null)
    {
        $this->buttons[] = [
            'name'  => $name,
            'class' => $class,
            'link'  => $link,
            'icon'  => $icon,
        ];
    }
}