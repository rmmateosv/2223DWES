<?php 
require_once 'persona.php';

// rellenar personas con lo que en la cookie si no hay nada array vacío
if(isset($_COOKIE["personas"])){
    $personas = unserialize($_COOKIE["personas"]);
}
else{
    $personas = array();
}

if(isset($_POST["enviar"])){
    //Crear persona
    $p = new Persona();
    $p->setId($_POST["id"]);
    $p->setNombre($_POST["nombre"]);
    
    //Añado persona array de persona
    $personas[]=$p;
    
    //Guardo array en cookie caducidad un año
    setcookie("personas",serialize($personas),time()+(365*24*60*60));
}
//setcookie("nobmre","noa");
if(isset($_POST["borrar"])){
    setcookie("personas","",1);

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>

<body>
	<form action="" method="post">
		<input type="number" name ="id"/><br/>
		<input type="text" name ="nombre"/><br/>
		<input type="submit" name ="enviar" value ="Enviar"/>
		<input type="submit" name ="borrar" value ="Borrar Cookies"/>
	</form>
	
	<?php
	//Pintar
	if(isset($personas)){
	    foreach ($personas as $a){
	        echo "<h2>", $a->getId(), " ", $a->getNombre(),"</h2>";
	        unset($a);
	    }
	}
	
	for($i=0;$i<=sizeof($personas);$i++){
	   
	}
	echo "fin"
	?>
	
</body>
</html>