<?php
require_once 'AccesoDatos.php';
require_once 'Vehiculo.php';

use taller\AccesoDatos;
use taller\Vehiculo;


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php 
    $bd = new AccesoDatos();
    if($bd!=null){
        
        //Programar botón crear
        if(isset($_POST["crear"])){
            if(empty($_POST["propietario"]) or empty($_POST["telefono"])){
                $mensaje = "Error, el nombre propietario y teléfono no pueden estar vacíos";
            }
            elseif(!empty($_POST["matricula"]) && $bd->existeMatricula($_POST["matricula"])){
                $mensaje = "Error, la matrícula ya existe";
            }
            else{
                $v = new Vehiculo();
                $v->setPropietario($_POST["propietario"]);
                $v->setMatricula(empty($_POST["matricula"])?null:$_POST["matricula"]);
                $v->setColor(empty($_POST["color"])?null:$_POST["color"]);
                $v->setEmail(empty($_POST["email"])?null:$_POST["email"]);
                $v->setTelefono($_POST["telefono"]);
                $codigo = $bd->crearVehiculo($v);
                $mensaje = "Vehículo creado con código $codigo";
            }
        }
        
        echo "<h1>CREAR VEHÍCULO</h1>";
        include_once 'menu.php';

        ?><!--  -->
        <form action="" method="post">
        	<p>
            	<label>Propietario</label><br/>
            	<input type="text" name="propietario" placeholder="Nombre del propietario">
        	</p>
        	<p>
            	<label>Matricula</label><br/>
            	<input type="text" name="matricula" placeholder="1234ABC" maxlength="7">            	
        	</p>
        	<p>
            	<label>Color</label><br/>
            	<input type="text" name="color" placeholder="color">            	
        	</p>
        	<p>
            	<label>Teléfono</label><br/>
            	<input type="tel" name="telefono" placeholder="Teléfono">            	
        	</p>
        	<p>
            	<label>Email</label><br/>
            	<input type="email" name="email" placeholder="email@emila.com">            	
        	</p>
        	<p>
        		<input type="submit" name="crear" value="Crear">
        		<input type="reset" name="limpiar" value="Limpiar">
        	</p>
        </form>
        <?php 
        if(isset($mensaje)){
            echo "<h2 style='color:red'>$mensaje</h2>";
        }
    }
    else{
        echo "<h2 style='color:red'>Error, no hay conexión con la BD taller</h2>";
    }
?>	
	
	
</body>
</html>