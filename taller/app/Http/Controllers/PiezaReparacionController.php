<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Pieza_reparacion;
use Illuminate\Http\Request;

class PiezaReparacionController extends Controller
{
    function insertaPiezaReparacion(Request $request,$id){

        //Chequear que hay seleccionada una pieza
        if($request->pieza==-1){
            $mensaje = 'Error, debes seleccionar una pieza';
        }
        else{
            //Chequear si hay stock
            $pieza = Pieza::find($request->pieza);
            if($pieza->stock >= 1){
                //Chequear si está la pieza en la reparación, si es que sí
                //hay que hacer un update y si no un insert
                $pr = Pieza_reparacion::where('pieza_id',$pieza->id)
                                      ->where('reparacion_id',$id)->first();
                if($pr==null){
                    $pr = new Pieza_reparacion();
                    $pr->reparacion_id=$id;
                    $pr->pieza_id = $pieza->id;
                    $pr->cantidad = 1;
                    $pr->importe = $pieza->precio;
                    //Guardar en BD
                    if($pr->save()){
                        $mensaje='Pieza Añadida';
                    }
                }
                else{
                    $mensaje = 'Error, pieza ya existe, modifícala';
                }
            }
            else{
                $mensaje = 'Error, no hay stock';
            }           
        }
        return back()->with('mensaje',$mensaje);

    }
}
