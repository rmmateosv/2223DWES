<?php 
require_once 'Usuario.php';
require_once 'AccesoDatos.php';

function pintarPlatos(){
    global $platos;
    if(isset($platos)){
        foreach ($platos as $p){            
            //Detectar si se ha pulsado en modificar
            if(isset($_POST["modificar"]) and $_POST["modificar"]==$p->getId()){
                // Pintar plato con campos editables
                echo "<tr>
                <td>".$p->getId()."</td>
                <td><input type='text' name='nombre' value='".$p->getNombre()."'/></td>
                <td><select name = 'tipo'>
                    <option ".($p->getTipo()=='Entrante'?'selected=selected':'').">Entrante</option>
                    <option ".($p->getTipo()=='Principal'?'selected=selected':'').">Principal</option>
                    <option ".($p->getTipo()=='Bebida'?'selected=selected':'').">Bebida</option>
                    <option ".($p->getTipo()=='Postre'?'selected=selected':'').">Postre</option>
                    </select></td>
                <td><input type='number' step='0.01' name='precio' value='".$p->getPrecio()."'/></td>
                <td><input type='file' name='foto'/></td>
                <td><input type='checkbox' name='checkBaja' ".($p->getBaja()?'checked=checked':'')."/></td>
                <td>
                    <button type='submit' class='btn btn-primary' name='guardar' value='".$p->getId()."'>Guardar</button>
                    <button type='submit' class='btn btn-danger' name='cancelar' value='".$p->getId()."'>Cancelar</button>";                              
                echo "</td>
                </tr>";
            }
            else{
                echo "<tr>
                <td>".$p->getId()."</td>
                <td>".$p->getNombre()."</td>
                <td>".$p->getTipo()."</td>
                <td>".$p->getPrecio()."</td>
                <td><img src='".$p->getFoto()."' width='50px' height='50px'/></td>
                <td>".$p->getBaja()."</td>
                <td>
                    <button type='submit' class='btn btn-primary' name='modificar' value='".$p->getId()."'>Modificar</button>
                    ";
                if($p->getBaja()){
                    echo "<button type='submit' class='btn btn-primary' name='baja' value='".$p->getId()."'>Alta</button>";
                }
                else{
                    echo "<button type='submit' class='btn btn-danger' name='baja' value='".$p->getId()."'>Baja</button>";
                }
                
                echo "</td>
                </tr>";
            }//Else de modificar
        }
    }
}

function rellenarInput($campo){
    if(isset($_POST[$campo]) and !empty($_POST[$campo])){
        return  $_POST[$campo];
    }
}
function rellenarOption($campo,$valor){
    if(isset($_POST[$campo]) and $_POST[$campo]==$valor){
        return "selected='selected'";
    }
}
function pintarFilaAltaPlato() {
   
    echo "<tr>
            <td></td>
            <td><input type='text' name='nombre' value='"
            .rellenarInput("nombre")."' placeholder='Nombre Plato'/></td>
            <td>
            <select name='tipo'>
                <option ".rellenarOption("tipo","Entrante").">Entrante</option>
                <option ".rellenarOption("tipo","Principal").">Principal</option>
                <option ".rellenarOption("tipo","Bebida").">Bebida</option>
                <option ".rellenarOption("tipo","Postre").">Postre</option>
            <select>
            </td>
            <td><input type='number' name='precio' value='"
            .rellenarInput("precio")."'placeholder='0,00' step='0.01'/></td>
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
            //Detectar si se ha pulsado en guardar (antes se pulsa en modificar)
            if(isset($_POST["guardar"])){
                //Comprobar que no est?? vac??o nombre, precio
                if(empty($_POST['nombre']) or empty($_POST['precio'])){
                    $mensaje = "Error, el nombre y el precio no pueden estar vac??os";
                }
                else{
                    //Chequear si se ha cambiado la foto
                    if(!empty($_FILES['foto']['name'])){
                        //Se ha cambiado, subir foto
                        //Nombre de fichero va a ser la fecha
                        $fichero = "fotosPlatos/".date("dmYHis");
                        if(!move_uploaded_file($_FILES['foto']['tmp_name'], $fichero)){
                            $mensaje = "Error al subir la foto del plato";
                        }
                    }
                    else{
                        //No se ha cambiado
                        $fichero = null;
                    }
                    $pNuevo = new Plato($_POST['guardar'], 
                        $_POST['nombre'], 
                        $_POST['tipo'], 
                        $_POST['precio'], 
                        $fichero,
                        (isset($_POST['checkBaja'])?true:false));
                    if(!$bd->modificarPlato($pNuevo)){
                      $mensaje = 'Error al modificar el plato';                     
                    }
                }
            }//if guardar cambios modificaci??n
            //Comprobar si hay que dar de baja plato
            if(isset($_POST['baja'])){
                $p = $bd->ObtenerPlato($_POST['baja']);
                if($p->getBaja()){
                    //Dar de alta
                    if(!$bd->modificarBaja($p, false)){
                        $mensaje = "Se ha producido un error al dar de alta el plato";
                    }
                }
                else{
                    //Dar de baja
                    if(!$bd->modificarBaja($p,true)){
                        $mensaje = "Se ha producido un error al dar de baja el plato";
                    }
                }
            }// If modificar plato
            
            //Comprobar si hay que crear plato
            if(isset($_POST['crear'])){
                //Chequear que est??n rellenos todos los campos
                if(empty($_POST['nombre']) or empty($_POST['precio'])
                    or empty($_FILES['foto']['name'])){
                    $mensaje = "Error, debe rellenar nombre, precio y foto";
                }
                else{
                    //Nombre de fichero va a ser la fecha
                    $fichero = "fotosPlatos/".date("dmYHis");
                    $p = new  Plato(null, $_POST['nombre'], 
                        $_POST['tipo'], $_POST['precio'], $fichero, false);
                    //Hacemos el insert en la bd
                    if($bd->crearPlato($p)){
                        //Subimos fichero
                        if(!move_uploaded_file($_FILES['foto']['tmp_name'], $fichero)){
                            $mensaje = "Error al subir la foto del plato";     
                        }
                        else{
                            header("location:gestionPlatos.php");
                        }
                    }
                    else{
                        $mensaje = "Error al crear el plato";                        
                    }
                    
                }
            }
            // Obtener los platos que existen en la bd
            $platos = $bd->ObtenerPlatos();
        }//Hay conexi??n
        else{
            $mensaje = "Error, no hay conexi??n con la bd";
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
                <h1>Gesti??n de Platos</h1>
                <h3 class="text-primary">
                <?php if(isset($mensaje)){
                    echo $mensaje;
                }?>
                </h3>
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
                        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Precio</p></th>
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
                  	pintarPlatos();
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