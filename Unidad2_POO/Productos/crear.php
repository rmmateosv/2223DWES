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
	<?php include_once 'menu.php';?>
	<form action="" method="post">
		<p>
			<label>Código</label><br/>
			<input type="number" name="codigo" placeholder="Código"/>
		</p>
		<p>
			<label>Nombre</label><br/>
			<input type="text" name="nombre" placeholder="Nombre del producto"/>
		</p>
		<p>
			<label>Precio</label><br/>
			<input type="number" name="precio" placeholder="Precio" step="0.01"/>
		</p>
		<p>
			<label>Stock</label><br/>
			<input type="number" name="stock" placeholder="Stock"/>
		</p>
		<p>
			<input type="submit" name="crear" value="Crear Producto"/>
		</p>
	</form>
	<?php 
	if(isset($_POST['crear'])){
	    //Chequear que no haya ningún dato vacío
	    if(empty($_POST['codigo']) or empty($_POST['nombre']) or 
	       empty($_POST['precio']) or empty($_POST['stock'])){
	       echo "<h3 style='color:red'>Error, no puede haber campos vacíos</h3>"; 
	    }
	    else{
	        //Creamos un objeto de la clase Producto
	        $p = new Producto($_POST['codigo'], $_POST['nombre'], 
	                          $_POST['precio'], $_POST['stock']);
	        //Guardamos el producto en el fichero productos.txt
	        guardarProducto($p);
	    }
	}
	?>
</body>
</html>