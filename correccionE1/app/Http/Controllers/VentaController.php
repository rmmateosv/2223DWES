<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    //
    function verVentas(){
        //Recuperar todas las ventas
        $ventas = Venta::orderBy('fecha','desc')->get();
        return view('index',compact('ventas'));
    }
    function crearVenta(){
        $productos = Producto::all();

        return view('crear', compact('productos'));
    }
    function modificarVenta($id){
        return view('modificar',compact('id'));
    }
    function insertarVenta(Request $request){
        //Validaciones
        $request->validate([
            "fecha"=>"required",
            "producto"=>"required",
            "cantidad"=>"required"
        ]);
        //Obtener el prodcucto para saber el precioUnitario y chequear stock        
        $p = Producto::find($request->producto);
        //Chequear stock
        if($p->stock >= $request->cantidad){
            //Crear Venta
            $v = new Venta();
            $v->fecha=$request->fecha;
            $v->producto=$request->producto;
            $v->cantidad=$request->cantidad;        
            $v->precioUnitario = $p->precio;
            //Guardar Venta
            if($v->save()){
                $mensaje = 'Venta creada';
                //Modificar stock 
                $p->stock = $p->stock - $v->cantidad;
                $p->save();
            }
            else{
                $mensaje = 'Error al crear venta';
            }
        }
        else{
            $mensaje = 'Error, no hay stock';
        }
        return back()->with('mensaje',$mensaje);

    }
}
