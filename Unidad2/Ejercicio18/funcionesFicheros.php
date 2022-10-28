<?php
require_once 'Vivienda.php';

function guardarVivienda(Vivienda $v)
{
    // Abrimos el fichero
    $f = fopen("Viviendas.txt", "a+");
    // Escribimos los datos
    fwrite($f, $v->getTipo() . ";" . 
               $v->getZona() . ";" . 
               $v->getCalle() . ";" . 
               $v->getNH() . ";" .
               $v->getPrecio(). ";".
               $v->getMetros(). ";".
               $v->getExtras(). ";".
               $v->getObservaciones()."\n");

    // Cerramos fichero
    fclose($f);
}

function obtenerViviendas()
{
    $resultado = array();

    // Obtenemos las líneas del fichero en un array
    if (file_exists("Viviendas.txt")) {
        $datosTXT = file("Viviendas.txt");
        // Convertimos cada línea en un objeto Producto
        foreach ($datosTXT as $linea) {
            $campos = explode(";", substr($linea, 0, strlen($linea) - 1));
            // Creamos objeto producto
            $v = new Vivienda($campos[0], $campos[1], $campos[2], $campos[3], $campos[4], $campos[5], $campos[6], $campos[7]);
            // Añadimos el producto al array que se devuelve
            $resultado[] = $v;
        }
    }
    return $resultado;
}
?>