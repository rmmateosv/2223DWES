<?php
require_once 'Producto.php';
require_once 'funcionesFicheros.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php include_once 'menu.php';
	
	$productos = obtenerProductos();
	if(sizeof($productos)>0){
	    ?>
	    <h1>PRODUCTOS</h1>
	    <table border="1">
	    	<tr>
	    		<th>Código</th>
	    		<th>Nombre</th>
	    		<th>Precio</th>
	    		<th>Stock</th>	    		
	    	</tr>
	    	<?php
	    	//Mostramos cada producto en una fila
	    	foreach ($productos as $p){
	    	    echo "<tr><td>".$p->getCodigo()."</td>
	    	              <td>".$p->getNombre()."</td>
                          <td>".$p->getPrecio()."</td>
                          <td>".$p->getStock()."</td>
                       </tr>";
	    	}
	    	?>
	    </table>
	    <?php 
	    
	}
	?>
	
</body>
</html>