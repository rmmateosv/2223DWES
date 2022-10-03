<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
	   //Recupear los datos del formulario
	   //Comprobar si se  ha llamado por get
	if(isset($_GET["enviar"])){
	    //Mostramos el nombre, avisamos si está vacío
	    if(empty($_GET["nombre"])){
	        echo "<br/>Debes rellenar el nombre";
	    }
	    else{
	        echo "<br/>El nombre introducido es ".$_GET["nombre"];
	    }
	}
	elseif($_POST["enviar"]){
	    if(empty($_POST["edad"])){
	        echo "<br/>Debes rellenar la edad";
	    }
	    else{
	        echo "<br/>La edad introducida es ".$_POST["edad"];
	    }
	    
	}
	else{
	    echo "<br/>No se ha accedido desde el formulario (con get)";
	}
	?>
	

	
</body>
</html>