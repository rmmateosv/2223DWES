<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	 //if/elseif/else
	 $nota=10;
	 if($nota<5){
	     echo "<br/>Suspenso";
	 }
	 elseif($nota<9){
	     echo "<br/>Aprobado";
	 }
	 else{
	     echo "<br/>Sobresaliente";
	 }
	 
	 //Operador ternario
	 $nota = 3;
	 $texto=($nota<5?"Suspenso":"Aprobado");
	 echo "<br/>$texto";
	 
	 //switch
	 switch($texto){
	     case "Aprobado":
	         echo "<br/>ENOHORABUENA!!";
	         break;
	     case "Suspenso":
	          echo "<br/>ÁNIMO, UN ESFUERZO MÁS";
	          break;
	 }
	 
	 $nota = 10;
	 switch($nota){
	     case $nota<5:
	         echo "<br/>Tu nota es menor que 5";
	         break;
	     case ($nota>=5 and $nota<9):
    	     echo "<br/>Tu nota está entre 5 y 9";
    	     break;
	     default:
	         echo "<br/>Tu nota es mayor de 9";
	         break;
	 }
	 
	 //for
	 //Mostrar nº pares del 10 al 0
	 echo "<h2>Nº pares del 10 al 0 con bucle for</h2>";
	 for($i=10;$i>=0;$i=$i-2){
	     echo "<br/>$i";
	 }
	 
	 echo "<h2>Nº pares del 10 al 0 con bucle while</h2>";
	 $cont=10;
	 while($cont>=0){
	     echo "<br/>$cont";
	     $cont=$cont-2;
	 }
	 echo "<h2>Nº pares del 10 al 0 con bucle do while</h2>";
	 $cont = 10;
	 do{
	     echo "<br/>$cont";
	     $cont=$cont-2;
	 }while($cont>=0);
	 
	 //Foreach
	 $a1=array(1,2,3,4,5);
	 echo '<br/>Array $a1:';
	 foreach($a1 as $elemento){
	     echo "<br/>$elemento";
	 }
	 foreach($a1 as $clave=>$elemento){
	     echo "<br/>$clave:$elemento";
	 }
	 
	 $a2=array("mombre"=>"rosa","edad"=>18);
	 echo '<br/>Array $a2:';
	 foreach($a2 as $elemento){
	     echo "<br/>$elemento";
	 }
	 foreach($a2 as $clave=>$elemento){
	     echo "<br/>$clave:$elemento";
	 }
	 
	 //Break: Para la ejecución de una estructura de código
	 echo "<br/>Nº del 1 al 100 pero que pare en el 3:<br/>";
     for($i=0;$i<100;$i++){
         echo " $i ";
         if($i==3){
             break;
         }
     }
	 echo "<br/>";
	 //Continue
     echo "<br/>Nº del 1 al 100 pero que salte el 3:<br/>";
     for($i=0;$i<100;$i++){         
         if($i==3){
             continue;
         }
         echo " $i ";
     }
	 echo "<br/>";
	?>
</body>
</html>