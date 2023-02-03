<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    public function verReparaciones(){
        //Cargar reparaciones de la bd
        $reparaciones = Reparacion::all();
        //seleccionamos los coches para rellenar el select
        $coches = Coche::all();
        //Cargar vista /reparaciones/index
        return view('reparaciones/index',compact('reparaciones','coches'));
    }
    public function insertarReparacion(Request $request){
        
    }
    public function modificarReparacion($id){
        
    }
}
