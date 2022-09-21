<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	//Creamos variables
	$nombre = "Rosa";
	$edad = 18;
	$estatura = 1.6;
	$alumno = true;
	
	//Mostrar variables
	echo "Yo soy $nombre";
	//Mostramos con ''
	echo '<br/>Yo soy $nombre';
	
	//Mostrar más de una variable
	echo "<br/>Yo soy $nombre y tengo $edad años y mido $estatura";
    echo "<br/>Yo soy ".$nombre." y tengo ".$edad." años";
    echo "<br/>Yo soy ",$nombre," y tengo ",$edad," años";
    echo "<br/>Alumno:$alumno";
    
    //Mostrar los tipos de datos de las variables
    echo "<h1>Tipos de datos</h1>";
    echo "<h3>Nombre:".gettype($nombre)."</h3>";
    echo "<h3>Edad:".gettype($edad)."</h3>";
    echo "<h3>Estatura:".gettype($estatura)."</h3>";
    echo "<h3>Alumno:".gettype($alumno)."</h3>";
	
	?>
</body>
</html>