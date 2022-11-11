<?php 

function recordarText($nombre) {
    if(isset($_COOKIE[$nombre])){
        return $_COOKIE[$nombre];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>DatosPers</title>
</head>
<body>

	<form action="Trata_cookies.php" method="post">
	
	<p>
		<label>Nombre:</label><br>
		<input type="text" name="nombre" value="<?php echo recordarText("nombre"); ?>" />
	</p>
	
	<p>
		<label>Apellidos:</label><br>
		<input type="text" name="apellidos" value="<?php echo recordarText("apellidos"); ?>" />
	</p>
	
	<input type="submit" name="guardar" value="Guardar y continuar" />
	
	</form>

	<?php 
    	//
	
	?>

</body>
</html>