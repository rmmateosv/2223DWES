<?php
require_once 'Producto.php';

function guardarProducto(Producto $p){
    //Abrimos el fichero
    $f = fopen("Productos.txt", "a+");
    //Escribimos los datos
    fwrite($f, $p->getCodigo().";".$p->getNombre().";".$p->getPrecio().";".$p->getStock()."\n");
    
    //Cerramos fichero
    fclose($f);
}

function obtenerProductos() {
    $resultado = array();
    
    //Obtenemos las líneas del fichero en un array
    $datosTXT = file("Productos.txt"); 
    //Convertimos cada línea en un objeto Producto
    foreach ($datosTXT as $linea){        
        $campos=explode(";",$linea);
        //Creamos objeto producto
        $p=new Producto($campos[0], $campos[1], $campos[2], $campos[3]);
        //Añadimos el producto al array que se devuelve
        $resultado[]=$p;
    }
    
    return $resultado;
}
?>