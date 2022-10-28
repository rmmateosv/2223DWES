<?php
require_once 'Cita.php';

function guardarCita(Cita $c)
{
    // Abrimos el fichero
    $f = fopen("Citas.txt", "a+");
    // Escribimos los datos
    fwrite($f, strtotime($c->getFecha()) . ";" . $c->getHora() . ";" . $c->getNombre() . ";" . $c->getTipoServicio() . "\n");

    // Cerramos fichero
    fclose($f);
}

function obtenerCitas()
{
    $resultado = array();

    // Obtenemos las líneas del fichero en un array
    if (file_exists("Citas.txt")) {
        $datosTXT = file("Citas.txt");
        // Convertimos cada línea en un objeto Producto
        foreach ($datosTXT as $linea) {
            $campos = explode(";", substr($linea, 0, strlen($linea) - 1));
            // Creamos objeto producto
            $c = new Cita(date("d/m/Y",$campos[0]), $campos[1], $campos[2], $campos[3]);
            // Añadimos el producto al array que se devuelve
            $resultado[] = $c;
        }
    }
    return $resultado;
}
?>