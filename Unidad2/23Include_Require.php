<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	  // Include generar warning si el fichero no existe
	 include "23FicheroIncluido.php";
	 include_once "23FicheroIncluido.php";
	 include_once "23FicheroIncluido_noexiste.php";
	 
	 //Require generar error si el fichero no existe
	 require "23FicheroIncluido.php";
	 require_once "23FicheroIncluido.php";
	 require_once "23FicheroIncluido_noexiste.php";
	?>
</body>
</html>