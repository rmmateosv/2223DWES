<?php
include_once 'Alumno.php';
//Definición de funciones
function borrarFichero(){
    unlink("alumnos.txt");
}
function guardarAlumno(Alumno $alumno){
    //Abrimos el fichero alumnos.txt
    $fichero = fopen("alumnos.txt", "a+");
    //Escribimos el alumno
    fwrite($fichero, $alumno->getExp().";".
        $alumno->getNombre().";".
        date("Y-m-d",$alumno->getFechaN()));
    //Escribimos asignaturas con el forato LM:10
    foreach ($alumno->getAsig() as $a=>$n){
        fwrite($fichero, ";".$a.":".$n);
    }
    //Se escribe el fin de línea
    fwrite($fichero, "\n");
}
function cargarAlumnos(){
    $resultado = array();
    
    if(file_exists("alumnos.txt")){
        $array= file("alumnos.txt");
        
        foreach ($array as $linea){
            //Dividimos la línea en campos
            $linea=substr($linea, 0,strlen($linea)-1);
            $campos = explode(";", $linea);
            //Crear alumno
            $alumno = new Alumno($campos[0], $campos[1], strtotime($campos[2]));
            //Rellenar asignaturas
               if(sizeof($campos)>3){
                for($i=3;$i<sizeof($campos);$i++){
                    //Dividividimos por : para tener asinatura y nota
                    $asig_nota = explode(":", $campos[$i]);
                    $alumno->addNota($asig_nota[0],$asig_nota[1]);
                    
                }
            }
            $resultado[]=$alumno;
        }
    }
    return $resultado;
}
?>