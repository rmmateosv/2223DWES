<?php 
require_once 'Vivienda.php';
require_once 'funcionesFicheros.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form action="" method="post">
		<p>
			<label>Tipo Vivienda</label><br/>
			<select name="tipo">
				<option>Adosado</option>
				<option>Unifamiliar</option>
				<option>Piso</option>
			</select>
		</p>
		<p>
			<label>Zona</label><br/>
			<select name="zona">
				<option>Centro</option>
				<option>Periferia</option>
			</select>
		</p>
		<p>
			<label>Dirección</label><br/>
			<input type="text" name="direccion" placeholder="C/"/>			
		</p>
		<p>
			<label>Nº Habitaciones</label>
			<input type="radio" name="nh" value="1" checked="checked"/>1
			<input type="radio" name="nh" value="2"/>2
			<input type="radio" name="nh" value="3"/>3
		</p>
		<p>
			<label>Precio</label><br/>
			<input type="number" name="precio" step="0.1"  placeholder="€"/>			
		</p>
		<p>
			<label>Tamaño</label><br/>
			<input type="number" name="metros" step="0.1"  placeholder="m2"/>			
		</p>
		<p>
			<label>Extras</label><br/>
			<input type="checkbox" name="extras[]" value="Garaje"/>Garaje
			<input type="checkbox" name="extras[]" value="Trastero"/>Trastero
			<input type="checkbox" name="extras[]" value="Piscina"/>Piscina			
		</p>
		<p>
			<label>Observaciones</label><br/>
			<input type="text" name ="observaciones" placeholder="Observaciones"/>		
		</p>
		<p>
			<input type="submit" name="crear" value="Crear Vivienda"/>
		</p>
	</form>
	
	<?php 
	if(isset($_POST["crear"])){
	    //Chequeos
	    if(empty($_POST["direccion"]) or empty($_POST["precio"]) or empty($_POST["metros"])){
	        echo "<h3 style='color:red'>Error, no puede haber campos vacíos</h3>"; 
	    }
	    else{
	        //Rellenamos los extras que vienen en un array
	        $extras="";
	        if(isset($_POST["extras"])){
	            foreach ($_POST["extras"] as $e){
	                $extras.=$e;
	            }
	        }
	        $observ= htmlspecialchars($_POST["observaciones"]);
	        $v = new Vivienda($_POST["direccion"],$_POST["zona"],$_POST["direccion"],$_POST["nh"],
	            $_POST["precio"],$_POST["metros"],$extras,$observ);
	        guardarVivienda($v);
	       
	        
	    }
	}
	//Mostrar viviendas
	$viviendas = obtenerViviendas();
	if(sizeof($viviendas)){
	    ?>
	    <h1>LISTADO DE VIVIENDAS</h1>
	    <table border="1">
	    	<tr>
	    		<th>Tipo</th>
	    		<th>Zona</th>
	    		<th>Dirección</th>
	    		<th>Habitaciones</th>
	    		<th>Precio</th>	 	    		
	    		<th>Tamaño</th>
	    		<th>Extras</th>
	    		<th>Observaciones</th>
	    	</tr>
	    	<?php
	    	//Mostramos cada producto en una fila
	    	foreach ($viviendas as $v){
	    	    echo "<tr><td>".$v->getTipo()."</td>
	    	              <td>".$v->getZona()."</td>
                          <td>".$v->getCalle()."</td>
                          <td>".$v->getNh()."</td>
                          <td>".$v->getPrecio()."</td>
                          <td>".$v->getMetros()."</td>
                          <td>".$v->getExtras()."</td>
                          <td>".$v->getObservaciones()."</td>
                       </tr>";
	    	}
	    	?>
	    </table>
	    <?php
	}
	?>

</body>
</html>