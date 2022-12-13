<?php 
require_once 'Usuario.php';

function resumenCarrito() {
    $carrito=$_SESSION['carrito'];
    $total=0;
    foreach ($carrito as $pC){
        $total+=$pC->getCantidad();
    }
    return sizeof($carrito).'/'.$total;
}
//Recuperar el usuario logueado
if(isset($_SESSION["usuario"])){
    $u=$_SESSION["usuario"];
    
    //Programar botón salir
    if(isset($_POST['salir'])){
        //Cerramos sesión
        session_unset();
        //Redirigimos a login
        header('location:login.php');
    }
?>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
	<div class="container-fluid">
		<ul class="navbar-nav">
			<a class="navbar-brand" href="#"><img src="logoWeb.png"
				alt="Avatar Logo" style="width: 40px;" class="rounded-pill"> </a>
			<?php
			if($u->getPerfil()=='A'){
			?>
			<!-- Administrador -->
			<li class="nav-item"><a class="nav-link" href="gestionPlatos.php">Gestión
					Platos</a></li>
			<li class="nav-item"><a class="nav-link" href="gestionUsuarios.php">Gestión
					Usuarios</a></li>
            <?php 
			}
			elseif($u->getPerfil()=='C'){
            ?>
            <!-- Cliente -->
			<li class="nav-item"><a class="nav-link" href="platos.php">Platos</a>
			</li>
			<li class="nav-item"><a class="nav-link" href="pedidos.php">Pedidos</a>
			</li>
			<li class="nav-item"><a class="nav-link" href="carrito.php">Carrito
					<?php if(isset($_SESSION['carrito'])) echo resumenCarrito()?></a></li>
			<?php
			} //elseif usuario cliente
			?>
		</ul>
		<span class="navbar-text"><?php echo $u->getNombre()?></span>
		<form class="d-flex" method="post">
			<button class="btn btn-primary" type="submit" name="salir">Salir</button>
		</form>
	</div>
</nav>
<?php 
} //If de si hay sesión
?>
