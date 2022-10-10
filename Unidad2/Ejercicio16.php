<?php 
function rellenarInput($name){
    if(isset($_POST[$name])){
        echo "value='".$_POST[$name]."'";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Ejercicio Formulario</title>
</head>
<body>	
	<form action="" method="post" enctype="">

		<label>Nº Alumnos</label><br/>
		<input type="number" name ="numAl" 
        		placeholder="Nº de alumnos" 
        		<?php rellenarInput("numAl")?>>
        <br/>		
		<input type="submit" name="enviar" value="Crear"><br/>        
	
	<?php 
	if(isset($_POST["enviar"]) or isset($_POST["mostrar"])){
	   //Si el nº de alumnso es mayor que 0
	    if($_POST["numAl"]>0){
	        //Generamos html en php	        
	        for($i=1;$i<=$_POST["numAl"];$i++){
	            //Generamos html en php
	            echo "<label>Alumno $i</label>";
	            
	            //El input lo hacemos al revés
	            //generamos php dentro de html
	            ?><!--  -->
	            	<input type="text" name=<?php echo "nombre$i";?> 
	            	       placeholder="Nombre" 
	            	       <?php rellenarInput("nombre".$i)?>	            	       	            	      	            	  
	            	       /><br/>
	            <?php 
	        }
	       ?>
	       	<input type="submit" name="mostrar" value="Mostrar"/>
	       </form>
	       <?php 
	    }
	}
	
	if(isset($_POST['mostrar'])){
	    echo "<br/>Alumnos:";
	    echo "<ul>";
	    for($i=1;$i<=$_POST['numAl'];$i++){
	        if(!empty($_POST["nombre".$i])){
	           echo "<li>".$_POST["nombre".$i]."</li>";
	        }
	    }
	    echo "</ul>";
	}
	?>
</body>
</html>