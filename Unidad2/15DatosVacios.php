<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	   //REcuperamos los parámetros nombre y edad de la URL
      $nombre = $_GET['nombre']; 
      $edad =  $_GET['Edad'];
      
      //Mostramos
      echo "<br/>Hola $nombre, tienes $edad años";
	?>
</body>
</html>