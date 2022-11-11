<?php

if(isset($_POST["guardar"])){
    
    setcookie("nombre", $_POST["nombre"]);
    setcookie("apellidos", $_POST["apellidos"]);
    
    header("location:DatosPago.php");
    
}


if(isset($_POST["guardar2"])){
    
    setcookie("tipoP", $_POST["tipoP"]);
    
    header("location:MostrarDatos.php");
    
}




?>