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
        //Validaciones
        $request->validate(['propietario'=>'required',
        'matricula'=>'required|min:7|max:10',
        'color'=>'required']);
        //Validar si no existe un coche con la misma matrícula
        $coche = Coche::where('matricula',$request->matricula);
        if($coche==null){
            //No existe otro coche con la misma matrícula
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
        }
        else{
            //Ya existe un coche con esa matrícula
            $mensaje = "Error, ya existe un coche con esa matrícula";
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
    function modificarCoche($id){
        //Carga vista de modificar coches
        $coche = Coche::find($id);
        $propietarios = Propietario::all();
        return view('coches/modificar',compact('coche','propietarios'));
    }
    function updateCoche(Request $request){
        //Se llama por post y hace el update
        //Validaciones
        $request->validate(['propietario'=>'required',
        'matricula'=>'required|min:7|max:10',
        'color'=>'required']);

        $cocheBD = Coche::find($request->)

        //Validar si no existe un coche con la misma matrícula
        $coche = Coche::where('matricula',$request->matricula);
        if($coche==null){
            //No existe otro coche con la misma matrícula
            //Crear un coche con los datos del formulario
            $coche = new Coche();
            $coche->matricula = $request->matricula;
            $coche->color = $request->color;
            $coche->propietario_id = $request->propietario;
            //Modificar el coche
            if($coche->save()){
                $mensaje = "Coche modficado correctamente con id ".$coche->id;
            }
            else{
                $mensaje = "Error al modificar el coche";
            }
        }
        else{
            //Ya existe un coche con esa matrícula
            $mensaje = "Error, ya existe un coche con esa matrícula";
        }
        
        //Después de insertar nos quedamos en la misma vista(crear)
        //y le pasamos a la vista el mensaje para saber si ha
        //ido bien o mal
        return back()->with("mensaje",$mensaje);
    }
}
