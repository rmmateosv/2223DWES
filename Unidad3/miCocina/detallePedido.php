<?php require_once 'accesoDatos.php';
require_once 'pedido.php';

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
       
       if(isset($_POST['detalle'])){
           $pedido = $bd->obtenerPedido($_POST['detalle']);
           $detalle = $bd->obtenerDetalle($_POST['detalle']);       
       }
       else{
           header("location:pedidos.php");
       }
              
   }
   
   
   
   
   function pintarFila($d){
       echo "<tr>
                    <td>".$d->getPlato()."</td>
                    <td><p class='text-end'>".$d->getCantidad()."</p></td>
                    <td><p class='text-end'>".number_format($d->getPrecioU(),2,",",".")."€</p></td>
                    <td><p class='text-end'>".number_format($d->getPrecioU()*$d->getCantidad(),2,",",".")."€</p></td>
                  </tr>";
       
   }
?>


<div class="container-fluid">
<form method="post" enctype="multipart/form-data" action="detallePedido.php">
    <h1>PEDIDO: <?php echo $pedido->getId()?></h1>
    <h3>Fecha: <?php echo date("d/m/Y",strtotime($pedido->getFecha()))?></h3>
    <h3>Importe: <?php echo number_format($pedido->getTotal(),2,",",".")?></h3>
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
        <th class="th-sm" ><p class='text-start'>Plato</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Cantidad</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Precio</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Total</p></th>
      </tr>
    </thead>
    
    <tbody>
    	
		<?php 		
		foreach ($detalle as $d){
		    pintarFila($d);
		}
		
		?>
    </tbody>
  </table>
	
    
    
 </div>
         
    
</form>
</div>    


    
  </body>
</html>