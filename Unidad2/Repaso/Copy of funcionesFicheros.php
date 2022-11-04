<?php
require_once 'XXXX.php';

function guardar(XXX $c)
{
    // Abrimos el fichero
    $f = fopen("XXX", "a+");
    // Escribimos los datos
    fwrite($f, "XXXXXaqui hay que poner los campos del objeto"."\n");

    // Cerramos fichero
    fclose($f);
}

function obtener()
{
    $resultado = array();

    // Obtenemos las líneas del fichero en un array
    if (file_exists("XXX")) {
        $datosTXT = file("XXX");
        // Convertimos cada línea en un objeto Producto
        foreach ($datosTXT as $linea) {
            $campos = explode(";", substr($linea, 0, strlen($linea) - 1));
            // Creamos objeto producto
            XXXXX
            // Añadimos el producto al array que se devuelve
            $resultado[] = $c;
        }
    }
    return $resultado;
}
?>