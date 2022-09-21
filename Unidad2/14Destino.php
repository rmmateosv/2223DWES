<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	  $cadena="";
	  $nulo=null;
	  $bool = false;
	  
	  //Mostrar valores vacíos
	  echo '<br/>La variable $cadena es de tipo '.gettype($cadena).
	  "y su valor es $cadena";
	  echo '<br/>La variable $nulo es de tipo '.gettype($nulo).
	  "y su valor es $nulo";
	  echo '<br/>La variable $bool es de tipo '.gettype($bool).
	  "y su valor es $bool";
	?>
</body>
</html>