<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Propietario;
use Illuminate\Http\Request;

class CocheControler extends Controller
{
    //
    function verCoches(){
        //Obtenemos los coches de la BD
        // Hacemos un select * from coches
        $misCoches = Coche::all();

        // Pasamos $coches a la vista
        return view("coches/index", compact("misCoches"));
    }

    function crearCoche(){
        $propietarios = Propietario::all();
        return view("coches/crear",compact("propietarios"));
    }
    function insertarCoche(Request $request){
        //request contienen los datos del formulario que ha hecho el post
        //Crear un coche con los datos del formulario
        $coche = new Coche();
        $coche->matricula = $request->matricula;
        $coche->color = $request->color;
        $coche->propietario_id = $request->propietario;
        //Guardar el coche
        if($coche->save()){
            $mensaje = "Coche creado correctamente con id ".$coche->id;
        }
        else{
            $mensaje = "Error al crear el coche";
        }
        //Después de insertar nos quedamos en la misma vista(crear)
        //y le pasamos a la vista el mensaje para saber si ha
        //ido bien o mal
        return back()->with("mensaje",$mensaje);
    }

    function verCoche($matricula,$dni=null){
        if($dni==null){
            //Obtenemos los datos del un coche (select * con where matricula=?)
            $miCoche = Coche::where("matricula",$matricula)->first();
            return view("coches/verCoche",["matricula"=>$matricula,"miCoche"=>$miCoche]);
            //return view("coches/verCoche",compact("matricula","miCoche"));
        }
        else{
            //Obtener datos del propietario cuyo id viene en $dni
            $propietario = Propietario::find($dni);
            // Pasamos parámetros con compact para ver que se puede hacer
            // de las dos formas
            return view("coches/verPropietario",
                        compact("matricula","propietario"));
        }
    }
}
