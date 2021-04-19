<?php


namespace Escalafon\Model;


use Escalafon\Libraries\MySQL;

class Usuario extends MySQL implements CRUD
{
    private int    $id;
    private int    $tipo_identificacion;
    private int    $identificacion;
    private string $nombres;
    private string $apellidoPaterno;
    private string $apellidoMaterno;
    private string $email;
    private string $password;
    
    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    /**
     * @param int $tipo_identificacion
     */
    public function setTipoIdentificacion(int $tipo_identificacion): void
    {
        $this->tipo_identificacion = $tipo_identificacion;
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
    
    /**
     * @return bool
     */
    public function create(): bool
    {
        // TODO: Implement create() method.
    }
    
    /**
     * @return object
     */
    public function read(): object
    {
        self::prepare("select * from usuario where id=?");
        self::bindParam(1, $this->id);
        self::execute();
        return self::fetch();
    }
    
    /**
     * @return bool
     */
    public function update(): bool
    {
        // TODO: Implement update() method.
    }
    
    /**
     * @return bool
     */
    public function delete(): bool
    {
        // TODO: Implement delete() method.
    }
    
    /**
     * @return mixed
     */
    public function read_all()
    {
        // TODO: Implement read_all() method.
    }
    
    /**
     * Verifica usuario donde identificacion y password coincidan en la base de datos
     *
     * @return bool
     */
    public function login(): bool
    {
        self::prepare("select * from usuario where identificacion=? and password=sha2(?,256)");
        self::bindParam(1, $this->identificacion);
        self::bindParam(2, $this->password);
        self::execute();
        if (boolval(self::rowCount()) == true) {
            return true;
        } else {
            return false;
        }
    }
}