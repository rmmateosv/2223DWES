<?php
require_once 'usuario.php';
require_once 'plato.php';
require_once 'pedido.php';
require_once 'detalle.php';
class AccesoDatos{
    const HOST="localhost";
    const PUERTO = "3306";
    const USUARIO="root";
    const CLAVE="";
    const BD="miCocina";
    
    private $dsn = "mysql:host=".AccesoDatos::HOST.";port=".AccesoDatos::PUERTO.";dbname=".AccesoDatos::BD;
    
    private $conexion;
    
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

    function __construct(){
        try {
            $this->conexion = new PDO($this->dsn,AccesoDatos::USUARIO,AccesoDatos::CLAVE);
            
        } catch (Exception $e) {
            echo "<br/>Error capturado";
            echo $e->getMessage();
        }
    }
    
    function existeEmail($email){
        
        try {
            $consulta = $this->conexion->prepare("select email from usuario where email = ?");
            $consulta->execute(array($email));
            if($consulta->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    function altaUsuario($email,$ps,$nombre,$dir,$telf){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare("insert into usuario values(null,?,sha2(?,512),?,?,?,'C', false)");
            $consulta->execute(array($email,$ps,$nombre,$dir,$telf));
            if($consulta->rowCount()>0){
                $resultado = true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    function obtenerUsuario($email,$ps){
        $resultado = null;
        try {
            $consulta = $this->conexion->prepare("select * from usuario where email = ? and clave = sha2(?,512) and baja = false");
            $consulta->execute(array($email,$ps));
            if($consulta->rowCount()==1){
                $fila=$consulta->fetch();
                $resultado = new Usuario($fila[0],
                    $fila[1],$fila[2],$fila[3],
                    $fila[4],$fila[5],$fila[6],$fila[7]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    function obtenerUsuarios(){
        $resultado = new ArrayObject();
        try {
            $datos = $this->conexion->query("select * from usuario where perfil = 'C' order by nombre");
            if($datos!==false){
                while($fila=$datos->fetch()){
                    $resultado->append(new Usuario($fila[0],
                        $fila[1],$fila[2],$fila[3],
                        $fila[4],$fila[5],$fila[6],$fila[7]));
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    function bajaUsuario($id){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare("update usuario set baja = true where id = ?");
            $consulta->execute(array($id));
            if($consulta->rowCount()>0){
                $resultado = true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    function crearPlato($nombre, $tipo, $precio, $foto){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare("insert into plato values(null,?,?,?,?,false)");
            $consulta->execute(array($nombre,$tipo, $precio, $foto));
            if($consulta->rowCount()>0){
                $resultado = true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
        
    }
    function bajaPlato($id){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare("update plato set baja = true where id = ?");
            $consulta->execute(array($id));
            if($consulta->rowCount()>0){
                $resultado = true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    function obtenerPlatos(){
        $resultado = new ArrayObject();
        try {
            $datos = $this->conexion->query("select * from plato order by nombre");
            if($datos!==false){
                while($fila=$datos->fetch()){
                    $resultado->append(new Plato($fila[0],
                        $fila[1],$fila[2],$fila[3],
                        $fila[4],$fila[5]));
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    function obtenerPlatosActivos($tipo){
        $resultado = new ArrayObject();
        try {
            if($tipo=="Todos"){
                $datos = $this->conexion->query("select * from plato where baja is false order by tipo");
            }
            else{
                $datos = $this->conexion->prepare("select * from plato where tipo=? and baja is false order by tipo");
                $datos->execute(array($tipo));
            }
            
            if($datos!==false){
                while($fila=$datos->fetch()){
                    $resultado->append(new Plato($fila[0],
                        $fila[1],$fila[2],$fila[3],
                        $fila[4],$fila[5]));
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    function obtenerPlato($id){
        $resultado = null;
        try {
            $datos = $this->conexion->query("select * from plato where id = $id");
            if($datos!==false){
                if($fila=$datos->fetch()){
                    $resultado=new Plato($fila[0],
                        $fila[1],$fila[2],$fila[3],
                        $fila[4],$fila[5]);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    function modificarPlato($id,$nombre,$tipo,$precio,$foto,$baja){
        $resultado = false;
        try {
            $consulta = $this->conexion->prepare("update plato set 
                nombre= ?, tipo= ?, precio=?, foto = ?, baja = ? where id = ?");
            $consulta->execute(array($nombre,$tipo,$precio,$foto,$baja,$id));
            if($consulta->rowCount()>0){
                $resultado = true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultado;
    }
    function crearPedido($usuario,$carrito){
        $resultado = -1;
        try {
            //Comenzamos transacción
            $this->conexion->beginTransaction();
            //Crear pedido
            $consulta = $this->conexion->prepare("insert into pedido values(null,?,curdate())");
            $consulta->execute(array($usuario->getId()));
            if($consulta->rowCount()>0){
                //Crear detalle
                $idPedido = $this->conexion->lastInsertId();
                $linea = 1;
                foreach ($carrito as $fila){
                    $p = $this->obtenerPlato($fila->getPlato()->getId());
                    if($p!=null and !$p->getBaja()){
                        $consulta = $this->conexion->prepare("insert into detalle values(?,?,?,?,?)");
                        $consulta->execute(array($idPedido,$linea,$p->getId(),$fila->getCantidad(),$p->getPrecio()));
                        $linea++;
                        if($consulta->rowCount()!=1){
                            $error = true;
                            break;
                        }
                    }
                }
                if(!isset($error)){
                    $resultado = $idPedido;                    
                    $this->conexion->commit();
                }
                else{
                    $this->conexion->rollBack();
                }
            }
        } catch (Exception $e) {
            $this->conexion->rollBack();
            echo $e->getMessage();
        }
        return $resultado;
    }
    
    function obtenerPedido($id) {
        $resultado = null;
        try {           
            $consulta = $this->conexion->prepare("select p.*, sum(precioU*cantidad) from pedido p inner join detalle d on id = pedido where id = ?");
            $datos=$consulta->execute(array($id));
            if($datos!==false){
                
                if($fila=$consulta->fetch()){                    
                        $resultado = new Pedido($fila[0], $fila[1], $fila[2], $fila[3]);
                    }
                
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        return $resultado;
    }
    function obtenerDetalle($id) {
        $resultado = array();
        try {
            $consulta = $this->conexion->prepare("select d.*, pl.nombre from pedido p inner join detalle d on p.id = pedido inner join plato pl on d.plato = pl.id where p.id = ?");
            $datos=$consulta->execute(array($id));
            if($datos!==false){                
                while($fila=$consulta->fetch()){
                    $resultado[] = new LineaPedido($fila[0], $fila[1], $fila[5], $fila[3], $fila[4]);
                }
                
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        return $resultado;
    }
    
    function obtenerPedidos($usuario) {
        $resultado = null;
        try {
            $consulta = $this->conexion->prepare("select p.*, sum(precioU*cantidad) from pedido p inner join detalle  d on id = pedido where cliente = ? group by id order by fecha desc, id desc");            
            $datos = $consulta->execute(array($usuario));
            if($datos!==false){
                $resultado = array();
                while($fila=$consulta->fetch()){                    
                    $resultado[]=new Pedido($fila[0], $fila[1], $fila[2], $fila[3]);
                }
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        return $resultado;
    }
    
}
?>