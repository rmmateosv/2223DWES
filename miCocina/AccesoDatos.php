<?php
require_once 'Usuario.php';
require_once 'Plato.php';

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
    
    public function ObtenerPlatos(){
        $resultado = array();
        try {
            $consulta = $this->conexion->query("select * from plato");
            while($fila=$consulta->fetch()){
                $p = new Plato($fila["id"], $fila["nombre"], 
                    $fila["tipo"], $fila["precio"], $fila["foto"], $fila["baja"]);
                $resultado[]=$p;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function crearPlato(Plato $p){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare(
                "insert into plato values (null,?,?,?,?,false)");
            $params = array($p->getNombre(),$p->getTipo(),
                $p->getPrecio(), $p->getFoto());
            return $consulta->execute($params);
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }        
        return  $resultado;
    }
    public function altaCliente($id){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare(
                "update usuario set baja=false where id = ?");
            $params = array($id);
            $resultado = $consulta->execute($params);
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    public function bajaCliente($id){
        $resultado = false;
        try {
           $consulta = $this->conexion->prepare(
               "update usuario set baja=true where id = ?");
           $params = array($id);
           $resultado = $consulta->execute($params);
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerClientes(){
        $resultado = array();
        try {
            $consulta = $this->conexion->query(
                "select * from usuario where perfil = 'C'");
            while ($fila=$consulta->fetch()) {
                $u = new Usuario($fila["id"], 
                    $fila["email"],
                    $fila["nombre"],
                    $fila["direccion"],
                    $fila["telefono"],
                    $fila["perfil"],
                    $fila["baja"]);
                //Añado cliente a resultado
                $resultado[]=$u;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerUsuario($email,$ps){
        $resultado = null; //Devolvemos un objeto Usuario, si no se encuentra null
       try {
           $consulta = $this->conexion->prepare(
               "select * from usuario where email = ? and clave = sha2(?,512)");
           $params = array($email,$ps);
           $consulta->execute($params);
           if($fila=$consulta->fetch()){
               //Creamos el usuario
               $resultado = new Usuario($fila["id"], 
                   $fila["email"], 
                   $fila["nombre"], 
                   $fila["direccion"], 
                   $fila["telefono"], 
                   $fila["perfil"], 
                   $fila["baja"]);
           }
       } catch (PDOException $e) {
           echo $e->getMessage();
       }
       return $resultado; 
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