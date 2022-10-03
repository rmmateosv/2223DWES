<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<!-- ESTE MISMO FICHERO PROCESA EL FORMULARIO ACTION="" -->
	<?php 
	if(isset($_POST["enviar"])){
	    //Muestro datos
	    if(empty($_POST["edad"])){
	        echo "<br/>Debes rellenar la edad";
	    }
	    else{
	        echo "<br/>La edad introducida es ".$_POST["edad"];
	    }
	}
	else{
	    //Muestro formulario
	?>
	<form action="" method="post">
    	<fieldset>
    		<legend>Formulario por post</legend>
    		<label>Edad</label>
    		<input type="number" name="edad" 
    				required="required"
    				placeholder="Introduce tu edad"/>
    		<p/>
    		<input type="submit" name="enviar" value="ENVIAR">
    	</fieldset>
		
	</form>
	<?php 
	}
	?>
	

	
</body>
</html>