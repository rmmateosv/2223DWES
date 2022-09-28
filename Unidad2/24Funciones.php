<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	//Función con dos parámetros que devuelve un resultado
	function sumar($n1,$n2){
	    return $n1+$n2;
	}
	
	$n1 = 3;
	$n2=1;
	$suma = sumar($n1, $n2);
	echo "<br/>Resultado de la suma: $n1 + $n2 = $suma";
	
	$n1 = 3.2;
	$n2=1.1;
	$suma = sumar($n1, $n2);
	echo "<br/>Resultado de la suma: $n1 + $n2 = $suma";
	
	//Función sin parémetros que no devuelve nada
	function pintarMenu(){
	    echo "<p><a href=''>Menú 1</a> <a href=''>Menú 2</a><p/>";
	}
	
	pintarMenu();
	pintarMenu();
	
	//PARÁMETROS POR VALOR: Incrementar y mostrar valor que se pasa por parámetro
	function incrementa($v1){
	    $v1++;
	    echo "<p>El valor de variable es $v1</p>";
	}
	
	$d1=8;
	echo "<p>La variable tiene el valor $d1</p>";
	incrementa($d1);
	echo "<p>El valor de variable después de llamar a la función es $d1</p>";
	
	//PARÁMETROS POR REFERENCIA: Incrementar y mostrar valor que se pasa por parámetro
	function incrementa2(&$v1){
	    $v1++;
	    echo "<p>El valor de variable es $v1</p>";
	}
	

	echo "<p>La variable tiene el valor $d1</p>";
	incrementa2($d1);
	echo "<p>El valor de variable después de llamar a la función es $d1</p>";
	?>
</body>
</html>