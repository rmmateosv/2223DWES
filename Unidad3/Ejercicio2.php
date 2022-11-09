<?php 
function obtenerColorFondo(){
    if(isset($_COOKIE["colorF"])){
        return $_COOKIE["colorF"];
    }
    else{
        return "white";
    }
}
function obtenerColorTexto(){
    if(isset($_COOKIE["colorT"])){
        return $_COOKIE["colorT"];
    }
    else{
        return "black";
    }
}
if(isset($_POST["guardar"])){
    setcookie("colorF",$_POST["colorF"]);
    setcookie("colorT",$_POST["colorT"]);
    //O modificamos $_COOKIE o redireccionamos
    $_COOKIE["colorF"]=$_POST["colorF"];
    $_COOKIE["colorT"]=$_POST["colorT"];
    //header("location:Ejercicio2.php");
}
if(isset($_POST["borrar"])){
    setcookie("colorF","",1);
    setcookie("colorT","",1);
    //O modificamos $_COOKIE o redireccionamos
    $_COOKIE["colorF"]="white";
    $_COOKIE["colorT"]="black";
    //header("location:Ejercicio2.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body bgcolor="<?php echo obtenerColorFondo()?>" style="color:<?php echo obtenerColorTexto()?>;">
	<form action="" method="post">
		<label>Color de fondo</label><br/>
		<input type="color" name="colorF" value="<?php echo obtenerColorFondo()?>"><br/>
		<label>Color de texto</label><br/>
		<input type="color" name="colorT" value="<?php echo obtenerColorTexto()?>"><br/>		
		<input type="submit" value="Guardar" name="guardar"/>
		<input type="submit" value="Borrar" name="borrar"/>
	</form>
	
</body>
</html>