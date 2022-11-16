<?php
require_once 'AccesoDatos.php';
require_once 'Vehiculo.php';

use taller\AccesoDatos;
use taller\Vehiculo;

function rellenarSelect(Vehiculo $v, Vehiculo $vSel){
    if($v->getCodigo()==$vSel->getCodigo()){
        echo "selected='selected'";
    }
}

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
        echo "<h1>MODIFICAR VEHÍCULO</h1>";
        include_once 'menu.php';
        
        //Obtener vehículo que está seleccionado en select
        if(isset($_POST["codigo"])){
            $vSel = $bd->obtenerVehiculo($_POST["codigo"]);   
        }else{
            $vSel = $bd->obtenerPrimerVehiculo();
        }

        ?><!--  -->
        <form action="" method="post">
        	<p>
            	<label>Código del vehículo</label><br/>
            	<select name="codigo" onchange="this.form.submit()">
            		<?php
            		
            		  $coches = $bd->obtenerVehiculos();
            		  foreach ($coches as $v){
            		      echo "<option value='".$v->getCodigo()."' ".rellenarSelect($v,$vSel).">".$v->getCodigo().
            		             "-".$v->getPropietario()."</option>";
            		  }
            		?>
            	</select>
            	
        	</p>
        	<p>
            	<label>Propietario</label><br/>
            	<input type="text" name="propietario" placeholder="Nombre del propietario" 
            	       value="<?php echo $vSel->getPropietario()?>">
        	</p>
        	<p>
            	<label>Matricula</label><br/>
            	<input type="text" name="matricula" placeholder="1234ABC" maxlength="7" 
            	       value="<?php echo $vSel->getMatricula()?>">            	
        	</p>
        	<p>
            	<label>Color</label><br/>
            	<input type="text" name="color" placeholder="color" 
            	       value="<?php echo $vSel->getColor()?>">            	
        	</p>
        	<p>
            	<label>Teléfono</label><br/>
            	<input type="tel" name="telefono" placeholder="Teléfono" 
            	       value="<?php echo $vSel->getTelefono()?>">            	
        	</p>
        	<p>
            	<label>Email</label><br/>
            	<input type="email" name="email" placeholder="email@emila.com" 
            	       value="<?php echo $vSel->getEmail()?>">            	
        	</p>
        	<p>
        		<input type="submit" name="modificar" value="Modificar">
        		<input type="submit" name="borrar" value="Borrar">
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