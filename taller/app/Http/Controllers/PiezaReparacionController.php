<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Pieza_reparacion;
use Illuminate\Http\Request;

class PiezaReparacionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
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
                        //Decrementar el stock de la pieza en 1
                        $pieza->stock -= 1;
                        $pieza->save(); //Actualizamos stock
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
    function updatePiezaReparacion(Request $request, $id){
        //Ver si hay que sumar o restar y obtener el id de la pieza del formulario
        if(isset($request->suma)){
            $pieza = $request->suma;
            $cantidad = 1;
        }
        elseif(isset($request->resta)){
            $pieza = $request->resta;
            $cantidad = -1;
        }
        //Obtener datos de la pieza
        $piezaBD = Pieza::find($pieza);
        //Chequear si hay stock cuando damos a +
        if($piezaBD->stock <1 and $cantidad==1){
            $mensaje = 'Error, no hay stock suficiente';
        }
        else{
            //Obtener los datos de la pieza_reparacion
            $pr = Pieza_reparacion::where('pieza_id',$pieza)
            ->where('reparacion_id',$id)
            ->first(); 
            //Modificar $pr en la BD
            $pr->cantidad += $cantidad;
            if($pr->cantidad == 0){
                $pr->delete();                
                $mensaje = 'Pieza borrada porque el stock es 0';
            }
            elseif($pr->save()){                
                $mensaje = 'Stock modificado';
            } 
            //Modfificar stock en la BD
            $piezaBD->stock += $cantidad*-1;
            $piezaBD->save();           
        }
        return back()->with('mensaje',$mensaje);
    }
}
