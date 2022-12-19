<?php

class AccesoDatos
{
    private  $conexion = null;
    
    private $url="mysql:host=localhost;port=3306;dbname=mensajes";
    private $us="root";
    private $ps="";
    public function __construct()
    {
        try {
            $this->conexion=new PDO($this->url,$this->us,$this->ps);
        } catch (Exception $e) {
        }
        
        
    }
    public function obtenerRecibidos(Empleado $emp) {
        $resultado = array();
        try {
            $consulta = $this->conexion->prepare(
                "select * from mensaje as m inner join departamento as d
                    on m.paraDepartamento = d.idDep
                    inner join para as p on p.idMen = m.idMen 
                    inner join empleado as e on e.idEmp = p.paraEmpleado    
                    where paraEmpleado = ? order by fechaEnvio desc");
            $params=array($emp->getIdEmp());
            $consulta->execute($params);
            while($fila=$consulta->fetch()){
                $resultado[] = new  Mensaje($fila['idMen'],
                    new Empleado($fila['idEmp'], $fila['dni'], $fila['nombreEmp'], 
                        $fila['fechaNac'], $fila['departamento'], $fila['cambiarPs']),
                    new Departamento($fila['idDep'], $fila['nombre']),
                    $fila['asunto'],
                    $fila['fechaEnvio'],
                    $fila['mensaje']);
            }
            
        } catch (Exception $e) {
            echo  $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerEnviados(Empleado $emp) {
        $resultado = array();
        try {
            $consulta = $this->conexion->prepare(
                "select * from mensaje inner join departamento 
                    on paraDepartamento = idDep
                    where deEmpleado = ? order by fechaEnvio desc");
            $params=array($emp->getIdEmp());
            $consulta->execute($params);
            while($fila=$consulta->fetch()){
                $resultado[] = new  Mensaje($fila['idMen'], 
                    $fila['deEmpleado'], 
                    new Departamento($fila['idDep'], $fila['nombre']), 
                    $fila['asunto'], 
                    $fila['fechaEnvio'], 
                    $fila['mensaje']);
            }
            
        } catch (Exception $e) {
            echo  $e->getMessage();
        }
        return $resultado;
    }
    public function enviarMensaje($de,$para,$asunto,$mensaje,$emples){
        $resultado = false;
        try {
           //Comenzar transacción
           $this->conexion->beginTransaction();
           //Inserta mensaje
           $consulta = $this->conexion->prepare(
               "insert into mensaje values (null,?,?,?,curdate(),?)");
           $params=array($de->getIdEmp(),$para,$asunto,$mensaje);
           $ok=$consulta->execute($params);
           if($ok){
              $idMensaje = $this->conexion->lastInsertId(); 
              foreach ($emples as $e){
                  $consulta = $this->conexion->prepare(
                      "insert into para values (?,?,false)");
                  $params=array($idMensaje,$e->getIdEmp());
                  $ok=$consulta->execute($params);
                  if(!$ok){
                      $this->conexion->rollBack();
                      return false;
                  }
              }
              $this->conexion->commit();
              return true;
           }
           else{
               //Hay error
               $this->conexion->rollBack();
           }
           //Insertar en para
        } catch (Exception $e) {
            $this->conexion->rollBack();
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerEmpleados($dep){
        $resultado = array();
        try {
            $consulta = $this->conexion->prepare(
                "select * from empleado where departamento = ?");
            $params = array($dep);
            $consulta->execute($params);            
            while($fila=$consulta->fetch()){
                $resultado[]= new Empleado(
                    $fila['idEmp'],
                    $fila['dni'], $fila['nombreEmp'],
                    $fila['fechaNac'], $fila['departamento'], $fila['cambiarPs']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerDptos() {
        $resultado = array();
        try {
            $consulta = $this->conexion->query("select * from departamento");
            while($fila=$consulta->fetch()){
                $resultado[]= new Departamento($fila['idDep'], $fila['nombre']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    public function obtenerEmpleado($emp,$ps) {
        $resultado = null;
        try {
           $consulta = $this->conexion->prepare(
               "select * from empleado inner join departamento 
                        on departamento = idDep 
                        where idEmp=? and ps = sha2(?,0)");
           $params = array($emp, $ps);
           $ok=$consulta->execute($params);
           if($ok){
               if($fila=$consulta->fetch()){
                   $resultado = new Empleado($fila[0], 
                       $fila['dni'], $fila['nombreEmp'], 
                       $fila['fechaNac'], new Departamento($fila['idDep'], $fila['nombre']), $fila['cambiarPs']);
               }
               
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

