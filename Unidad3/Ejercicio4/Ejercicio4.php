<?php
require_once 'Evento.php';


use Ejercicio4\Evento;

//Se debe rellenar con lo que hay en la cookie
if(isset($_COOKIE["eventos"])){
    $eventos = unserialize($_COOKIE["eventos"]);
}
else{
    $eventos = array();
}
 

if(isset($_POST["crear"])){
    //Creamos objeto evento
    $evento = new Evento(strtotime($_POST["fecha"]), $_POST["hora"], $_POST["asunto"]);
    //Añadimos el evento al array de eventos
    $eventos[]=$evento;
    //Actualizar la cookie
    setcookie("eventos",serialize($eventos),time()+365*24*60*60);
}
if(isset($_POST['borrar'])){
    //Borrar el elemento de la posición que hay en $_POST['borrar']
    unset($eventos[$_POST['borrar']]);
    $eventos = array_values($eventos);
    //Modificar la cookie
    setcookie("eventos",serialize($eventos),time()+365*24*60*60);
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
		<table>
			<tr>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Asunto</th>
				<th>Acción</th>
			</tr>
			<?php
			foreach ($eventos as $clave=>$e){
			
			echo "<tr>
				<td>",date("d/m/Y",$e->getFecha()),"</td>
				<td>",$e->getHora(),"</td>
				<td>",$e->getAsunto(),"</td>
				<td><button type='submit' name='borrar' value='$clave'>Borrar</button></td>
			</tr>";			
			}
			?>
			<tr>
				<td><input type="date" name="fecha" value="<?php echo date("Y-m-d",time())?>"/></td>
				<td><input type="time" name="hora" value="<?php echo date("h:i",time())?>"/></td>
				<td><input type="text" name="asunto" placeholder="Asunto"/></td>
				<td><input type="submit" name="crear" value="Añadir"/></td>
				
			</tr>
		</table>
	</form>
	
</body>
</html>