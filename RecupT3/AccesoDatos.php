<?php

class AccesoDatos
{
    
    private $conexion = null;
    private $url="mysql:host=localhost;port=3306;dbname=gimnasio";
    private $us="root";
    private $ps="";
    
    public function __construct() {
        try {
            $this->conexion = new PDO($this->url,
                $this->us,$this->ps);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    
    public function obtenerActividades(){
        $resultado = array();
        try {
            $consulta = $this->conexion->query("select * 
                    from actividad where activa = 'ACTIVA'");
            while($fila=$consulta->fetch()){
                $resultado[]= new Actividad($fila["id"], 
                    $fila["nombre"], $fila["coste_mensual"], $fila["activa"]);
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    public function obtenerCliente($usuario){
        $resultado = null;
        try {
            $consulta = $this->conexion->prepare("select * from
                cliente where usuario = ?");
            $params=array($usuario);
            $consulta->execute($params);
            if($fila=$consulta->fetch()){
                $resultado = new Cliente($fila["id"], 
                    $fila["usuario"], $fila["dni"],
                    $fila["apellidos"],
                    $fila["nombre"], 
                    $fila["telf"], 
                    $fila["baja"]);
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerUsuario($usuario,$ps){
        $resultado = null;
        try {
           $consulta = $this->conexion->prepare("select * from 
                usuario where usuario = ? and clave=sha2(?,0)");
           $params=array($usuario,$ps);
           $consulta->execute($params);
           if($fila=$consulta->fetch()){
               $resultado = new Usuario($fila["usuario"], $fila["tipo"]);
           }
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    /**
     * @return PDO
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param PDO $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    
}

