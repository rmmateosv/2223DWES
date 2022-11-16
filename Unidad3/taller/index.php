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
	//Establecer conexión con la BD
	$bd = new AccesoDatos();
	if($bd->getConexion()!=null){
	    echo "<h1>LISTADO DE VEHÍCULOS</h1>";
	    include_once 'menu.php';
        
	    //Recuperamos los vehículos de la bd y los guardamos en un array
	    $v = $bd->obtenerVehiculos();
	    ?>
	    <table border="1">
	    	<tr>
    	    	<th>Código</th>
    	    	<th>Propietario</th>
    	    	<th>Matrícula</th>
    	    	<th>Color</th>
    	    	<th>Teléfono</th>
    	    	<th>Email</th>
	    	</tr>
	    	<?php
	    	foreach ($v as $objV){
	    	    echo "<tr>
            	    	<td>".$objV->getCodigo()."</td>
            	    	<td>".$objV->getPropietario()."</td>
            	    	<td>".$objV->getMatricula()."</td>
            	    	<td>".$objV->getColor()."</td>
            	    	<td>".$objV->getTelefono()."</td>
            	    	<td>".$objV->getEmail()."</td>
	    	       </tr>";
	    	}
	    	?>
	    </table>
	    <?php 
	}
	else{
	    echo "Error, no hay conexión con la BD";
	}
	?>
	
</body>
</html>