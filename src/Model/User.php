<?php

namespace Escalafon\Model;

use Escalafon\Config\MySQLORM;

class User extends MySQLORM
{
    private const table = 'usuario';
    
    private int    $id;
    private int    $tipoIdentificacion;
    private int    $identificacion;
    private string $nombres;
    private string $apellidoPaterno;
    private string $apellidoMaterno;
    private string $email;
    private string $password;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * retorna usuario por identificacion
     *
     * @return array|null
     */
    public function getByIdentificacion(): array|null
    {
        return self::get(
            self::table,
            "*",
            [
                'identificacion' => $this->identificacion
            ]
        );
    }
    
    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    /**
     * @param int $tipoIdentificacion
     */
    public function setTipoIdentificacion(int $tipoIdentificacion): void
    {
        $this->tipoIdentificacion = $tipoIdentificacion;
    }
    
    /**
     * @param int $identificacion
     */
    public function setIdentificacion(int $identificacion): void
    {
        $this->identificacion = $identificacion;
    }
    
    /**
     * @param string $nombres
     */
    public function setNombres(string $nombres): void
    {
        $this->nombres = $nombres;
    }
    
    /**
     * @param string $apellidoPaterno
     */
    public function setApellidoPaterno(string $apellidoPaterno): void
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }
    
    /**
     * @param string $apellidoMaterno
     */
    public function setApellidoMaterno(string $apellidoMaterno): void
    {
        $this->apellidoMaterno = $apellidoMaterno;
    }
    
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}