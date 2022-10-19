<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	   //Incluímos el fichero donde se define la clase alumno
	   include_once 'Alumno.php';
	   //Creamos un alumno
	   $a = new Alumno(1, "Iván Zamorano", strtotime("2000-01-02"));
	   //Mostrar alumno
	   $a->mostrar();
	   //Destruir objeto
	   //Si no se llama a unset, el objeto se destruye al finalizar el programa
	   unset($a);
	   echo "<br/>Fin del programa";
	?>
</body>
</html>