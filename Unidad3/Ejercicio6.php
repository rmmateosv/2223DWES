<?php 
//Rellenar el array de tiradas si es que hay
session_start();
if(isset($_SESSION["tiradas"])){
    $tiradas = $_SESSION["tiradas"];
}
else{
    $tiradas= array();
}
if(isset($_POST["tirar"]) and !empty($_POST["jugador"])){
    //Tirar dado
    $dado = rand(1,6);
    //Guardar la tirada en el array
    $tiradas[$_POST["jugador"]]=$dado;
    //Guardar datos en la sesión
    $_SESSION["tiradas"] = $tiradas;
}
if(isset($_POST["borrar"])){
    session_unset(); //Se destruye el array $_SESSION y la sesión
    unset($tiradas); //Se destruye el array $tiradas
    
    //session_destroy(); //Se destruye solamente la sessión, $_SESSION sigue igual. Hay recargar
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
		<label>Nombre Jugador</label><br/>
		<input type="text" name="jugador" placeholder="Nombre del jugador"><br/>
		<input type="submit" value="Tirar Dado" name="tirar"/><br/>
		<?php 
		//Mostrar tiradas
		if(isset($tiradas)){
		    foreach ($tiradas as $clave=>$valor){
		        echo "<br/>$clave:$valor";
		    }
		}
		?>
		<br/><input type="submit" value="Borrar Jugadores" name="borrar"/><br/>
	</form>	
</body>
</html>