<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	 $num1=4;
	 $num2=3;
	 
	 //Operadores artiméticos y de cadena
	 echo "<br/>$num1+$num2=".($num1+$num2);
	 echo "<br/>$num1-$num2=".($num1-$num2);
	 echo "<br/>$num1*$num2=".($num1*$num2);
	 echo "<br/>$num1/$num2=".($num1/$num2);
	 echo "<br/>$num1%$num2=".($num1%$num2);
	 echo "<br/>$num1 elevado a $num2=".($num1**$num2);
	 
	 //Asignación
	 $num1+=$num2;
	 echo "<br/>$num1"; //Suma y asigna $num1=7
	 
	 //Comparación
	 $num1=3;
	 $var1="3";
	 
	 if($num1==$var1){
	     echo '<br/>$num1 y $var1 tienen el mismo valor '."$num1 y $var1";
	 }

	 if($num1===$var1){
	     echo '<br/>$num1 y $var1 tienen el mismo valor y el mismo tipo '.
	   	     gettype($num1)." y ".gettype($var1);
	 }
	 else{
	     echo '<br/>$num1 y $var1 tienen el mismo valor PERO diferente tipo '.
	   	     gettype($num1)." y ".gettype($var1);
	 }
	 
	?>
</body>
</html>