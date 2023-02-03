<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class PiezaController extends Controller
{
    function verPiezas(){
        //Obtener piezas de la bd
        $piezas=Pieza::all();

        //Cargar vista para ver piezas
        return view('/piezas/index',compact('piezas'));
    }
    function crearPieza(){
        return view('piezas/crear');
    }
    function insertarPieza(Request $request){
        //Validaciones
        $request->validate([
            "descripcion"=>"required|max:255",
            "precio"=>"required",
            "stock"=>"required"
        ]);
        //Creamos un objeto pieza
        $pieza = new Pieza();
        $pieza->descripcion = $request->descripcion;
        $pieza->clase = $request->clase;
        $pieza->precio = $request->precio;
        $pieza->stock = $request->stock;
        //Hacemos el insert
        if($pieza->save()){
            $mensaje = 'Pieza creada correctamente con id '.$pieza->id;
            return redirect()->route('verPiezas')->with('mensaje',$mensaje);
        }
        else{
            $mensaje = 'Error al crear la pieza';
            return back()->with('mensaje',$mensaje);
        }

    }
    function modificarPieza($id){
        //Obetener datos de pieza
        $pieza = Pieza::find($id);
        //Cargar vista modificar
        return view('/piezas/modificar',compact('pieza'));
    }
    function updatePieza(Request $request,$id){
        //Validaciones
        $request->validate([
            "descripcion"=>"required|max:255",
            "precio"=>"required",
            "stock"=>"required"
        ]);

        // Recuperar la pieza de la bd para poder modificarla
        $pieza = Pieza::find($id);
        //Modificar según el formulario
        $pieza->descripcion = $request->descripcion;
        $pieza->clase = $request->clase;
        $pieza->precio = $request->precio;
        $pieza->stock = $request->stock;
        //Guardar en la bd
        if($pieza->save()){
            $mensaje = 'Pieza modificada';
        }
        else{
            $mensaje = 'Error al modificar la pieza';
        }
        return back()->with('mensaje',$mensaje);
    }
    function borrarPieza($id){
        //Obtener pieza de la bd
        $pieza = Pieza::find($id);
        //Compropar que se puede borrar
        //Se puede borrar si la pieza no está en ninguna pieza_reparación
        if($pieza->piezaEnReparacion()->first()!=null){
            $mensaje = 'Error, no se puede borrar la pieza porque hay reparaciones';
        }
        else{
            //borrar pieza
            if($pieza->delete()){
                $mensaje = 'Pieza borrada';
            }
            else{
                $mensaje = 'Error al borrar la pieza';
            }
            
        }
        //Volvemos a cargar página piezas/index
        return back()->with('mensaje',$mensaje);
    }

}
