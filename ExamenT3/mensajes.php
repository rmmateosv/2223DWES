<?php 
require_once 'AccesoDatos.php';
require_once 'Empleado.php';
require_once 'Departamento.php';
require_once 'Mensaje.php';
session_start();
if(!isset($_SESSION['empleado'])){
    header('location:login.php');
}

$empleado = $_SESSION['empleado'];

if(isset($_POST['cerrar'])){
    session_unset();
    header('location:login.php');
}

$bd = new AccesoDatos();
if($bd->getConexion()==null){
    $mensaje = 'Error, no hay conexión con la bd';
}
else{
    $dep = $bd->obtenerDptos();
    
    if(isset($_POST['Enviar'])){
        if(empty($_POST['asunto']) or empty($_POST['mensaje'])){
            $mensaje="Error, debes rellenar asunto y mensaje";
        }
        else{
            //Obtener empleados del dpto en para
            $emples = $bd->obtenerEmpleados($_POST['para']); 
            if($bd->enviarMensaje($empleado,$_POST['para'],
                $_POST['asunto'],$_POST['mensaje'],$emples)){
                $mensaje="Mensaje enviado";
            }
            else{
                $mensaje="Error al enviar el mensaje";
            }
        }
    }
    //Obtener enviados
    $enviados = $bd->obtenerEnviados($empleado);
    $recibidos = $bd->obtenerRecibidos($empleado);
?>
<!doctype html>
<html>
      <head>
        <meta charset="utf-8">        
        <title>Examen 22_23</title>
       </head>
     <body>
     		
     		<div> 
                <h1 style='color:red;'><?php if(isset($mensaje)) echo $mensaje?></h1> 
            </div>    
        	<form action="mensajes.php" method="post">              	
            		<h1 style="color:blue;">Nuevo Mensaje</h1> 
            		<h2 style="color:blue;">
            		<?php
            		echo "Empleado:".$empleado->getNombre()
            		." - DNI:".$empleado->getDni()."- Departamento:"
                    .$empleado->getDepartamento()->getNombre();
            		?>
            		</h2>             		
            		<hr/> 
            		<div> 
                		<label for="para">Para</label><br/>           		
                        <select id="para" name="para">
                        <?php
                        foreach ($dep as $d){
                            echo "<option value='".$d->getIdDep()."'>"
                                  .$d->getNombre()."</option>";
                        }
                        ?>
                        </select>  
                    </div>  
            		<div> 
                		<label for="asunto">Asunto</label><br/>           		
                        <input type="text" id="asunto" name="asunto" size="50" maxlength="50"/>  
                    </div>
                    <div> 
                		<label for="mensaje">Mensaje</label><br/>           		
                        <input type="text" id="mensaje" name="mensaje"  size="100" maxlength="100"/>  
                    </div>                               
                    <br/><button type="submit" name="Enviar">Enviar</button>
                    <button type="submit" name="cerrar">Cerrar Sesión</button>
                    <hr/> 
            		<h1 style="color:blue;">Bandeja de Entrada</h1> 
            		<hr/>   
            		<table width="100%">
            			<tr>
            				<th align="left">Id</th>
            				<th align="left">De</th>
            				<th align="left">Para Departamento</th>
            				<th align="left">Fecha</th>
            				<th align="left">Asunto</th>
            				<th align="left">Mensaje</th>
            			</tr>
            			<?php
            			foreach ($recibidos as $r){
            			   echo "<tr>
            				<td>".$r->getIdMen()."</td>
                            <td>".$r->getDeEmpleado()->getNombre()."</td>
            				<td>".$r->getParaDepartamento()->getNombre()."</td>            				
            				<td>".date("d/m/Y",strtotime($r->getFechaEnvio()))."</td>
            				<td>".$r->getAsunto()."</td>
            				<td>".$r->getMensaje()."</td>
            			</tr>"; 
            			}
            			?>
            		</table>
            		<h1 style="color:blue;">Bandeja de Salida</h1> 
            		<hr/>   
            		<table width="100%">
            			<tr>
            				<th align="left">Id</th>
            				<th align="left">Para</th>            				
            				<th align="left">Fecha</th>
            				<th align="left">Asunto</th>
            				<th align="left">Mensaje</th>
            			</tr>
            			<?php
            			foreach ($enviados as $e){
            			   echo "<tr>
            				<td>".$e->getIdMen()."</td>
            				<td>".$e->getParaDepartamento()->getNombre()."</td>            				
            				<td>".date("d/m/Y",strtotime($e->getFechaEnvio()))."</td>
            				<td>".$e->getAsunto()."</td>
            				<td>".$e->getMensaje()."</td>
            			</tr>"; 
            			}
            			?>
            		</table>                              
      		</form>     
		      
	</body>
</html>
<?php 
}
?>