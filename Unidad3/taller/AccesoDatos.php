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
    
    public function insertarPieza(Reparacion $r, Pieza $p,$c){
        $resultado = false;
        try {
            //Comenzar transacción porque hay que hacer insert y update
            $this->conexion->beginTransaction();
            //Chequear si ya existe la pieza en la reparación, habría que hacer update
            //en vez de insert
            //Recorremos el array de piezas de $r
            $encontrado = false;
            foreach ($r->getPiezas() as $pi){
                if($pi->getPieza()->getCodigo()==$p->getCodigo()){
                    $encontrado = true;
                }
            }
            if($encontrado){
                //Hacer update en piezaReparación
                $consulta = $this->conexion->prepare("update piezareparacion 
                    set cantidad = cantidad + ? 
                    where reparacion = ? and pieza = ?");
                $params = array($c,$r->getId(),$p->getCodigo());
                $consulta->execute($params);
            }
            else{
                //Hacer insert en piezaReparación
                $consulta = $this->conexion->prepare("insert into piezareparacion 
                              values (?,?,?,?)");
                $params = array($r->getId(),$p->getCodigo(),$p->getPrecio(),$c);
                $consulta->execute($params);
            }
            
            //Acutalizar el stock
            $consulta = $this->conexion->prepare("update pieza 
                           set stock=stock - ? 
                           where codigo = ?");
            $params = array($c,$p->getCodigo());
            $consulta->execute($params);
            
            //Finaliza haciendo los cambios de forma definitiva
            $this->conexion->commit();
            $resultado = true;
        } catch (PDOException $e) {
            //Deshacer los cambios que se hayan realizado
            $this->conexion->rollBack();
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerPieza($codigo){
        $resultado = null;
        try {
            $consulta = $this->conexion->prepare("select * from pieza where codigo = ?");
            $params = array($codigo);
            $consulta->execute($params);
            if($fila=$consulta->fetch()){
                $resultado = new Pieza();
                $resultado->setCodigo($fila["codigo"]);
                $resultado->setClase($fila["clase"]);
                $resultado->setDescripcion($fila["descripcion"]);
                $resultado->setPrecio($fila["precio"]);
                $resultado->setStock($fila["stock"]);
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerReparacion($codigo){
        $resultado = null;
        try {
            $consulta = $this->conexion->prepare(
                "select * from reparacion as r inner join vehiculo as v
                    on r.coche = v.codigo
                    where coche = ? and pagado = false order by id desc limit 1");
            $params = array($codigo);
            $consulta->execute($params);
            if($fila=$consulta->fetch()){
                $resultado = new Reparacion();
                $resultado->setId($fila["id"]);
                
                //Crear vehículo
                $v = new Vehiculo();
                $v->setCodigo($codigo);
                $v->setMatricula($fila["matricula"]);
                $v->setColor($fila["color"]);
                $v->setTelefono($fila["telefono"]);
                $v->setEmail($fila["email"]);
                $v->setPropietario($fila["nombrePropietario"]);
                $resultado->setCoche($v);
                
                $resultado->setFecha($fila["fechaHora"]);
                $resultado->setTiempo($fila["tiempo"]);
                $resultado->setPagado($fila["pagado"]);
                
                //Piezas
                $consulta = $this->conexion->prepare(
                    "select * from reparacion as r inner join piezareparacion as pr 
                                on r.id = pr.reparacion 
                                inner join pieza as p on pr.pieza= p.codigo 
                              where r.id = ?");
                $params=array($resultado->getId());
                $consulta->execute($params);
                $piezas = array();
                while($fila=$consulta->fetch()){
                    //Rellenar piezaReparación en $resultado
                    $pr = new PiezaReparacion();
                    $pr->setRep($resultado);
                    $pr->setCantidad($fila["cantidad"]);
                    $pr->setImporte($fila["importe"]);
                    // Objeto pieza
                    $p = new Pieza();
                    $p->setCodigo($fila["pieza"]);
                    $p->setClase($fila["clase"]);
                    $p->setDescripcion($fila["descripcion"]);
                    $p->setPrecio($fila["precio"]);
                    $p->setStock($fila["stock"]);
                    $pr->setPieza($p);
                    //Añadir la pr a reparación
                    $piezas[]=$pr;                    
                }
                $resultado->setPiezas($piezas);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    public function obtenerPiezas(){
        $resultado = array();
        try {
            $datos = $this->conexion->query("select * from pieza");
            while($filas=$datos->fetch()){
                $p = new Pieza();
                $p->setCodigo($filas["codigo"]);
                $p->setClase($filas["clase"]);
                $p->setDescripcion($filas["descripcion"]);
                $p->setPrecio($filas["precio"]);
                $p->setStock($filas["stock"]);
                $resultado[]=$p;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    public function existeMatricula($matricula){
        $resultado = true;
        try {
            $consulta = $this->conexion->prepare("select * from vehiculo where matricula = ?");
            $params = array($matricula);
            $consulta->execute($params);
            if(!$consulta->fetch()){
                $resultado = false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function hayReparciones(Vehiculo $vSel){
        $resultado = true;
        try {
            $consulta = $this->conexion->prepare("select * from reparacion where coche = ?");
            $params = array($vSel->getCodigo());
            $consulta->execute($params);
            if(!$consulta->fetch()){
                $resultado = false;
            }
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
            if($numReg){
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
            if($numReg){
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
            if($numCoches){
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

