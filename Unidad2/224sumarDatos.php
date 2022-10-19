<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
	   $suma = 0;
	   $contador = 1;
	   while(isset($_POST["num".$contador])){
	       $suma+=$_POST["num".$contador];
	       $contador++;
	   }
	   echo "<br/>La suma de los números es:$suma";
	   
	?>
</body>
</html>