<?php
function obtenerAccesos(){
    if(isset($_COOKIE["accesos"])){
        return $_COOKIE["accesos"];
    }
    else{
        return 0;
    }
}
function obtenerFecha(){
    if(isset($_COOKIE["fechaUA"])){
        return date("d/m/Y h:i:s",$_COOKIE["fechaUA"]);
    }
    else{
        return "No se ha accedido nunca";
    }
}
//Acutalizo la cookie
setcookie("accesos",obtenerAccesos()+1,time()+(365*24*60*60));
setcookie("fechaUA",time(),time()+(365*24*60*60));
if(isset($_POST["borrar"])){
    //Borramos las cookies poninendo la fecha de caducidad en el pasado
    setcookie("accesos","",1);
    setcookie("fechaUA","",1);
    //Redireccionamos para refrescar
    header("location:Ejercicio1.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form action="" method="post">
		<label>Nº de Accesos:<?php echo obtenerAccesos()?></label><br/>
		<label>Fecha Último Acceso:<?php echo obtenerFecha()?></label><br/>		
		<input type="submit" value="Actualizar" name="actualizar"/>
		<input type="submit" value="Borrar" name="borrar"/>
	</form>
	
</body>
</html>