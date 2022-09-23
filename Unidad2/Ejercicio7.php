<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>

    <body>
    	<?php 
    	  $array1=array(2345.65,"Carlos",34,
    	      array("Nombre"=>"María","Edad"=>19),true);
    	  
    	  for($i=0;$i<sizeof($array1);$i++){
    	      if(gettype($array1[$i])=="array"){
    	          foreach ($array1[$i] as $clave =>$valor){
    	              echo "<br/>=>$clave:$valor";
    	          }
    	      }
    	      else{
    	       echo "<br/>Posición $i:".gettype($array1[$i])."- Valor:$array1[$i]";
    	      }
    	  }
    	  
    	  ?>
    	
    	
    </body>
</html>