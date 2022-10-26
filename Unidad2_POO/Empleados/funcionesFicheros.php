<?php
require_once 'Empleado.php';

function guardarEmpleado(Empleado $e){
    //Abrimos el fichero
    $f = fopen("Empleados.txt", "a+");
    //Escribimos los datos
    fwrite($f, $e->getNss().";".
        $e->getNombre().";".
        $e->getTelefonos()[0].";".
        $e->getTelefonos()[1].";".
        $e->getTelefonos()[2].";".
        $e->getDepartamento()."\n");
    
    //Cerramos fichero
    fclose($f);
}

function obtenerEmpleados() {
    $resultado = array();
    
    //Obtenemos las líneas del fichero en un array
    $datosTXT = file("Empleados.txt"); 
    //Convertimos cada línea en un objeto Producto
    foreach ($datosTXT as $linea){        
        $campos=explode(";",substr($linea, 0, strlen($linea)-1) );
        //Creamos objeto producto
        $telefonos = array($campos[2],$campos[3],$campos[4]);
        $e=new Empleado($campos[0], $campos[1], $telefonos, $campos[5]);
        //Añadimos el producto al array que se devuelve
        $resultado[]=$e;
    }
    
    return $resultado;
}
?>