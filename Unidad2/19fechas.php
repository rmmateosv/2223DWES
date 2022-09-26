<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	 echo "<br/>Hoy es:".date("d/m/Y");
	 echo "<br/>Hoy es:".date("d/m/Y",time());
	 //Para calcular la fecha de ayer, restamos a hoy los segundos de 1 día
	 echo "<br/>Ayer fue:". date("d/m/Y",time()-(24*60*60));
	 echo "<br/>Mi cumpleaños es:", date("d/m/Y",strtotime("2010-10-01"));
	 
	 //Función getdate: Devuleve un array con los campos de un fecha
	 echo "<h1>Función getdate</h1>";
	 var_dump(getdate())
	 
	?>
</body>
</html>