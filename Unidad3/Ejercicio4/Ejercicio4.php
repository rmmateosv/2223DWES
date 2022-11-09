<?php
require_once 'Evento.php';


use Ejercicio4\Evento;

if(isset($_POST["crear"])){
    //Creamos objeto evento
    $evento = new Evento($fecha, $hora, $asunto)
    //Añadimos el evento al array de eventos
    //Actualizar la cookie
    
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