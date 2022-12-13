<?php 
require_once 'Usuario.php';
require_once 'AccesoDatos.php';
require_once 'Plato.php';

function recordar($campo,$valor) {
    if(isset($_POST[$campo])){
        if($_POST[$campo]==$valor){
            echo "selected='selected'";
        }
    }
}
function pintarPlato(Plato $p){
    echo "<div class='col'>
            	<div class='card h-100 text-center'>
                  <div class='card-header  h-100'>
                    ".$p->getTipo()."
                        
                  </div>
                  <div class='card-body' >
                      <img src='".$p->getFoto()."' width='50px'/>
                        <h5 class='card-title'>".$p->getNombre()."</h5>
                        <p class='card-text'>
                          Precio: ".number_format($p->getPrecio(),2,',','.')."
                        </p>
                              
                  <div class='card-footer' >
                              
                        <button type='submit' name='carrito' class='btn btn-primary' value='".$p->getId()."'>Añadir al Carrito ".'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
    </svg>'."</button>
        
                  </div>
                  </div>
                </div>
        	</div>";    
}
//Chequear que hay sesión y que es cliente
session_start();
if(!isset($_SESSION['usuario'])){
    header('location:login.php');
}
else{
    $u=$_SESSION['usuario'];
    if($u->getPerfil()!='C'){
        header('location:login.php');
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
        <script src="bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    	<?php 
    	//Incluir menú
    	include_once 'menu.php';
    	//Chequear conexión a la bd
    	$bd = new AccesoDatos();
    	if($bd->getConexion()==null){
    	    $mensaje='Error, no hay conexión con la base de datos';
    	}
    	else{   
    	    //Obtener los platos
    	    if(isset($_POST['tipos'])){
    	       $platos=$bd->ObtenerPlatosCliente($_POST['tipos']);
    	    }
    	    else{
    	        //Cuando se carga la página, se cargan todos los platos
    	        $platos=$bd->ObtenerPlatosCliente('Todos');    	     
    	    }
    	    
    	?>
    	<div class="container-fluid">
    		<form method="post" enctype="multipart/form-data">
    			<h1>NUESTROS PLATOS</h1>
    			<h3 class="text-primary"><?php if(isset($mensaje)) echo $mensaje;?></h3>
    			<hr />
    			<h3>Filtro</h3>
    			<select name="tipos" onchange="this.form.submit()">
    				<option <?php recordar("tipos","Todos")?>>Todos</option>
    				<option <?php recordar("tipos","Entrante")?>>Entrante</option>
    				<option <?php recordar("tipos","Principal")?>>Principal</option>
    				<option <?php recordar("tipos","Bebida")?>>Bebida</option>
    				<option <?php recordar("tipos","Postre")?>>Postre</option>
    			</select>
    			<hr />
    			<div class="row row-cols-1 row-cols-md-5 g-4">
    				<?php
    				foreach ($platos as $p){
    				    pintarPlato($p);
    				}
    				?>
    			</div>
    		</form>
    	</div>
    	<?php
    	} //Else de hay conexión
    	?>
    </body>
</html>