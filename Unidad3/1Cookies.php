<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
	//Guardar en la cookie aceptar
	if(isset($_GET["aceptar"])){
	    //Ponemos un mes de caducidad
	    setcookie("aceptar",true,time()+(30*24*60*60));	    
	    //Meter en  $_COOKIE aceptar manualmente para no redireccionar
	    $_COOKIE['aceptar']=true;
	}
	//comprobar si se aceptan las cookies
	if(!isset($_COOKIE['aceptar'])){
	    echo "<h2>Aceptas las Cookies? <a href='?aceptar=si'>Sí</a></h2>";
	}
	else{
	?>
    	<p align="right">
    		<a href="?idioma=es">ES</a>
    		<a href="?idioma=en">EN</a>
    	</p>
    	<?php 
    	$textoSP = 'Hola Mundo';
    	$textoEN = 'Hello World';
    	//Guardar Valor de idioma en cookie
    	if(isset($_GET['idioma'])){
    	    //No ponemos fecha de cadudidad, la cookie se borra al cerra el navegador
    	    setcookie("idioma",$_GET['idioma']);
    	    //REcargar para que se actualice $_COOKIE
    	    header('location:1Cookies.php');
    	}
    	
    	//Mostrar el texto en el idioma seleccionado, por defecto SP
    	if(!isset($_COOKIE['idioma']) or $_COOKIE['idioma']=='es'){
    	    echo $textoSP;
    	}
    	else{
    	    echo $textoEN;
    	}
	}
	?>
	
</body>
</html>