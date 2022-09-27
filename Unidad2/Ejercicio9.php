<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>

    <body>
    	<?php 
    	  //Generar nº
    	  $n1=rand(0,10);
    	  $n2=rand(0,10);
    	  $n3=rand(0,10);
    	
    	  echo "<br/>Los nº generados son:$n1, $n2, $n3";
    	  //Repetidos
    	  if($n1==$n2 or $n1==$n3){
    	      echo "<br/>El número $n1 está repetido";
    	  }
    	  elseif($n2==$n3){
    	      echo "<br/>El número $n2 está repetido";
    	  }
    	  else{
    	      echo "<br/>No hay nº repetidos";
    	  }
    	  
    	  //Ordenar
    	  if($n1<=$n2 and $n2<=$n3){
    	      $min = $n1;
    	      $medio = $n2;
    	      $max=$n3;
    	  }
    	  if($n1<=$n2 and $n2>$n3){
    	      $min = $n1;
    	      $medio = $n3;
    	      $max=$n2;
    	  }
    	  if($n1>$n2 and $n1<=$n3){
    	      $min = $n2;
    	      $medio = $n1;
    	      $max=$n3;
    	  }
    	  
    	  if($n1>$n2 and $n1>$n3){
    	      $min = $n2;
    	      $medio = $n3;
    	      $max=$n1;
    	  }
    	  if($n3<=$n1 and $n1<=$n2){
    	      $min = $n3;
    	      $medio = $n1;
    	      $max=$n2;
    	  }
    	  if($n3<$n1 and $n1>$n2){
    	      $min = $n3;
    	      $medio = $n2;
    	      $max=$n1;
    	  }
    	  
    	  echo "<br>Los nº ordenados son: $min, $medio, $max";
    	  
    	?>
    	
    </body>
</html>