<?php
require_once 'Empleado.php';
require_once 'funcionesFicheros.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php include_once 'menu.php';
	
	$empleados = obtenerEmpleados();
	if(sizeof($empleados)>0){
	    ?>
	    <h1>EMPLEADOS</h1>
	    <table border="1">
	    	<tr>
	    		<th>NSS</th>
	    		<th>Nombre</th>
	    		<th>Teléfonos</th>
	    		<th>Departamento</th>	    		
	    	</tr>
	    	<?php
	    	//Mostramos cada producto en una fila
	    	foreach ($empleados as $e){
	    	    echo "<tr><td>".$e->getNss()."</td>
	    	              <td>".$e->getNombre()."</td>
                          <td>".$e->getTelefonos()[0]."<br/>".$e->getTelefonos()[1]."<br/>".$e->getTelefonos()[2]."<br/>"."</td>
                          <td>".$e->getDepartamento()."</td>
                       </tr>";
	    	}
	    	?>
	    </table>
	    <?php 
	    
	}
	?>
	
</body>
</html>