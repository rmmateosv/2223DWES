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

		<label>Texto</label>
		<input type="text" name ="texto" 
        		placeholder="Introduce un texto" 
        		<?php rellenarInput("texto")?>>
        <br/>
        <label>Color de Texto</label>
		<input type="color" name ="colorT"         		
        		<?php rellenarInput("colorT")?>>
        				<label>Color de Texto</label>
        <br/>
        <label>Color de Fondo</label>
		<input type="color" name ="colorF"         		
        		<?php rellenarInput("colorF")?>>
        <br/>		
		<input type="submit" name="enviar" value="Pintar"><br/>        
	
	</form>
	
	<?php
	if(isset($_POST["enviar"])){
	    if(empty($_POST["texto"])){
	        echo "<p style='color:red'>Error, el texto está vacío</p>";
	    }elseif($_POST["colorT"]==$_POST["colorF"]){
	        echo "<p style='color:red'>Error, los colores son iguales</p>";
        }
        else{
            $colorT= $_POST["colorT"];
            $colorF= $_POST["colorF"];
            $texto=$_POST["texto"];
            echo "<p style='color:$colorT;background-color:$colorF;'>$texto</p>";
        }
	}
	?>
</body>
</html>