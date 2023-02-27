<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use Illuminate\Http\Request;

class DentistaController extends Controller
{
    //
    function verDentistas(){
        //Recuperar los datos de los dentistas
        $dentistas = Dentista::all();
        return view('/dentista/index',compact('dentistas'));
    }

    function crearDentista(){
        return view('/dentista/crear'); 
    }
    function insertarDentista(Request $request){
        //Validaciones de campos
        $request->validate([
            'numCol'=> 'required|unique:App\Models\Dentista,numCol',
            'nombre'=>'required',
            'especialidad'=>'required'
        ]);

        //Crear dentista
        $dentista = new Dentista();
        $dentista->numCol = $request->numCol;
        $dentista->nombre = $request->nombre;
        $dentista->especialidad = $request->especialidad;
        if($dentista->save()){
            $mensaje = 'Dentista creado';
        }
        else{
            $mensaje = 'Error al crear el dentista';
        }
        return back()->with('textoMensaje',$mensaje);

    }

    function modificarDentista($numCol){
        //Obtener datos del dentista
        $dentista = Dentista::where('numCol',$numCol)->first();

        return view('/dentista/modificar',compact('dentista'));
    }

    function updateDentista(Request $request, $numCol){
        //Validaciones de campos
        $request->validate([
            'numCol'=> 'required',
            'nombre'=>'required',
            'especialidad'=>'required'
        ]);
        
        //Siempre que se haya modificado el nº de colegiado
        if($numCol!=$request->numCol){
            //Chequear si ya existe el nuevo número de colegiado en la BD
            $dentista = Dentista::where('numCol',$request->numCol)->first();
            if($dentista!=null){
                $mensaje = 'Error, ya existe un dentista con este número de colegiado';
                return back()->with('textoMensaje',$mensaje);
            }            
        }
        //Modificar el dentista
        $dentista = new Dentista();
        $ok= $dentista->where('numCol',$numCol)
                ->update(['numCol'=>$request->numCol,
                          'nombre' => $request->nombre,
                          'especialidad' => $request->especialidad]);
        if($ok){
            $mensaje = 'Dentista modificado';
            return redirect(route('modificarDentista',$request->numCol))->with('textoMensaje',$mensaje);
        }
        else{
            $mensaje = 'Error al modificar el dentista';
            return back()->with('textoMensaje',$mensaje);
        }
       
        

    }

    function borrarDentista($numCol){
        //Recuperar dentista para ver si hay citas
        $dentista = Dentista::where('numCol',$numCol)->first();
        if(sizeof($dentista->citas())==0){
            if(Dentista::where('numCol',$numCol)->delete()){
                $mensaje='Dentista borrado';
            }
            else{
                $mensaje='Se ha producido un error al borrar el dentista, contacta con el administrador';
            }
        }
        else{
            $mensaje = 'Error, no se puede borrar el dentista porque tiene citas';
        }
        return back()->with('textoMensaje',$mensaje);
    }
    
}
