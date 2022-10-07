<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Ejercicio Formulario</title>
</head>
<body>
	
	<form action="Ejercio14_Recup.php" method="post">
	<fieldset>
	
		<legend>Datos Personales</legend>
		<label>Nombre</label>
		<input type="text" name="nombre" placeholder="Introduce tu nombre"/>
		
		<br>
		<br>
		
		<label>Apellidos</label>
		<input type="text" name="apellidos" placeholder="Introduce tus apellidos"/>
		
		<br>
		<br>
		
		<label>Contraseña</label>
		<input type="password" name="contraseña" placeholder="Introduce tu contraseña"/>
		
		<br>
		<br>
		
		<label>Sexo</label>
		
		<br>
		
		<label>H</label>
		<input type="radio" name="sexo" value="hombre">
		
		<br>
		
		<label>M</label>
		<input type="radio" name="sexo" value="mujer" checked="checked">
		
		<br>
		<br>
		
		<label>Fecha Nacimiento</label>
		<input type="date" name="fechaN"/>
		
		<br>
		
		<label>País</label>
			<select name="pais[]" multiple="multiple" size=4>			
				<option value="España">España</option>
				<option value="Francia">Francia</option>
				<option value="Portugal">Portugal</option>
				<option value="Otros">Otros</option>				
			</select>		
		
		
	</fieldset>
	
	<fieldset>
	
	<legend>Informacion Adicional</legend>
	
	<label>Nº Hijos</label>
	<select name="hijos">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4 o más</option>
	</select>
	
	<br>
	
	<label>Aficiones</label>

		<label>Cine</label>
		<input type="checkbox" name="Cine" value="C"/>
		
		<label>Deporte</label>
		<input type="checkbox" name="Deporte" value="D"/>
		
		<label>Leer</label>
		<input type="checkbox" name="Leer" value="L"/>
		
	<br>
	<br>
	<label>Comentario</label>
	<br>
    <textarea rows="5" cols="50" name="Comentario"></textarea>	
    
    
	</fieldset>
		<input type="submit" name="Enviar" value="ENVIAR">
	</form>
</body>
</html>