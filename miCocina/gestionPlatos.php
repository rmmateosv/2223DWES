<?php 
require_once 'Usuario.php';
require_once 'AccesoDatos.php';

function pintarFilaAltaPlato() {
    ¡¡¡RECORDAR DATOS!!!
    echo "<tr>
            <td></td>
            <td><input type='text' name='nombre' placeholder='Nombre Plato'/></td>
            <td>
            <select name='tipo'>
                <option>Entrante</option>
                <option>Principal</option>
                <option>Bebida</option>
                <option>Postre</option>
            <select>
            </td>
            <td><input type='number' name='precio' placeholder='0,00' step='0.01'/></td>
            <td><input type='file' name='foto'/></td>
            <td></td>
            <td>
                <button type='submit' class='btn btn-primary' name='crear'>Crear</button>
                <button type='submit' class='btn btn-danger' name='cancelar'>Cancelar</button>
            </td>
         </tr>";
}


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
            //Comprobar si hay que crear plato
            if(isset($_POST['crear'])){
                //Chequear que estén rellenos todos los campos
                if(empty($_POST['nombre']) or empty($_POST['precio'])
                    or !isset($_POST['foto'])){
                    $mensaje = "Error, debe rellenar nombre, precio y foto";
                }
            }
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
  		include_once 'menu.php';
  		?>
        <div class="container-fluid">
            <form method="post" enctype="multipart/form-data">
                <h1>Gestión de Platos</h1>
                <h3 class="text-primary"><?php if(isset($mensaje)){
                    echo $mensaje;
                }?></h3>
                <br/>
                <div class="d-flex justify-content-end mb-4">
                  <button name="alta" class="btn btn-primary btn-sm ms-3" data-mdb-add-entry data-mdb-target="#table_1">
                    <i class="fa fa-plus">+</i>
                  </button>             
            	</div>
                <hr />
                <div
                  class="table-editor"
                  id="table_1"
                  data-mdb-entries="5"
                  data-mdb-entries-options="[5, 10, 15]">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="th-sm" ><p class='text-start'>Id</th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Nombre</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Tipo</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Precio</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Foto</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Baja</p></th>
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Acciones</p></th>
                      </tr>
                    </thead>
                    
                    <tbody>
                  	<?php 
                  	//Si se ha pulsado en + (alta) hay que pintar fila para 
                  	// insertar plato
                  	if(isset($_POST['alta']) or isset($_POST['crear'])){
                  	    pintarFilaAltaPlato();
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