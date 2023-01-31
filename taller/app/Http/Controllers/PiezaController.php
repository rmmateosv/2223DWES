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
        
    }
    function insertarPieza(Request $request,$id){
        
    }
    function modificarPieza($id){
        
    }
    function updatePieza(Request $request,$id){
        
    }
    function borrarPieza($id){
        
    }

}
