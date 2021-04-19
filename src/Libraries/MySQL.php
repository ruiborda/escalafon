<?php


namespace Escalafon\Libraries;


use PDO;

class MySQL
{
    /**#@+
     * Configuración de MySQL
     *
     * @access private
     * @var string
     */
    /**
     * Almacena la funcion PDO
     *
     * @var PDO
     */
    private $dbh;
    /**
     * Guarda la Conexión
     * stmt
     *
     * @var mixed
     */
    private $stmt;
    /**#@-*/
    
    /**
     * Mysql constructor.
     */
    public function __construct()
    {
        $config = parse_ini_file(realpath("../config.ini"), true, INI_SCANNER_TYPED);
        
        $dsn       = "mysql:host=" . $config['DB']['HOST'] . ";dbname=" . $config['DB']['NAME'] . ";charset=" . $config['DB']['ENCODING'];
        $this->dbh = new PDO(
            $dsn, $config['DB']['USER'], $config['DB']['PASSWORD'], [
                    PDO::ATTR_PERSISTENT => $config['DB']['ATTR_PERSISTENT'],
                    PDO::ATTR_ERRMODE    => $config['DB']['ATTR_ERRMODE'],
                ]
        );
        /* develop configuration
         *  try {
             $this->dbh = new PDO($dsn, $this->user, $this->pass, $this->options);
         } catch (PDOException $Exception) {
             echo $Exception->getMessage();
         }*/
    }
    
    /**
     * @return PDO
     */
    public function getDbh(): PDO
    {
        return $this->dbh;
    }
    
    /**
     * sentencia SQL
     *
     * @param $sql
     */
    public function prepare($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    /**
     * Filtrado de parametros
     *
     * @param      $parametro
     * @param      $valor
     * @param null $tipo
     */
    public function bindParam($parametro, $valor, $tipo = null)
    {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindParam($parametro, $valor, $tipo);
    }
    
    /**
     * exjecutar sentencias preparadas
     *
     * @return mixed
     */
    public function execute()
    {
        return $this->stmt->execute();
    }
    
    /**
     * devuelve un solo registro
     *
     * @param int $type
     *
     * @return mixed
     */
    public function fetch($type = PDO::FETCH_OBJ)
    {
        return $this->stmt->fetch($type);
    }
    
    /**
     * devuelvo varios registros
     *
     * @param int $type
     *
     * @return mixed
     */
    public function fetchAll($type = PDO::FETCH_OBJ)
    {
        return $this->stmt->fetchAll($type);
    }
    
    /**
     * cuenta el numero de filas de la ejecucion
     *
     * @return mixed
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    
    /**
     * ID de la ultima insercion
     *
     * @return mixed
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
    
    /**
     * cerrar el Cursor
     *
     * @return void
     */
    public function closeCursor()
    {
        $this->stmt->closeCursor();
    }
    
    /**
     * @return mixed
     */
    public function errorInfo()
    {
        return $this->stmt->errorInfo();
    }
}