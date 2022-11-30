<?php require_once 'accesoDatos.php';
require_once 'lineaCarrito.php';
require_once 'correo.php';


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
   

   $bd = new AccesoDatos();
   if($bd->getConexion()==null){
       $mensaje = "Error: No se puede conectar con la BD";
       
   }
   else{
       
       include_once 'menu.php';
       if($usuario->getPerfil()!='C'){
           header("location:login.php");
       }
       //Recuperar los datos del carrito
       if(isset($_SESSION['carrito'])){
           //Obtener los productos del carrito
           $carrito = unserialize($_SESSION['carrito']);
           
           //Si hacer pedido
           if(isset($_POST['crearPedido']))
           {
               if($carrito->count()>0){
                  //Creamos el pedido
                   $idPedido = $bd->crearPedido($usuario,$carrito);
                   if($idPedido == -1){
                       $mensaje = "Error: No se ha podido crear el pedido";
                   }
                   else{
                       //Enviar correo
                       $p = $bd->obtenerPedido($idPedido);
                       $lineas = $bd->obtenerDetalle($idPedido);
                       $mensaje = crearMensaje($p,$lineas);
                       $mensajeNoHTML = "Pedido ".$p->getId()." realizado. Total a pagar: ".number_format($p->getTotal(),2,",",".")."€<br/>";
                       $ok= enviarCorreo($usuario,$mensaje,$mensajeNoHTML);
                       if($ok!="ok"){
                           echo $ok;
                       }
                       unset($_SESSION["carrito"]);
                       //enviar email a usario y a administrador
                       header("location:pedidos.php");
                   }
               }
               
           }
           
           //Si sumar 1
           if(isset($_POST["sumar1"])){
               foreach($carrito as $lc){
                   if($lc->getPlato()->getId()==$_POST["sumar1"]){
                       $lc->setCantidad($lc->getCantidad()+1);
                       $_SESSION['carrito']=serialize($carrito);
                       break;
                   }
               }
               
           }
           //Si restar 1
           if(isset($_POST["restar1"])){
               foreach($carrito as $lc){
                   if($lc->getPlato()->getId()==$_POST["restar1"]){
                       //Si solo hay una unidad no se puede restar -> borrar
                       if($lc->getCantidad()>1){
                            $lc->setCantidad($lc->getCantidad()-1);
                            $_SESSION['carrito']=serialize($carrito);
                            
                       }
                       break;
                   }
               }
               
           }
           //Si borrar
           if(isset($_POST["borrar"])){
               for($i=0;$i<$carrito->count();$i++){
                   if($carrito->offsetGet($i)->getPlato()->getId()==$_POST["borrar"]){
                       $carrito->offsetUnset($i);
                       $carrito->exchangeArray(array_values($carrito->getArrayCopy()));
                       $_SESSION['carrito']=serialize($carrito);
                       header("location:carrito.php");
                   }
               }
               
           }
           
       }
              
   }
   
   
   
   
   function pintarFila($c,$disponible){
       echo "<tr>
                    <td>".$c->getPlato()->getID()."</td>
                    <td>".$c->getPlato()->getNombre()."</td>
                    <td>".$c->getPlato()->getTipo()."</td>
                    <td><p class='text-end'>".number_format($c->getPlato()->getPrecio(),2,",",".")."€</p></td>
                    <td><img src='".$c->getPlato()->getFoto()."' width='50dpi' height='50dpi'/></td>";
       if($disponible){
           echo "<td><p class='text-end'>".$c->getCantidad()."</p></td>
                    <td>
                       <button type='submit' class='btn btn-primary' name='sumar1' value='".$c->getPlato()->getID()."'>+</button>
                       <button type='submit' class='btn btn-primary' name='restar1' value='".$c->getPlato()->getID()."'>-</button>
                       <button type='submit' class='btn btn-danger' name='borrar' value='".$c->getPlato()->getID()."'>Borrar</button>
                    </td>
                  </tr>";
       }
       else{
           echo "   <td>Producto no disponible</td>
                    <td>
                       <button type='submit' class='btn btn-danger' name='borrar' value='".$c->getPlato()->getId()."'>Borrar</button>
                    </td>
                  </tr>";
       }
   }
?>


<div class="container-fluid">
<form method="post" enctype="multipart/form-data">
    <h1>PRODUCTOS EN TU CARRITO</h1>
    <h3 class="text-primary"><?php if(isset($mensaje)){echo $mensaje;}?></h3>
    <br/>
    
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
        <th class="th-sm" >Id</th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Nombre</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Tipo</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Precio</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Foto</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Cantidad</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Acciones</p></th>
      </tr>
    </thead>
    
    <tbody>
    	
		<?php 		
		if($bd->getConexion()!=null){
		    if(isset($carrito)){
		        $total = 0;
		        foreach ($carrito as $c){
	
		            //Chequear si existe el producto
		            $plato = $bd->obtenerPlato($c->getPlato()->getId());
		            if($plato!=null and !$plato->getBaja()){
		              pintarFila($c, true);
		              $total+=$c->getCantidad()*$c->getPlato()->getPrecio();
		            }
		            else{
		                pintarFila($c, false);
		            }
		        }
		    }
		    else{
		        echo '<h3 class="text-primary">Tu carrito está vacío</h3>';
		    }
		}
		
		?>
    </tbody>
  </table>
	<?php 
	//Total carrito
	if(isset($carrito)){
	    echo "<h3 class='text-primary'>Importe a pagar ".number_format($total,2,",",".")."</h3>";
	    if($total>0){
	        echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#confirmar'>Hacer Pedido</button>";
	    }
	}
	?>
    
    
 </div>
         <!-- The Mensaje Modal de confirmación de crear pedido -->
            <div class="modal" id="confirmar">
              <div class="modal-dialog">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Confirmación</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                    ¿Deseas crear el pedido?
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="crearPedido">Crear</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  </div>
            
                </div>
              </div>
            </div>
    
</form>
</div>    


    
  </body>
</html>