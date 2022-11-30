<?php 
require_once 'usuario.php';


//session_start();
//MOFICICAR CUANDO SE HACE EL CARRITOPara que se pinten los productos del carrito se hace session start en la pagina platos.php y 
//ya se ha iniciado sesión
if(session_status() != PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_start();
}

if(!isset($_SESSION["usuario"])){
    header("location:login.php"); 
}



if(isset($_SESSION["usuario"])){
    $usuario = unserialize($_SESSION["usuario"]);

}
if(isset($_SESSION["carrito"])){
    
    $numPlatos = unserialize($_SESSION["carrito"])->count();
    
}

if(isset($_POST["salir"])){
    session_destroy();
    session_unset();
    header("location:login.php");
}

?>

<nav class="navbar navbar-expand-sm bg-light navbar-light">

  <div class="container-fluid">
     <ul class="navbar-nav">
     <a class="navbar-brand" href="#"><img src="logoWeb.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> </a>  
  <?php 
  if($usuario->getPerfil()=='A'){
      ?>
    <!-- Links -->
 
      <li class="nav-item">
        <a class="nav-link" href="gestionPlatos.php">Gestión Platos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionUsuarios.php">Gestión Usuarios</a>
      </li>
  
    <?php 
  }
  else{
      
  ?>
   
      <li class="nav-item">
        <a class="nav-link" href="platos.php">Platos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pedidos.php">Pedidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="carrito.php">Carrito <?php if(isset($numPlatos)) {echo '<b>('.$numPlatos.')</b>';}?></a>
      </li>    
  
    <?php 
  }
    ?>
           
    </ul>
    <span class="navbar-text"><?php echo $usuario->getNombre();?></span>  
    <form class="d-flex" method="post">
        <button class="btn btn-primary" type="submit" name="salir">Salir</button>
        
      </form>
   
  </div>

</nav>
    
