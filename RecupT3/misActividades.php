<?php
require_once 'Cliente.php';
require_once 'Usuario.php';
require_once 'Actividad.php';
require_once 'AccesoDatos.php';

function seleccionar($id){
    if($_POST['actividad']==$id){
        echo "selected='selected'";
    }
}
session_start();
if(!isset($_SESSION['usuario'])){
   header('location:login.php'); 
}
else{
    $bd = new AccesoDatos();
    if($bd->getConexion()==null){
        $mensaje = "Error, no hau conexión a la bd";
    }
    else{
        $u = $_SESSION['usuario'];
        $c = $bd->obtenerCliente($u->getUsuario());
        
        $actividades = $bd->obtenerActividades(); 
    }
}
?>
<!doctype html>
<html>
      <head>
        <meta charset="utf-8">        
        <title>Recuperaci�n T3 22_23</title>
       </head>
     <body>     		
     		<form action="" method="post">    
     			<h1 style="color:blue;">INSCRIBITE EN LAS ACTIVIDADES QUE TE GUSTEN</h1> 
        		<h2 style="color:blue;">Cliente:<?php echo $c->getId()."-".$c->getNombre()?> </h2> 
         		<div> 
                    <h3 style='color:red;'><?php if(isset($mensaje)){ echo $mensaje;}?></h3> 
                </div>            	                      
            	<label>Actividad</label>	
            	<select id="actividad" name="actividad" onchange="this.form.submit()">
                     <?php
                     foreach ($actividades as $a){
                         echo "<option value='"
                               .$a->getId()."' ".seleccionar($a->getId()).">"
                               .$a->getNombre()."</option>";
                     }
                     ?>   
                </select>
                <label>Coste Mensual</label>  	
                <input type="number" value="" disabled="disabled"/>
            	<input type="submit"  name="contratar" value="Contratar"/>    
            	<input type="submit"  name="baja" value="Baja"/> 	
            	<input type="submit"  name="salir" value="Salir"/>                       
      		</form> 
      		<h3 style='color:blue;'>Actividades Contratadas</h3>           		
      		<hr/> 
      		<table width="100%">
      			<tr>
      				<th align="left">Id</th>
      				<th align="left">Nombre</th>
      				<th align="left">Coste Mensal</th>
      			</tr>   			
      		</table>       	
    		<hr/> 	      
	</body>
</html>
