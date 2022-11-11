<?php 
	if(!isset($_COOKIE["nombre"]) or !isset($_COOKIE["apellidos"]) or !isset($_COOKIE["tipoP"])){
	    header("location:DatosPers.php");
	}
	?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>MostrarDatos</title>
</head>
<body>
	
	<h2>Nombre: <?php echo $_COOKIE["nombre"] ?></h2>
	<h2>Apellidos: <?php echo $_COOKIE["apellidos"] ?></h2>
	<h2>Pago: <?php echo $_COOKIE["tipoP"] ?></h2>

	<a href="DatosPers.php">Inicio</a>
	

</body>
</html>