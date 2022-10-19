<?php
if(isset($_GET["base"])){
    $base=$_GET["base"];
    if(isset($_GET["exp"])){
        $exp=$_GET["exp"];
        
        //Calculamos los productos
        $resultado=1;
        for($i=0;$i<$exp;$i++){
            $resultado*=$base;
        }
        echo "<br/>$base elevado a $exp = $resultado";
    }
    else{
        echo "<br/>Error, no se indica la exponente";
    }
}
else{
    echo "<br/>Error, no se indica la base";
}
?>