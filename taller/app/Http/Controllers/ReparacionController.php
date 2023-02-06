<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Pieza;
use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    public function verReparaciones(){
        //Cargar reparaciones de la bd ordenadas por fecha descendente
        $reparaciones = Reparacion::orderBy('fecha','desc')->get();
        //seleccionamos los coches para rellenar el select
        $coches = Coche::all();
        //Cargar vista /reparaciones/index
        return view('reparaciones/index',compact('reparaciones','coches'));
    }
    public function insertarReparacion(Request $request){
        //Chequar si el valor de vehículo tiene -1 => No se ha seleccionado ningú coche
        if($request->coche==-1){
            $mensaje = 'No se ha seleccionado ningún vehículo';
        }
        else{
            //Crear reparación
            $r = new Reparacion();
            $r->coche_id = $request->coche;
            $r->fecha = date('YmdHis');//año mes dia hora minuto segundo
            $r->tiempo = 0;
            //Guardar reparación
            if($r->save()){
                $mensaje = 'Reparación creada:'.$r->id;
            }
            else{
                $mensaje = 'Error al crear la reparación';
            }
        }
        return back()->with('mensaje',$mensaje);
    }
    public function modificarReparacion($id){
        // Obtener datos de reparación
        $r = Reparacion::find($id);
        //Obtener piezas para el formulario de crear piezaReparación
        $piezas = Pieza::oderBy('clase','descripcion')->get();
        //Redirigir a vista de piezas para la repación
        return view('/reparaciones/modificar',compact('r'));
    }
}
