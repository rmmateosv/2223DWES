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
        
    }
    function insertarDentista(Request $request){
        
    }

    function modificarDentista($numCol){
        
    }
    function updateDentista(Request $request, $numCol){
        
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
