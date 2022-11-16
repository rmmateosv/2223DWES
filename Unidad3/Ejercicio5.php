<?php 

session_start();

if(isset($_SESSION["visitas"])){
    $arrayVisitas = unserialize($_SESSION["visitas"]);
}else{
    $arrayVisitas = array();
}

$arrayVisitas[] = date("d/m/Y - H:i:s", time());

$_SESSION["visitas"] = serialize($arrayVisitas);


if(isset($_POST["cerrar"])){
    unset($arrayVisitas);
    session_unset();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Ejercicio 5</title>
</head>
<body>

	<div>
	
    	<?php 
    	
    	if(isset($arrayVisitas)){
    	    
    	    echo "<h1>Conteo de visitas</h1>";
    	 
    	    if(sizeof($arrayVisitas) == 1){
    	        echo "<h3>Bienvenido ".session_name().", tu SID es: ".session_id()."</h3>";
    	        
    	    }else{
    	        
    	        echo "<h3>Accesos anteriores:</h3>";
    	        
    	        foreach ($arrayVisitas as $arr) {
    	            echo $arr."<br>";
    	        }
    	    }
    	    
    	}else{
    	    echo "<h1>Sesión cerrada</h1>";
    	}
    	
    	?>
	
	</div>

	<form action="#" method="post">
    	<br>
    	<input type="submit" name="cerrar" value="Cerrar sesión" />
	
	</form>
	

</body>
</html>