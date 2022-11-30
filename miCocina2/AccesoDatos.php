<?php
require_once 'P';
class AccesoDatos{
    private $conexion = null;
    
    private $url="mysql:host=localhost;port=3306;dbname=micocina";
    private $us="micocina";
    private $ps="micocina";
    
    public function __construct() {
        try {
            $this->conexion = new PDO($this->url,
                $this->us,$this->ps);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    
    public function existeUsuario($email){
        try {
//            $consulta = $this->
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /**
     * @return mixed
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param mixed $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    
    
}
?>