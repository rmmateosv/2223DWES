<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
	$entero=4;
	$decimal=4.65;
	$cadena = "Hola Mundo";
	$boolean = true;
	
	echo '<br/>La variable $entero es de tipo '.gettype($entero).
	     " y su valor es $entero";
	echo "<br/>La variable ".'$decimal'." es de tipo ".gettype($decimal).
	      " y su valor es $decimal";
	echo '<br/>La variable $cadena es de tipo'.gettype($cadena).
	' y su valor es '.$cadena;
	echo '<br/>La variable $boolean '." es de tipo".gettype($boolean).
	" y su valor es $boolean";
	?>
</body>
</html>