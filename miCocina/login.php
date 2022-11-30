<?php
require_once 'AccesoDatos.php';
//Conectar a la bd
$bd = new AccesoDatos();
if($bd->getConexion()!=null){
    //Alta cliente
    if(isset($_POST["alta"])){
        //Chequear que los campos está rellenos
        if(empty($_POST["email"]) or empty($_POST["ps1"]) or 
            empty($_POST["ps2"]) or empty($_POST["nombre"]) or 
            empty($_POST["dir"]) or empty($_POST["telf"])){
            $mensaje = "Error, rellena todos los campos";
        }
        //Chequear que ps coinciden
        elseif($_POST["ps1"]!=$_POST["ps2"]){
            $mensaje = "Error, contraseña no coinciden";
        }
        else{
            if($bd->existeUsuario($_POST["email"])){
                $mensaje = "Error, ya está registro este email";
            }
            else{
                //Registrar usuario
                if($bd->crearUsuario($_POST["email"],$_POST["ps1"],
                    $_POST["nombre"],$_POST["dir"],$_POST["telf"])){
                   //Redirigir a Login
                   header("location:login.php");
                }
                else{
                    $mensaje = "Error al registrar el usuario";                    
                }
                
            }
        }
        
        //Chequear que el email no esté creado ya
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
        	if(isset($_POST["registrar"]) or isset($_POST["alta"])){
        	?>
            <div class="mx-auto" style="width: 500px;">
            	<form action="login.php" method="post">
                	<div class="form-outline mb-4">
                		<h1>miCocina-resitro</h1>
                        <input type="email" id="email" class="form-control" required="required"  name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>"/>
                        <label class="form-label" for="email">Email</label>
                        <input type="password" id="ps1" class="form-control" required="required" maxlength="8"  name="ps1" value="<?php if(!empty($_POST['ps1'])) echo $_POST['ps1'];?>"/>
                        <label class="form-label" for="ps1">Contraseña</label>
                        <input type="password" id="ps2" class="form-control" required="required" maxlength="8"  name="ps2" value="<?php if(!empty($_POST['ps2'])) echo $_POST['ps2'];?>"/>
                        <label class="form-label" for="ps2">Confirma Contraseña</label>
                        <input type="text" id="nombre" class="form-control" required="required"  name="nombre" value="<?php if(!empty($_POST['nombre'])) echo $_POST['nombre'];?>"/>
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" id="dir" class="form-control" required="required"  name="dir" value="<?php if(!empty($_POST['dir'])) echo $_POST['dir'];?>"/>
                        <label class="form-label" for="dir">Dirección</label>
                        <input type="tel" id="telf" class="form-control" required="required"  name="telf" value="<?php if(!empty($_POST['telf'])) echo $_POST['telf'];?>"/>
                        <label class="form-label" for=""telf"">Teléfono</label>                    
                        <br/><button type="submit" class="btn btn-primary btn-block mb-4" name="alta">Alta Cliente</button>                            
              		</div>
          		</form>
            </div>            
           <?php 
        	} // Si está activo botón registrarser
        	if(isset($mensaje)){
        	    echo "<h3 class='text-danger'>$mensaje</h3>";
        	}
           ?>
        </div>
	</body>
</html>
<?php 
}//If conexion
else{
    echo "<p>Error, no hay conexión con la BD</p>";
}
?>