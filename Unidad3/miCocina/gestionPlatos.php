<?php require_once 'accesoDatos.php';
require_once 'plato.php';

function subirFichero($fichero) {
    //Establecer Carpeta destino en el servidor a una carpeta llamada fotos
    //Ruta relativa
    $dest="fotosPlatos/".$fichero["name"];
    
    //Obtener el Fichero temporal subido
    $f=$fichero["tmp_name"];
    //Copiar el fichero temporal a la carpeta del servidor
    if(!move_uploaded_file($f, $dest)){
        return "Error: No se ha subido la foto del plato<br/>";
    }
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
   if($usuario->getPerfil()!='A'){
       header("location:login.php");
   }
   else{
       $bd = new AccesoDatos();
       
       //Alta plato
       if(isset($_POST['crear'])){
           if(empty($_POST['nombre']) or empty($_POST['tipo']) or empty($_POST['precio']) or empty($_FILES['foto']['name'])){
               $mensaje= "Error: Debe indicar todos los campos";
           }
           else{
               if($bd->crearPlato($_POST['nombre'], $_POST['tipo'], $_POST['precio'], "fotosPlatos/".$_FILES['foto']['name'])){
                   //Subir foto al servidor
                   $mensaje= subirFichero($_FILES['foto']);
                   $mensaje= $mensaje."Plato creado correctamente";
               }
               else{
                   $mensaje= "Error:Se ha producido un error al crear el plato";
               }
           }
       }
       //Modificar plato
       if(isset($_POST['guardar'])){
           if(empty($_POST['nombre']) or empty($_POST['precio'])){
               $mensaje= "Error: Debe indicar todos los campos";
           }
           else{
               $p = $bd->obtenerPlato($_POST['guardar']);
               
               if($bd->modificarPlato($_POST['guardar'],$_POST['nombre'], $_POST['tipo'], $_POST['precio'], 
                   empty($_FILES['foto']['name'])?$p->getFoto():"fotosPlatos/".$_FILES['foto']['name'],
                   isset($_POST['platoBaja'])?true:false)){
                   //Subir foto al servidor si se cambia
                   if(!empty($_FILES['foto']['name'])){
                       $mensaje= subirFichero($_FILES['foto']);
                   }
                   
                   $mensaje= isset($mensaje)?$mensaje:""."Plato modificado correctamente";
               }
               else{
                   $mensaje= "Error:Se ha producido un error al modificar el plato";
               }
           }
       }
       //Dar de baja plato
       if(isset($_POST['baja'])){
           if($bd->bajaPlato($_POST['baja'])){
               $mensaje= "Plato dado de baja correctamente";
           }
           else{
               $mensaje= "Se ha producido un error al dar de baja el plato";
           }
       }
       //Cargar platos
       if($bd->getConexion()!=null){
          $platos = $bd->obtenerPlatos();
       }
   }
   
   function pintarFila($p){
       //Si hay que modificar, se pintan campos input
       if(isset($_POST['modificar']) and $_POST['modificar']==$p->getID()){
           echo "<tr>
                    <td>".$p->getID()."</td>
                    <td><input type='text' name='nombre' value='".$p->getNombre()."'/></td>
                    <td><select name='tipo'>
                            <option ".($p->getTipo()=='Entrante'?"selected='selected'":"").">Entrante</option>
                            <option ".($p->getTipo()=='Principal'?"selected='selected'":"").">Principal</option>
                            <option ".($p->getTipo()=='Bebida'?"selected='selected'":"").">Bebida</option>
                            <option ".($p->getTipo()=='Postre'?"selected='selected'":"").">Postre</option>
                        </select></td>
                    <td><input type='number' step='.01' name='precio' value='".$p->getPrecio()."'€/></td>
                    <td><input type='file' name='foto'/></td>
                    <td><input type='checkbox' name='platoBaja' ";
                   if($p->getBaja()){
                       echo "checked='checked'";
                   }
                    echo "/></td>
                    <td>
                       <button type='submit' class='btn btn-primary' name='guardar' value='".$p->getId()."'>Guardar</button>
                       <button type='submit' class='btn btn-danger' name='cancelar' >Cancelar</button>
                    </td>
                  </tr>";
       }
       else{
           echo "<tr>
                    <td>".$p->getID()."</td>
                    <td>".$p->getNombre()."</td>
                    <td>".$p->getTipo()."</td>
                    <td><p class='text-end'>".number_format($p->getPrecio(),2,",",".")."€</p></td>
                    <td><img src='".$p->getFoto()."' width='50dpi' height='50dpi'/></td>
                    <td>".$p->getBaja()."</td>
                    <td>
                       <button type='submit' class='btn btn-primary' name='modificar' value='".$p->getId()."'>Modificar</button>
                       <button type='submit' class='btn btn-danger' name='baja' value='".$p->getId()."'>Baja</button>
                    </td>
                  </tr>";
       }
   }
?>


<div class="container-fluid">
<form method="post" enctype="multipart/form-data">
    <h1>Gestión de Platos</h1>
    <h3 class="text-primary"><?php if(isset($mensaje)){echo $mensaje;}?></h3>
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
  data-mdb-entries-options="[5, 10, 15]"
>
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
		//Nueva fila para alta
		if(isset($_POST['alta'])){
		    echo "<tr>
                <td></td>
                <td><input type='text' name='nombre'/></td>
                <td><select name='tipo'>
                            <option>Entrante</option>
                            <option>Principal</option>
                            <option>Bebida</option>
                            <option>Postre</option>
                        </select>
                </td>
                <td><input type='number' name='precio' step='.01'/></td>
                <td><input type='file' name='foto'/></td>
                <td></td>
                <td>
                   <button type='submit' class='btn btn-primary' name='crear'>Crear</button>
                   <button type='submit' class='btn btn-danger' name='cancelar'>Cancelar</button>
                </td>
              </tr>";
		}
		foreach ($platos as $p){
		    pintarFila($p);
		}
		
		?>
    </tbody>
  </table>
</div>
</form>
</div>    
  </body>
</html>