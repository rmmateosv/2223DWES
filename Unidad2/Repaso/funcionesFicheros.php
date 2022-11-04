<?php
use Repaso\Persona;

require_once 'Persona.php';

function guardar(Persona $c)
{
    // Abrimos el fichero
    $f = fopen("Personas.txt", "a+");
    // Escribimos los datos
    fwrite($f, $c->getNombre().";".$c->getSexo().";".$c->getTipo()."\n");

    // Cerramos fichero
    fclose($f);
}

function obtener()
{
    $resultado = array();

    // Obtenemos las líneas del fichero en un array
    if (file_exists("Personas.txt")) {
        $datosTXT = file("Personas.txt");
        // Convertimos cada línea en un objeto Producto
        foreach ($datosTXT as $linea) {
            $campos = explode(";", substr($linea, 0, strlen($linea) - 1));
            // Creamos objeto producto
            $c = new Persona($campos[0], $campos[1], $campos[2]);
            // Añadimos el producto al array que se devuelve
            $resultado[] = $c;
        }
    }
    return $resultado;
}
?>