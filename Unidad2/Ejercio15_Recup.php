<?php 
	
	if(isset($_POST["Enviar"])){
	    echo "<br>Los datos introducidos son: ";
	    echo "<br>Nombre: " .$_POST["nombre"];
	    echo "<br>Apellidos: " .$_POST["apellidos"];
	    echo "<br>Contraseña: " .$_POST["contraseña"];
	   
	    echo "<br>Sexo: ". $_POST["sexo"];
	    
	    
	    
	    echo "<br>Fecha de Nacimiento: ".$_POST["fechaN"];
	    echo "<br>Fecha de Nacimiento: ".date("d/m/Y",strtotime($_POST["fechaN"]));
	    
	    echo "<br> Pais elegido: ";
	    if(isset($_POST["pais"])){
	        $pais = $_POST["pais"];
	        echo "<ul>";
	        foreach ($pais as $p){
	            echo "<li>$p</li>";
	        }
	        echo "</ul>";
	    }
	    
	    echo "<br> Numero de hijos: ".$_POST["hijos"];
	    
	    echo "<br>Aficiones: ";
	    if(isset($_POST["Cine"])){
	       echo $_POST["Cine"];
	    }
	    
	    if(isset($_POST["Deporte"])){
	        echo $_POST["Deporte"];
	    }
	    
	    if(isset($_POST["Leer"])){
	        echo $_POST["Leer"];
	    }
	    
	    echo "<br>Comentario Añadido: " .$_POST["Comentario"];
	    
	    echo "<br>Elemento foto:".$_FILES["foto"]["name"];
	    if(isset($_FILES["foto"])){
	        //Establecer fichero destino
	        $destino = "fotos/".$_FILES["foto"]["name"];
	        //Obtenemos el fichero temporal que se ha subido al servidor
	        //al hacer el submit
	        $ftmp = $_FILES["foto"]["tmp_name"];
	        if(move_uploaded_file($ftmp, $destino)){
	            echo "<img src='$destino'/>";
	        }
	        
	    }
	    
	}
	
	
	
	?>