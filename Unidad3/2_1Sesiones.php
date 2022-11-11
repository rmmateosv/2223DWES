<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	session_name("Rosa");
	session_start();
	echo "<h3>Nombre en sesión ",$_SESSION["nombre"],"</h3>";
	echo "<h3>Apellidos en sesión ",$_SESSION["apellidos"],"</h3>";
	?>
	
</body>
</html>