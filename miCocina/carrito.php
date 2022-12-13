<?php 
require_once 'AccesoDatos.php';
require_once 'Plato.php';
require_once 'PlatoCarrito.php';

function  pintarFila(PlatoCarrito $pc){
    echo "<tr>
			<td>".$pc->getPlato()->getId()."</td>
			<td>".$pc->getPlato()->getNombre()."</td>
			<td>".$pc->getPlato()->getTipo()."</td>
			<td>".number_format($pc->getPlato()->getPrecio(),2,',','.')."</td>
			<td><img src='".$pc->getPlato()->getFoto()."' width='50px'/></td>
			<td>".$pc->getCantidad()."</td>
			<td>
               <button type='submit' class='btn btn-primary' name='suma' value='".$pc->getPlato()->getId()."'>+</button>
               <button type='submit' class='btn btn-primary' name='resta' value='".$pc->getPlato()->getId()."'>-</button>
               <button type='submit' class='btn btn-danger' name='borrar' value='".$pc->getPlato()->getId()."'>Borrar</button>
            </td>
    	 </tr>";
    
}

session_start();
if(!isset($_SESSION['usuario'])){
    header('location:login.php');
}
?>
<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>miCocina</title>
    <link href="bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    </head>
	<body>		
		<?php
		  include_once 'menu.php';
		  //Conectar con la bd
		  $bd = new AccesoDatos();
		  if($bd->getConexion()==null){
		      $mensaje='Error, no hay conexión con la bd';
		  }
		  else{		     
    		  if(isset($_SESSION['carrito'])){
    		      $platosCarrito = $_SESSION['carrito'];    		      
    		      if(isset($_POST['suma'])){
    		          //Buscar el plato en el carrito
    		          foreach ($platosCarrito as $pc){
    		              if($pc->getPlato()->getId()==$_POST['suma']){
    		                  $pc->setCantidad($pc->getCantidad()+1);    		                  
    		              }
    		              //Actualiza el carrito en la sesión
    		              $_SESSION['carrito'] = $platosCarrito;
    		          }
    		      }
    		      if(isset($_POST['resta'])){
    		          //Buscar el plato en el carrito
    		          foreach ($platosCarrito as $pc){
    		              if($pc->getPlato()->getId()==$_POST['resta']){
    		                  $pc->setCantidad($pc->getCantidad()-1);
    		              }
    		              //Actualiza el carrito en la sesión
    		              $_SESSION['carrito'] = $platosCarrito;
    		          }
    		      }
    		  }
    		  else{
    		      $platosCarrito=array();
    		  }
		?>
    	<div class="container-fluid">
    		<form method="post" enctype="multipart/form-data">
    			<h1>PRODUCTOS EN TU CARRITO</h1>
    			<h3 class="text-primary"><?php if(isset($mensaje))
    			    echo $mensaje;?></h3>
    			<br />
    			<hr />
    			<div class="table-editor" id="table_1" data-mdb-entries="5"
    				data-mdb-entries-options="[5, 10, 15]">
    				<table class="table table-hover">
    					<thead>
    						<tr>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Id</th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Nombre</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Tipo</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Precio</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Foto</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Cantidad</p></th>
    							<th class="th-sm" data-mdb-sort="false"><p class='text-start'>Acciones</p></th>
    						</tr>
    					</thead>    
    					<tbody>
    					<?php
    					foreach ($platosCarrito as $pc){
    					    pintarFila($pc);
    					}
    					?>
    					</tbody>
    				</table>  
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
    						<div class="modal-body">¿Deseas crear el pedido?</div>
    
    						<!-- Modal footer -->
    						<div class="modal-footer">
    							<button type="submit" class="btn btn-primary"
    								data-bs-dismiss="modal" name="crearPedido">Crear</button>
    							<button type="submit" class="btn btn-danger"
    								data-bs-dismiss="modal">Cancelar</button>
    						</div>
    					</div>
    				</div>
    			</div>
    		</form>
    	</div>
	</body>
</html>
<?php 
		  }//Else de hay conexión
?>