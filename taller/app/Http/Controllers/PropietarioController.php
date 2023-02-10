<?php

namespace App\Http\Controllers;

use App\Models\Propietario;

use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    //
    function verPropietarios(){
        //Obtener de la bd todos los propietarios
        $propietarios = Propietario::all();
        //Cargar la vista propietarios/index
        return view('propietarios/index',compact('propietarios'));
    }
    
    //Crear Propietario
    //Carga formulario de crear
    function crearPropietario(){
        return view('propietarios/crear');
    }
    //Inserta en la BD el propietario que viene por post en $request
    function insertarPropietario(Request $request){
        //Validaciones de campos obligatorios (nombre obligatorio y de máximo 255 caracteres)
        $request->validate([
            'nombre'=>'required|max:255',
            'email' => 'required|email:rfc,dns',
            'telefono' => 'required'
        ]);
        //HAcer insert en BD
        $propietario = new Propietario();
        $propietario->nombre = $request->nombre;
        $propietario->email = $request->email;
        $propietario->telefono = $request->telefono;
        if($propietario->save()){
            $mensaje = 'Propietario creado con id '.$propietario->id;
        }
        else{
            $mensaje = 'Error al crear el propietario';
        }
        //Retornar a la misma vista con mensaje
        $propietarios = Propietario::all();
        return view('/propietarios/index',compact('propietarios'))->with('mensaje',$mensaje);
    }
    
    //Modificar Propietario
    function modificarPropietario($id){
        $propietario = Propietario::find($id);
        return view('propietarios/modificar',compact('propietario'));
    }
    //Request se usa ya que es donde vienen los datos del formulario de modificación
    function updatePropietario(Request $request,$id){
        //Validaciones de campos obligatorios (nombre obligatorio y de máximo 255 caracteres)
        $request->validate([
            'nombre'=>'required|max:255',
            'email' => 'required|email:rfc,dns',
            'telefono' => 'required'
        ]);
        //Obtenemos propietarios de la BD
        $propietario = Propietario::find($id);
        //Modificamos con los datos del formulario
        $propietario->nombre = $request->nombre;
        $propietario->email = $request->email;
        $propietario->telefono = $request->telefono;

        if($propietario->save()){
            $mensaje = 'Propietario modificado';
        }
        else{
            $mensaje = 'Error al modificar el propietario';
        }
        return back()->with('mensaje',$mensaje);
    }

    //Borrar Propietario
    //Request se usa ya que es donde vienen los datos del formulario de borrardo
    // En este caso, solamente el id
    function borrarPropietario(Request $request,$id){
        //Recuperar el propietario a borrar
        $propietario = Propietario::find($id);

        //Comprobar que no tiene coches
        if($propietario->coches()->first()!=null){
            $mensaje = 'Error, no se puede borrar porque tiene coches';
        }
        else{
            //Borrar el propietaro
            if($propietario->delete()){
                $mensaje = 'Propietario borrado';
            }
            else{
                $mensaje = 'Error al borrar el propietario';
            }
        }
        
        return back()->with('mensaje',$mensaje);

    }
    function verCochesPropietario($id){
        //OBtener el propietario de la BD
        $propietario = Propietario::find($id);
        //Cargamos vista de ver coches del propietario
        return view('propietarios/verCoches', compact('propietario'));
    }
}
