<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form action="224sumarDatos.php" method="post">
		
		<?php 
		//Chequeamos que el número no esté vacío
		if(empty($_POST["numero"])){
		    $numero=0;
		}
		else{
		    $numero=$_POST["numero"];
		}
		for ($i = 1; $i <= $numero; $i++) {
		    ?><!--  -->
		    <label>Número <?php echo $i;?></label>
		    <input type ="number" name="<?php echo 'num'.$i;?>"/><br/>
		    <?php 
		}
		?>
		<input type= "submit" name="enviar" value="Sumar">
	</form>
</body>
</html>