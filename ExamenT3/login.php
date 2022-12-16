<?php 
require_once 'AccesoDatos.php';
require_once 'Empleado.php';
//Loguearse
if(isset($_POST['acceder'])){
    //Comprobar us y ps
    $bd = new AccesoDatos();
    if($bd->getConexion()!=null){
        $e = $bd->obtenerEmpleado($_POST['usuario'],$_POST['ps']);
        if($e!=null){
            // Guardar usuario en sesión
            session_start();
            $_SESSION['empleado'] = $e;
            //Redirigir a mensajes.php
            header('location:mensajes.php');
        }
        else{
            $mensaje= "Error, usuario incorrecto";
        }
    }
    else{
        $mensaje= "Error, no hay conexión con la base de datos";
    }
    
}

?>
<!doctype html>
<html>
      <head>
        <meta charset="utf-8">
        <title>Examen 22_23</title>
       </head>
     <body>     	
 			<div> 
                <h1 style='color:red;'><?php if(isset($mensaje)) echo $mensaje?></h1> 
            </div>    
        	<form action="login.php" method="post">              	
            		<h1>Login</h1>    
            		<div> 
                		<label for="usuario">Id de Empleado</label><br/>           		
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