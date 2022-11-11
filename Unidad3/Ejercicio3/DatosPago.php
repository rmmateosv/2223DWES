<?php 

if(!isset($_COOKIE["nombre"]) or !isset($_COOKIE["apellidos"])){
    header("location:DatosPers.php");
}

function recordarRadio($nombre, $valor, $defecto) {
    
    if(isset($_COOKIE[$nombre])){
        
        if($_COOKIE[$nombre] == $valor){
            
            return "checked='checked'";
        }
        
    }else{
        if($defecto){
            return "checked='checked'";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>DatosPago</title>
</head>
<body>

	
	<form action="Trata_cookies.php" method="post">
	
    	<p>
    		<label>Tipo de pago:</label><br>
    		<input type="radio" name="tipoP" value="Transferencia" <?php echo recordarRadio("tipoP", "Transferencia", false); ?> />Transferencia
    		<input type="radio" name="tipoP" value="Contrarreembolso" <?php echo recordarRadio("tipoP", "Contrarreembolso", true); ?> />Contrarreembolso
    	</p>
    	
    	<input type="submit" name="guardar2" value="Guardar y continuar" />
	
	
	</form>

	

</body>
</html>