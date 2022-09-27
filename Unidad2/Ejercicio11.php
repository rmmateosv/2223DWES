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
    	echo "<h2>Los nº generados son:$n1, $n2</h2>";
    	if(is_int($n1) and is_int($n2)){
    	    echo "<br/>La suma de $n1+$n2:".($n1+$n2);
    	    echo "<br/>La resta de $n1-$n2:".($n1-$n2);
    	    echo "<br/>La multipliación de $n1*$n2:".($n1*$n2);
    	    if($n2==0){
    	        echo "<br/>Error, división por 0 no se puede / ni %" ;
    	    }
    	    else{    	        
    	        echo "<br/>La división de $n1/$n2:".($n1/$n2);
    	        echo "<br/>La resto de $n1%$n2:".($n1%$n2);    	        
    	    }
    	    echo "<br/>La potencia de $n1**$n2:".($n1**$n2);
    	}
    	else{
    	    echo "<br/>Error, las variables no son enteras";
    	}
    	?>
    	
    </body>
</html>