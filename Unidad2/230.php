<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
	   //Creamos array vacío
	   $numeros= array();
	   //REllenar con 50
	   $i=0;
	   do{
	       //Añado el nº generado de forma aleatoria
	       $numeros[]=rand(0,99);
	       $i++; 
	   }while($i<50);
	   echo "<h1>ARRAY SIN CLAVES</h1>";
	   //Pintar el array
	   foreach ($numeros as $valor){
	       echo "$valor ";
	   }
	   echo "<h1>ARRAY CON CLAVES</h1>";
	   //Pintar el array
	   foreach ($numeros as $clave=>$valor){
	       echo "$clave:$valor<br/>";
	   }
	   
	?>
</body>
</html>