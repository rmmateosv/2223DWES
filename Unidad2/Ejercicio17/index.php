<?php 
require_once 'Cita.php';
require_once 'funcionesFicheros.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form action="" method="posr">
		<p>
			<label>Fecha Cita</label><br/>
			<input type="date" name="fecha"/>
		</p>
		<p>
			<label>Hora de la Cita</label><br/>
			<input type="time" name="hora"/>
		</p>
		<p>
			<label>Nobmre Cliente</label><br/>
			<input type="text" name="nombre" placeholder="Nombre Cliente"/>
		</p>
		<p>
			<select name="tipoServicio">
				<option value='CS'>Corte Señora</option>
				<option value='CC'>Corte Caballero</option>
				<option value='T'>Tinte</option>
				<option value='M'>Mechas</option>
			</select>
		</p>
		<p>
			<input type="submit" name="crear" value="Crear Cita"/>
		</p>
	</form>
	
	<?php
	   //Crear cita
	if(isset($_POST['crear'])){
	    if(empty($_POST['hora']) or empty($_POST['fecha']) or
	        empty($_POST['nombre'])){
	            echo "<h3 style='color:red'>Error, no puede haber campos vacíos</h3>"; 
	    }
	    else{
	        $cita = new Cita($_POST['fecha'], $_POST['hora'], $_POST['nombre'], $_POST['tipoServicio']);
	        guardarCita($cita);
	    }
	}
	   
	   //Mostrar Citas
	$citas = obtenerCitas();
	if(sizeof($citas)>0){
	?>
	    <h1>CITAS	</h1>
	    <table border="1">
	    	<tr>
	    		<th>Fecha</th>
	    		<th>Hora</th>
	    		<th>Cliente</th>
	    		<th>Tipo de Servicio</th>
	    		<th>Tiempo estimado</th>	 	    		
	    	</tr>
	    	<?php
	    	//Mostramos cada producto en una fila
	    	foreach ($citas as $c){
	    	    echo "<tr><td>".$c->getFecha()."</td>
	    	              <td>".$c->getHora()."</td>
                          <td>".$c->getNombre()."</td>
                          <td>".$c->textoTipoServicio()."</td>
                          <td>".$c->tiempoTipoServicio()."</td>
                       </tr>";
	    	}
	    	?>
	    </table>
	    <?php 
	}
	   
	?>
</body>
</html>