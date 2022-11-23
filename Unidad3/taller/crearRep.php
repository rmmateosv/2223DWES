<?php
require_once 'AccesoDatos.php';
require_once 'Vehiculo.php';
require_once 'Pieza.php';
require_once 'Reparacion.php';
require_once 'PiezaReparacion.php';

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
	    
	    //Ver si hay una reparación creada
	    $r = $bd->obtenerReparacion($vSel->getCodigo());
	    //Añadir Pieza
	    if(isset($_POST["addPieza"])){	        
	        if($r!=null){
	            //Hay reparación abierta, la pieza se añade a esa reparación
	            $p = $bd->obtenerPieza($_POST["pieza"]);
	            //Chequear si hay stock suficiente
	            if($p->getStock()>= $_POST["cantidad"]){
	                $resultado = $bd->insertarPieza($r,$p,$_POST["cantidad"]);
	                if($resultado){
	                    $mensaje = "Pieza ".$_POST["pieza"]." añadida";
	                }
	                else{
	                    $mensaje = "Error al añadir la pieza ".$_POST["pieza"];
	                }
	            }
	            else{
	                $mensaje = "No hay stock suficiente para la pieza ".$_POST["pieza"];
	            }
	        }
	        else{
	            //No hay reparación abierta, se debe crear
	        }
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
	   		<!--  DATOS DEL COCHE -->
	   		<h2>Datos del vehículo</h2>
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
	   		<!--  DATOS DE LA REPARACIÓN -->
	   		<h2>Datos de la reparación</h2>
	   		<table align="center" border="1">
	   			<tr>
	   				<td>Id</td>
	   				<td>Fecha</td>
	   				<td>Tiempo</td>
	   				<td>Pagado</td>
	   			</tr>
	   			<tr>
	   				<?php
	   				if($r!=null){
    	   				echo "<td>".$r->getId()."</td>
                	    	<td>".$r->getFecha()."</td>
                	    	<td>".$r->getTiempo()."</td>
                	    	<td>".$r->getPagado()."</td>";
	   				}
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
                                 ".$p->getCodigo()."-".$p->getClase()."-".$p->getDescripcion()."-".$p->getStock()
                                   ."</option>";
	   						}
	   						?>
	   					</select>
	   				</td>
	   				<td><input type="number" name="cantidad" value="1"/></td>
	   				<td><input type="submit" name="addPieza" value="Añadir Pieza"/></td>
	   				</tr>
	   		</table>
	   </form>
	   <?php 
	   if(isset($mensaje)){
	       echo "<h2 style='color:red'>$mensaje</h2>";
	   }
	}
	else{
	    echo "Error, no hay conexión con la BD";
	}
	?>
	
</body>
</html>