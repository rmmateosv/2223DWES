<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<!-- ESTE MISMO FICHERO PROCESA EL FORMULARIO ACTION="" -->

	<form action="" method="post">
    	<fieldset>
    		<legend>Datos alumno</legend>
    		<label>Fecha de Solicitud</label>
    		<br/>
    		<!-- LA FECHA SE RELLENA CON LA FECHA DE HOY -->
    		<input type="date" name="fechaS" value="<?php echo date('Y-m-d');?>"/>
    		<p>    		
        		<label>Nombre alumno</label><br/>
        		<input type="text" name="nombre"/>
    		</p>
    		
    		<p>
        		<label>Selecciona si te beneficias de estos servicions</label><br/>
        		<input type="checkbox" name="transporte">
        		<label>Transporte</label>
        		<br/>
        		<input type="checkbox" name="beca">
        		<label>Beca MEC</label>
        		<br/>
    		</p>
    		<p>
    			<label>Curso en el que está matriculado</label><br/>
    			<input type="radio" name="curso" value="1º DAW">
    			<label>1º DAW</label>
    			<br>
    			<input type="radio" name="curso" value="2º DAW" checked="checked">
    			<label>2º DAW</label>
    			<br>
    		</p>
    		<p>
    			<label>Forma de acceso</label><br/>
    			<select name="acceso">
    				<option>Bachillerato</option>
    				<option selected="selected">Grado Medio</option>
    				<option label="Grado Superior">grado</option>
    				<option value="otros">Otros</option>
    			</select>
    		</p>
    		<p>
    			<label>Marca los módulos en los que te matriculas</label><br/>
    			<select name="modulos[]" multiple="multiple">
    				<option>LM</option>
    				<option>PRO</option>
    				<option>DB</option>
    				<option>DWES</option>
    				<option>DWEC</option>
    				<option>DIW</option>
    			</select>
    		</p>
    		<p>
    			<input type="submit" name="enviar" value="Enviar"/>
    			
    		</p>
    	</fieldset>
		
	</form>
	<hr/>
	<?php 
	if(isset($_POST["enviar"])){
	    echo "<br/>Los datos introducidos son:";
	    echo "<br/>Fecha de solicitud tal cual está:".$_POST["fechaS"];
	    echo "<br/>Fecha de solicitud formateada:".date("d/m/Y",strtotime($_POST["fechaS"]));
	    echo "<br/>Nombre Alumno:".$_POST["nombre"];
	    echo "<br/>Servicios:<ul>";
	    if(isset($_POST["transporte"])){
	        echo "<li>Transporte</li>";
	    }
	    if(isset($_POST["beca"])){
	        echo "<li>Beca MEC</li>";
	    }
	    echo "</ul>";
	    
	    echo "<br/>Curso:".$_POST["curso"];
	    
	}
	?>
	
</body>
</html>