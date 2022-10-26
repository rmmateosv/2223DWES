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
	<?php include_once 'menu.php';?>
	<form action="" method="post">
		<p>
			<label>NSS</label><br/>
			<input type="number" name="nss" placeholder="Nº SS"/>
		</p>
		<p>
			<label>Nombre</label><br/>
			<input type="text" name="nombre" placeholder="Nombre del empleado"/>
		</p>
		<p>
			<label>Departamento</label><br/>
			<select name="dpto">
				<option>RRHH</option>
				<option>Ventas</option>
				<option>Contabilidad</option>
			</select>
		</p>
		<p>
			<label>Teléfono Fijo</label><br/>
			<input type="tel" name="t1" placeholder="Teléfono fijo"/><br/>
			<label>Teléfono Móvil</label><br/>
			<input type="tel" name="t2" placeholder="Teléfono móvil"/><br/>
			<label>Teléfono Familiar</label><br/>
			<input type="tel" name="t3" placeholder="Teléfono Familiar"/><br/>
		</p>
		<p>
			<input type="submit" name="crear" value="Crear Empleado"/>
		</p>
	</form>
	<?php 
	if(isset($_POST['crear'])){
	    //Chequear que no haya ningún dato vacío
	    if(empty($_POST['nss']) or empty($_POST['nombre']) or 
	       empty($_POST['dpto'])){
	       echo "<h3 style='color:red'>Error, no puede haber campos vacíos</h3>"; 
	    }
	    elseif(empty($_POST['t1']) and empty($_POST['t2']) and empty($_POST['t3'])){
	        echo "<h3 style='color:red'>Error, al menos hay que rellenar une teléfono</h3>"; 
	    }
	    else{
	        $telefonos = array($_POST['t1'],$_POST['t2'],$_POST['t3']);
	        //Creamos un objeto de la clase Producto
	        $e = new Empleado($_POST['nss'], $_POST['nombre'], 
	                          $telefonos, $_POST['dpto']);
	        //Guardamos el producto en el fichero productos.txt
	        guardarEmpleado($e);
	    }
	}
	?>
</body>
</html>