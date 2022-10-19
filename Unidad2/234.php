<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
	if($_GET["valor"]){
	    //Definimos los tipos de billetes/monedas
    	$monedas=array(500, 200, 100, 50, 20, 10, 5, 2, 1);
    	$valor = $_GET["valor"];
    	
        $resultado = array();
        //Recorremos las monedas
        foreach ($monedas as $m){
            $cociente=intdiv($valor, $m);
            if($cociente!=0){
                $resultado[$m]=$cociente;                
            }
            $valor=$valor%$m;
        }
        
        //Mostramos el resultado
        foreach ($resultado as $clave=>$valor){
            echo "<br/>$valor de $clave";
        }
	}
	else{
	    echo "Pasar valor en $GET";
	}
	?>
</body>
</html>