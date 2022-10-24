<?php
include_once 'accesoFichero.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form method="post" action="">
		<p>
    		<label>Selecciona Asignatura</label>
    		<br/>
    		<select name="asig">
    			<option selected="selected">LM</option>
    			<option>BD</option>
    			<option>DWES</option>
    			<option>DWEC</option>
    		</select>
		</p>
		<p>
    		<label>Nota</label>
    		<br/>
    		<input type="number" name="nota" value="0">
		</p>
		<p>
    		<label>Selecciona Alumno</label>
    		<br/>
    		<?php $alumnos = cargarAlumnos()?>
    		<select name="alum">
    			<?php
    			foreach ($alumnos as $a){
    			    echo "<option value='".$a->getExp()."'>".$a->getNombre()."</option>";
    			}
    			?>	
    		</select>
		</p>
		
		<input type="submit" name="crearNota" value="Poner Nota">
	</form>
	<?php 
	if(isset($_POST["crearNota"])){
	    //Chequear que hay asignatura, nota y alumno
	    if(isset($_POST["asig"]) and isset($_POST["alum"]) and !empty($_POST["nota"])){
	        //Obtenemos los alumnos del fichero
	        $alumnos = cargarAlumnos();
	        //Borramos el fichero de alumnos
	        borrarFichero();
	        //Recorremos los alumnos hasta encontrar el que queremos modificar
	        foreach ($alumnos as $a){
	            //Comprobar si es el que queremos modificar
	            if($a->getExp()==$_POST["alum"]){
	                //Añadimos la nota
	                $a->addNota($_POST["asig"], $_POST["nota"]);
	            }
	            guardarAlumno($a);
	        }
	    }
	    else{
	        echo "<br/>Error, debe rellenar todos los campos";
	    }
	}
	?>

</body>
</html>