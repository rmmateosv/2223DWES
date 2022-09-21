<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	//Variable local
	$numero = 2;
	echo "<br/>".$numero;
	
	//Defino función prueba
	function prueba(){	    
	    echo "<br/>".$numero;
	}
	//Lamo a la función prueba
	prueba();
	//Muestra un error porque no reconoce la variable
	
	//Defino función prueba2
	function prueba2(){
	    global $numero;
	    echo "<br/>".$numero;
	}
	//Lamo a la función prueba
	prueba2();
	//No da error porque se define la variable como global
	
	//VARIABLES PREDEFINIDAS
	echo "<br/>Nombre del servidor:" . $_SERVER['SERVER_NAME'];
	echo "<br/>Puerto del servidor:" . $_SERVER['SERVER_PORT'];
	echo "<br/>Software:" . $_SERVER['SERVER_SOFTWARE'];
	
	//VARIABLES ESTÁTICAS
	function prueba3(){
	    $numero = 0;
	    
	    $numero++;
	    echo "<br/>La variable número vale:$numero";
	     
	}
	
	prueba3();
	prueba3();
	
	function prueba4(){
	    static $numero = 0;
	    
	    $numero++;
	    echo "<br/>La variable número vale:$numero";
	    
	}
	
	prueba4();
	prueba4();
	?>
</body>
</html>