<?php 
include_once 'Alumno.php';

//Definición de funciones
function guardarAlumno(Alumno $alumno){
    //Abrimos el fichero alumnos.txt
    $fichero = fopen("alumnos.txt", "a+");
    //Escribimos el alumno
    fwrite($fichero, $alumno->getExp().";".
                     $alumno->getNombre().";".
                     date("d/m/Y",$alumno->getFechaN()));
    //Escribimos asignaturas con el forato LM:10
    foreach ($alumno->getAsig() as $a=>$n){
        fwrite($fichero, ";".$a.":".$n);
    }
    //Se escribe el fin de línea
    fwrite($fichero, "\n");
}
function cargarAlumnos(){

    $array= file("alumnos.txt");
    
    foreach ($array as $linea){
        //Dividimos la línea en campos
        $campos = explode(";", $linea);        
        //Crear alumno
        $alumno = new Alumno($campos[0], $campos[1], $campos[2]);
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
	<form method="post" action="">
		<p>
    		<label>Expendiente</label>
    		<br/>
    		<input type="number" name="exp" />
		</p>
		<p>
    		<label>Nombre</label>
    		<br/>
    		<input type="text" name="nombre" placeholder="Nombre Alumno" />
		</p>
		<p>
    		<label>Fecha Nacimiento</label>
    		<br/>
    		<input type="date" name="fechaN" />
		</p>
		<p>
			<input type="submit" name="crear" value="Crear Alumno" />
		</p>
	</form>
	
	<?php
	if(isset($_POST["crear"])){
	    //Chequeamos que se han rellenado todos los datos
	    if(!empty($_POST["exp"]) and 
	       !empty($_POST["nombre"]) and 
	       !empty($_POST["fechaN"])){
	           
           //Creamos el alumno
	           $a = new Alumno($_POST["exp"], $_POST["nombre"], 
	                           strtotime($_POST["fechaN"]));
           
           //Guardar el alumno en el fichero alumnos.txt
           guardarAlumno($a);
           
	    }
	    else{
	        echo "<br/>Error, no se han rellenado todos los datos";
	    }
	    
	}
	
	//Mostrar los alumnos que hay en el fichero
	$alumnos = cargarAlumnos();
	?>
</body>
</html>