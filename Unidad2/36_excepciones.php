<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
	   $dividendo = 4;
	   $divisor = 2;
	   
	   //Provocamos una excepción de tipo Error, porque divisor no es variable
	   try {
	       $resultado = $dividendo/divisor;
	       echo "<br/>División efectuada correctamente:$resultado";
	       
	   } catch (Exception $e) {
	       echo "<br/>Se ha producido una excepción";
	   }
	   catch (Error $e) {
	       echo "<br/>Se ha producido una error porque divisor no existe";
	   }
	   //Código correcto, ya no hay error
	   try {
	       $resultado = $dividendo/$divisor;
	       echo "<br/>División efectuada correctamente:$resultado";
	       
	   } catch (Exception $e) {
	       echo "<br/>Se ha producido una excepción";
	   }
	   catch (Error $e) {
	       echo "<br/>Se ha producido un error porque divisor no existe";
	   }
	   
	   //Provocamos una división por 0.
	   $divisor=0;
	   try {
	       $resultado = $dividendo/$divisor;
	       echo "<br/>División efectuada correctamente:$resultado";
	       
	   } catch (Exception $e) {
	       echo "<br/>Se ha producido una excepción";
	   }
	   catch (DivisionByZeroError $e){
	       echo "<br/>Se ha producido una división por 0";
	       echo $e->getMessage();
	   }
	   catch (Error $e) {
	       echo "<br/>Se ha producido un error";
	   }
	   
	   //Provocamos una división por 0 y capturamos con throwable.
	   $divisor=0;
	   try {
	       $resultado = $dividendo/$divisor;
	       echo "<br/>División efectuada correctamente:$resultado";
	       
	   } catch (Throwable $e) {
	       echo "<br/>Se ha producido una excepción, capturamos con Throwable:";
	       echo $e->getMessage();
	   }
	   
	?>
</body>
</html>