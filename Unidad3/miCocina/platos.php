<?php require_once 'accesoDatos.php';
require_once 'lineaCarrito.php';
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

    //Hacer antes de cargar el menú para que se muestre el nº de platos en carrito
    $bd = new AccesoDatos();
    if($bd->getConexion()!=null){
        $platos = $bd->obtenerPlatosActivos(isset($_POST["tipos"])?$_POST["tipos"]:"Todos");
        
        //Si se añade producto al carrito
        session_start();
        if(isset($_POST['carrito'])){
            //Obtener el producto
            $plato = $bd->obtenerPlato($_POST['carrito']);
            if($plato!=null and !$plato->getBaja()){
                if(!isset($_SESSION['carrito'])){
                    $carrito=new ArrayObject();
                }
                else{
                    $carrito = unserialize($_SESSION['carrito']);
                }
                //Si el producto ya está en el carrito se suma uno a la cantidad
                $existe = false;
                foreach($carrito as $lc){
                    if($lc->getPlato()->getId()==$plato->getId()){
                        $existe = true;
                        $lc->setCantidad($lc->getCantidad()+1);
                    }
                }
                if(!$existe){
                    $carrito->append(new LineaCarrito($plato,1));
                }
                $_SESSION['carrito']=serialize($carrito);
            }
            else{
                $mensaje = "Error: No existe el producto seleccionado";
            }
            
        }
        
        // Se añade menú, se hace después de insertar el producto en el carrito
        // para que aparezca actualizado
        include_once 'menu.php';
        if($usuario->getPerfil()!='C'){
            header("location:login.php");
        }
    }
    else{
        $mensaje = 'Error: No hay conexión con la base de datos';
    }
    
   
   
   
   
   function pintarFila($p){
       echo "<div class='col'>
            	<div class='card h-100 text-center'>
                  <div class='card-header  h-100'>
                    ".$p->getTipo()."
                        
                  </div>
                  <div class='card-body'>                
                      <img
                        src='".$p->getFoto()."'  
                        class='card-img-top'
                        alt='".$p->getNombre()."'
                      />
                        <h5 class='card-title'>".$p->getNombre()."</h5>
                        <p class='card-text'>
                          Precio: ".number_format($p->getPrecio(),2,",",".")."
                        </p>
                      
                  <div class='card-footer'>
                    
                        <button type='submit' name='carrito' class='btn btn-primary' value='".$p->getID()."'>Añadir al Carrito ".'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
    </svg>'."</button>
                        
                  </div>
                  </div>
                </div>
        	</div>";
       
   }
?>


<div class="container-fluid">
<form method="post" enctype="multipart/form-data">
    <h1>NUESTROS PLATOS</h1>
    <h3 class="text-primary"><?php if(isset($mensaje)){echo $mensaje;}?></h3>
    <hr/>
    <h3>Filtro</h3><select name = "tipos" onchange="this.form.submit()">
    	<option <?php if(isset($_POST["tipos"]) and $_POST["tipos"]=="Todos"){echo "selected='selected'";}?>>Todos</option>
    	<option <?php if(isset($_POST["tipos"]) and $_POST["tipos"]=="Entrante"){echo "selected='selected'";}?>>Entrante</option>
    	<option <?php if(isset($_POST["tipos"]) and $_POST["tipos"]=="Principal"){echo "selected='selected'";}?>>Principal</option>
    	<option <?php if(isset($_POST["tipos"]) and $_POST["tipos"]=="Bebida"){echo "selected='selected'";}?>>Bebida</option>
    	<option <?php if(isset($_POST["tipos"]) and $_POST["tipos"]=="Postre"){echo "selected='selected'";}?>>Postre</option>
    </select>
    <hr/>
    <div class="row row-cols-1 row-cols-md-5 g-4">
    <?php 
    foreach ($platos as $p){
        pintarFila($p);
    }
    ?>
    </div>
 </div>
</form>
</div>    
  </body>
</html>