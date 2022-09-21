<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	  //ARRAYS ESCALARES
	  //Definir array con valores
	  $diasSemana = array("Lunes","Martes","Miércoles","Viernes");
	  
	  //Acceder a un elemento del array
	  echo "<br/>El día que más me cuesta es $diasSemana[3]";
	  
	  //Arrays dinámicos- Añadir un elemento
	  $diasSemana[]="Jueves";
	  echo "<br/>Se ha añadido un día, el $diasSemana[4]";

      //Mostrar todo el array
      echo '<br/>Array $diasSemana:',var_dump($diasSemana);
      
      //Definir array vacío
      $datosPC = array();
      //Rellenamos ¡¡¡ con datos de diferentes tipos !!!
      $datosPC[]="Intel";
      $datosPC[]=16;
      $datosPC[]=1;
      $datosPC[]=3.8;
      //Mostramos el array
      echo '<br/>Array $datosPC:',var_dump($datosPC);
      
      //ARRAY ASOCIATIVOS
      $miPC = array("marca"=>"Intel","RAM"=>16,"HD"=>1,"Frec"=>3.8);
      //Mostrar la RAM y el HD
       echo "<br/>Mi ordenador tiene $miPC[RAM]GB de RAM y $miPC[HD]TB de HD";
      //Mostrar todo el array
       echo '<br/>Array $miPC:',var_dump($miPC);
       //Añadir un elemento nuevo
       $miPC["LIQ"]=true;
       echo '<br/>Array $miPC:',var_dump($miPC);
       //Modficar un elemento
       $miPC["LIQ"]=false;
       echo '<br/>Array $miPC:',var_dump($miPC);
       echo "<br/>Refrigeración Líquida:".$miPC['LIQ'];//Se muestra el valor vacío
       
  
	?>
</body>
</html>