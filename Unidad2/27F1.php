<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form action="27F1_action.php" method="get">
		<fieldset>
			<legend>Formulario por get</legend>
    		<label>Nombre</label>
    		<input type="text" name="nombre" placeholder="Introduce tu nombre"/>
    		<p/>
    		<input type="submit" name="enviar" value="ENVIAR">
		</fieldset>
	</form>
	<form action="27F1_action.php" method="post">
    	<fieldset>
    		<legend>Formulario por post</legend>
    		<label>Edad</label>
    		<input type="number" name="edad" placeholder="Introduce tu edad"/>
    		<p/>
    		<input type="submit" name="enviar" value="ENVIAR">
    	</fieldset>
		
	</form>

	
</body>
</html>