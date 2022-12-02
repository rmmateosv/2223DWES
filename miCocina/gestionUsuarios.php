<?php 
require_once 'Usuario.php';
require_once 'AccesoDatos.php';

//Definir funciones
function pintarBotonAltaBaja(Usuario $u){
    if($u->getBaja()){
        //Creamos un botón azul para volver a dar de alta
       echo '<button class="btn btn-primary" 
                                type="submit" name="alta" 
                                value="'.$u->getId().'">
                                Alta</button>'; 
    }
    else{
        //Creamos un botón rojo para dar baja
        echo '<button class="btn btn-danger" 
                                type="submit" name="baja"
                                value="'.$u->getId().'">
                                Baja</button>';
    }
}
//Iniciar Sessión para comprobar si estamos autenticados como admin
session_start();
if(isset($_SESSION['usuario'])){
    $u = $_SESSION['usuario'];
    if($u->getPerfil()!='A'){
        //Redirigir a login
        header('location:login.php');
    }
    else{ //Usuario y perfil correcto
       //Conectar con la BD
       $bd = new AccesoDatos();
       if($bd->getConexion()!=null){
           //Antes de cargar usuarios, comprobamos si se ha pulsado
           //en alta o en baja
           if(isset($_POST['baja'])){
               //Dar de baja cliente (el id está en el value del botón baja)
               if($bd->bajaCliente($_POST['baja'])){
                   $mensaje = 'Cliente '.$_POST['baja'].' dado de baja';
               }
               else{
                   $mensaje = 'Error al dar de baja el cliente '.$_POST['baja'];
               }
           }
           if(isset($_POST['alta'])){
               //Dar de alta cliente(el id está en el value del botón baja)
               if($bd->altaCliente($_POST['alta'])){
                   $mensaje = 'Cliente '.$_POST['alta'].' dado de alta';
               }
               else{
                   $mensaje = 'Error al dar de alta el cliente '.$_POST['alta'];
               }
           }
           
           //Obtenemos los usuarios
           $usuarios = $bd->obtenerClientes();
       }//Hay conexión
       else{
           $mensaje = "Error, no hay conexión con la bd";
       }
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>miCocina</title>
    <link href="bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js" ></script>
  </head>
  <body>
  		<?php 
  		//Cargar menú
  		include_once 'menu.php';
  		?>
        <div class="container-fluid">
            <form method="post">
                <h1>Gestión de Usuarios</h1>
                <h3 class="text-primary">
                <?php if(isset($mensaje)){
                    echo $mensaje;
                }?></h3>
                <br/>                
            	<hr />
                <div
                  class="table-editor"
                  id="table_1"
                  data-mdb-entries="5"
                  data-mdb-entries-options="[5, 10, 15]">
                  <table class="table table-hover">
                        <thead>
                              <tr>
                                <th class="th-sm" >Id</th>
                                <th class="th-sm" data-mdb-sort="false">Email</th>
                                <th class="th-sm" data-mdb-sort="false">Nombre</th>
                                <th class="th-sm" data-mdb-sort="false">Dirección</th>
                                <th class="th-sm" data-mdb-sort="false">Teléfono</th>
                                <th class="th-sm" data-mdb-sort="false">Perfil</th>
                                <th class="th-sm" data-mdb-sort="false">Baja</th>
                                <th class="th-sm" data-mdb-sort="false">Acciones</th>
                              </tr>
                        </thead>
                        <tbody>
                        <!-- PINTAR UNA FILA PARA CADA CLIENTE -->
                        <?php 
                        if(sizeof($usuarios)>0){
                            foreach ($usuarios as $u){                                
                            ?><!--for each de usuarios  -->
                            <tr>
                                <td><?php echo $u->getId()?></td>
                                <td><?php echo $u->getEmail()?></td>
                                <td><?php echo $u->getNombre()?></td>
                                <td><?php echo $u->getDir()?></td>
                                <td><?php echo $u->getTelf()?></td>
                                <td><?php echo $u->getPerfil()?></td>
                                <td><?php echo $u->getBaja()?></td>
                                <td>
                                <?php pintarBotonAltaBaja($u)?>
                                </td>
                              </tr>
                            <?php     
                            }
                        }
                        ?>
                        </tbody>
                  </table>
                </div>
            </form>
        </div>    
  </body>
</html>
<?php         
    }//Usuario y perfil correcto
    
}
else{
    //Redirigir a login
    header('location:login.php');
}
?>