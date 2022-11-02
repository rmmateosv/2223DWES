<?php 
require_once 'Menu.php';

function rellenarInput($nombre){    
    if(isset($_POST[$nombre])){
        echo $_POST[$nombre];
    }
}
function rellenarOpcion($posicion){
    if(isset($_POST['opciones'][$posicion])){
        return $_POST['opciones'][$posicion];
    }
}
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
		<label>Nº de opciones</label>
		<input type="number" name="numero" placeholder="1" value="<?php rellenarInput('numero')?>"/>
		<br/><br/>
		<input type="submit" value="Rellenar Opciones" name="rellenar"/>
	</p>
	<?php
	if(isset($_POST['rellenar']) or isset($_POST['crearYmostrar'])){
	?>
	<p>
		<label>Fondo</label><br/>
		<input type="color" name="colorF" value="<?php rellenarInput("colorF")?>"/><br/>
		<label>Texto</label><br/>
		<input type="color" name="colorT" value="<?php rellenarInput("colorT")?>"/><br/>
		<?php
		for($i=0;$i<$_POST["numero"];$i++){
		    echo "<input type='text' name='opciones[]' value='".rellenarOpcion($i)."'/><br/>";
		}
		?>		
		<input type="submit" name="crearYmostrar" value="Crear y Mostrar Menú"/>
	</p>
	<?php 
    	if(isset($_POST['crearYmostrar'])){
    	    //Creamos objeto menu
    	    $menu = new Menu($_POST['opciones'], $_POST['colorF'], $_POST['colorT']);
    	    //Pintar menú
    	    $menu->pintar();
    	}
	}
	?>
	</form>
</body>
</html>