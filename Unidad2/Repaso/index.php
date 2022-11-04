<?php 

require_once 'Persona.php';
require_once 'funcionesFicheros.php';

use Repaso\Persona;

function  rellenarValue($nombreCampo) {
    if(isset($_POST[$nombreCampo])){
        echo $_POST[$nombreCampo];
    }
}

function rellenarRadio($sexo,$valor, $defecto){
    if(isset($_POST[$sexo])){
        if($_POST[$sexo]==$valor){
            echo "checked='checked'";
        }        
    }
    if($defecto){
        echo "checked='checked'";
    }
}
function rellenarCheck($nombreCampo) {
    if(isset($_POST[$nombreCampo])){
        echo "checked='checked'";
    }
}
function  rellenarSelect($tipo,$valor){
    if(isset($_POST[$tipo])){
        if($_POST[$tipo]==$valor){
            echo "selected='selected'";
        }
    }
}
function  rellenarSelectMultiple($tipo,$valor){
    if(isset($_POST[$tipo])){
        if(in_array($valor, $_POST[$tipo])){
            echo "selected='selected'";
        }
    }
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
		<p>
    		<label>Nombre</label> <br/>
    		<input type="text" name="nombre" value="<?php rellenarValue('nombre') ?>"/>
		</p>
		<p>
			<label>Sexo</label> <br/>
    		<input type="radio" name="sexo" value="M" <?php rellenarRadio("sexo","M",true)?>/>Mujer
    		<input type="radio" name="sexo" value="H" <?php rellenarRadio("sexo","H",false)?>/>Hombre	
		</p>
		<p>
			<label>Asignaturas</label> <br/>
    		<input type="checkbox" name="dwes" value="dwes" <?php rellenarCheck('dwes')?>/>DWES
    		<input type="checkbox" name="dwec" value="dwec" <?php rellenarCheck('dwec')?>/>DWEC	
		</p>
		<p>
			<label>Tipo de acceso</label> <br/>
        	<select name="tipo">
        		<option <?php rellenarSelect("tipo","Grado Medio")?>>Grado Medio</option>
        		<option <?php rellenarSelect("tipo","Bachillerato")?>>Bachillerato</option>
        	</select>
		</p>
		<p>
			<label>Becas</label> <br/>
        	<select name="beca[]" multiple="multiple">
        		<option <?php rellenarSelectMultiple("beca","Transporte")?>>Transporte</option>
        		<option <?php rellenarSelectMultiple("beca","Ministerio")?>>Ministerio</option>
        		<option <?php rellenarSelectMultiple("beca","FCT")?>>FCT</option>
        	</select>
		</p>
		<input type = "submit" name="enviar" value="enviar"/>
	</form>
	
	
	<?php 
	if(isset($_POST['enviar'])){
	    //Guardar en el fichero
	    $p = new Persona($_POST["nombre"], $_POST["sexo"], $_POST["tipo"]);
	    guardar($p);
	}
	
	$personas = obtener();
	if(sizeof($personas)>0){
	    foreach ($personas as $p){
	        echo "<h3>",$p->getNombre(),"-",$p->getSexo(),"-",$p->getTipo(),"</h3>";
	    }
	}
	?>
</body>
</html>