<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>

    <body>
    	<?php 
    	  $array1=array("Cougar","Ford","",2500,"V6",182);
    	  $array2=array("Modelo"=>"Cougar","Marca"=>"Ford","fecha"=>"",
    	      "cc"=>2500,"motor"=>"V6","Potencia"=>182);
    	  echo '$arrray1: Array Escalar - Nº de elementos:'.sizeof($array1);
    	  ?>
    	
    	<table border=1 bgcolor="aqua">
    		<tr>
    			<td>0<br/><?php echo $array1[0]?></td>
    			<td>1<br/><?php echo $array1[1]?></td>
    			<td>2<br/><?php echo $array1[2]?></td>
    			<td>3<br/><?php echo $array1[3]?></td>
    			<td>4<br/><?php echo $array1[4]?></td>
    			<td>5<br/><?php echo $array1[5]?></td>
    		</tr>
    	</table>
    	
    	<?php
    	echo '$arrray2: Array Asociativo - Nº de elementos:'.sizeof($array2);
    	?>
    	<table border=1 bgcolor="aqua">
    		<tr>
    			<td>Modelo<br/><?php echo $array2["Modelo"]?></td>
    			<td>Marca<br/><?php echo $array2["Marca"]?></td>
    			<td>FEcha<br/><?php echo $array2["fecha"]?></td>
    			<td>CC<br/><?php echo $array2["cc"]?></td>
    			<td>motor<br/><?php echo $array2["motor"]?></td>
    			<td>Potencia<br/><?php echo $array2["Potencia"]?></td>
    		</tr>
    	</table>	
    </body>
</html>