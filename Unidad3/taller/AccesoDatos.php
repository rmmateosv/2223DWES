<?php
namespace taller;

use PDOException;
use PDO;

class AccesoDatos
{
    private $conexion;
    
    //private $url = "mysql:host=127.0.0.1;port=3306;dbname=taller"; //URl de la BD
    private $url = "mysql:host=localhost;port=3306;dbname=taller"; //URl de la BD
    private $us="root";//
    private $ps="";    //Contraseña de usuario
 

    public function __construct()
    {
        try {
            //Conexion
            $this->conexion = new PDO($this->url,$this->us,$this->ps);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    public function hayReparciones($vSel){
        $resultado = true;
        try {
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    public function borrarVehiculo($vSel){
        $resultado = "Error, al borrar el vehículo";
        try {
            $consulta = $this->conexion->prepare("delete from vehiculo where codigo = ?");
            $params = array($vSel->getCodigo());
            $numReg = $consulta->execute($params);
            if($numReg==1){
                $resultado = "Vehículo borrado";
            }
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $resultado;
    }
    public function modificarVehiculo($vSel){
        $resultado = "Error, al modificar el vehículo";
        try {
            $consulta = $this->conexion->prepare("update vehiculo set 
                nombrePropietario = ?, matricula = ?, color = ?,
                telefono = ?, email = ? 
                where codigo = ?");
            $params = array($vSel->getPropietario(), $vSel->getMatricula(),$vSel->getColor(),
                            $vSel->getTelefono(), $vSel->getEmail(),$vSel->getCodigo());
            $numReg = $consulta->execute($params);
            if($numReg==1){
                $resultado = "Vehículo modificado";
            }
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerVehiculo($codigo){
        $resultado=null;
        try {
            $consulta = $this->conexion->prepare("select * from vehiculo where codigo = ?");
            $params = array($codigo);
            $consulta->execute($params);
            if($fila=$consulta->fetch()){
                $resultado = new Vehiculo();
                $resultado->setCodigo($fila["codigo"]);
                $resultado->setPropietario($fila["nombrePropietario"]);
                $resultado->setMatricula($fila["matricula"]);
                $resultado->setColor($fila["color"]);
                $resultado->setTelefono($fila["telefono"]);
                $resultado->setEmail($fila["email"]);
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return  $resultado;
        
    }
    public function obtenerPrimerVehiculo(){
        $resultado=null;
        try {
            $datos = $this->conexion->query("select * from vehiculo order by codigo limit 1");
            if($fila=$datos->fetch()){
                $resultado = new Vehiculo();
                $resultado->setCodigo($fila["codigo"]);
                $resultado->setPropietario($fila["nombrePropietario"]);
                $resultado->setMatricula($fila["matricula"]);
                $resultado->setColor($fila["color"]);
                $resultado->setTelefono($fila["telefono"]);
                $resultado->setEmail($fila["email"]);
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return  $resultado;
        
    }
    public function crearVehiculo(Vehiculo $v){
        $resultado=-1;
        try {
            //Creamos consulta con parámetros
            $consulta = $this->conexion->prepare("insert into vehiculo values (null,?,?,?,?,?)");
            //Rellenar los parámetros con los datos que vienen en v
            $params = array($v->getPropietario(),$v->getMatricula(),
                            $v->getColor(),$v->getTelefono(),$v->getEmail());
            //Ejecutar la consulta
            $numCoches = $consulta->execute($params);
            if($numCoches==1){
                //Devolvemos el código del coche que se ha insertado
                $resultado=$this->conexion->lastInsertId();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerVehiculos(){
        $resultado=array();
        try {
            //Ejecuto consulta select
            $datos = $this->conexion->query("select * from vehiculo order by codigo");
            //Recorremos $datos para pasar el resultado del select al array $resultado
            while($fila=$datos->fetch()){ //$filas es un array asociativo con los datos y también array escalar
                $v = new Vehiculo();
                $v->setCodigo($fila["codigo"]);
                $v->setPropietario($fila["nombrePropietario"]);
                $v->setMatricula($fila[2]); // Campo matricula es el tercer campo de la tabla
                $v->setColor($fila[3]);
                $v->setTelefono($fila["telefono"]);
                $v->setEmail($fila[5]);
                $resultado[]=$v; //Añadimos $v al resultado.
            }
            
        } catch (PDOException $e) {
            $e->getMessage();
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

