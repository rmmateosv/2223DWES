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
              
   }
   
   
   
   
   function pintarFila($p){
       echo "<tr>
                    <td>".$p->getId()."</td>
                    <td>".date("d/m/Y",strtotime($p->getFecha()))."</td>
                    <td><p class='text-end'>".number_format($p->getTotal(),2,",",".")."€</p></td>
                    <td>
                       <button type='submit' class='btn btn-primary' name='detalle' value='".$p->getID()."'>Detalle</button>                   
                    </td>
                  </tr>";
       
   }
?>


<div class="container-fluid">
<form method="post" enctype="multipart/form-data" action="detallePedido.php">
    <h1>MIS PEDIDOS</h1>
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
        <th class="th-sm" ><p class='text-start'>Id</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Fecha</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-end'>Importe</p></th>
        <th class="th-sm" data-mdb-sort="false"><p class='text-start'>Ver</p></th>
      </tr>
    </thead>
    
    <tbody>
    	
		<?php 		
		if($bd->getConexion()!=null){
		    $pedidos = $bd->obtenerPedidos($usuario->getId());
		    foreach ($pedidos as $p){
		        pintarFila($p);
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