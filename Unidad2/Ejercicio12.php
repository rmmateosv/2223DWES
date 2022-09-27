<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>

    <body>
    	<?php 
    	   //crear el array
    	for($i=0;$i<10;$i++){
    	   $numeros[]=$i**2; 
    	}

    	?>
    	<table border="1">
    	<tr>
    		<td>x</td>
    		<?php 
    		foreach ($numeros as $clave=>$valor){
    		    echo "<td>$clave</td>";
    		}
    		?>
    	</tr>
    	<tr>
    		<td>x**2</td>
        	<?php 
        	//Mostrar
        	foreach ($numeros as $valor){
        	    echo "<td>$valor</td>";
        	}
        	?>
    	</tr>
    	</table>
    </body>
</html>
