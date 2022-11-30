<?php 
require_once 'accesoDatos.php';
require_once 'usuario.php';
session_start();
if(isset($_SESSION["usuario"])){
    $usuario = unserialize($_SESSION["usuario"]);
    if($usuario->getPerfil()=='A'){
        header("location:gestionPlatos.php");
    }
    else{
        header("location:platos.php");
    }
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>miCocina</title>
    <link href="bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="bootstrap-5.2.0-dist/css/miCocina.css" rel="stylesheet">
    <script src="bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </head>
  <?php 
  //Si se ha pulsado en acceder
  if(isset($_POST['acceder'])){
      $bd = new AccesoDatos();
      if($bd->getConexion()!=null){
          $usuario = $bd->obtenerUsuario($_POST["email"],$_POST["ps"]);
          if(($usuario)!=null){
              //Guardamos el usuario en la sesión para que no lo pida más
              session_start();
              $_SESSION["usuario"] = serialize($usuario);
              //Redirige a la página de inicio según el perfil del usuario
              if($usuario->getPerfil()=='A'){
                header("location:gestionPlatos.php"); 
              }
              else{
                header("location:platos.php"); 
              }
          }
          else{
              echo "<h3>Error: Datos incorrectos</h3>";
          }
      }
      else{
          echo "<h3>Error: No se puede conectar con la BD</h3>";
      }
  }
  ?>
  <body>
  	
    
<div class="container-fluid">
    <div class="mx-auto" style="width: 500px;">
    	<form action="login.php" method="post">
        	<div class="form-outline mb-4">
        		<h1>miCocina-login</h1>
        		<p class='text-start'><img alt="logo" src="logoWeb.png"/></p>
                <input type="email" id="email" class="form-control" name="email"/>
                <label class="form-label" for="email">Email</label>
                <input type="password" id="ps" class="form-control" maxlength="8"  name="ps"/>
                <label class="form-label" for="ps">Contraseña</label>
                
                <br/><button type="submit" class="btn btn-primary btn-block mb-4" name="acceder">Acceder</button>
                <button type="submit" class="btn btn-primary btn-block mb-4"  name="registrar">Registrarse</button>
      		</div>
  		</form>
    </div>
    <?php 
      //Si se ha pulsado en registrarse
    if(isset($_POST["registrar"]) or isset($_POST["alta"])){
    ?>
    <div class="mx-auto" style="width: 500px;">
    	<form action="login.php" method="post">
        	<div class="form-outline mb-4">
        		<h1>miCocina-resitro</h1>
                <input type="email" id="email" class="form-control" required="required"  name="email" value="<?php if(isset($_POST['alta'])) {echo $_POST['email'];}?>"/>
                <label class="form-label" for="email">Email</label>
                <input type="password" id="ps1" class="form-control" required="required" maxlength="8"  name="ps1" value="<?php if(isset($_POST['alta'])) {echo $_POST['ps1'];}?>"/>
                <label class="form-label" for="ps1">Contraseña</label>
                <input type="password" id="ps2" class="form-control" required="required" maxlength="8"  name="ps2" value="<?php if(isset($_POST['alta'])) {echo $_POST['ps2'];}?>"/>
                <label class="form-label" for="ps2">Confirma Contraseña</label>
                <input type="text" id="nombre" class="form-control" required="required"  name="nombre" value="<?php if(isset($_POST['alta'])) {echo $_POST['nombre'];}?>"/>
                <label class="form-label" for="nombre">Nombre</label>
                <input type="text" id="dir" class="form-control" required="required"  name="dir" value="<?php if(isset($_POST['alta'])) {echo $_POST['dir'];}?>"/>
                <label class="form-label" for="dir">Dirección</label>
                <input type="tel" id="telf" class="form-control" required="required"  name="telf" value="<?php if(isset($_POST['alta'])) {echo $_POST['telf'];}?>"/>
                <label class="form-label" for=""telf"">Teléfono</label>
                
                <br/><button type="submit" class="btn btn-primary btn-block mb-4" name="alta">Alta Cliente</button>
                
                <?php 
        //Hacer comprobaciones
        if(isset($_POST['alta'])){
            //Correo no existe -> Comprobar en la bd
            $bd = new AccesoDatos();
            $error=0;
            if($bd->getConexion()!=null){
                //Comprobar si existe email
                if($bd->existeEmail($_POST['email'])){
                    echo "<h3>Error: Ya existe el email</h3>";
                    $error=1;
                }
                //Contraseñas iguales
                if($_POST['ps1']!=$_POST['ps2']){
                    echo "<h3>Error: Contraseñas no coinciden</h3>";
                    $error=1;
                }
                //Creamos el usuario si no hay errores
                if($error==0){
                    if($bd->altaUsuario($_POST["email"],$_POST["ps1"],$_POST["nombre"],$_POST["dir"],$_POST["telf"])){
                        header("location:login.php");
                    }
                    else{
                        echo "<h3>Error: No se puede registrar el usuario</h3>";
                    }
                }
            }
            else{
                echo "<h3>Error: No se puede conectar con la BD</h3>";
            }
        }
    }
    ?>
                
      		</div>
  		</form>
    </div>
    </div>
  </body>
</html>