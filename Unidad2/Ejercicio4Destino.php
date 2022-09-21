<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
    	//Ejercicio 4 VARIABLES EN URL	
	    $opcion = $_GET["opc"];	 
	    $color = $_GET["color"];
	    
	    echo "<p style='color:$color'>Se ha pulsado la opción: $opcion</p>"
	?>
	
</body>
</html>