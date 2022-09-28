<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	//Funciones de String
	//Longitud
	$texto = "En un lugar de la mancha";
	echo '<br/>Longitud de $texto:'.strlen($texto);
	
	//Comparación
	if($texto=="En un lugar de la mancha"){
	    echo "<br/>Cadenas iguales, comparando con ==";
	}
	if(strcmp($texto, "En un lugar de la ma")<0){
	    echo '<br/>$texto1 es distinto y más corto que el texto comparado';
	}
	elseif(strcmp($texto, "En un lugar de la ma")>0){
	    echo '<br/>$texto1 es distinto y más largo que el texto comparado';
	}
	else{
	    echo '<br/>$texto1 y texto comparado son iguales';
	}
	
	//Dividir en cadenas de una longitud fija
	$texto="uno;dos;tres";
	$array=str_split($texto,3); //3 es la longitud del texto de salida
	echo"<br/>",var_dump($array);
	//Pasar un string a un array
	$array2=explode(";", $texto);
	echo"<br/>",var_dump($array2);
	//Pasar un array a un string
	$array3=array("rojo","verde","azul");
	$colores = implode("; ", $array3);
	echo"<br/>$colores";
	
	//Tamaño de array
	echo "<br/>Nº de elementos del array3:".count($array3);
	echo "<br/>Tamaño del array3:".sizeof($array3);
	
	//Obtener claves y valores
	$datos=array("Nombre"=>"Rosa","Profesión"=>"Profe","Edad"=>18);
	$claves = array_keys($datos);
	echo"<br/>",var_dump($claves);
	$valores = array_values($datos);
	echo"<br/>",var_dump($valores);
	
	//Concatenar arrays
	$todo = array_merge($array3,$datos);
	echo"<br/>",var_dump($todo);
	
	
	?>
	

	
</body>
</html>