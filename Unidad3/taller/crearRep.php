<?php
require_once 'AccesoDatos.php';
require_once 'Vehiculo.php';
require_once 'Pieza.php';

use taller\AccesoDatos;
function seleccionar($c,$v) {
    if($c==$v){
        return "selected='selected'";    
    }
    
}
use taller\Vehiculo;
?>
<!DOCTYPE html>
<html>
<head>
<style>
table{border-spacing:0;}
</style>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	
	<?php 
	//Establecer conexión con la BD
	$bd = new AccesoDatos();
	if($bd->getConexion()!=null){
	    echo "<h1>CREAR REPARACIÓN</h1>";
	    include_once 'menu.php';
	    
	    $coches = $bd->obtenerVehiculos();
	    $piezas = $bd->obtenerPiezas();
	    
	    if(isset($_POST['coche'])){
	        $vSel = $bd->obtenerVehiculo($_POST['coche']);
	    }
	    else{
	        $vSel = $bd->obtenerPrimerVehiculo();
	    }
	   ?>
	   <form action="" method="post">
	   		<label>Selecciona vehículo</label>
	   		<select name="coche" onchange="this.form.submit()">
	   			<?php
	   			foreach ($coches as $c){
	   			    echo "<option ".seleccionar($c->getCodigo(),$vSel->getCodigo()).
	   			    " value='".$c->getCodigo()."'>".$c->getCodigo()."-".$c->getPropietario()."</option>";
	   			}
	   			?>
	   		</select>
	   		<br/>
	   		<table align="center" border="1">
	   			<tr>
	   				<td>Código</td>
	   				<td>Propietario</td>
	   				<td>Matrícula</td>
	   				<td>Color</td>
	   				<td>Teléfono</td>
	   				<td>Email</td>
	   			</tr>
	   			<tr>
	   				<?php
	   				echo "<td>".$vSel->getCodigo()."</td>
            	    	<td>".$vSel->getPropietario()."</td>
            	    	<td>".$vSel->getMatricula()."</td>
            	    	<td>".$vSel->getColor()."</td>
            	    	<td>".$vSel->getTelefono()."</td>
            	    	<td>".$vSel->getEmail()."</td>";
	   				?>
	   			</tr>
	   		</table>
	   		<table>	
	   			<tr><td>Pieza</td><td>Cantidad</td></tr>
	   			<tr>
	   				<td>
	   					<select name='pieza'>
	   						<?php
	   						foreach ($piezas as $p){
	   						    echo "<option value='".$p->getCodigo()."'>
                                 ".$p->getCodigo()."-".$p->getClase()."-".$p->getDescripcion()
                                   ."</option>";
	   						}
	   						?>
	   					</select>
	   				</td>
	   				<td><input type="number" value="1"/></td></tr>
	   		</table>
	   </form>
	   <?php 
        
	}
	else{
	    echo "Error, no hay conexión con la BD";
	}
	?>
	
</body>
</html>