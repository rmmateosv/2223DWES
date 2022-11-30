<?php
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
    public function  crearUsuario($email,$ps1,$nombre,$dir,$telf){
       $resultado = false;
       try {
           $consulta = $this->conexion->prepare(
               "insert into usuario values (null,?,sha2(?,512),?,?,?,?,false)");
           $params = array($email,$ps1,$nombre,$dir,$telf,'C');
           $resultado=$consulta->execute($params);
           
       } catch (PDOException $e) {
           echo $e->getMessage();
       }
       return  $resultado;
    }
    public function existeUsuario($email){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare(
                "select * from usuario where email = ?");
            $params = array($email);
            $r = $consulta->execute($params);
            if($consulta->fetch()){
                $resultado =  true;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
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