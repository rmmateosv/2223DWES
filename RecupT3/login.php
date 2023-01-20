<?php 
require_once 'AccesoDatos.php';
require_once 'Usuario.php';
require_once 'Cliente.php';

$bd = new AccesoDatos();
if($bd->getConexion()==null){
    $mensaje = "Error, no hay conexión a la BD";    
}
else{
    if(isset($_POST["acceder"])){
        if(empty($_POST["usuario"]) or empty($_POST["ps"])){
            $mensaje = "Error, rellena los campos";
        }
        else{
            $u = $bd->obtenerUsuario($_POST["usuario"],$_POST["ps"]);
            if($u==null){
                $mensaje = "Error, datos incorrectos";
            }
            elseif ($u->getTipo()=="C"){
                //Cliente - Chequear si no está de baja
                $c = $bd->obtenerCliente($u->getUsuario());
                if($c->getBaja()){
                    $mensaje = "Error, cliente está dado de baja";
                }
                else{
                    session_start();
                    $_SESSION['usuario'] = $u;
                    header("location:misActividades.php");
                }
            }
            else{
                //Administrador
                session_start();
                $_SESSION['usuario'] = $u;
                header("location:crearCliente.php");
            }
        }
    }
}

?>
<!doctype html>
<html>
      <head>
        <meta charset="utf-8">        
        <title>Recuperaci�n T3 22_23</title>
       </head>
     <body>
 			<div> 
                <h1 style='color:red;'>
                <?php if(isset($mensaje)){ echo $mensaje;}?></h1> 
            </div>    
        	<form action="login.php" method="post">              	
            		<h1>SuperGim</h1>    
            		<div> 
                		<label for="usuario">Usuario</label><br/>           		
                        <input type="text" id="usuario" name="usuario"/>  
                    </div>
                    <div> 
                        <label for="ps">Contraseña</label><br/>                           
                        <input type="password" id="ps"   name="ps"/>      
                    </div>                               
                    <br/><button type="submit" name="acceder">Acceder</button>                        
      		</form>           
	</body>
</html>