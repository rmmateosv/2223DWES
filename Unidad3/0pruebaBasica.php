<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form action="" method="post">
		<label>Texto</label>
		<input type="text" name="texto" placeholder="Introduce texto">
		<br/>
		<input type="submit" name="guardar" value="Guardar en Cookie"/>
		<input type="submit" name="borrar" value="Borrar de Cookie"/>
	</form>
	<?php
	if(isset($_POST['guardar'])){
	    //Guardar en una cookie que caduca cuando se cierra el navegador
	    setcookie('Mitexto',$_POST["texto"]);
	    //Guardar en una cookie que dure un día
	    setcookie('Mitexto',$_POST["texto"],time()+84600);
	}
	if(isset($_POST['borrar'])){
	    //Guardar en una cookie
	    setcookie('Mitexto',"",time()-1);
	}
	
	//Mostramos lo que hay en la cookie
	if(isset($_COOKIE["Mitexto"])){
	    echo "<p>Valor de Mitexto en cookie:".$_COOKIE["Mitexto"]."</p>";
	}
	
	?>
</body>
</html>