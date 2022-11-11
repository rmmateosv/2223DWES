<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	echo "<h3>Nombre de sesión ",session_name(),"</h3>";
	
	session_name("Rosa");
	echo "<h3>Nombre de sesión modificacado ",session_name(),"</h3>";
	
	$_SESSION["apellidos"] = "López"; //No se guarda en la sesión porque no hemos hecho session_start
	
	session_start();
	echo "<h3>SSID ",session_id(),"</h3>";
	
	//Almacenar datos en sesión
	$_SESSION["nombre"] = "Ana";
	?>
	
</body>
</html>