<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<?php 
function rellenarFecha(){
    //Si ya se ha rellanado la fecha, dejo ese valor
    //Si no, pongo la fecha actual
    if(!empty($_POST['fechaS'])){
        echo $_POST['fechaS'];
    }
    else{
        echo date('Y-m-d');
    }
    
}
function rellenarSeleccionado($opcion) {
    if(isset($_POST["modulos"]) and in_array($opcion, $_POST["modulos"])){
        echo "selected='selected'";   
    }
}
?>
</head>
<body>
	<!-- ESTE MISMO FICHERO PROCESA EL FORMULARIO ACTION="" -->
	<form action="" method="post">
    	<fieldset>
    		<legend>Datos alumno</legend>
    		<label>Fecha de Solicitud</label>
    		<br/>
    		<!-- LA FECHA SE RELLENA CON LA FECHA DE HOY -->
    		<input type="date" name="fechaS" value="<?php rellenarFecha()?>"/>
    		                     
    		<p>    		
        		<label>Nombre alumno</label><br/>
        		<input type="text" name="nombre" value="<?php 
        		      if(!empty($_POST['nombre'])){
        		          echo $_POST['nombre'];
        		      }
        		?>"/>
    		</p>
    		
    		<p>
        		<label>Selecciona si te beneficias de estos servicios</label><br/>
        		<input type="checkbox" name="transporte" <?php 
        		if(isset($_POST["transporte"])){
        		    echo "checked='checked'";
        		}
        		?>>
        		<label>Transporte</label>
        		<br/>
        		<input type="checkbox" name="beca" <?php 
        		if(isset($_POST["beca"])){
        		    echo "checked='checked'";
        		}
        		?>>
        		<label>Beca MEC</label>
        		<br/>
        		<input type="checkbox" name="FCT" <?php 
        		if(isset($_POST["FCT"])){
        		    echo "checked='checked'";
        		}
        		?>>
        		<label>Transporte FCT</label>
        		<br/>
    		</p>
    		<p>
    			<label>Curso en el que está matriculado</label><br/>
    			<input type="radio" name="curso" value="1º DAW" <?php 
    			//Hay que chequear si existe ya que en la carga no existe
    			if(isset($_POST['curso']) and $_POST['curso']=="1º DAW"){
        		    echo "checked='checked'";
        		}
        		?>>
    			<label>1º DAW</label>
    			<br>
    			<input type="radio" name="curso" value="2º DAW" <?php 
    			if(!isset($_POST['curso']) or $_POST['curso']=="2º DAW"){
        		    echo "checked='checked'";
        		}
        		
        		?>>
    			<label>2º DAW</label>
    			<br>
    		</p>
    		<p>
    			<label>Forma de acceso</label><br/>
    			<select name="acceso">
    				<option 
                    <?php if(isset($_POST["acceso"]) 
    				    and $_POST["acceso"]=='Bachillerato'){
    				    echo "selected='selected'";
    				}?>>Bachillerato</option>
    				<option <?php if(!isset($_POST["acceso"]) 
    				    or $_POST["acceso"]=='Grado Medio'){
    				    echo "selected='selected'";
    				}?>>Grado Medio</option>
    				<option label="Grado Superior" 
    				<?php if(isset($_POST["acceso"]) 
    				    and $_POST["acceso"]=='grado'){
    				    echo "selected='selected'";
    				}?>>grado</option>
    				<option value="otros" 
    				<?php if(isset($_POST["acceso"]) 
    				    and $_POST["acceso"]=='otros'){
    				    echo "selected='selected'";
    				}?>>Otros</option>
    			</select>
    		</p>
    		<p>
    			<label>Marca los módulos en los que te matriculas</label><br/>
    			<select name="modulos[]" multiple="multiple">
    				<option value="1_LM" <?php rellenarSeleccionado("1_LM")?>>LM</option>
    				<option value="1_PRO" <?php rellenarSeleccionado("1_PRO")?>>PRO</option>
    				<option value="1_DB" <?php rellenarSeleccionado("1_DB")?>>DB</option>
    				<option value="2_DWES" <?php rellenarSeleccionado("2_DWES")?>>DWES</option>
    				<option value="2_DWEC" <?php rellenarSeleccionado("2_DWEC")?>>DWEC</option>
    				<option value="2_DIW" <?php rellenarSeleccionado("2_DIW")?>>DIW</option>
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
	    $error = false;
	    
	    //Fecha debe no debe ser posterior a hoy
	    if(time()<strtotime($_POST["fechaS"])){
	        echo "<h3 style='color:red'>La fecha no puede ser futura</h3>";
	        $error = true;
	    }
	    //Nombre de alumno no puede estar vacío
	    if(empty($_POST["nombre"])){
	        echo "<h3 style='color:red'>El nombre no puede estar vacío</h3>";
	        $error = true;
	    }
	    //No se pueden seleccionar los dos servicios de transporte
	    if(isset($_POST["transporte"]) and isset($_POST["FCT"])){
	        echo "<h3 style='color:red'>No se pueden seleccionar dos servicios de tranporte</h3>";
	        $error = true;
	    }
	    //No se puede no coger alguna asignatura
	    if(isset($_POST["modulos"])){ //Si se han marcado módulos
	    //No se pueden coger asignaturas de 2º si se está en 1º	    
    	    if(substr($_POST["curso"], 0,1)=="1"){ //Si estamos en 10    	        
    	            foreach ($_POST["modulos"] as $m){
    	                if(substr($m,0,1)=="2"){ //Si el módulo empieza por 2 es de 2º
    	                    echo "<h3 style='color:red'>No puedes seleccionar módulos de 2º</h3>";
    	                    $error = true;
    	                    break; //Terminamos el bucle solamente con detectar un módulo de 2º
    	                }
    	            }
    	        }    	      
    	}
	    else{
	        echo "<h3 style='color:red'>Debes seleccionar algún módulo</h3>";
	        $error = true;
	    }
	    if(!$error){
	        echo "<h3 style='color:blue'>Formulario validado</h3>";
	    }
	}
	?>
	
</body>
</html>